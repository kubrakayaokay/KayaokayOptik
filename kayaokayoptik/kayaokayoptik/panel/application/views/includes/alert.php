<?php if (isset($_SESSION["alert"])) {
    if ($_SESSION["alert"]["type"] == "success") {
        ?>
        <script>
            $(document).ready(function () {
                Notiflix.Notify.Success("<?= $_SESSION["alert"]["message"] ?>");
            });
        </script>
    <?php } else if ($_SESSION["alert"]["type"] == "error") { ?>
        <script>
            $(document).ready(function () {
                Notiflix.Notify.Failure('<?= $_SESSION["alert"]["message"] ?>');
            });
        </script>
<?php } } ?>