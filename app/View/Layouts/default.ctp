<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $cakeDescription ?>:
            <?php echo $this->fetch('title'); ?>
        </title>
        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css('cake.generic');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <h1><?php echo $this->Html->link($cakeDescription, ''); ?></h1>
                <?php
                //$this->Html->addCrumb('Users', '/users');
//                echo $this->Html->getCrumbs(' > ', 'Home');
                echo $this->Html->link(__('Posts'), 'http://localhost/cakebasic/posts');
                echo '&nbsp';
                echo $this->Html->link(__('Users'), 'http://localhost/cakebasic/users');
                $user = $this->Session->read('Auth.User');
                if (empty($user)) {
                    echo $this->Html->link(__('Login'), 'http://localhost/cakebasic/users/login', array('style' => 'float:right'));
                } else {
                    echo $this->Html->link($user['username'] . ' ' . __('Logout'), 'http://localhost/cakebasic/users/logout', array('style' => 'float:right'));
                }
                ?>         
            </div>
            <div id="content">

                <?php echo $this->Flash->render(); ?>

                <?php echo $this->fetch('content'); ?>
            </div>
            <div id="footer">              
                <?php
//                echo $this->Html->link();
                echo $this->Html->link(__('English'), array('language' => 'eng'));
                echo '&nbsp;';
                echo $this->Html->link(__('Vietnam'), array('language' => 'vie'));
                ?>
                <?php
                echo $this->Html->link(
                        $this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')), 'http://www.cakephp.org/', array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
                );
                ?>
                <p>
                    <?php echo $cakeVersion; ?>
                </p>
            </div>
        </div>
        <?php echo $this->element('sql_dump'); ?>
    </body>
</html>
