<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: PHP
 * Date: 2017/9/5
 * Time: 0:34
 */


class Product extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


   public function product()
   {
       $this->load->view('home/product');
   }
}