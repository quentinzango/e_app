<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'ZaqMarket';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $cakeDescription ?></title>

    <?= $this->Html->css('cake') ?>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css(['bootstrap.min', '/fontawesome/css/all.min', '/style/templatemo-style']) ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

</head>

<body>
    <!-- Page Loader -->
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= $this->Url->build('/') ?>">
                <i class="fas fa-film mr-2"></i>
                ZaqMarket
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link nav-link-1 active" href="http://localhost/e_commerce/users/homepage">Home</a></li>
                    <li class="nav-item"><a class="nav-link nav-link-3" href="http://localhost/e_commerce/users/about">About</a></li>
                    <li class="nav-item"><a class="nav-link nav-link-4" href="http://localhost/e_commerce/users/contact">Contact</a></li>

                </ul>

            </div>
            <div class="navbar-nav ms-lg-auto flex-row justify-content-center py-3 py-lg-0 me-n2">
                <a href="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'messages']) ?>" class="tm-message-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901" />
                    </svg>
                </a>

                <?php if ($this->getRequest()->getSession()->read('User.loggedIn')) { ?>
                    <?= $this->Html->link('Deconnection', ['controller' => 'Users', 'action' => 'logout'], ['class' => 'nav-link']) ?>
                <?php } else { ?>
                    <?= $this->Html->link('Inscription', ['controller' => 'Users', 'action' => 'add'], ['class' => 'nav-link']) ?>
                    <?= $this->Html->link('Connection', ['controller' => 'Users', 'action' => 'login'], ['class' => 'nav-link']) ?>
                <?php } ?>

            </div>
        </div>
    </nav>

    <!-- default.php -->
    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="<?= $this->Url->build('/img/hero.jpg') ?>">
        <?= $this->Form->create(null, ['url' => ['controller' => 'Articles', 'action' => 'search'], 'type' => 'post', 'class' => 'd-flex tm-search-form']) ?>
        <?= $this->Form->control('search', [
            'class' => 'form-control tm-search-input',
            'placeholder' => 'Search',
            'aria-label' => 'Search',
            'label' => false // Désactive le label
        ]) ?>
        <button class="btn btn-outline-success tm-search-btn" type="submit">
            <i class="fas fa-search"></i> <!-- Icône sans texte -->
        </button>
        <?= $this->Form->end() ?>
    </div>



    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>

    <footer class="tm-bg-gray pt-5 pb-3 tm-text-gray tm-footer">
        <div class="container-fluid tm-container-small">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4 tm-footer-title">About ZaqMarket</h3>
                    <p> ZaqMarket is an online marketplace that offers you the opportunity to enjoy a unique experience. Here, you can purchase what you like at unbeatable prices. Additionally, you have the possibility to post your own items and build a personalized sales network. Join a dynamic community and maximize your business opportunities with ZaqMarket!.</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4 tm-footer-title">Our Links</h3>
                    <ul class="tm-footer-links pl-0">
                        <li><a href="#">Advertise</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Our Company</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                    <ul class="tm-social-links d-flex justify-content-end pl-0 mb-5">
                        <li class="mb-2"><a href="https://facebook.com"><i class="fab fa-facebook"></i></a></li>
                        <li class="mb-2"><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>
                        <li class="mb-2"><a href="https://instagram.com"><i class="fab fa-instagram"></i></a></li>
                        <li class="mb-2"><a href="https://pinterest.com"><i class="fab fa-pinterest"></i></a></li>
                    </ul>
                    <a href="#" class="tm-text-gray text-right d-block mb-2">Terms of Use</a>
                    <a href="#" class="tm-text-gray text-right d-block">Privacy Policy</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-7 col-12 px-5 mb-3">
                    Copyright 2020 Catalog-Z Company. All rights reserved.
                </div>
                <div class="col-lg-4 col-md-5 col-12 px-5 text-right">
                    Designed by <a href="https://templatemo.com" class="tm-text-gray" rel="sponsored" target="_parent">TemplateMo</a>
                </div>
            </div>
        </div>
    </footer>

    <?= $this->Html->script(['plugins']) ?>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>

    <?= $this->fetch('script') ?>
</body>

</html>