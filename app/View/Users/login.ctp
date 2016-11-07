<h1>ログイン</h1>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo $this->Form->create('User', array(
    'url' => array('controller' => 'users', 'action' => 'login')
    )
);
echo $this->Form->input('user_name');
echo $this->Form->input('user_password',array('type' => 'password'));
echo $this->Form->end('ログイン');
?>
<p>
<?php echo $this->Html->link('新規登録', array('controller' => 'users', 'action' => 'register'));  ?>
</p>
