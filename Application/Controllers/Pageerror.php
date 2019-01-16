<?php
namespace Shop\Application\Controllers;

use Shop\BaseController;
use Shop\Application\Models as Models;

class Pageerror extends BaseController
{
	function index()
	{
		$_REQUEST['route'] = "404Page";
		$_GET['route'] = "404Page";

	}
}