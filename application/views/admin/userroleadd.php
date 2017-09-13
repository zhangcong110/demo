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
    <script src="js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加内容</strong></div>
    <div class="body-content">
        <div class="form-x">
            <div class="form-group">
                <div class="label">
                    <label>角色名称：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" disabled value="<?= $userShow['username']?>" name="title" data-validate="required:请输入标题" />
                    <div class="tips"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>角色名称：</label>
                </div>
                <div class="field">
                    <img src="<?= $userShow['via']?>" alt="">
                    <div class="tips"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>角色：</label>
                </div>
                <div class="field" style="padding-top:8px;">
                    <select name="se" id="sele">
                        <option value="0">请选择</option>
                        <?php foreach($role as $v):?>
                        <?php if(in_array($v['id'],$userRoleId)):?>
                                <option value="<?= $v['id']?>" selected><?= $v['name']?></option>
                        <?php else:?>
                                <option value="<?= $v['id']?>"><?= $v['name']?></option>
                        <?php endif;?>
                    <?php endforeach;?>
                    </select>
                </div>
            </div>


            <div class="clear"></div>

            <div class="form-group">
                <div class="label">
                    <label></label>
                </div>
                <div class="field">
                    <button class="button bg-main icon-check-square-o" onclick="roleAddclick()" type="button"> 提交</button>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

<script>
    function roleAddclick()
    {
        var id = $('#sele').val();
        if(id==0){
            alert('请选择角色');
            return;
        }

        $.ajax({
                url: '<?php echo site_url('Admin/User/userRoleAdd')?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    'uId':"<?= $userShow['id']?>",
                    'id':id,
                },
            })
            .done(function(ret) {

                if(ret.status==false){
                    alert(ret.message);
                }

                if(ret.status==true){
                    window.location.href="<?php echo site_url('Admin/User/userList')?>";
                    alert(ret.message);
                }

            })



    }

</script>


