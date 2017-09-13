<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/5
 * Time: 19:41
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Index extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        if($_POST){
            $submit = $this->input->get('submit');
            if($submit!='c'){
                echo '您输入有误';
                die;

            }
        }

        $this->load->view('admin/login');
    }
}