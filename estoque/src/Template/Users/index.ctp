<table class="table">
    <thead>
       <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Ações</th>
       </tr>
    </thead>

    <tbody>
        <?php foreach($users as $user)
       
        {
         ?>
         <tr>
            <td><?=$user['id']; ?></td>
            <td><?=$user['username']; ?></td>
            <td><?php echo ($this->Html->Link('Editar',['Controller' => 'users', 'action'=>'editar',$user['id']])); ?>
             <?php echo ($this->Form->PostLink('Deletar',['Controller' => 'users', 'action'=>'deletar',$user['id']],['confirm'=>'Tem certeza que deseja excluir o usuario?'])); ?></td>
         </tr>
         <?php 
         }
         ?>
    </tbody>

</table>
<?php 
  echo $this->Html->Link('Novo Usuario',['Controller' => 'users', 'action'=>'novo']);
?>
