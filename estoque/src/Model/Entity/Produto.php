<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Model\Entity;
use Cake\ORM\Entity;
    
class Produto extends Entity
{
      public function calculaDesconto(){
      return $this->preco * 0.9;
    }
  
  }
