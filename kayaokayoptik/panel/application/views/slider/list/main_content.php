<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Slider İşlemleri
            <a href="<?= base_url("slider/add") ?>" class="btn btn-outline btn-primary btn-sm pull-right"> <i
                        class="fa fa-plus"></i> Yeni Ekle</a>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">
            <?php if (empty($rows)) { ?>
                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a
                                href="<?= base_url("slider/add") ?>">tıklayınız</a></p>
                </div>

            <?php } else { ?>

                <table class="table table-responsive table-hover table-striped table-bordered content-container">
                    <thead>
                    <th class="order"><i class="fa fa-reorder"></i></th>
                    <th style="width: 50px" class="text-center">ID</th>
                    <th style="width: 150px" class="text-center">Görsel</th>
                    <th class="text-center">Slider Adı</th>
                    <th width="75px" class="text-center">Durum</th>
                    <th style="width: 190px" class="text-center">İşlemler</th>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("slider/sliderRankSetter"); ?>">

                    <?php foreach ($rows

                    as $row) { ?>

                    <tr id="ord-<?php echo $row->id; ?>">
                        <td style="vertical-align:middle;width: 5px;" class="order"><i class="fa fa-reorder"></i></td>
                        <td style="vertical-align:middle" class="text-center"><?= $row->id; ?></td>
                        <td style="vertical-align:middle" class="text-center">
                            <?php $slider_image_size = script_settings("slider_image_size");
                            $slider_image_size_replace = str_replace("*", "x", $slider_image_size); ?>
                            <img src="<?= get_picture("slider",$row->image, $slider_image_size_replace)  ?>">
                        </td>
                        <td style="vertical-align:middle" class="text-center"><?= $row->name; ?></td>
                        <td style="vertical-align:middle" class="text-center">
                            <input
                                    data-url="<?php echo base_url("slider/sliderIsActive/$row->id"); ?>"
                                    class="isActive"
                                    type="checkbox"
                                    data-switchery
                                    data-color="#10c469"
                                <?php echo ($row->isActive) ? "checked" : ""; ?>
                            />
                        </td>
                        <td style="vertical-align:middle" class="text-center">
                            <a href="<?= base_url("slider/update/$row->id") ?>" type="button"
                               class="btn btn-sm btn-info btn-outline"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                            <button
                                    data-url="<?php echo base_url("slider/deleteSlider/$row->id"); ?>"
                                    class="btn btn-sm btn-danger btn-outline remove-btn">
                                <i class="fa fa-trash"></i> Sil
                            </button>
                        </td>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div><!-- .widget -->
    </div><!-- END column -->
</div>