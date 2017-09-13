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
        <form method="post" class="form-x"  action="<?php echo site_url('Admin/Funct/add')?>">
            <div class="form-group">
                <div class="label">
                    <label>功能描述：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50"  name="title" data-validate="required:请输入描述" />
                    <div class="tips"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>功能路由：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50"  name="route" placeholder="添加多个可用|隔开" data-validate="required:请输入路由" />
                    <div class="tips"></div>
                </div>
            </div>

            <div class="clear"></div>


            <div class="form-group">
                <div class="label">
                    <label></label>
                </div>
                <div class="field">
                    <button class="button bg-main icon-check-square-o"  type="submit"> 提交</button>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>




