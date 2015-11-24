<?php

class c_Category
{
		
	private $obj;
	private $db;
		
		public function __construct()
		{
			$this->obj = m_Data::getInstance();
			$this->db =  new m_Database();

		}
	
	#check if template exists and load template name to data class	
	public function run()
	{
		if (file_exists('templates/category.html'))
		{
		  $this->obj->setTemplateName('category');
		}
		else
		{
		  throw new Exception('Template was not found');
		}
		$this->createCategoryArray();
	}
	
	#craete new array for category
	public function createCategoryArray()
	{
		$this->db->createCategoryArray();
	}
	
}