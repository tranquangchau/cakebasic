<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    //public $components=array('DebugKit.Toolbar');

    public $components = array(
        'DebugKit.Toolbar',
        'Cookie',
        'Session',
        'Flash',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'posts', 'action' => 'index'),
            'logoutRedirect' => array(
                'controller' => 'pages',
                'action' => 'display',
                'home'
            ),
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish'
                )
            ),
            'authorize' => array('Controller') // Added this line
        )
    );
    public $helpers = array('Html' => array('className' => 'MyHtml'));

    public function isAuthorized($user) {
        // Admin can access every action
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        } else {
//             echo 'no permistion';die;
            $this->Flash->error(__('No permission action.'));
            return $this->redirect(array('action' => 'index'));
//             return false;
        }

        // Default deny
        //return false;
    }

    public function beforeFilter() {
        $this->_setLanguage();
    }

    private function _setLanguage() {
        //echo 'lang';die;
        //if the cookie was previously set, and Config.language has not been set
        //write the Config.language with the value from the Cookie
        if ($this->Cookie->read('lang') && !$this->Session->check('Config.language')) {
            $this->Session->write('Config.language', $this->Cookie->read('lang'));
        }
        //if the user clicked the language URL 
        else if (isset($this->params['language']) &&
                ($this->params['language'] != $this->Session->read('Config.language'))
        ) {
            //then update the value in Session and the one in Cookie
            $this->Session->write('Config.language', $this->params['language']);
            $this->Cookie->write('lang', $this->params['language'], false, '20 days');
        }
    }

    //override redirect
    public function redirect($url, $status = NULL, $exit = true) {
        if (!isset($url['language']) && $this->Session->check('Config.language')) {
            $url['language'] = $this->Session->read('Config.language');
        }
        parent::redirect($url, $status, $exit);
    }

//    public function changeLanguage($lang) {
//        if (!empty($lang)) {
//            if ($lang == 'vie') {
//                $this->Session->write('Config.language', 'vie');
//            } else if ($lang == 'eng') {
//                $this->Session->write('Config.language', 'eng');
//            }
//
//            //in order to redirect the user to the page from which it was called
//            $this->redirect($this->referer());
//        }
//    }
}
