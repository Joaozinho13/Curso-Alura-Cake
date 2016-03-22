<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\view\Helper;

use Cake\View\Helper;

class MoneyHelper extends Helper {

    public function format($number)
    {
        return "R$". number_format($number,2,",",".");
    }
}