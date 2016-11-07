<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel{
    public $validate = array(
        'user_name' => array(
            array(
                'rule' => 'isUnique',
                'message' => '既に使用されている名前です'
            ),
            array(
                'rule' => 'alphaNumeric',
                'message' => '名前は半角英数字で入れてください'
            ),
            array(
                'rule' => array('between', 4, 32),
                'message' => '名前は4文字以上32文字以内にしてください'
            )            
        ),
        'user_password' => array(
            array(
                'rule' => 'alphaNumeric',
                'Message' => 'パスワードは半角英数字で入力してください'
            ),
            array(
                'rule' => array('between', 8, 32),
                'message' => 'パスワードは8文字以上32文字以内にしてください'
            )
        )
    );
    
    function beforeSave($options = array()) {
        $blowFishPasswordHasher = new BlowfishPasswordHasher();
        $this->data['User']['user_password'] = $blowFishPasswordHasher->hash($this->data['User']['user_password']);
    }
}