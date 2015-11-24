<?php

class c_Type
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
		if (file_exists('templates/type.html'))
		{
		  $this->obj->setTemplateName('type');
		}
		else
		{
		  throw new Exception('Template was not found');
		}
		$this->creataTypeArray();
	}
	
	#craete new array for category
	public function creataTypeArray()
	{
		$this->db->creataTypeArray();
	}
	
}