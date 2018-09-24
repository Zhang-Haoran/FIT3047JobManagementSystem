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
?>
<?= $this->Html->css('/css/sb-admin.css') ?>

<?= $this->Html->css('/css/formStyle.css') ?>

 <img src="img/image_02.jpg" style="margin-left: auto;
         margin-right: auto;
         display: block; margin-top: 15px">

<!DOCTYPE html>
<html>

<head>
    <title>Error page</title>
</head>

<body>
<h1 style= "font-size:60px";><center>This page cannot be found</h1>
    <center><h2>The page may have moved, or no longer exists.</h2></center>
    <center><h3>Click here to <?= $this->Html->link(__('Home page'), ['controller' => 'Jobs', 'action'=>'index']) ?> <h3></center>
</body>
</html>
