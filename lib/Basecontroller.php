<?php
namespace Shop;
//любой контролер будет наследоваться от базового класса
 class BaseController
 {
     private $member; 
		
     function __set($name,$val)
	 {	     
	     $this->member[$name] = $val;
     }

     function __get($name) 
	 {
	
		  return $this->member;	
     }  		 
 }