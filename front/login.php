<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0048)?do=admin -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>卓越科技大學校園資訊系統</title>
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <script src="./js/jquery-1.9.1.min.js"></script>
    <script src="./js/js.js"></script>
</head>

<body>
    <?php
    if(isset($_SESSION['login'])){
        to("admin.php");
        exit();
    }
    if(isset($_POST['acc'])){
        $row=$Admin->find(['acc'=>$_POST['acc'],'pw'=>$_POST['ps']]);
        if(!empty($row)){
            $_SESSION['login']=1;
            to("admin.php");
        }else{
            echo "<script>alert('帳號或密碼錯誤')</script>";
        }
    }
    
    ?>
    <div class="di"
        style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
        <marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
        </marquee>
        <div style="height:32px; display:block;"></div>
        <!--正中央-->
        <form method="post" action="?do=login">
            <p class="t botli">管理員登入區</p>
            <p class="cent">帳號 ： <input name="acc" autofocus="" type="text"></p>
            <p class="cent">密碼 ： <input name="ps" type="password"></p>
            <p class="cent"><input value="送出" type="submit"><input type="reset" value="清除"></p>
        </form>
    </div>

</body>

</html>