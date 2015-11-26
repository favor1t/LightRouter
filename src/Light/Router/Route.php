<?php
namespace Router;

class Route
{

	private $_uri = array();
	private $_method = array();

	/**
	 * Bulds a collection of URL is to look
	 * @param type $uri
	 */
	public function add($uri, $method = null)
	{
		$this->_uri[] = trim($uri);

		if($method!= null){
			$this->_method[] = $method;
		}
	}

	/**
	 * Makes the things run
	 */
	public function submit()
	{
		$uriGetParam = isset($_GET['uri']) ? '/'.$_GET['uri'] : '/';
		foreach ($this->_uri as $key => $value) {
			if(preg_match("#^$value$#", $uriGetParam)){	
				if(is_string($this->_method[$key])){
					$useMethod = "Controller\\".$this->_method[$key];
					new $useMethod();
				}else{
					call_user_func($this->_method[$key]);
				}
			}
		}
	}
}
