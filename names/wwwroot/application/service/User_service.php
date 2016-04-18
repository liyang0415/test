<?php
class User_service extends MY_Service
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('usermodel');
    }
    public function login(){
    	//echo 'sdcvfdxx';
        $a=$this->usermodel->u_all();
        //print_r($a);
        return $a;
    }
    public function denglu(){
        //echo '登录';
        $dl_name=$this->input->post('name');
        $dl_password=$this->input->post('password');
        //print_r($list);
        if($dl_name==""&&$dl_password==""){
           $data['dl']="请填写用户名和密码";
           //$this->load->view("user/user");
           redirect('user',$data);
        }else{
            $list=$this->usermodel->u_select($dl_name);
            //$a=$this->usermodel->u_all(); 
            //print_r($a);
            //return $a;
            foreach($list as $vo){
                $name = $vo->name;
                $pwd = $vo->password;
                //echo $name;
                //echo $pwd;
            }
            if($name==$dl_name&&$pwd==$dl_password){
                //echo 1;
                $this->load->library('session');
                $arr = array("user" => $name);
                $this->session->set_userdata($arr);
                $user2=$this->session->userdata('user');
                $username=$this->usermodel->u_set($user2);
                $usernames=$this->usermodel->u_select($user2);
                //print_r($username);die;
                $names=$this->usermodel->u_all();
                $data['names']=$names;
                $data['a']="";
                $data['username']=$username;
                $data['usernames']=$usernames;
                //echo $data['b'];die;
                $this->load->view('user/news',$data);

            }else{
                //echo 2;
                redirect('user',$data);
            }
        }  
    }
    public function zhuce(){
        //echo "注册";
        $data['value']="";
        $data['pwd']="";
        $data['rel_pwd']="";
        $this->load->view('user/register',$data);
        //redirect('user');
    }
    public function register(){
        //echo 1234;
        $username=$this->input->post('user');
        $name=$this->usermodel->u_select($username);
        if($name){
            $data['value']="用户已存在";
            $data['pwd']="";
            $data['rel_pwd']="";
            $this->load->view('user/register',$data);

        }else{
            //echo 3;
            $pwd=$this->input->post('pwd');
            $rel_pwd=$this->input->post('rel_pwd');
            if($pwd==""){
                $data['pwd']="密码不能为空";
                $data['value']="";
                $data['rel_pwd']="";
                $this->load->view('user/register',$data);
            }else{
                if($rel_pwd==$pwd){
                //echo 1;
                $arr = array('name'=>$username,'password'=>$pwd,);
                $this->usermodel->u_insert($arr);
                if($this->db->affected_rows()){
                    //$this->load->view('user/user');
                    redirect('user');
                }
                }else{
                    $data['pwd']="";
                    $data['value']="";
                    $data['rel_pwd']="两次密码不同";
                    $this->load->view('user/register',$data);
                }
           }
        }
 
    }
    public function news(){
        $list=$this->input->post('tijiao');
        if($list){
        //print_r($list);
        $name=$this->input->post('name');
        $time=date("Y/m/d");
        $test3=$this->input->post('test3');
        $user2=$this->session->userdata('user');
        //$username=$this->usermodel->u_set($user2);
        //echo $username;die;
        //echo $user;die
        $arr = array('name'=>$name,'content'=>$test3,'time'=>$time,'uname'=>$user2);
        $this->usermodel->u_insert($arr,$name);
        $names=$this->usermodel->u_all();
        $data['names']=$names;
        $username=$this->usermodel->u_set($user2);
        $data['username']=$username;
        $usernames=$this->usermodel->u_select($user2);
        $data['usernames']=$usernames;
        $this->load->view('user/news',$data);
      }

    }



}