<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/5
 * Time: 22:28
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Funct extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Userope');
    }
    /*
     * 功能添加
     */
    public function add()
    {

        if($_POST){
           $arr =  $this->Userope->functAdd($_POST);
            if($arr==false){
                $data =  "<script>alert('添加失败请重试');</script>";
            }else{

                $data =  "<script>alert('添加成功');</script>";
            }
        }

        if(isset($data)){
            echo $data;
        }
        $this->load->view('admin/functadd');
    }

    /*
     * 功能显示
     */
    public function funcList()
    {

        $data['data'] = $this->Userope->functShow();
        $this->load->view('admin/functlist',$data);
    }
}