<!DOCTYPE html>
<html>
<head>
<!-- dat duong dan root -->
  <base href="http://localhost/NHOM22_QLCUNGUNG/backend/">
  <title>Hương Sắc Việt</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <meta name="csrf-token" content="{{ csrf_token() }}" /> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/backend/css/style_home.css">
    <!-- load ckeditor -->
    <script type="text/javascript" src="../assets/backend/ckeditor/ckeditor.js"></script>
</head>
<body>
  <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/63b6d78a47425128790bd6a8/1gm13jtvt';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
  <div class="header" style="margin-bottom:0">
    <a href=""><img src="../assets/backend/img/logo-ngang.png" alt="" class="logo__img"></a>
  </div>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark border-bottom border-secondary">
  <a class="navbar-brand pl-2" href="home">Trang Chủ</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">

      <li class="nav-item border border-secondary mx-1" id="headingOne">
        <a class="nav-link btn" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" 
        aria-controls="collapseOne" role="button"><i class="fas fa-users-cog"></i> Hệ Thống</a>
      </li>

      <li class="nav-item border border-secondary mx-1" id="headingTwo">
        <a class="nav-link btn"  data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" 
        aria-controls="collapseTwo" role="button"><i class="fas fa-coins"></i> Chức Năng</a>
      </li>
       
      <li class="nav-item border border-secondary mx-1" id="headingThree">
          <a class="nav-link btn" data-toggle="collapse" data-target="#collapseThree" 
          aria-expanded="false" aria-controls="collapseThree" role="button"><i class="fas fa-bars"></i> Danh Mục</a>
      </li>

      <li class="nav-item border border-secondary mx-1">
        <a class="nav-link btn" data-toggle="collapse" data-target="#collapseFour" 
        aria-expanded="false" aria-controls="collapseFour" role="button"><i class="fas fa-hands-helping"></i> Trợ Giúp</a>
      </li> 
    </ul>
  </div>  

  <li class="nav-item dropdown ">
    <a class="nav-link dropdown-toggle user-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <?php if(isset($_SESSION['fullname'])): ?>
        Xin chào <?php echo $_SESSION['fullname']; ?>
      <?php endif; ?>
    </a>
    <div class="dropdown-menu float-right "  aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="index.php?controller=login&action=logout">Đăng Xuất</a>
      <a class="dropdown-item" href="login.html">Đổi Mật Khẩu</a>
    </div>
  </li>
  </nav>

  <div class="category bg-dark navbar-dark " id="accordion">

  <div class="collapse navbar-collapse " id="collapseOne" aria-labelledby="headingOne" data-parent="#accordion">
    <ul class="navbar-nav">
     

      <!-- <li class="nav-item border-right border-secondary  ml-2">
        <a href="register.html" class="nav-link px-2 btn"><i class="fas fa-users-cog"></i> Tạo Tài Khoản</a>
      </li> -->
     
      <li class="nav-item ">
        <a href="information" class="nav-link px-2 btn" ><i class="fas fa-info"></i> Thông Tin Công Ty</a>
      </li>

  </div>  

  <div class="collapse navbar-collapse " id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordion">
    <ul class="navbar-nav">
        <li class="nav-item border-right border-secondary dropdown ml-2">
          <a class="nav-link px-2 btn dropdown-toggle" href="#" id="navbarBaoCao" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="far fa-flag"></i> Báo Cáo
          </a>
          <div class="dropdown-menu  " aria-labelledby="navbarBaoCao">
            <a class="dropdown-item " href="">Nhập kho</a>
            <a class="dropdown-item " href="index.php?controller=exportreport">Xuất kho</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item border-right border-secondary  dropdown">
          <a class="nav-link " ></a>
        </li> 

      <?php if($_SESSION['permission']==1 || $_SESSION['permission']==3 || $_SESSION['permission']==4): ?>
          <li class="nav-item border-right border-secondary  ">
            <a href="index.php?controller=cart" class="nav-link px-2 btn" ><i class="fas fa-file-export"></i> Xuất Kho</a>
          </li>
        <?php else: ?>
          <li class="nav-item border-right border-secondary  ">
            <a href="" onclick="return window.alert('Chức năng này không hỗ trợ cho tài khoản của bạn!');" class="nav-link px-2 btn" ><i class="fas fa-file-export"></i> Xuất Kho</a>
          </li>
      <?php endif; ?>

      <li class="nav-item ">
        <a href="" class="nav-link px-2 btn" ><i class="fas fa-file-import"></i> Nhập Kho</a>
      </li>

      <li class="nav-item border-right border-secondary  dropdown">
        <a class="nav-link " ></a>
      </li> 

      <?php if($_SESSION['permission']==1 || $_SESSION['permission']==3 || $_SESSION['permission']==4): ?>
        <li class="nav-item ">
          <a href="index.php?controller=exporthis" class="nav-link px-2 btn" ><i class="fas fa-file-import" style="padding-right: 5px;"></i>Lịch sử Xuất Kho</a>
        </li>
      <?php endif; ?>

      <li class="nav-item border-right border-secondary  dropdown">
        <a class="nav-link " ></a>
      </li> 
      
      <?php if($_SESSION['permission']==1 || $_SESSION['permission']==4): ?>
        <li class="nav-item ">
          <a href="index.php?controller=orders" class="nav-link px-2 btn" ><i class="fas fa-weight-hanging" style="padding-right: 5px;"></i>Đơn hàng</a>
        </li>
      <?php endif; ?>

  </div>  

  <div class="collapse navbar-collapse " id="collapseThree" aria-labelledby="headingThree" data-parent="#accordion">
    <ul class="navbar-nav">
      <li class="nav-item border-right border-secondary  ml-2">
        <a href="categories" class="nav-link px-2 btn"><i class="fas fa-list"></i> Danh mục</a>
      </li>

      <li class="nav-item border-right border-secondary  ">
        <a href="districts" class="nav-link  px-2 btn" ><i i class="fab fa-fort-awesome-alt"></i> Khu Vực</a>
      </li>
      
      <?php if($_SESSION['permission']==1 || $_SESSION['permission']==4): ?>
        <li class="nav-item border-right border-secondary  ">
        <a href="users" class="nav-link px-2 btn" ><i class="fas fa-user-tie"></i> Tài Khoản</a>
      </li>
      <?php endif; ?>

      <li class="nav-item border-right border-secondary  ">
        <a href="nsx" class="nav-link px-2 btn" ><i class="fas fa-box-open"></i> Nhà Sản Xuất</a>
      </li>

      <li class="nav-item border-right border-secondary  ">
        <a href="ncc" class="nav-link px-2 btn" ><i class="fas fa-arrow-right"></i> Nhà Cung Cấp</a>
      </li>

      <li class="nav-item border-right border-secondary  ">
        <a href="nbl" class="nav-link px-2 btn" ><i class="fas fa-weight-hanging"></i> Nhà Bán Lẻ</a>
      </li>

      <li class="nav-item border-right border-secondary  ">
        <a href="transport" class="nav-link px-2 btn" ><i class="fas fa-truck"></i> Vận chuyển</a>
      </li>

      <li class="nav-item ">
        <a href="supplies" class="nav-link px-2 btn" ><i class="fas fa-toolbox"></i> Vật Tư</a>
      </li>
  </div>  

  <div class="collapse navbar-collapse " id="collapseFour" aria-labelledby="headingFour" data-parent="#accordion">
    <ul class="navbar-nav">
      <li class="nav-item border-right border-secondary  ml-2">
        <a href="" class="nav-link px-2 btn"><i class="far fa-question-circle"></i> Hướng Dẫn Sử Dụng</a>
      </li>

      <li class="nav-item border-right border-secondary  ">
        <a href="contact" class="nav-link px-2 btn" ><i class="fas fa-phone-alt"></i> Liên Hệ</a>
      </li>

      <li class="nav-item border-right border-secondary  ">
        <a href="" class="nav-link px-2 btn" ><i class="far fa-comments"></i> Phản Hồi</a>
      </li>

      <li class="nav-item ">
        <a href="" class="nav-link px-2 btn" ><i class="far fa-file-alt"></i> Thông Tin Phần Mềm</a>
      </li>
  </div>  
  </div>
</div>

  <div class="container px-0" style="margin-top:30px">
    <?php View::renderBody(); ?>
  </div>

  <!-- Footer -->
  <footer class=" mt-auto bg-dark text-center text-lg-start px-0">
    <!-- Grid container -->
    <!-- Copyright -->
    <div class="text-center p-3 text-muted" >
      © 2022 Copyright:
      <a class="text-secondary" href="index.html">Hương Sắc Việt.com</a>
      | Designed by <strong>Hoang Hung</strong>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
</body>
</html>