
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../assets/dist/img/user.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$_SESSION['nama_user']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="../dashboard/dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="../bookruang/bookruang.php">
            <i class="fa fa-calendar"></i> <span>Book Ruang Rapat</span>
          </a>
        </li>
        <li>
          <a href="../ruangrapat/ruangrapat.php">
            <i class="fa fa-building"></i> <span>Ruang Rapat</span>
          </a>
        </li>
        <li>
          <a href="../laporan/laporan.php">
            <i class="fa fa-file-excel-o"></i> <span>Laporan</span>
          </a>
        </li>
        <?php if ($_SESSION['role'] =='admin' ): ?>
          <li>
            <a href="../user/user.php">
              <i class="fa fa-user"></i> <span>User</span>
            </a>
          </li>
        <?php endif ?>

        <li>
          <a href="../user/editprofile.php">
            <i class="fa fa-edit"></i><span>Edit Profile</span>
          </a>
        </li>
        
        <li>
          <a href="../user/editpassword.php">
            <i class="fa fa-lock"></i><span>Ganti Password</span>
          </a>
        </li>
            
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>