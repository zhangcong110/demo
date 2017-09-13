<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: PHP
 * Date: 2017/8/30
 * Time: 22:04
 */


        class Userope extends CI_Model
        {
            public function __construct()
            {
                $this->load->database();
            }

            public function jsonReturn($arr,$data=1)
            {
                if($data!=1){
                    return json_encode(['success'=>$arr,'status'=>true,'message'=>$data]);
                }else{
                    return json_encode(['error'=>$arr,'status'=>false,]);
                }
            }

            public function userList()
            {
//                $arr = $this->db->select('id,username,email,created_at,updated_at,via')
//                    ->where('is_admin!=',1)
//                    ->get('user')
//                    ->result_array();

	     $this->db->select('u.id,u.username,u.email,u.created_at,u.updated_at,u.via,r.name');
		 $this->db->from('role_user ru');
		 $this->db->where('u.is_admin!=',1);
		 $this->db->join('role r','ru.role_id=r.id');
		 $this->db->join('user u','ru.user_id=u.id');
		 $res = $this->db->get()->result_array();


                return $res;
            }

            public function OneUser($id)
            {
                $arr = $this->db->select('id,username,via')
                    ->where('id',$id)
                    ->get('user')
                    ->row_array();
                return $arr;
            }


            public function userAdd($data){
                $arr = $this->db->select('id')
                    ->where(['cellphone'=>$data['cellphone']])
                    ->get('user')
                    ->result_array();
                if(is_array($arr)&&count($arr)>0){
                    return false;
                }

                $arr = [
                  'username'=>$data['username'],
                    'password'=>md5($data['password']),
                    'salt'=>md5($data['username'].$data['cellphone']),
                    'email'=>$data['email'],
                    'via'=>$data['hidden'],
                    'cellphone'=>$data['cellphone']
                ];
                $res = $this->db->insert('user',$arr);

                if($res){
                    return true;
                }else{
                    return false;
                }
            }


            public function userRoleId($id)
            {
                $arr = $this->db->select('*')
                    ->where(['user_id'=>$id])
                    ->get('role_user')
                    ->result_array();
                return array_column($arr,'role_id');
            }


            public function functAdd($data)
            {
                $arr = [
                    'title'=>$data['title'],
                    'route'=>$data['route'],
                    'add_time'=>time()
                ];

                $res = $this->db->insert('access',$arr);

                if($res){
                    return true;

                }else{
                    return false;
                }
            }


            public function userDel($id,$ids)
            {
                $arr = $this->db->select('*')
                    ->where(['user_id'=>$id])
                    ->get('role_user')
                    ->row_array();

                if($arr['role_id']!=$ids){
                     $this->db->where('user_id',$id);
                     $this->db->delete('role_user');
                }

            }

            public function userRoleInsert($uid,$id)
            {
                $arr = $this->db->select('*')
                    ->where(['user_id'=>$uid])
                    ->get('role_user')
                    ->row_array();
                if($arr['role_id']!=$id){
                    $data = [
                        'user_id'=>$uid,
                        'role_id'=>$id
                    ];

                    $arr = $this->db->insert('role_user',$data);
                    if($arr){
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    return true;
                }



            }

            public function functShow()
            {
                $arr = $this->db->select('*')
                    ->where(['status'=>1])
                    ->get('access')
                    ->result_array();

                return $arr;

            }


            public function roleAjaxAdd($data)
            {
                $arr = [
                    'name'=>$data,
                    'created_at'=>time(),
                ];

                $res = $this->db->insert('role',$arr);

                if($res){
                    return $this->db->insert_id();

                }else{
                    return false;
                }

            }

            public function RoleShow()
            {
                $arr = $this->db->select('id,name')
                    ->where(['status'=>1])
                    ->get('role')
                    ->result_array();

                return $arr;

            }

        public function roleAccessAdd($id,$ids)
        {

            foreach($ids as $v){
                $arr = [
                    'role_id'=>$id,
                    'access_id'=>$v,
                ];

                $res = $this->db->insert('role_access',$arr);
            }

            if($res){
                return true;
            }else{
                return false;
            }

        }


            //角色列表
        public  function roleListShow()
        {

//            $sql = "select group_concat(a.id) as a_id,group_concat(a.title) as a_title,r.id,r.name
//                    from cloud_role_access as ra
//		            join cloud_role as r on ra.role_id=r.id
//		            join cloud_access as a on ra.access_id=a.id
//		            group by r.id";

            $sql = "select * from cloud_role where status=1";
            $data = $this->db->query($sql)->result_array();
            return $data;
        }

            public function roleUpShowOne($id)
            {
                $arr = $this->db->select('id,name')
                    ->where(['id'=>$id])
                    ->get('role')
                    ->row_array();


                return $arr;
            }

            public function AccessData()
            {
                $arr = $this->db->select('id,title')
                    ->where(['status'=>1])
                    ->get('access')
                    ->result_array();
                return $arr;
            }



            public function roleAccessId($id)
            {
                $arr = $this->db->select('*')
                    ->where(['role_id'=>$id])
                    ->get('role_access')
                    ->result_array();
                return array_column($arr,'access_id');
            }

            public function accessDelId($id,$delid)
            {

                foreach($delid as $v){
                    $this->db->where('role_id',$id);
                    $this->db->where('access_id',$v);
                    $arr = $this->db->delete('role_access');
                }


                return $arr;


                //$sql = "delete from role_access where id='$id' and role_id=$v";
                //$this->db->query($sql);


            }

           public function accessInsertId($id,$ids)
           {

               foreach($ids as $v){
                    $data = [
                        'role_id'=>$id,
                        'access_id'=>$v
                    ];
                  $inser_data = $this->db->insert('role_access',$data);
               }

               return $inser_data;
           }


            public function NavShow()
            {
//                 $this->db->select('admin_cate.name,access.id,access.title,access.route');
//                 $this->db->from('access');
//                 $this->db->where('access.status',1);
//                 $this->db->join('admin_cate','access.cate_id=admin_cate.id');
//                 $res = $this->db->get()->result_array();
//
//                return $res;


                $arr = $this->db->select('*')
                    ->get('admin_cate')
                    ->result_array();
                    foreach($arr as $k=>$v){

                        $this->db->select('access.id,access.title,access.route');
                        $this->db->from('access');
                        $this->db->where('access.cate_id',$v['id']);
                        $this->db->join('admin_cate','access.cate_id=admin_cate.id');
                        $arr[$k]['access'] = $this->db->get()->result_array();
                    }

                return $arr;

            }

            public function isNavShow($id)
            {
                $arr = $this->db->select('*')
                    ->get('admin_cate')
                    ->result_array();

                $res = $this->db->select('*')
                    ->where(['user_id'=>$id])
                    ->get('role_user')
                    ->result_array();
                $role_id = array_column($res,'role_id');

                if(!$role_id){
                    foreach($arr as $key=>$value){
                        $arr[$key]['access']=[];
                    }
                    return $arr;
                }
                $acc_data = $this->db->select('*')
                    ->where_in('role_id',$role_id)
                    ->get('role_access')
                    ->result_array();

                 $acc_id = array_column($acc_data,'access_id');

                $new_access_data = $this->db->select('id,title,route,cate_id')
                    ->where('status',1)
                    ->where_in('id',$acc_id)
                    ->get('access')
                    ->result_array();
                foreach($arr as $k=>$v){
                    foreach($new_access_data as $ke=>$val){
                            if($v['id']==$val['cate_id']){
                                $arr[$k]['access']=$new_access_data;
                            }else{
                                $arr[$k]['access']=[];
                            }
                    }
                }

                return $arr;
            }





}
