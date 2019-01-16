<?php
/**
 * Created by PhpStorm.
 * User: AKorgulin
 * Date: 15.01.2019
 * Time: 13:37
 */

namespace Shop;

use Shop\Menu;
use Shop\SmalCart;

class Functions
{
	private $menu = "";
	private $small_cart = "";
	function __construct()
	{
		$this->menu=$this->getMenu();
		$this->smal_cart=$this->getSmalCart();
	}

	function getMenu(){
		return Menu::getInstance()->getMenu();
	}
	function getSmalCart(){
		return SmalCart::getInstance()->getCartData();
	}

	public function TopMenu(){
		return $this->menu;
	}
}
