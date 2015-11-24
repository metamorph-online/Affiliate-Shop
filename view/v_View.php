<?php


class v_View
{
   private $forRender;
   private $file;
   private $obj;


  
   public function __construct()
	  {
        $this->obj = m_Data::getInstance(); 
	  }
	  
	  
	  public function templateRender()
	  {
	      $template = $this->obj->getTemplateName();
		  $template = 'templates/'.$template.'.html';
		  $this->file = file_get_contents($template);
		  $this->file = preg_replace_callback("/%www_(\w+)/", array($this, 'replace'), $this->file);
		  return $this->file;
	  }
	  
	    protected function replace($matches) {
        return $this->{$matches[1]}();
       }
	  
	  



###################################################### Titles ################################################################
#####################################################################################################################################
#####################################################################################################################################

	#main page title
	public function titleHome()
	{
		
			$html .="Website templates, HTML5 templates";
			
			return $html;
	}	
	
###################################################### templates content ################################################################
#####################################################################################################################################
#####################################################################################################################################

	#main page title
	public function ContentTemplates()
	{
		  if (count($_SESSION['templatedb'])) {
          // Create the pagination object
          $pagination = new m_Pagination($_SESSION['templatedb'], (isset($_GET['page']) ? $_GET['page'] : 1), TMPNUMBER);
          // Decide if the first and last links should show
          $pagination->setShowFirstAndLast(false);
          // You can overwrite the default separator
          $pagination->setMainSeperator('<li> | </li>');
          // Parse through the pagination class
          $productPages = $pagination->getResults();
          // If we have items 
          if (count($productPages) != 0) {
            // Create the page numbers
		
		foreach($productPages as $value)
		{
			$html .= '<div class="col-md-2 my_templ">
                        <div class="row">
                        	<div class="marg padd_t10">
                             <b>Template ID:</b> '.$value[0].'
                            </div>
                        </div>
						<div class="row">
                    	    <div class="marg padd_t20 img_height"><a href="'.$value[2].'" class="screenshot" rel="http://www.downloads-templates.com/immages/'.$value[0].'.jpg"><img class="img-responsive" src="http://www.downloads-templates.com/immages/'.$value[0].'.jpg" alt="'.$value[1].' - '.$value[6].'" /></a></div>
                        </div>
						
                        <div class="row">
                        	<div class="marg padd_t10">
                             <b>Name:</b> '.$value[1].'
                            </div>
                        </div>
                         <div class="row">
                        	<div class="marg padd_t10">
                             <b>Type:</b> '.$value[6].'
                            </div>
                        </div>
                         <div class="row">
                        	<div class="marg padd_t10">
                             <b>Price:</b> $'.$value[5].'
                            </div>
                        </div>
                        <div class="row">
                       <div class="padd_t10 centr">
                               <div class="but_warp col-xs-1">
                               		<a href="'.$value[2].'" class="btn btn-md btn-primary" role="button">Preview</a>
                               </div>
                               <div class="but_warp col-xs-1">
                               		<a href="https://www.downloads-templates.com/buy.php?id='.$value[0].'&aid='.AFFILIATEID.'" class="btn btn-md btn-success" role="button" target="_blank">Purchase</a>
                               </div>
                            </div>
                        </div>
                    </div>';
			}	

		$html .= '<div class="clearfix"></div><div class="numbers padd_t20"><ul>'.$pagination->getLinks($_GET).'</ul></div>';
		
		return $html;
		}	
	}
}


###################################################### category content ################################################################
#####################################################################################################################################
#####################################################################################################################################

	#main page title
	public function CategoryContentTemplates()
	{
		  if (count($_SESSION['cat'])) {
          // Create the pagination object
          $pagination = new m_Pagination($_SESSION['cat'], (isset($_GET['page']) ? $_GET['page'] : 1), TMPNUMBER);
          // Decide if the first and last links should show
          $pagination->setShowFirstAndLast(false);
          // You can overwrite the default seperator
          $pagination->setMainSeperator('<li> | </li>');
          // Parse through the pagination class
          $productPages = $pagination->getResults();
          // If we have items 
          if (count($productPages) != 0) {
            // Create the page numbers
		
		foreach($productPages as $value)
		{
			$html .= '<div class="col-md-2 my_templ">
                        <div class="row">
                        	<div class="marg padd_t10">
                             <b>Template ID:</b> '.$value[0].'
                            </div>
                        </div>
						<div class="row">
                    	    <div class="marg padd_t20 img_height"><a href="'.$value[2].'" class="screenshot" rel="http://www.downloads-templates.com/immages/'.$value[0].'.jpg"><img class="img-responsive" src="http://www.downloads-templates.com/immages/'.$value[0].'.jpg" alt="'.$value[1].' - '.$value[6].'" /></a></div>
                        </div>
						
                        <div class="row">
                        	<div class="marg padd_t10">
                             <b>Name:</b> '.$value[1].'
                            </div>
                        </div>
                         <div class="row">
                        	<div class="marg padd_t10">
                             <b>Type:</b> '.$value[6].'
                            </div>
                        </div>
                         <div class="row">
                        	<div class="marg padd_t10">
                             <b>Price:</b> $'.$value[5].'
                            </div>
                        </div>
                        <div class="row">
                       <div class="padd_t10 centr">
                               <div class="but_warp col-xs-1">
                               		<a href="'.$value[2].'" class="btn btn-md btn-primary" role="button">Preview</a>
                               </div>
                               <div class="but_warp col-xs-1">
                               		<a href="https://www.downloads-templates.com/buy.php?id='.$value[0].'&aid='.AFFILIATEID.'" class="btn btn-md btn-success" role="button" target="_blank">Purchase</a>
                               </div>
                            </div>
                        </div>
                    </div>';
			}	

		$html .= '<div class="clearfix"></div><div class="numbers padd_t20"><ul>'.$pagination->getLinks($_GET).'</ul></div>';
		
		return $html;
		}	
	}
}

###################################################### type content ################################################################
#####################################################################################################################################
#####################################################################################################################################

