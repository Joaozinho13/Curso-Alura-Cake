<?php
    namespace App\Model\Table;
    use Cake\ORM\Table;
    use Cake\Validation\Validator;
    
    class ProdutosTable extends Table{
        public function validationDefault(Validator $validator) {
            $validator->requirePresence('nome',true)->notEmpty('nome');
            $validator->requirePresence('descricao',true)->notEmpty('descricao');
            $validator->requirePresence('preco',true)->notEmpty('preco');
            $validator->add('descricao',[
                'minLength'=>[
                    'rule'=>['minLength',10],
                    'message'=>'A descrição deve conter pelo menos 10 caracteres']]);
            $validator->add('preco',[
                'decimal'=>[
                    'rule'=>['decimal',2],
                    'message'=>'Por favor,digite um numero valido']]);
               
        return $validator;
            
        }
    }
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

