<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UsersController extends AppController{

    
    public $components = array(
        'Auth' => array(
            'loginAction' => array(
                'controller' => 'users',
                'action' => 'login'
            ),
            'authError' => '認証できませんでしたよー',
            'authenticate' => array(
                'Form' => array(
                    'fields' => array(
                        'username' => 'user_name',
                        'password' => 'user_password'
                    ),
                    'passwordHasher' => 'Blowfish'
                )
            )
        ),
        'Security'
    );
    
    public function beforeFilter() {
        parent::beforeFilter();
        
        $this->Auth->allow('register','login');
    }
    
    public function index() {
        $this->set('user', $this->Auth->user());
        
    }
    public function register(){
        if ($this->request->is('post') && $this->User->save($this->request->data)){
            $success = $this->Auth->login();
            return $this->redirect(array('controller' => 'users', 'action' => 'index'));
            
        }
    }
    public function logout() {
        $this->redirect($this->Auth->logout());
    }
    public function login() {
        if ($this->request->is('post')){
            if (!($this->Auth->login())){
                $this->Flash->error('ログインに失敗しました');
                return $this->redirect(array('controller' => 'users', 'action' => 'login'));
            }
            return $this->redirect(array('controller' => 'users', 'action' => 'index'));
        }
    }
}
