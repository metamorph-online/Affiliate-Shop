<?php
session_start ();
include_once ('config.php');

function __autoload($class_name) 
    {
        //class directories
        $directories = array(
            'controller/',
            'libs/',
            'model/',
            'view/'
        );
        
        //for each directory
        foreach($directories as $directory)
        {
            //see if the file exsists
            if(file_exists($directory.$class_name . '.php'))
            {
                require_once($directory.$class_name . '.php');
                //only require the class once, so quit after to save effort (if you got more, then name them something else 
                return;
            }            
        }
    }

try
{

#load router
$obj = new c_Router();

#start application
$obj->run();
}
catch(Exception $e)
{
	echo $e->getMessage();
}