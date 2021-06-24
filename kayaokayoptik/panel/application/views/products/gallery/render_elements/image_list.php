<?php if(empty($gallery)) { ?>

    <div class="alert alert-info text-center">
        <p>Burada herhangi bir görsel bulunmamaktadır.</a></p>
    </div>

<?php } else { ?>

    <table class="table table-bordered table-striped table-hover content-container">
        <thead>
        <th class="order"><i class="fa fa-reorder"></i></th>
        <th class="text-center">ID</th>
        <th>Görsel</th>
        <th class="text-center">Resim Adı</th>
        <th width="10" class="text-center">Durumu</th>
        <th width="170" class="text-center">Öne Çıkarılmış Görsel</th>
        <th width="150" class="text-center">İşlem</th>
        </thead>
        <tbody class="sortable" data-url="<?php echo base_url("products/imageRank"); ?>">

        <?php foreach($gallery as $row){ ?>

            <tr id="ord-<?php echo $row->id; ?>">
                <td style="vertical-align: middle;" width="10" class="order"><i class="fa fa-reorder"></i></td>
                <td style="vertical-align: middle;" width="40" class="text-center"><?php echo $row->id; ?></td>
                <td class= text-center">

                    <img width="150" src="<?= base_url("../uploads/products/$row->image") ?>">
                </td>
                <td style="vertical-align: middle;" class="text-center"><?php echo $row->image; ?></td>
                <td style="vertical-align: middle;" class="text-center">
                    <input
                        data-url="<?php echo base_url("products/imageIsActive/$row->id"); ?>"
                        class="isActive"
                        type="checkbox"
                        data-switchery
                        data-color="#10c469"
                        <?php echo ($row->isActive) ? "checked" : ""; ?>
                    />
                </td>
                <td style="vertical-align: middle;" class="text-center">
                    <input
                        data-url="<?php echo base_url("products/isCover/$row->id/$row->product_id"); ?>"
                        class="isCover"
                        type="checkbox"
                        data-switchery
                        data-color="#ff5b5b"
                        <?php echo ($row->isCover) ? "checked" : ""; ?>
                    />
                </td>
                <td style="vertical-align: middle;" class="text-center">
                    <button
                        data-url="<?php echo base_url("products/imageDelete/$row->id/$row->product_id"); ?>"
                        class="btn btn-sm btn-danger btn-outline remove-btn btn-block">
                        <i class="fa fa-trash"></i> Sil
                    </button>
                </td>
            </tr>

        <?php } ?>

        </tbody>

    </table>
<?php } ?>