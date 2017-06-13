<?php
namespace controller;

use ifeiwu\Controller;

class Home extends Controller
{

	public function _init()
	{
		$site = theme(site());
		
		$this->assign('site', $site);
	}

	public function index()
	{
		$items = db()->select('item')
					 ->where('nid = 1 AND state = 1')
					 ->order('sortby DESC, ctime DESC')
					 ->all();
					 
		$this->assign('items', $items);
		$this->display();
	}

}
