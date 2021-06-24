<!DOCTYPE html>
<html lang="tr">
<head>
    <title>404</title>
    <?php $this->load->view("includes/head") ?>
</head>
<body>
<?php $this->load->view("includes/header") ?>
<section id="sub_header">
    <div class="container">
        <div class="main_title">
            <h1 style="margin-bottom: 15px">404</h1>
        </div>
    </div>
</section><!-- End section -->
<main>
    <div class="container margin_60">
        <div class="row">
            <div class="col-md-12 text-center">
                <img width="300" src="<?= base_url("uploads/logo/").get_settings("logo") ?>" alt="<?= script_settings("company_name") ?>"/>
                <h1>ARADIĞINIZ SAYFA BULUNAMADI</h1>
                    <p>
                        SAYFA SİLİNMİŞ VEYA GÜNCELLENİYOR OLABİLİR
                    </p>
                    <hr/>
                    <a class="btn_1" href="<?= base_url() ?>">Ana Sayfaya Dön</a>
            </div><!-- End col-md-9 -->
        </div><!-- End row -->
    </div><!-- End container -->
</main><!-- End main -->

<?php $this->load->view("includes/footer") ?>
</body>
</html>



