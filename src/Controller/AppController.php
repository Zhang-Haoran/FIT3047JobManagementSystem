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

use Cake\Controller\Component\AuthComponent;
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
     *
     */
    public function initialize()
    {
        parent::initialize(); 

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);

        $this->loadComponent('Flash');

        //Login function

        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'controller' => 'Employees',
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            //As there is no access without authorisation you don't need this
            'authError' => 'You are not authorised to access this page',
            'loginAction' => [
                'controller' => 'Employees',
                'action' => 'login'
            ],
            'logoutRedirect' => [
                'controller' => 'Employees',
                'action' => 'login'
            ]

            //use isAuthorized in Controllers
            //            'authorize' => ['Controller'],
            // If unauthorized, return them to page they were just on
            //           'unauthorizedRedirect' => [/]
          ]);
          $this->Auth->setConfig('authenticate', [
              'Form' => [
                  'userModel' => 'Employees',
                  'fields' => ['username' => 'email', 'password' => 'password']
              ]
          ]);

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }

    public function beforeFilter(Event $event)
    {
        // Pass settings in using 'all'
    }

}
