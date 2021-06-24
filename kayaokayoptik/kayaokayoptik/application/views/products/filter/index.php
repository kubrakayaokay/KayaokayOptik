<!DOCTYPE html>
<html lang="tr">
<head>
    <title><?= get_settings()->title ?></title>
    <meta name="keywords" content="<?= get_settings()->keywords ?>"/>
    <meta name="description" content="<?= get_settings()->description ?>">
    <?php $this->load->view("includes/head") ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <link href = "<?php echo base_url(); ?>assets/css/filter/jquery-ui.css" rel = "stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/filter/style.css" rel="stylesheet">
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
