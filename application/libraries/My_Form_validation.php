<?php

class My_Form_validation extends CI_Form_validation
{
   public function getErrorsArray()
   {
       return $this->_error_array;
   }
}

?>