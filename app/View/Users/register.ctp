<h1>新規登録するの？</h1>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo $this->Form->create('User', array(
    'url' => array('controller' => 'users', 'action' => 'register')
    )
);
echo $this->Form->input('user_name');
echo $this->Form->input('user_password',array('type' => 'password'));
echo $this->Form->end(array(
        'label' => '登録？',
        'div' => false,
        'class' => 'btn btn-success',
        'style' => 'margin-top:3px'
    )
);
?>

<p>
<?php echo $this->Html->link('ログイン画面に戻る', array('controller' => 'users', 'action' => 'login'));  ?>
</p>