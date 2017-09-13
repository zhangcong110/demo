
<?php

    $this->load->helper('url');
?>
<!DOCTYPE html>
<html lang="en">
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

<!-- header begin -->
<?php include 'common/header.php'?>
<!-- header end -->

<!-- banner begin -->
<section id="aui-price-bj">
    <div class="aui-product-bj">
        <div class="aui-price-text">
            <h1>四彩云服务DM/OS</h1>
            <p>将应用弹性做到极致的轻量 PaaS 平台</p>
            <h2>一键部署Docker容器应用和Spark等分布式应用</h2>
        </div>
    </div>
</section>
<!-- banner end -->

<!-- left right begin -->
<section id="product">
    <div class="aui-container">
        <div class="clearfix aui-ma">
            <div class="aui-price-img">
                <img src="img/product/product-01.png" alt="">
            </div>
            <div class="aui-product-text">
                <h2>一键伸缩<small>「满足业务爆发增长需求」</small></h2>
                <p>数人云 DM/OS 数据中心操作系统可以管理任意规模的应用。不管是 10 还是 10000 台服务器，数人云都可以在整个集群轻松实现弹性扩展。一键扩展应用实例，从而轻松应对业务的爆发式增长。</p>
            </div>
        </div>
    </div>

    <div class="aui-product-background">
        <div class="aui-container">
            <div class="clearfix aui-ma">
                <div class="aui-price-img" style="float:right">
                    <img src="img/product/product-02.png" alt="">
                </div>
                <div class="aui-product-text">
                    <h2>一键伸缩<small>「满足业务爆发增长需求」</small></h2>
                    <p>数人云 DM/OS 数据中心操作系统可以管理任意规模的应用。不管是 10 还是 10000 台服务器，数人云都可以在整个集群轻松实现弹性扩展。一键扩展应用实例，从而轻松应对业务的爆发式增长。</p>
                </div>
            </div>
        </div>
    </div>

    <div class="aui-container">
        <div class="clearfix aui-ma">
            <div class="aui-price-img">
                <img src="img/product/product-01.png" alt="">
            </div>
            <div class="aui-product-text">
                <h2>一键伸缩<small>「满足业务爆发增长需求」</small></h2>
                <p>数人云 DM/OS 数据中心操作系统可以管理任意规模的应用。不管是 10 还是 10000 台服务器，数人云都可以在整个集群轻松实现弹性扩展。一键扩展应用实例，从而轻松应对业务的爆发式增长。</p>
            </div>
        </div>
    </div>

    <div class="aui-product-background">
        <div class="aui-container">
            <div class="clearfix aui-ma">
                <div class="aui-price-img" style="float:right">
                    <img src="img/product/product-02.png" alt="">
                </div>
                <div class="aui-product-text">
                    <h2>一键伸缩<small>「满足业务爆发增长需求」</small></h2>
                    <p>数人云 DM/OS 数据中心操作系统可以管理任意规模的应用。不管是 10 还是 10000 台服务器，数人云都可以在整个集群轻松实现弹性扩展。一键扩展应用实例，从而轻松应对业务的爆发式增长。</p>
                </div>
            </div>
        </div>
    </div>

    <div class="aui-container">
        <div class="clearfix aui-ma">
            <div class="aui-price-img">
                <img src="img/product/product-01.png" alt="">
            </div>
            <div class="aui-product-text">
                <h2>一键伸缩<small>「满足业务爆发增长需求」</small></h2>
                <p>数人云 DM/OS 数据中心操作系统可以管理任意规模的应用。不管是 10 还是 10000 台服务器，数人云都可以在整个集群轻松实现弹性扩展。一键扩展应用实例，从而轻松应对业务的爆发式增长。</p>
            </div>
        </div>
    </div>

</section>
<!-- left right end -->

<!-- footer begin -->
<?php include 'common/bottom.php'?>
<!-- footer end -->

</body>
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/slider.js"></script>
<script type="text/javascript">
    $(function() {
        var bannerSlider = new Slider($('#banner_tabs'), {
            time: 5000,
            delay: 400,
            event: 'hover',
            auto: true,
            mode: 'fade',
            controller: $('#bannerCtrl'),
            activeControllerCls: 'active'
        });
        $('#banner_tabs .flex-prev').click(function() {
            bannerSlider.prev()
        });
        $('#banner_tabs .flex-next').click(function() {
            bannerSlider.next()
        });
    });

    //头部浮动效果
    var head=$(".head").height();
    $(window).scroll(function(){
        var topScr=$(window).scrollTop();
        if (topScr>head) {
            $(".top").addClass("fixed");
        }else{
            $(".top").removeClass("fixed");
        }
    });

    // 服务行业内容 切换
    $(".con ul li").hover(function(){
        $(this).find(".txt").stop().animate({height:"198px"},400);
        $(this).find(".txt h3").stop().animate({paddingTop:"60px"},400);
    },function(){
        $(this).find(".txt").stop().animate({height:"45px"},400);
        $(this).find(".txt h3").stop().animate({paddingTop:"0px"},400);
    })
</script>
</html>