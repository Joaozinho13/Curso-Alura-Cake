<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model\Entity;
use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

class User extends Entity{
    protected $_acessible = ['*'=>true,'id'=>false];
    public function _setPassword($password){
        return (new DefaultPasswordHasher)->hash($password);
    }
}
?>