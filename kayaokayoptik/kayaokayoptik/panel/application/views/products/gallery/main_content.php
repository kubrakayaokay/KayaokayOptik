<div class="row">
   <div class="col-md-12">
      <div class="widget">
         <div class="widget-body">
            <form data-url="<?php echo base_url("products/refresh_image_list/$row->id"); ?>"
                  action="<?php echo base_url("products/imageGalleryUpload/$row->id"); ?>" id="dropzone"
                  class="dropzone" data-plugin="dropzone"
                  data-options="{ url: '<?= base_url("products/imageGalleryUpload/$row->id"); ?>'}">
               <div class="dz-message">
                  <h3 class="m-h-lg">Yüklemek istediğiniz resimleri buraya sürükleyiniz</h3>
                  <p class="m-b-lg text-muted">(Yüklemek için dosyalarınızı sürükleyiniz ya da buraya
                     tıklayınız)</p>
               </div>
            </form>
         </div><!-- .widget-body -->
      </div><!-- .widget -->
   </div><!-- END column -->
</div>

<div class="row">
   <div class="col-md-12">
      <h4 class="m-b-lg">
         <b>Galeri - 760*600</b>
      </h4>
   </div><!-- END column -->
   <div class="col-md-12">
      <div class="widget">
         <div class="widget-body image_list_container">

          <?php $this->load->view("{$viewFolder}/{$subViewFolder}/render_elements/image_list"); ?>

         </div><!-- .widget-body -->
      </div><!-- .widget -->
   </div><!-- END column -->
</div>

