<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controller;
use Cake\ORM\TableRegistry;
use App\Form\ContatoForm;

use Cake\Event\Event;
class ContatosController extends  AppController{
    public function index(){
         $contato = new ContatoForm();
         if($this->request->is('post'))
         {
            if( $contato->execute($this->request->data()))
            {
                $this->Flash->set('Email enviado com sucesso', ['element' => 'success']);
            }
            else
            {
                
                $this->Flash->set('Falha ao enviar email', ['element' => 'error']);
            }
         }
         $this->set('contato',$contato); 
          $this->render('index');
       
    }
}