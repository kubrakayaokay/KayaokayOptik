<?php
$this->load->helper("cookie");
$hatirla = get_cookie("remember_me");
if ($hatirla){
    $beni_hatirla = json_decode($hatirla);
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title><?= script_settings("title") ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <link rel="shortcut icon" sizes="196x196" href="<?= base_url("assets") ?>/images/logo.png">
    <link rel="stylesheet" href="<?= base_url("assets") ?>/libs/bower/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet"
          href="<?= base_url("assets") ?>/libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="<?= base_url("asset") ?>/libs/bower/animate.css/animate.min.css">
    <link rel="stylesheet" href="<?= base_url("assets") ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url("assets") ?>/css/core.css">
    <link rel="stylesheet" href="<?= base_url("assets") ?>/css/misc-pages.css">
    <link rel="stylesheet" href="<?= base_url("assets") ?>/css/notiflix-1.9.1.css">
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
</head>
<body class="simple-page">
<div class="simple-page-wrap">
    <div class="simple-page-logo animated swing">
        <a href="<?= base_url(); ?>">
            <span><i class="<?= script_settings("icon") ?>"></i></span>
            <span><?= script_settings("company_name") ?></span>
        </a>
    </div><!-- logo -->
    <?php echo form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
    <?php echo form_error('password', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
    <?php echo form_error('security_code', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
    <div class="simple-page-form animated flipInY" id="login-form">

        <form action="<?= base_url("login/go"); ?>" method="post">
            <div class="form-group">
                <input value="<?= (isset($beni_hatirla)) ? $beni_hatirla->email : "";?>" name="email" id="sign-in-email"
                       type="text" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <input value="<?php echo (isset($beni_hatirla)) ? $beni_hatirla->password : "";?>" name="password" id="sign-in-password" type="password" class="form-control" placeholder="Şifre">
            </div>
            <div class="form-group">
                <input name="security_code" type="text" class="form-control" placeholder="Güvenlik Kodu">
            </div>
            <div class="form-group">
                <?php print_r($captcha["image"]); ?>
            </div>
            <div class="form-group m-b-xl">
                <div class="checkbox checkbox-primary">
                    <input <?php echo (isset($beni_hatirla)) ? "checked" : "";?> type="checkbox" name="remember_me" id="remember_me"/>
                    <label for="remember_me">Beni Hatırla</label>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Giriş Yap">
        </form>
    </div><!-- #login-form -->
    <script src="<?= base_url("assets") ?>/js/notiflix-1.9.1.js"></script>
    <?php $this->load->view("includes/alert") ?>
</div><!-- .simple-page-wrap -->
</body>
</html>