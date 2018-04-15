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
 */

$cakeDescription = 'Projets mvc blog';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <link rel="stylesheet" type="text/css" href="/Projets_MVC_Blog/webroot/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/Projets_MVC_Blog/webroot/css/style.css">
    <script src="/Projets_MVC_Blog/webroot/js/jquery-3.3.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-5">
        <div class="container">
            <a class="navbar-brand" href="/Projets_MVC_Blog/Users">Projets MVC Blog</a>
            <div class="collapse navbar-collapse">
                <div class="w-50">
                    <form class="navbar-form" method="post" action="/Projets_MVC_Blog/search/">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search a tag or a word">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <ul class="navbar-nav ml-auto">
                    <?php if(isset($this->request->session()->read('Auth')['User'])): ?>
                        <li>
                            <a class="nav-link" href="/Projets_MVC_Blog/users/view/<?php echo $this->request->session()->read('Auth')['User']['id'] ?>"><?php echo $this->request->session()->read('Auth')['User']['name'] ?></a>
                        </li>
                        <li>
                            <a class="nav-link" href="/Projets_MVC_Blog/users/logout">Deconnection</a>
                        </li>
                    <?php else: ?>
                        <li>
                            <a class="nav-link" href="/Projets_MVC_Blog/inscription">Enregistrement</a>
                        </li>
                        <li>
                            <a class="nav-link" href="/Projets_MVC_Blog/users/login">Connection</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
