<?php

class Users extends Controller{

    public function __construct(){

        // echo "loaded";

        $this->userModel=$this->model('User');
    }


//login
    public function login(){
        // $user = $this->userModel->getUsers();
        $data = [
            'title'=>'loginpage',
            // 'user'=>$user
        ]; 
        $this->view('users/login',$data);
    }

//register
    public function register(){
        $this->view('users/register');
    }
}