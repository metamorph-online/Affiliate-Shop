<?php

class c_Default
{
		
	private $obj;
		
		public function __construct()
		{
			$this->obj = m_Data::getInstance();

		}
		
	public function run()
	{
		if (file_exists('templates/index.html'))
		{
		  $this->obj->setTemplateName('index');
		}
		else
		{
		  throw new Exception('Template was not found');
		}
	}
	
}