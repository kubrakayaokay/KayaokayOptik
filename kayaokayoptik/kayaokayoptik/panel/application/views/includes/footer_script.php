<!-- build:js ../assets/js/core.min.js -->
<script src="<?= base_url("assets") ?>/libs/bower/jquery/dist/jquery.js"></script>
<script src="<?= base_url("assets") ?>/libs/bower/jquery-ui/jquery-ui.min.js"></script>
<script src="<?= base_url("assets") ?>/libs/bower/jQuery-Storage-API/jquery.storageapi.min.js"></script>
<script src="<?= base_url("assets") ?>/libs/bower/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
<script src="<?= base_url("assets") ?>/libs/bower/jquery-slimscroll/jquery.slimscroll.js"></script>
<script src="<?= base_url("assets") ?>/libs/bower/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
<script src="<?= base_url("assets") ?>/libs/bower/PACE/pace.min.js"></script>
<!-- endbuild -->
<!-- build:js ../assets/js/app.min.js -->
<?php $this->load->view("includes/library") ?>
<script src="<?= base_url("assets") ?>/js/plugins.js"></script>
<script src="<?= base_url("assets") ?>/js/app.js"></script>
<!-- endbuild -->
<script src="<?= base_url("assets") ?>/libs/bower/moment/moment.js"></script>
<script src="<?= base_url("assets") ?>/libs/bower/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="<?= base_url("assets") ?>/js/fullcalendar.js"></script>
<script src="<?= base_url("assets") ?>/js/notiflix-1.9.1.js"></script>
<?php $this->load->view("includes/alert") ?>
