<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Test extends CI_Controller{

public function __construc() {

parent::__construct();

}
public function index()
	{ 
        //$this->layout->setlot('content',array'msg'=>msg,'agent');
        //var_dump($_SERVER);
        $list=array(
            array('id'=>1,'name'=>'ssssss'),
            array('id'=>2,'name'=>'sasddasdf'),
            );
        $data['list']=$list;
        $this->load->vars($data);
        $this->load->vars('title','这是标题');
        $this->load->view('test2');
        $this->load->view('test');

	

}
}