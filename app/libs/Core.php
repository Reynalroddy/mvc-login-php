<?php

//core app class

 class Core {
    protected $currentController='Pages';
    protected $currentMethod='index';
    protected $params=[];

public function __construct(){
print_r($this->getUrl());

$url=$this->getUrl();
//check first val of url if file exists in controllers and ucwords will capitalize first letter
 if(file_exists('../app/controllers/' .ucwords($url[0]). '.php')){
//overwrite currentcontroller

$this->currentController=ucwords($url[0]);
unset($url[0]);

}  


//require the controller

require_once '../app/controllers/'. $this->currentController . '.php';
$this->currentController = new $this->currentController;

//check for second part of url if exists

  if(isset($url[1])){

if(method_exists($this->currentController,$url[1])){
$this->currentMethod = $url[1];
unset($url[1]);
}

}  

//get params...

$this->params= $url ? array_values($url) : [];

///call a callback with array of params

call_user_func_array([$this->currentController,$this->currentMethod],$this->params);
}


//end of constructor


public function getUrl(){
   if(isset($_GET['url'])){

      //strip ending slash from url
      $url = rtrim($_GET['url'], '/');

      //filter variable as a string or number(remove illegal characters)
      $url = filter_var($url,FILTER_SANITIZE_URL);

      //break url into array(starts exploding from '/')

      $url = explode('/',$url);
      return $url;

   }



}
 }


