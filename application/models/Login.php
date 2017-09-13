<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: PHP
 * Date: 2017/8/30
 * Time: 22:04
 */


class Login extends CI_Model
{
    public function GetSu()
    {
       $arr = $this->db->select('name,pwd')
           ->where(['id'=>1])
           ->get('login')
           ->result_array();
        return $arr;
    }


}
