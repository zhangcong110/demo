<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/5
 * Time: 21:02
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Userope');
        $this->load->helper(array('form', 'url'));
    }
    /*
     * 用户添加
     */
    public function add()
    {
        if($_POST){
            $return = $this->Userope->userAdd($_POST);
            if($return==false){
                $data =  "<script>alert('用户已存在请重试');</script>";

            }else{
                $data =  "<script>alert('添加成功');</script>>";
            }
        }
        if(isset($data)){
            echo $data;
        }



        $this->load->view('admin/useradd');
    }
    /*
     * 用户列表显示
     */
    public function userList()
    {

        $arr['user'] = $this->Userope->userList();



        $this->load->view('admin/userlist',$arr);
    }



    //文件上传
    public function AjaxFile()
    {
        $config['upload_path']      = './uploads/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']     = 10000;
        $config['max_width']        = 2000;
        $config['max_height']       = 7680;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('file'))
        {
            echo  $this->Userope->jsonReturn('上传成功',base_url().'uploads'.'/'.$this->upload->data()['file_name']);
        }
        else
        {
            echo $this->Userope->jsonReturn('上传失败');
        }
    }

    public function userRoleAdd()
    {
        if(IS_POST){
            $uid = $this->input->post('uId');
            $id = $this->input->post('id');
            if($id==0){
                echo  json_encode(['status'=>false,'message'=>'设置失败']);
            }

            $userDel = $this->Userope->userDel($uid,$id);

            $userInsert = $this->Userope->userRoleInsert($uid,$id);
            if($userInsert){
                echo  json_encode(['status'=>true,'message'=>'设置成功']);
            }else{
                echo  json_encode(['status'=>false,'message'=>'设置失败']);
            }

            exit;
        }

        $id = $this->input->get('id');
        $one_user['userRoleId'] = $this->Userope->userRoleId($id);
        $one_user['userShow'] = $this->Userope->OneUser($id);
        $one_user['role'] = $this->Userope->RoleShow();


        $this->load->view('admin/userroleadd',$one_user);
    }
}