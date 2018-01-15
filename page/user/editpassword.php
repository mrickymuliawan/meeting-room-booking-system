<!-- header file header.php -->
<?php require_once '../template/header.php'; ?>
<!-- file connection koneksi.php -->
<?php require_once '../../function/koneksi.php'; ?>

<div class="wrapper">
  <body class="hold-transition skin-blue sidebar-mini">
    <!-- headermain or (navbar) -->
    <?php require_once '../template/headermain.php' ?>
    <!-- sidebar (asidebar.php) -->
    <?php require_once '../template/asidebar.php' ?> 


    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Profile
        </h1>
        <?php if(isset($_GET['info'])) :?>
          <?php if ($_GET['info'] =='Password tidak sama'): ?>
            <div class="alert alert-danger alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?= $_GET['info'] ?>
            </div>  
            <?php else: ?>
              <div class="alert alert-success alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?= $_GET['info'] ?>
            </div>
          <?php endif;?>
        <?php endif; ?>
      </section>
      
    <!-- Main content -->
    <section class="content">
		  <!-- Default box -->
      <div class="box">
      <!-- box header -->
        <div class="box-header with-border">
          <h3 class="box-title">Edit Profile</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            
          </div>
        </div>
        <!-- box body -->
        <div class="box-body">
          <?php 
          $iduser=$_SESSION['id_user'];
          $sql ="SELECT * FROM tb_user where id_user=$iduser";
          $query = mysqli_query($koneksi,$sql);
          $result = mysqli_fetch_assoc($query);
          ?>
          <form class="form-horizontal" action="../../function/user-model.php" method='post'>
            <div class="form-group">
              <label class="col-sm-2 control-label">Password Baru</label>
              <div class="col-sm-10">
                <input type="password" name="password" class="form-control" required="true">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Confim Password</label>
              <div class="col-sm-10">
                <input type="password" name="confirmpassword" class="form-control" required="true">
              </div>
            </div> 
            <div class=" pull-right">
              <input type="hidden" name="iduser" value=<?=$iduser?>>
              <button type="submit" class="btn btn-primary" name=editpassword>Simpan</button>
            </div>
          
          </form>
        </div>

      </div>
    </section>
  </div>
</div>


<?php require_once '../template/footer.php'; ?>
