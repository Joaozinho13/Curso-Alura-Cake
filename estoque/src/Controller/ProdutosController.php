<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controller;
use Cake\ORM\TableRegistry;

class ProdutosController extends AppController {
    public $paginate = ['limit' => 2];
    public function initialize() {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->loadComponent('Csrf');
      
        
    }
    public function index()
    {
        $produtosTable = TableRegistry::get('Produtos');
        $produtos= $produtosTable->find('all');
            
        $this->set('produtos',$this->paginate($produtos));
    }
    
     public function novo()
    {
       $produtosTable  = TableRegistry::get('Produtos');
       $produto = $produtosTable->newEntity();
       $this->set('produto',$produto);
    }
    
    public function editar($id){
        $produtosTable = TableRegistry::get('Produtos');
        $produto = $produtosTable->get($id);
        $this->set('produto',$produto);
        $this->render('novo');
       
    }
    
     public function deletar($id){
        $produtosTable = TableRegistry::get('Produtos');
        $produto = $produtosTable->get($id);
        if ($produtosTable->delete($produto)){
          $msg = "Produto excluido com sucesso";
          $this->Flash->set($msg,['element'=>'error']);
        }else{
          $msg = "Erro ao deletar o produto";
          $this->Flash->set($msg,['element'=>'error']);
        }
        
        $this->redirect('Produtos/index');
       
    }
    
     public function salva()
    {
       $produtosTable = TableRegistry::get('Produtos');
       $produto = $produtosTable->newEntity($this->request->data());
       if(!$produto->errors() && $produtosTable->save($produto))
       {
           $msg = "Produto salvo com sucesso!";
            $this->Flash->set($msg,['element'=>'success']);
       }
       else
       {
           $msg = "Erro ao salvar o produto";
           $this->Flash->set($msg,['element'=>'error']);
           
       }
       $this->set('produto',$produto);
       $this->render('novo');
       }
}



?>