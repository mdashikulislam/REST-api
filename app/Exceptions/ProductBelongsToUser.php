<?php

namespace App\Exceptions;

use Exception;

class ProductBelongsToUser extends Exception
{
    //
   public function  render(){
       return ['error'=>'Product not belongs to user'];
   }

}
