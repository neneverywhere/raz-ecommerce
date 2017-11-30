<?php if($this->session->userdata('User_ID')) { ?>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('backend/_head.php'); ?>
<body>
  <?php $this->load->view('backend/_header.php'); ?>
  <main>
    <div class="row">

      <!-- include sidebar  -->
      <?php $this->load->view('backend/sidebar.php'); ?>

      <div class="content col-sm-10">
        <?php 
            if($this->router->fetch_method()=='ListNewsCatalog') $this->load->view('backend/news-catalog-list.php');
            elseif($this->router->fetch_method()=='AddNewsCatalog') $this->load->view('backend/news-catalog-add.php');
            elseif($this->router->fetch_method()=='DetailNewsCatalog') $this->load->view('backend/news-catalog-edit.php');
            elseif($this->router->fetch_method()=='ListNews') $this->load->view('backend/news-list.php',$ListNews,$pagination);
            elseif($this->router->fetch_method()=='FillNews') $this->load->view('backend/news-filter.php');
            elseif($this->router->fetch_method()=='AddNews') $this->load->view('backend/news-add.php',$editor);
            elseif($this->router->fetch_method()=='DetailNews') $this->load->view('backend/news-edit.php',$editor);
            elseif($this->router->fetch_method()=='ListSlideshow') $this->load->view('backend/slideshow-list.php',$ListSlideshow);
            elseif($this->router->fetch_method()=='AddSlideshow') $this->load->view('backend/slideshow-add.php');
            elseif($this->router->fetch_method()=='DetailSlideshow') $this->load->view('backend/slideshow-edit.php');
            elseif($this->router->fetch_method()=='ListConfig') $this->load->view('backend/config-list.php');
            elseif($this->router->fetch_method()=='EditConfig') $this->load->view('backend/config-edit.php');
            elseif($this->router->fetch_method()=='ListMenu') $this->load->view('backend/menu-list.php');
            elseif($this->router->fetch_method()=='AddMenu') $this->load->view('backend/menu-add.php');
            elseif($this->router->fetch_method()=='DetailMenu') $this->load->view('backend/menu-edit.php');
            elseif($this->router->fetch_method()=='ListCode') $this->load->view('backend/code-list.php');
            elseif($this->router->fetch_method()=='EditCode') $this->load->view('backend/code-edit.php');
            elseif($this->router->fetch_method()=='ListIntro') $this->load->view('backend/intro-list.php');
            elseif($this->router->fetch_method()=='EditIntro') $this->load->view('backend/intro-edit.php');
            elseif($this->router->fetch_method()=='ListContact') $this->load->view('backend/contact-list.php');
            elseif($this->router->fetch_method()=='EditContact') $this->load->view('backend/contact-edit.php');
            elseif($this->router->fetch_method()=='ListMap') $this->load->view('backend/map-list.php');
            elseif($this->router->fetch_method()=='EditMap') $this->load->view('backend/map-edit.php');
            elseif($this->router->fetch_method()=='ListSocial') $this->load->view('backend/social-list.php');
            elseif($this->router->fetch_method()=='EditSocial') $this->load->view('backend/social-edit.php');
            elseif($this->router->fetch_method()=='DashBoard') $this->load->view('backend/dashboard.php');
            elseif($this->router->fetch_method()=='ListLanding') $this->load->view('backend/landing-list.php');
            elseif($this->router->fetch_method()=='AddLanding') $this->load->view('backend/landing-add.php');
            elseif($this->router->fetch_method()=='DetailLanding') $this->load->view('backend/landing-edit.php');
            elseif($this->router->fetch_method()=='ListProjectCatalog') $this->load->view('backend/project-catalog-list.php');
            elseif($this->router->fetch_method()=='AddProjectCatalog') $this->load->view('backend/project-catalog-add.php');
            elseif($this->router->fetch_method()=='DetailProjectCatalog') $this->load->view('backend/project-catalog-edit.php');
            elseif($this->router->fetch_method()=='ListProject') $this->load->view('backend/project-list.php');
            elseif($this->router->fetch_method()=='AddProject') $this->load->view('backend/project-add.php');
            elseif($this->router->fetch_method()=='DetailProject') $this->load->view('backend/project-edit.php');
            elseif($this->router->fetch_method()=='FillProject') $this->load->view('backend/project-filter.php');
            elseif($this->router->fetch_method()=='ListGuestInfo') $this->load->view('backend/guest-list.php');
            elseif($this->router->fetch_method()=='ListGallery') $this->load->view('backend/gallery-list.php');
            elseif($this->router->fetch_method()=='AddGallery') $this->load->view('backend/gallery-add.php');
            elseif($this->router->fetch_method()=='DetailGallery') $this->load->view('backend/gallery-edit.php');
            elseif($this->router->fetch_method()=='ListPartner') $this->load->view('backend/partner-list.php');
            elseif($this->router->fetch_method()=='AddPartner') $this->load->view('backend/partner-add.php');
            elseif($this->router->fetch_method()=='DetailPartner') $this->load->view('backend/partner-edit.php');
            elseif($this->router->fetch_method()=='ListPopup') $this->load->view('backend/popup-list.php');
            elseif($this->router->fetch_method()=='AddPopup') $this->load->view('backend/popup-add.php');
            elseif($this->router->fetch_method()=='DetailPopup') $this->load->view('backend/popup-edit.php');
            elseif($this->router->fetch_method()=='AddProductCatalog') $this->load->view('backend/product-catalog-add.php');
            elseif($this->router->fetch_method()=='ListProductCatalog') $this->load->view('backend/product-catalog-list.php');
            elseif($this->router->fetch_method()=='DetailProductCatalog') $this->load->view('backend/product-catalog-edit.php');
            elseif($this->router->fetch_method()=='ListProduct') $this->load->view('backend/product-list.php');
            elseif($this->router->fetch_method()=='FillProduct') $this->load->view('backend/product-filter.php');
            elseif($this->router->fetch_method()=='AddProduct') $this->load->view('backend/product-add.php');
            elseif($this->router->fetch_method()=='DetailProduct') $this->load->view('backend/product-edit.php');
            elseif($this->router->fetch_method()=='ListBill') $this->load->view('backend/bill-list.php');
            elseif($this->router->fetch_method()=='CountVisited') $this->load->view('backend/_visited.php');
            elseif($this->router->fetch_method()=='CountOnline') $this->load->view('backend/_online.php');
            elseif($this->router->fetch_method()=='ListPersonel') $this->load->view('backend/personel-list.php');
            elseif($this->router->fetch_method()=='AddPersonel') $this->load->view('backend/personel-add.php');
            elseif($this->router->fetch_method()=='DetailPersonel') $this->load->view('backend/personel-edit.php');
            elseif($this->router->fetch_method()=='ListUser') $this->load->view('backend/admin-list.php');
            elseif($this->router->fetch_method()=='DetailUser') $this->load->view('backend/admin-edit.php');
        ?>
      </div>
    </div>
  </main>
  <?php $this->load->view('backend/_footer.php'); ?>
</body>
</html>
<?php }else redirect('fw-admin'); // Chưa đăng nhập thì về trang đăng nhập?>