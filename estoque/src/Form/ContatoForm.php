<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Form;
use Cake\Form\Form; 
use Cake\Form\Schema;
use Cake\Validation\Validator;
use Cake\Network\Email\EMail;
class ContatoForm extends Form{
    public function _buildSchema(Schema $schema){
        $schema->addField('nome','string');
        $schema->addField('email','string');
        $schema->addField('msg','text');
          return $schema;
    } 
    public function _buildValidator(Validator $validator){
              $validator->add('msg',[
                'minLength'=>[
                'rule'=>['minLength',10],
                'message'=>'A mensagem deve conter pelo menos 10 caracteres']]);
              
            $validator->notEmpty('nome');
            $validator->notEmpty('email');
            return $validator;
    } 
    
    public function _execute(array $data) {
     
        $email = new Email('hotmail');
        $email->to('jg-pain@hotmail.com');
        $email->subject('Contato feito pelo site');
        
        $msg = "Contato feito pelo site <br>
                Nome: {$data['nome']}<br>
                Email: {$data['email']}<br>
                Mensagem: {$data['msg']}<br>";
                return $email->send($msg);
    }
    
    
}
