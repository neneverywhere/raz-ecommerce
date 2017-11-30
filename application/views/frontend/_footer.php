<?php 
  $frontend_url = $this->config->item('frontend_url');
  $footer = $this->m_footer->Footer();
  $fmenu = $this->m_footer->MenuFooter();
?>
<footer>
  <div class="footer">
    <div class="row">
      <div class="fleft col-xs-12 col-sm-6 col-md-3 hidden-xs">
        <p class="address"><img height="20" src="<?=$frontend_url?>images/map.png" alt=""><?=$footer['Address']?></p>
      </div>
      <div class="fmiddle col-xs-12 col-sm-6 col-md-6 text-center hidden-xs hidden-sm">
        <ul class="list-unstyled list-inline backlink">
        <?php foreach ($fmenu as $fmenu) { ?>
          <li><a <?php if(strpos($fmenu['Menu_Link'],'#!')===false) echo 'href="'.$fmenu['Menu_Link'].'"'?>><?=$fmenu['Menu_Name']?></a></li>
        <?php } ?>
        </ul>
      </div>
      <div class="fright col-xs-12 col-sm-6 col-md-3 text-right">
        <a href="tel:<?=$footer['Hotline']?>"><img height="20" src="<?=$frontend_url?>images/phone.png" alt="">Hotline: <?=$footer['Hotline']?></a>
      </div>
    </div>
  </div>
</footer>

<script src="<?=$frontend_url?>js/bootstrap.min.js"></script>
<script src="<?=$frontend_url?>js/SmoothScrolling.js"></script>
<script src="<?=$frontend_url?>plugins/owl/owl.carousel.min.js"></script>
<script src="<?=$frontend_url?>plugins/slick/slick.js"></script>
<script src="<?=$frontend_url?>plugins/owl/owl.carousel.min.js"></script>
<script src="<?=$frontend_url?>plugins/fancybox/source/jquery.fancybox.js"></script>
<script src="<?=$frontend_url?>plugins/justify/jquery.justifiedGallery.min.js"></script>
<script src="<?=$frontend_url?>plugins/confirm/confirm.js"></script>
<script src="<?=$frontend_url?>js/jquery.mmenu.min.all.js"></script>
<script src="<?=$frontend_url?>js/app.js"></script>