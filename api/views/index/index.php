<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name=”viewport” content=”width=device-width, initial-scale=1″ />
    <title>娃娃达人</title>
</head>
<style>
    body,div,img{
        margin:0;
        padding:0;
    }
    .container {
        width:100%;
        max-width:1242px;
        margin: 0 auto;
        height:1850px;
        background: #fdd825;
    }
    .head {
        width:100%;
    }
    .cont_2 {
        width: 100%;
    }
    img {
        width:100%;
        height:100%;
    }
    .footer {
        width:100%;
        background: url("/image/07.png") repeat-y;
    }
    .download {
        float:left;
        margin-top:-20px;
    }
    .code {
        width:40%;
        float:left;
    }
    .ios {
        display: block;
        float:left;
        width:50%;
    }
    .android {
        display: block;
        float:left;
        width:50%;
    }
    .code_img {
        margin-top:30px;
        width:100%;
    }
    #invited {
        display: none;
    }
    #foo {
        width:1px;
        height:1px;
        border:none;
        background:#fdd825;
    }
    .tip {
        position: absolute;
        z-index: 100;
        top: 0px;
        left: 0px;
        display: none;
        width: 100%;
        height: 100%;
    }
</style>
<body>
<img src="/image/tip.png" alt="download tip" id="android_tip" class="tip">
    <div class="container" id="container_div">
        <div class="head">
            <img src="/image/01.png" alt="">
        </div>
        <div class="cont_2">
            <img src="/image/02.png" alt="">
        </div>
        <div class="footer">
            <div class="download">
                <a href="https://itunes.apple.com/us/app/%E5%A8%83%E5%A8%83%E8%BE%BE%E4%BA%BA/id1328401258?l=zh&ls=1&mt=8" class="ios" data-clipboard-target="#foo">
                    <img src="/image/03.png" alt="">
                </a>
                <a href="javascript:void(0);" class="android" data-clipboard-target="#foo" id="android_click">
                    <img src="/image/05.png" alt="">
                </a>
            </div>
            <!--
            <div class="code">
                <img src="/image/04.png" alt="" class="code_img" data-clipboard-target="#foo">
            </div>
            -->
        </div>
    </div>
    <script src="/js/clipboard.min.js"></script>
    <input id="foo" value="[userId]:<?=$invited?>">
    <script>
        var invited = <?=$invited?>;
        if (invited) {
            new Clipboard('.ios');
            new Clipboard('.android');
            new Clipboard('.code_img');
        }

        var ua = window.navigator.userAgent.toLowerCase();
        if (ua.match(/MicroMessenger/i) == 'micromessenger'){
            var is_wexin = 1;
        }else{
            var is_wexin = 0;
        }

        document.getElementById("android_click").onclick=function(){
            if (is_wexin) {
                document.getElementById("android_tip").style.display = 'block';
                document.getElementById("container_div").style.display = 'none';
            } else {
                var url = '/index.php?r=site/android-download';
                window.location.href = url;
            }
        };

    </script>
</body>
</html>