	#main page title
	public function TypeContentTemplates()
	{
		  if (count($_SESSION['typeCont'])) {
          // Create the pagination object
          $pagination = new m_Pagination($_SESSION['typeCont'], (isset($_GET['page']) ? $_GET['page'] : 1), TMPNUMBER);
          // Decide if the first and last links should show
          $pagination->setShowFirstAndLast(false);
          // You can overwrite the default separator
          $pagination->setMainSeperator('<li> | </li>');
          // Parse through the pagination class
          $productPages = $pagination->getResults();
          // If we have items 
          if (count($productPages) != 0) {
            // Create the page numbers
		
		foreach($productPages as $value)
		{
			$html .= '<div class="col-md-2 my_templ">
                        <div class="row">
                        	<div class="marg padd_t10">
                             <b>Template ID:</b> '.$value[0].'
                            </div>
                        </div>
						<div class="row">
                    	    <div class="marg padd_t20 img_height"><a href="'.$value[2].'" class="screenshot" rel="http://www.downloads-templates.com/immages/'.$value[0].'.jpg"><img class="img-responsive" src="http://www.downloads-templates.com/immages/'.$value[0].'.jpg" alt="'.$value[1].' - '.$value[6].'" /></a></div>
                        </div>
						
                        <div class="row">
                        	<div class="marg padd_t10">
                             <b>Name:</b> '.$value[1].'
                            </div>
                        </div>
                         <div class="row">
                        	<div class="marg padd_t10">
                             <b>Type:</b> '.$value[6].'
                            </div>
                        </div>
                         <div class="row">
                        	<div class="marg padd_t10">
                             <b>Price:</b> $'.$value[5].'
                            </div>
                        </div>
                        <div class="row">
                       <div class="padd_t10 centr">
                               <div class="but_warp col-xs-1">
                               		<a href="'.$value[2].'" class="btn btn-md btn-primary" role="button">Preview</a>
                               </div>
                               <div class="but_warp col-xs-1">
                               		<a href="https://www.downloads-templates.com/buy.php?id='.$value[0].'&aid='.AFFILIATEID.'" class="btn btn-md btn-success" role="button" target="_blank">Purchase</a>
                               </div>
                            </div>
                        </div>
                    </div>';
			}	

		$html .= '<div class="clearfix"></div><div class="numbers padd_t20"><ul>'.$pagination->getLinks($_GET).'</ul></div>';
		
		return $html;
		}	
	}
}

###################################################### templates content ################################################################
#####################################################################################################################################
#####################################################################################################################################

	#template type list
	public function typeTemplates()
	{
		#check if list was generated
	   if(!empty($_SESSION['type']))
	   {
	   		$html = "<ul class=\"type\">";
			foreach($_SESSION['type'] as $key=>$value)
			{
				$html .="<li><a href=\"?type=".$key."\">".$value."</a></li>";
			}
			$html .= "</ul>";
			return $html;
	   }
	   else
	   {
	     return $html = ERRTEMPLATETYPE;		 
	   }
	}
	
###################################################### templates content ################################################################
#####################################################################################################################################
#####################################################################################################################################

	#template type list
	public function categoryTemplates()
	{
		#check if list was generated
	   if(!empty($_SESSION['category']))
	   {
	   		$html = "<ul class=\"type\">";
			foreach($_SESSION['category'] as $key=>$value)
			{
				$html .="<li><a href=\"?category=".$key."\">".$value."</a></li>";
			}
			$html .= "</ul>";
			return $html;
	   }
	   else
	   {
	     return $html = ERRTEMPLATECAT;		 
	   }
	}
 
	
}
