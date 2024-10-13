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

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min','view','fonts']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/projects') ?>"><span>Task</span>Flow</a>
        </div>
        <div class="top-nav-links">
            <a href="<?= $this->Url->build(['controller' => 'Projects', 'action' => 'index']) ?>">
                <div class="projects">
                    <p id="projects__text">Projects</p>
                </div>
            </a>
            <a href="<?= $this->Url->build(['controller' => 'Tasks', 'action' => 'index']) ?>">
                <div class="tasks">
                    <p id="tasks__text">Tasks</p>
                </div>
            </a>
            <a href="<?= $this->Url->build(['controller' => 'Progress', 'action' => 'index']) ?>">
                <div class="progress">
                    <p id="progress__text">Progress</p>
                </div>  
            </a>
            <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index']) ?>">
                <div class="users">
                    <p id="users__text">Users</p>
                </div>   
            </a>    
        </div>
        
        <button class="logout" id="logout">
            <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout']) ?>">
            <p>Log Out</p>
            </a>
        </button>
        
    </nav>
    <br>
    <br>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
<script>
</script>
</html>


