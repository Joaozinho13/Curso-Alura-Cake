<?php
 echo $this->Form->create($user,['url'=>'users/salva']);
 echo $this->Form->input('id');
 echo $this->Form->input('username');
 echo $this->Form->input('password'); 
 echo $this->Form->button('Salvar'); 
 echo $this->Form->end();
?>
