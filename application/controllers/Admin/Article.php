<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/5
 * Time: 22:38
 */
class Article extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    /*
     * 文章添加
     */
    public function add()
    {
        $this->load->view('admin/articleadd');
    }
    /*
     * 文章显示
     */
    public function listShow()
    {
        $this->load->view('admin/articlelist');
    }
}