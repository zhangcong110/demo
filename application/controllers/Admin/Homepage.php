<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/5
 * Time: 19:41
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Homepage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Userope');
    }

    public function index()
    {
        $id = 1;
        $is_admin = 1;
        if($is_admin==1){
            $data['nav']= $this->Userope->NavShow();
        }else{
            $data['nav']= $this->Userope->isNavShow($id);
        }
        return false;


        $this->load->view('admin/index',$data);
    }
}