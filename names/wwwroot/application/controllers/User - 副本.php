<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User extends CI_Controller{

public function __construc() {

parent::__construct();

}
public function index()
	{
	 //echo site_url('user/insert');die;
    $this->load->model('Usermodel');
    $user = $this ->Usermodel->u_all();
    $data['have']="";
    $data['name'] = $user;
		$this->load->view('user',$data);
	}
   public function add(){
      $this->load->helper('url');
	    $this->load->view('user/add');
   
   }

	public function insert(){ 
    $this->load->model('Usermodel');
    $yname=$_POST['name'];
    $user = $this->Usermodel->u_select($yname);
    //var_dump($user);die;
    if($user){
        
        $user = $this ->Usermodel->u_all();
        $data['have']="用户已经存在";
        $data['name'] = $user;
        $this->load->view('user',$data);

    }else{
        $arr = array('name'=>$yname);
        $this->Usermodel->u_insert($arr);
        $user = $this ->Usermodel->u_all();
        $data['name'] = $user;
        $data['have']="";
        $this->load->view('user',$data);
    }
		//echo 22222;die;
		//var_dump($this->input->post('name'));die;
          
    //    $this->load->helper('form');  
  //      $this->load->library('form_validation');  
//用户名不能为空  
     //   $this->form_validation->set_rules('name','用户名','required');  
         
   //  $bool = $this->form_validation->run();
	 //var_dump($bool);
// 判断已数组形式的表单元素    
        //if($this->form_validation->run() === false) {  
           // $this->load->view('register');  
        //}  

  }
    public function delete($id){
        $this->load->model('Usermodel');
        $user = $this ->Usermodel->u_delete($id);
        $user = $this ->Usermodel->u_all();
        $data['have']="";
        $data['name'] = $user;
        $this->load->view('user',$data);
    }  

}