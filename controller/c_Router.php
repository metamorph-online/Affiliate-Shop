<?php

#class responsible for controller select based on url
class c_Router
{  
   private $obj;
		#loads controller based on the page name;
  public function run()
   { 
   		$this->obj =  new m_Database();
		
   		unset($_SESSION);	
		
	
		if(!isset($_GET['category']) && !isset($_GET['type']))
		{
			$this->arrCreate();
			$pageName = 'Default';
			include('controller/c_Default.php');
			$controller = new c_Default;
			$controller->run();
			
		}
		else if(!isset($_GET['type']) && isset($_GET['category']))
		{
          $this->arrCreate();
		  if(file_exists('controller/c_Category.php'))			
		    {
		    	include('controller/c_Category.php');
				$controller = new c_Category;
				$controller->run();
			}
		   else
		   {
			  $this->error404();
		   }
		}		
		else if(isset($_GET['type']) && !isset($_GET['category']))
		{
          $this->arrCreate();
		  if(file_exists('controller/c_Type.php'))			
		    {
		    	include('controller/c_Type.php');
				$controller = new c_Type;
				$controller->run();
			}
		   else
		   {
			 $this->error404();
		   }
		    
		}
		
		$view =  new v_View();
		$a = $view->templateRender();
		echo $a;					
	}
	
	private function arrCreate()
	{
		if(!isset($_SESSION['templatedb']) || !isset($_SESSION['type']) || !isset($_SESSION['category']))
		{			
			$this->obj->run();
		}
	}
	
	private function error404()
	{
		 $pageName = 'controller/c_404.php';
			 include($pageName);
			 $controller = new c_404;
			 $controller->run();
	}
	
}

