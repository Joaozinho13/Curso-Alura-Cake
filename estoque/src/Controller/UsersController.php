<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controller;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

class UsersController extends AppController {
   
    public function initialize() {
        parent::initialize();
        $this->loadComponent('Csrf');
    }
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['novo','salva','index','deletar']);
    }
    public function index()
    {
        $usersTable = TableRegistry::get('users');
        $users= $usersTable->find('all');
            
        $this->set('users', $users);
    }
    
     public function novo()
    {
       $usersTable  = TableRegistry::get('users');
       $user = $usersTable->newEntity();
       $this->set('user',$user);
    }
    
    public function editar($id){
        $usersTable = TableRegistry::get('users');
        $user = $usersTable->get($id);
        $this->set('user',$user);
        $this->render('novo');
       
    }
    
     public function deletar($id){
        $usersTable = TableRegistry::get('users');
        $user = $usersTable->get($id);
        if ($usersTable->delete($user)){
          $msg = "Usuário excluido com sucesso";
          $this->Flash->set($msg,['element'=>'error']);
        }else{
          $msg = "Erro ao deletar o usuário";
          $this->Flash->set($msg,['element'=>'error']);
        }
        
        $this->redirect('users/index');
       
    }
    
     public function salva()
    {
       $usersTable = TableRegistry::get('users');
       $user = $usersTable->newEntity($this->request->data());
       if($usersTable->save($user))
       {
           $msg = "Usuário salvo com sucesso!";
            $this->Flash->set($msg,['element'=>'success']);
       }
       else
       {
           $msg = "Erro ao salvar o usuário";
           $this->Flash->set($msg,['element'=>'error']);
           
       }
       $this->redirect('users/index');
     }
     
     public function login(){
         if ($this->request->is('post')){
             $user = $this->Auth->identify();
         
             if($user){
                 $this->Auth->setUser($user);
                 return $this->redirect($this->Auth->redirectUrl());
             }else{
                 $this->Flash->set('Usuario ou senha inválidos', ['element'=>'error']);
             }
             
         }
     
     }
       
     public function logout(){
         return $this->redirect($this->Auth->logout());
         
     }
         
}



?>