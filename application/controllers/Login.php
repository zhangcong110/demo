<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: PHP
 * Date: 2017/8/30
 * Time: 21:13
 */
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function login()
    {
        $this->load->view('home/login');
    }

}