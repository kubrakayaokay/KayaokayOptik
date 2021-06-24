<!DOCTYPE html>
<html lang="tr">
<head>
    <?php $this->load->view("includes/head") ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
</head>

<body class="menubar-left menubar-unfold menubar-light theme-primary">
<!--============= start main area -->
<!-- APP NAVBAR ==========-->
<?php $this->load->view("includes/header") ?>
<!--========== END app navbar -->
<!-- APP ASIDE ==========-->
<?php $this->load->view("includes/sidebar") ?>
<!--========== END app aside -->
<!-- APP MAIN ==========-->
<main id="app-main" class="app-main">
    <div class="wrap">
        <section class="app-content">
            <?php $this->load->view("{$viewFolder}/{$subViewFolder}/main_content"); ?>
        </section><!-- #dash-content -->
    </div><!-- .wrap -->
    <!-- APP FOOTER -->
    <?php $this->load->view("includes/footer") ?>
    <!-- /#app-footer -->
</main>
<!--========== END app main -->
<?php $this->load->view("includes/footer_script") ?>
</body>
</html>