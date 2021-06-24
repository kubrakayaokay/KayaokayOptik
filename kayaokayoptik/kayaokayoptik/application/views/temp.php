<div class="filter-box active">
    <div class="title">
        Çerçeve Rengi
    </div>
    <?php foreach ($data['frame_color_data']->result_array() as $row): ?>
        <label class="col-sm-12" style="background-color:<?= $row['frame_color'] ?> ">
            <input type="checkbox" class="common_selector frame_color"
                   value="<?= $row['frame_color'] ?>">
            <?= $row['frame_color'] ?>
        </label>
    <?php endforeach; ?>
</div>