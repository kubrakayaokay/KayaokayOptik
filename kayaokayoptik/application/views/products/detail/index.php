<!DOCTYPE html>
<html lang="tr">
<head>
    <title><?= get_settings()->title ?></title>
    <meta name="keywords" content="<?= get_settings()->keywords ?>"/>
    <meta name="description" content="<?= get_settings()->description ?>">
    <?php $this->load->view("includes/head") ?>
</head>
<body>

    <div class="wrapper">
      <?php $this->load->view("includes/header"); ?>
      <?php $this->load->view("{$viewFolder}/{$subViewFolder}/main_content") ?>
      <?php $this->load->view("includes/footer"); ?>
    </div>
    <?php $this->load->view("includes/include_script"); ?>
</body>


</html>
