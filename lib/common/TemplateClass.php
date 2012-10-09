<?php

class TemplateClass {
	
	private $templatePath;
	private $notFoundPage = "notFound.php";
	
	function __construct() {
	
		$this->templatePath = $this->baseDir."required/";
	}
	
	public function getTemplateFile($templateName){
		if(is_file($this->templatePath.$templateName)){
			return $this->templatePath.$templateName;
		}else{
			$this->templatePath.$this->notFoundPage;
		}
	}
}

?>