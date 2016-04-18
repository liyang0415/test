<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller{
  public function __construct(){
     parent::__construct();
     $this->load->service('user_service');
  }
  public function index(){
    $list=$this->user_service->login();
    //echo $a;
    $data['name']=$list;
    $data['dl']="";
    //print_r($list);
	  $this->load->view('user/user',$data);
	}
  //登录和注册
  public function insert(){
    $list=$this->input->post('login');
    if(isset($list)&&$list=="登录"){

      $list=$this->user_service->denglu();
      //$this->load->view('user',$data);
    }else{
      $list=$this->user_service->zhuce(); 
    }
  }
  //注册
  public function add(){
    $list=$this->input->post('zhuce');
    //print_r($list);die;
    if(isset($list)&&$list=="注册"){
      $list=$this->user_service->register();
    }
  }
  public function news(){
    $this->user_service->news();
  }

}