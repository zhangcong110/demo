<?php $this->load->helper('url');?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="keywords" content="素材火">
    <meta name="description" content="素材火">
    <meta name="author" content="AUI, a-ui.com">
    <title>北京四彩云网络科技有限公司-</title>
    <base href="<?php echo base_url()?>/public/home/">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/home.css">
</head>
<body>

<!-- logo begin -->
    <?php include "common/header.php";?>
<!-- logo end -->

<!-- content begin -->
<div class="aui-login-box">
    <div class="aui-login-info">
        <div class="aui-login-input"><input type="text" placeholder="邮箱或手机号"></div>
        <div class="aui-login-input"><input type="password" placeholder="密码"></div>
        <div class="aui-login-remember">
            <label><input type="checkbox" checked="checkbox">记住账户</label>
            <a href="#">忘记密码</a>
        </div>
        <div class="aui-login-btn">
            <a href="index.html">登录</a>
        </div>
        <div class="aui-login-register">
            还没有账号？<a href="register.html">立即注册</a>
        </div>
    </div>
    <div class="aui-p">© 2017 北京四彩云网络科技有限公司 京ICP备15006025号-3 </div>

</div>
<!-- content end -->


</body>
</html>
