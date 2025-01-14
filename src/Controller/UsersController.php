<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Controller;
use cake\Http\Session;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public $Articles;
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function initialize(): void
    {
        parent::initialize();
        $this->Articles = $this->getTableLocator()->get('Articles'); // Charge le modèle Articles
    }

    public function homepage()
    {
        $articles = $this->Articles->find('all')
            ->select(['id', 'name', 'image', 'created'])
            ->order(['created' => 'DESC'])
            ->toArray();

        $this->set(compact('articles'));
    }

    public function index()
    {
        // Récupérer la valeur de la recherche depuis les paramètres de la requête
        $search = $this->request->getQuery('search');

        // Construire la requête de recherche
        $query = $this->Users->find()
            ->contain(['Roles']); // Inclure les rôles pour utilisation dans la vue

        // Si une valeur de recherche est présente, ajouter des conditions à la requête
        if (!empty($search)) {
            $query->where([
                'OR' => [
                    'Users.name LIKE' => '%' . $search . '%',
                    'Users.email LIKE' => '%' . $search . '%',
                ]
            ]);
        }

        // Paginer les résultats
        $users = $this->paginate($query);

        // Passer les résultats et la recherche à la vue
        $this->set(compact('users', 'search'));
    }


    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, contain: ['Roles', 'Articles', 'Categories']);
        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', limit: 200)->all();
        $this->set(compact('user', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', limit: 200)->all();
        $this->set(compact('user', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->allowUnauthenticated(['login', 'view', 'add', 'homepage']);
    }

    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // indépendamment de POST ou GET, rediriger si l'utilisateur est connecté
        if ($result && $result->isValid()) {
            $session = new Session();
            $session->write('User.loggedIn', true);
            // rediriger vers /users après la connexion réussie
            $user = $result->getData();
            $role_id = $user->role_id;
            if ($user->role_id === 1) {
                $redirect = $this->request->getQuery('redirect', [
                    'controller' => 'Users',
                    'action' => 'homepage',
                ]);
            } else {
                $redirect = $this->request->getQuery('redirect', [
                    'controller' => 'Users',
                    'action' => 'index',
                ]);
            }
            return $this->redirect($redirect);
        }

        // afficher une erreur si l'utilisateur a soumis un formulaire
        // et que l'authentification a échoué
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Votre identifiant ou votre mot de passe est incorrect'));
        }
    }

    public function logout()
    {
        $this->Authentication->logout();
        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }
}
