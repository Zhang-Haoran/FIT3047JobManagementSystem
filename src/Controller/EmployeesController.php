<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\Query;

use Cake\Routing\Router;
use Cake\Mailer\Email;

/**
 * Employees Controller
 *
 * @property \App\Model\Table\EmployeesTable $Employees
 *
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmployeesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow([
            'logout',
            'password',
            'reset',
            //'add',
            //'index'

        ]);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if ($this->Auth->user('access_level') == '3') {
            $this->Flash->set(__('You have no authorization to access this page as a field staff'));
            return $this->redirect($this->Auth->redirectUrl());
        } elseif ($this->Auth->user('access_level') == '2') {
            $this->Flash->set(__('You have no authorization to access this page as a office staff'));
            return $this->redirect($this->Auth->redirectUrl());
        }
        $employees = $this->Employees->find('all');

        $this->set(compact('employees'));
    }

    /**
     * View method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if ($this->Auth->user('access_level') == '3') {
            $this->Flash->set(__('You have no authorization to access this page as a field staff'));
            return $this->redirect($this->Auth->redirectUrl());
        } elseif ($this->Auth->user('access_level') == '2') {
            $this->Flash->set(__('You have no authorization to access this page as a office staff'));
            return $this->redirect($this->Auth->redirectUrl());
        }

        $employee = $this->Employees->get($id, [
            'contain' => ['Jobs']
        ]);

        $this->set('employee', $employee);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if ($this->Auth->user('access_level') == '3') {
            $this->Flash->set(__('You have no authorization to access this page as a field staff'));
            return $this->redirect($this->Auth->redirectUrl());
        } elseif ($this->Auth->user('access_level') == '2') {
            $this->Flash->set(__('You have no authorization to access this page as a office staff'));
            return $this->redirect($this->Auth->redirectUrl());
        }
        $employee = $this->Employees->newEntity();
        if ($this->request->is('post')) {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
        $this->set(compact('employee'));
        $this->set('acLOptions', array('3' => 'Field Employee', '2' => 'Office Staff', '1' => 'Administrator'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $session = $this->getRequest()->getSession();
        if($this->Auth->user('id') != $id) {
            if ($this->Auth->user('access_level') == '3') {
                $this->Flash->set(__('You have no authorization to access this page as a field staff'));
                return $this->redirect($this->Auth->redirectUrl());
            } elseif ($this->Auth->user('access_level') == '2') {
                $this->Flash->set(__('You have no authorization to access this page as a office staff'));
                return $this->redirect($this->Auth->redirectUrl());
            }
        }
        $employee = $this->Employees->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            if ($this->Employees->save($employee)) {

                if($this->Auth->user('id') == $id) {
                    $session->write([
                        'Auth.User.fname' => $employee->fname,
                        'Auth.User.lname' => $employee->lname,
                        'Auth.User.email' => $employee->email,
                        'Auth.User.phone' => $employee->phone,
                        'Auth.User.access_level' => $employee->access_level,
                    ]);

                }

                if($employee->access_level != '1') {
                    $this->Flash->success(__('The employee has been saved.'));
                    if($this->Auth->user('id') == $id)
                    $this->Flash->default(__('Changed access level.'));
                    return $this->redirect(['controller'=>'jobs','action' => 'index']);
                }
                $this->Flash->success(__('The employee has been saved.'));
                return $this->redirect(['action' => 'index']);

            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
        $this->set(compact('employee'));
        $this->set('acLOptions', array('3' => 'Field Staff', '2' => 'Office Staff', '1' => 'Administrator'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if ($this->Auth->user('access_level') == '3') {
            $this->Flash->set(__('You have no authorization to access this page as a field staff'));
            return $this->redirect($this->Auth->redirectUrl());
        } elseif ($this->Auth->user('access_level') == '2') {
            $this->Flash->set(__('You have no authorization to access this page as a office staff'));
            return $this->redirect($this->Auth->redirectUrl());
        }
        $this->request->allowMethod(['get', 'delete']);
        $employee = $this->Employees->get($id);
        if ($this->Employees->delete($employee)) {
            $this->Flash->success(__('The employee has been deleted.'));
        } else {
            $this->Flash->error(__('The employee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Login method
     */
    public function login()
    {   //check if a user is logged in

        if ($this->request->is('post')) {
            $employee = $this->Auth->identify();
            if ($employee) {
                $this->Auth->setUser($employee);
//                return $this->redirect($this->Auth->redirectUrl());
                if ($this->Auth->user('access_level') == '1') {
                    $this->Flash->success('You have logged in as admin');
                    return $this->redirect(['controller' => 'jobs', 'action' => 'index']);
                } elseif ($this->Auth->user('access_level') == '2') {
                    $this->Flash->success('You have logged in as office staff');
                    return $this->redirect(['controller' => 'jobs', 'action' => 'index']);
                } elseif ($this->Auth->user('access_level') == '3') {
                    $this->Flash->success('You have logged in as field staff');
                    return $this->redirect(['controller' => 'jobs', 'action' => 'index']);
                }
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }

    /**
     * Logout method
     */
    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Forget Password method
     */
    public function password()
    {
        if ($this->request->is('post')) {
            $query = $this->Employees->findByEmail($this->request->getData('email'));
            $employee = $query->first();
            if (is_null($employee)) {
                $this->Flash->error('Email address does not exist. Please try again');
            } else {
                $token = uniqid();
                $url = Router::Url(['controller' => 'Employees', 'action' => 'reset'], true) . '/' . $token;
                $timeout = time() + DAY;
                if ($this->Employees->updateAll(['token' => $token, 'timeout' => $timeout], ['id' => $employee->id])) {
                    $this->sendResetEmail($url, $employee);
                    return $this->redirect(['action' => 'login']);
                } else {
                    $this->Flash->error('Error saving reset token/timeout');
                }
            }
        }


    }

    /**
     * Sending the reset password link method
     */
    private function sendResetEmail($url, $employee)
    {
        $email = new Email();
        $email->setTemplate('resetpw');
        $email->setEmailFormat('both');
        $email->setFrom('noreplyinstantmarquees@gmail.com');
        $email->setTo($employee->email);
        $email->setSubject('Reset your password');
        $email->setViewVars(['url' => $url, 'fname' => $employee->fname]);
        if ($email->send()) {
            $this->Flash->success(__('Check your email for your reset password link'));
        } else {
            $this->Flash->error(__('Error sending email: ') . $email->smtpError);
        }
    }

    /**
     * Reseting the password method
     */
    public function reset($token = null)
    {
        if ($token) {
            $query = $this->Employees->find('all', ['conditions' => ['token' => $token, 'timeout >' => time()]]);
            $employee = $query->first();
            if ($employee) {
                if (!empty($this->request->getData)) {
                    // Clear token and timeout
                    $this->request->getData['token'] = '';
                    $this->request->getData['timeout'] = '';
                    $employee = $this->Employees->patchEntity($employee, $this->request->getData);
                    if ($this->Employees->save($employee)) {
                        $this->Flash->set(__('Your password has been updated.'));
                        return $this->redirect(array('action' => 'login'));
                    } else {
                        $this->Flash->error(__('The password could not be updated. Please, try again.'));
                    }
                }
            } else {
                $this->Flash->error('Invalid or expired token. Please check your email or try again');
                $this->redirect(['action' => 'password']);
            }
            unset($employee->password);
            $this->set(compact('employee'));
        } else {
            return $this->redirect('/');
        }
    }

}
