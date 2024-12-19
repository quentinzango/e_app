<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $subcategories
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Articles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="articles form content">
            <!-- Ajout de l'option enctype pour permettre l'upload de fichiers -->
            <?= $this->Form->create($article, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Add Article') ?></legend>
                <?php
                    // Génération des champs du formulaire
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('subcategorie_id', ['options' => $subcategories]);

                    // Modification du champ 'image' pour accepter le téléchargement de fichiers
                    echo $this->Form->control('image', ['type' => 'file']);
                    echo $this->Form->control('name');
                    echo $this->Form->control('description');
                    echo $this->Form->control('price');
                    echo $this->Form->control('status');
                    echo $this->Form->control('localization');
                    echo $this->Form->control('deleted', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
