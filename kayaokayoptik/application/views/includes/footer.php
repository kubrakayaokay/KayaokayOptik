<?php $contact = json_decode(get_settings("contact"), true) ?>
<?php $social = json_decode(get_settings("social_media"), true) ?>

<footer>

   <div class="container-fluid">

      <div class="footer-wrap">

         <div class="container">

            <!--footer showroom-->
            <div class="footer-showroom">
               <div class="text-center">
                  <a href="<?= base_url("") ?>">
                     <img src="<?= base_url("uploads/logo/") . script_settings("logo"); ?>" alt="<?= script_settings("company_name"); ?>" width="110" height="55"/>
                  </a>
               </div>
            </div>

            <!--footer links-->
            <div class="footer-links">
               <div class="row">
                  <div class="col-md-6">
                     <h5>Hakkımızda</h5>
                     <p><?= get_settings("about_us") ?></p>
                  </div>


                  <div class=" col-md-6">
                     <h5>İletişim</h5>
                        <ul>
                           <li><a href="#" class="open-login"><i class="icon icon-map-marker"></i> <?= $contact["address"] ?></a></li>
                           <li>
                              <a href="tel://<?= $contact["gsm"] ?>" class="open-login">
                                 <i class="icon icon-phone"></i>
                               <?= $contact["gsm"] ?>
                              </a><br>
                              <a href="tel://<?= $contact["phone"] ?>" class="open-login">
                                 <i class="icon icon-phone"></i>
                                <?= $contact["phone"] ?>
                              </a>
                           </li>
                           <li><a href="mailto:<?= $contact["email"] ?>" class="open-login"><i class="icon icon-envelope"></i> <?= $contact["email"] ?></a></li>

                        </ul>
                     </div>
                  </div>
               </div>
            </div>

            <!--footer social-->

            <div class="footer-social">
               <div class="row">
                  <div class="col-sm-6 links">
                     <ul>
                        <li><a href="<?= $social["facebook"] ?>"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="<?= $social["twitter"] ?>"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="<?= $social["instagram"] ?>"><i class="fa fa-instagram"></i></a></li>

                     </ul>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

</footer>
