<?php

class m_Database
{

	public function run()
	{
	   #create default array
	   $this->createDefaultArr();   
	   #create type array
	   $this->createType();
	   #create category
	   $this->createCategory();	 
	}
	
  private function createDefaultArr()
   {
   		#get feed content
	  $DATABASE = file_get_contents(DATAFEED); 
	  #parse strings by lines
	  $stroka  = explode("\n",$DATABASE);
	  
	
	  #remove | 
	   foreach($stroka as $value)
	   {
			$templatedb[] = explode("|",$value);
	   }   
	  
	  #delete first 23 iterms and last 4 empty items
	    $templatedb = array_slice($templatedb, 22, -4);
		
	    	   
	   #reverse the array so last added items displayed first
	   $templatedb = array_reverse($templatedb);
	   
	   #add to session 
	   $_SESSION['templatedb'] = $templatedb;  
   }

   private function createType()
   {
   	  $type = array();
      #get types
	   foreach($_SESSION['templatedb'] as $key=>$value)
	   {
	   		if(!in_array($value[6], $type) && $value[6] != '' && $value[6] != 'iconset')
			{
				$type[] = $value[6];
			}
	   }
	   $_SESSION['type'] = $type;  
   }
   
   public function createCategory()
   {
   	  $category = array();
      #get types
	   foreach($_SESSION['templatedb'] as $key=>$value)
	   {
	   	#take list from template 
		$myvalue .= ",".$value[8];		
	   }	   
       
	  $category = explode(",",$myvalue);
	  
	  #array with the incorrect categories
	  $delarr = array(0=>'iconset', 1=>'discounted templates', 2=>'VideoAdmin', 3=>'galleryadmin', 4=>'My Love', 5=>'html5 gallery admin', 6=>'PhotoVideoAdmin', 7=>'opencart', 8=>'joomla cms templates', 9=>'html5 templates', 10=>'wordpress', 11=>'css templates', 12=>'');
	  
	  #delete the incorrect categories from array
	  $category = array_diff($category, $delarr);
	  
	  #make upper case
	  $category = array_map('ucfirst', $category);
	  
	  #delete all repeated values and resort the array
	  $category =  array_values(array_unique($category));
	  
	  sort($category);
	  	  
	  #write to session
	  $_SESSION['category'] = $category;
   }
   
   #craete new array for category
	public function createCategoryArray()
	{
		#get category id
		$cat_id = $_GET['category'];
		
		#get category name
		$cat = $_SESSION['category'][$cat_id];
		
				
		#search main array for items
		foreach($_SESSION['templatedb'] as $key=>$value)
		{
			$catTemp = explode(',',$value[8]);
			
			#make upper case
	        $catTemp = array_map('ucfirst', $catTemp);
			
			#compare category and array
			if(in_array("$cat", $catTemp))
			{
				$_SESSION['cat'][] = $value;
			}
		}
	}
	
	  #craete new array for category
	public function creataTypeArray()
	{
		#get category id
		$type_id = $_GET['type'];
		
		#get category name
		$type = $_SESSION['type'][$type_id];
		
				
		#search main array for items
		foreach($_SESSION['templatedb'] as $key=>$value)
		{
						
			#compare category and array
			if($type == $value[6])
			{
				$_SESSION['typeCont'][] = $value;
			}
		}
	}

}