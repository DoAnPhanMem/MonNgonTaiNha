 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-laugh-wink"></i>
  </div>
  <div class="sidebar-brand-text mx-3">Món<sup>Ngon</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Chức năng
</div>

<!-- Nav Item - Pages Collapse Menu -->
  <!-- Nav Item - Charts -->
  <?php if (isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) { ?>
    <li class="nav-item">
    <a class="nav-link" href="?mod=theme">
      <i class="fas fa-fw fa-table"></i>
      <span>Quản lý Chủ đề</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="?mod=post&status=y">
      <i class="fas fa-fw fa-table"></i>
      <span>Quản lý Bài đăng</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="?mod=user">
      <i class="fas fa-fw fa-table"></i>
      <span>Quản lý Tài khoản</span></a>
  </li>
  <?php } ?>
  <!-- Nav Item - Tables -->

<?php if (isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) { ?>
  
  <?php }?>
  <li class="nav-item">
    <a class="nav-link" href="?mod=statistical">
      <i class="fas fa-fw fa-table"></i>
      <span>Thống Kê</span></a>
  </li>


  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->