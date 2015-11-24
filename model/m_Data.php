<?php

class m_Data
{
	 protected static $_instance;
	 protected $templateName;
	 
	 
	
	private function __construct()
	{
	 
	}
	
	 private function __clone()
	{
    }
	
	#singlton check
	public static function getInstance() {
        if (null === self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
	



#set $TemplateName 
public function setTemplateName($page)
{
	$this->templateName = $page;
	return true;
}

#get $TemplateName 
public function getTemplateName()
{
	return $this->templateName;
}

#set $message 
public function setMessage($message)
{
	$this->message = $message;
	return true;
}

#get $message 
public function getMessage()
{
	return $this->message;
}


}