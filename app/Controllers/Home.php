<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
	    $db = db_connect();
	    
	    $query = $db->query("SELECT * FROM items");
	    
	    foreach ($query->getResult() as $row)
	    {
	        echo $row->title;
	        echo "<hr/>";
	    }
	}
}
