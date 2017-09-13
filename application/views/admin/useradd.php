<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/5
 * Time: 21:01
 */
$this->load->helper('url');

?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <base href="<?php echo base_url()?>/public/admin/">
    <title></title>
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
</head>
<body>
<style>
    .field input{
        width: 300px;
    }



</style>
<div class="panel admin-panel">
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加内容</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="<?php echo site_url('Admin/User/add')?>" onsubmit="return userAddSub()">


            <div class="form-group">
                <div class="label">
                    <label>昵称：</label>
                </div>
                <div class="field">
                    <input type="text" class="input"  name="username" data-validate="required:请输入昵称" />
                    <div class="tips"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>密码：</label>
                </div>
                <div class="field">
                    <input type="password" class="input"  name="pwd" data-validate="required:请输入密码" />
                    <div class="tips"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>确认密码：</label>
                </div>
                <div class="field">
                    <input type="password" class="input"  name="password" data-validate="required:请输入确认密码" />
                    <div class="tips"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>手机号：</label>
                </div>
                <div class="field">
                    <input type="text" class="input"  name="cellphone" data-validate="required:请输入昵称" />
                    <div class="tips"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>邮箱：</label>
                </div>
                <div class="field">
                    <input type="email" class="input"  name="email" data-validate="required:请输入昵称" />
                    <div class="tips"></div>
                </div>
            </div>



            <div class="form-group">
                <div class="label">
                    <label>图片：</label>
                </div>
                <div class="field">
                    <input type="file" name="file" class="img_file" style="display: none;">
                    <input type="button" class="button bg-blue margin-left class_file" id="image1" value="+ 浏览上传"  style="float:left;">
                    <div class="tipss">图片尺寸：500*500</div>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label></label>
                </div>
                <div class="field">
                    <div class="tupian"><img width="200px" height="200px" src="images/file.jpg" alt=""></div>
                </div>
            </div>

            <div class="clear"></div>

            <input type="hidden" name="hidden">
            <div class="form-group">
                <div class="label">
                    <label></label>
                </div>
                <div class="field">
                    <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>
<script>
    $('.class_file').click(function(){
        $('.img_file').click();
    })

    $('.img_file').change(function(){
        var selectedFile = $('.img_file').get(0).files[0];
        var jsonData = new FormData();
            jsonData.append('file',selectedFile);

        $.ajax({
            url:"<?php echo site_url('Admin/User/AjaxFile')?>",
            type: 'POST',
            dataType: 'json',
            data: jsonData,
            processData: false,
            contentType: false,
            success:function(ret){
        if(ret.status==true){
            alert(ret.success);
            $('.tupian').html("<img src="+ret.message+" width='200px'height='200px'>");
            $('input[name=hidden]').val(ret.message);
        }else{
            alert(ret.error);
        }

            }
        });
    })

    function userAddSub(){
        var username = $('input[name=username]').val();
        if(!username){
            alert('请输入用户名');
            return false;
        }

        var pwd = $('input[name=pwd]').val();
        if(!pwd){
            alert('请输入密码');
            return false;
        }

        var password = $('input[name=password]').val();
        if(pwd!=password){
            alert('两次密码输入不一致');
            return false;
        }

        var cellphone = $('input[name=cellphone]').val();
        if(!cellphone){
            alert('手机不能为空');
            return false;
        }

        var email = $('input[name=email]').val();
        if(!email){
            alert('邮箱不能为空');
            return false;
        }

        var hidden = $('input[name=hidden]').val();
        if(!hidden){
            alert('请选择上传图片');
            return false;
        }


    }

</script>


