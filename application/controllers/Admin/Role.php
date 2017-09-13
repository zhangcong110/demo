<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/5
 * Time: 22:21
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Role extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Userope');
    }
    /*
     * 角色添加
     */
    public function add()
    {

        if(IS_AJAX){

            $this->db->trans_begin();
            $insert_id = $this->Userope->roleAjaxAdd($this->input->post('title'));
            $role_access = $this->Userope->roleAccessAdd($insert_id,$this->input->post('ids'));

            if ($this->db->trans_status() === FALSE)
            {

                $this->db->trans_rollback();
            }
            else
            {
                $this->db->trans_commit();
            }

            if($insert_id==false){
                echo  json_encode(['status'=>false,'message'=>'添加失败请重试']);
            }

            if($role_access==false){
                echo  json_encode(['status'=>false,'message'=>'添加失败请重试']);
            }else{
                echo  json_encode(['status'=>true,'message'=>'添加成功']);
            }
            exit;
        }


        $data['data'] = $this->Userope->functShow();
        $this->load->view('admin/roleadd',$data);
    }

    /*
     * 角色显示
     */
    public function roleList()
    {

        $data['data'] = $this->Userope->roleListShow();
        $this->load->view('admin/rolelist',$data);
    }


    public function roleUpdate()
    {

        if(IS_POST){
            $id = $this->input->post('id');

            $ids = $this->input->post('ids');
            $role_id = $this->Userope->roleAccessId($id);
            $delId = array_diff($role_id,$ids);
            if(is_array($delId)&&count($delId)>0){

                $this->Userope->accessDelId($id,$delId);
            }

            $add_id = array_diff($ids,$role_id);
            if(is_array($add_id)&&count($add_id)>0){
                $this->Userope->accessInsertId($id,$add_id);
            }

            if(is_array($delId)&&count($delId)>0){
                echo  json_encode(['status'=>true,'message'=>'权限设置成功']);
            }elseif(is_array($add_id)&&count($add_id)>0){
                echo  json_encode(['status'=>true,'message'=>'权限设置成功']);
            }else{
                echo json_encode(['status'=>false,'message'=>'权限设置失败']);
            }
            exit;
        }

        $id = $this->input->get('id');
        $data['roleAccess_id'] = $this->Userope->roleAccessId($id);
        $data['role_one'] = $this->Userope->roleUpShowOne($id);
        $data['access'] = $this->Userope->AccessData();
        $this->load->view('admin/roleupdate',$data);
    }
}