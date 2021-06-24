<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Ürünler
            <a href="<?= base_url("products/add") ?>" class="btn btn-outline btn-primary btn-sm pull-right"> <i
                        class="fa fa-plus"></i> Yeni Ekle</a>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">
            <?php if (empty($rows)) { ?>
                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a
                                href="<?= base_url("products/add") ?>">tıklayınız</a></p>
                </div>

            <?php } else { ?>

                <table class="table table-responsive table-hover table-striped table-bordered content-container">
                    <thead>
                    <th style="width: 50px" class="text-center">ID</th>
                    <th class="text-center">Ürün Adı</th>
                    <th class="text-center">URL</th>
                    <th class="text-center">Kategori</th>
                    <th width="75px" class="text-center">Durum</th>
                    <th style="width: 200px;" class="text-center">Tarih</th>
                    <th style="width: 290px" class="text-center">İşlemler</th>
                    </thead>
                    <tbody>

                    <?php foreach ($rows

                    as $row) { ?>

                    <tr id="ord-<?php echo $row->id; ?>">
                        <td class="text-center"><?= $row->id; ?></td>
                        <td class="text-center"><?= $row->name; ?></td>
                        <td class="text-center"><?= "/".$row->url; ?></td>
                        <td class="text-center">
                        <?php foreach ($cats as $cat) {
                            if ($cat->id == $row->category_id) {
                                echo $cat->name;
                            }
                        } ?>
                        </td>
                        <td class="text-center">
                            <input
                                    data-url="<?php echo base_url("products/productIsActive/$row->id"); ?>"
                                    class="isActive"
                                    type="checkbox"
                                    data-switchery
                                    data-color="#10c469"
                                <?php echo ($row->isActive) ? "checked" : ""; ?>
                            />
                        </td>
                        <td class="text-center"><?= turkcetarih_formati("j F Y , l", $row->createdAt) ?></td>
                        <td class="text-center">
                            <a href="<?= base_url("products/imageGallery/$row->id"); ?>"
                                    class="btn btn-sm btn-deepOrange btn-outline">
                                <i class="fa fa-image"></i> Ürün Galerisi
                            </a>
                            <a href="<?= base_url("products/update/$row->id") ?>" type="button"
                               class="btn btn-sm btn-info btn-outline"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                            <button
                                    data-url="<?php echo base_url("products/deleteProducts/$row->id"); ?>"
                                    class="btn btn-sm btn-danger btn-outline remove-btn">
                                <i class="fa fa-trash"></i> Sil
                            </button>
                        </td>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        <?= $pagination_links ?>
        </div><!-- .widget -->
    </div><!-- END column -->
</div>