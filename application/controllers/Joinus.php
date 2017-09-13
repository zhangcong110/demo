<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: PHP
 * Date: 2017/8/30
 * Time: 21:13
 */
class Joinus extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function joinus()
    {
        $this->load->view('home/joinus');
    }

}