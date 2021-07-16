<?php
//load model and view....
class Controller {
public function model($model){

//require model file..
require_once '../app/models/' .$model.'.php';

//instantiate a new model...

return new $model();
}



public function view($view,$data=[]){

   //check if file exists in view folder

   if(file_exists('../app/views/'.$view.'.php')){
require_once '../app/views/'.$view.'.php';

   }
   else{
       die('view does not exists!');
   }
    }




}



