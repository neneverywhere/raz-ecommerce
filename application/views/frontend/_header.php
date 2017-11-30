<?php 
  $frontend_url = $this->config->item('frontend_url');
  $logo = $this->m_header->Logo();
  $menu = $this->m_header->Menu();
  $footer = $this->m_footer->Footer();
?>
<header>
  <div class="header">
    <div class="container">
      <div class="row">
        <div class="col-xs-6 col-md-3 logo">
          <a href="/"><img src="<?=$logo?>" alt=""></a>
        </div>
        <div class="col-md-6 menu hidden-xs hidden-sm text-center">
          <ul class="list-unstyled list-inline">
            <li><a href="/">Trang chủ</a></li>
            <?php foreach ($menu as $menulv1) { ?>
              <li class="has-sub">
                <a target="<?=$menulv1['Menu_Target']?>" <?php if(strpos($menulv1['Menu_Link'],'#!')===false) echo 'href="'.$menulv1['Menu_Link'].'"'?>><?=$menulv1['Menu_Name']?></a>
                <?php if($menulv1['menulv2']!=array()) { ?>
                  <ul class="sub list-unstyled">
                    <?php foreach ($menulv1['menulv2'] as $menulv2) { ?>
                      <li class="has-sub2">
                        <a target="<?=$menulv2['Menu_Target']?>" <?php if(strpos($menulv2['Menu_Link'],'#!')===false) echo 'href="'.$menulv2['Menu_Link'].'"'?>><?=$menulv2['Menu_Name']?></a>
                        <?php if($menulv2['menulv3']!=array()) { ?>
                          <ul class="sub2 list-unstyled">
                          <?php foreach ($menulv2['menulv3'] as $menulv3) { ?>
                            <li><a target="<?=$menulv3['Menu_Target']?>" <?php if(strpos($menulv3['Menu_Link'],'#!')===false) echo 'href="'.$menulv3['Menu_Link'].'"'?>><?=$menulv3['Menu_Name']?></a></li>
                          <?php } ?>
                          </ul>
                        <?php } ?>
                      </li>
                    <?php } ?>
                  </ul>
                <?php } ?>
              </li>
            <?php } ?>
          </ul>
        </div>
        <div class="col-xs-8 col-md-3 social text-right">
          <ul class="list-unstyled list-inline">
            <li><a target="_blank" href="<?=$footer['Facebook']?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="<?=$footer['Skype']?>"><img src="/source/shoppe-22.png"></a></li>
			<li><a target="_blank" href="<?=$footer['Google_Plus']?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
			<li><a target="_blank" href="<?=$footer['Youtube']?>"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</header>


<script type="text/javascript">
(function(d,s,id){var z=d.createElement(s);z.type="text/javascript";z.id=id;z.async=true;z.src="//static.zotabox.com/b/0/b0d90ca401409c7238b159de13d2f8fb/widgets.js";var sz=d.getElementsByTagName(s)[0];sz.parentNode.insertBefore(z,sz)}(document,"script","zb-embed-code"));
</script>