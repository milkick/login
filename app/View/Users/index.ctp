<?php
echo "<p>こんにちは". $user['user_name'] . "さん</p>";
echo $this->Html->link('ログアウト', array('controller' => 'users', 'action' => 'logout'));
?>
