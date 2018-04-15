<?php
/**
* CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
* Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
*
* Licensed under The MIT License
* For full copyright and license information, please see the LICENSE.txt
* Redistributions of files must retain the above copyright notice.
*
* @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
* @link      https://cakephp.org CakePHP(tm) Project
* @since     0.2.9
* @license   https://opensource.org/licenses/mit-license.php MIT License
*/
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
* Application Controller
*
* Add your application-wide methods in the class below, your controllers
* will inherit them.
*
* @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
*/
class AppController extends Controller
{

    /**
    * Initialization hook method.
    *
    * Use this method to add common initialization code like loading components.
    *
    * e.g. `$this->loadComponent('Security');`
    *
    * @return void
    */
    // src/Controller/AppController.php

    public function initialize()
    {
        // Existing code

        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            // Added this line
            'authorize'=> 'Controller',
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'username',
                        'password' => 'password'
                    ]
                ]
            ],

            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ],

            'authorize' => array('Controller'),
            // If unauthorized, return them to page they were just on
            'unauthorizedRedirect' => $this->referer()
        ]);
        // Allow the display action so our pages controller
        // continues to work. Also enable the read only actions.
        $this->Auth->allow(['display', 'view', 'home']);
    }


    public function isAuthorized($user) {
        // Admin peut accéder à toute action

        if (isset($user['role']) && $user['role'] == 'Admin') {
            return true;
        }

        // Refus par défaut
        return false;
    }

}
