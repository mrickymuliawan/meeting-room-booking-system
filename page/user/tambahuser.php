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
          User
        </h1>
        <?php if(isset($_GET['info'])) {?>
        <div class="alert alert-danger alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <?= $_GET['info'] ?>
        </div>
        <?php } ?>
      </section>
      
    <!-- Main content -->
    <section class="content">
		  <!-- Default box -->
      <div class="box">
      <!-- box header -->
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Ruang</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            
          </div>
        </div>
        <!-- box body -->
        <div class="box-body">
          <form class="form-horizontal" action="../../function/user-model.php" method='post'>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama User</label>
              <div class="col-sm-10">
                <input type="text" name="namauser" class="form-control" required="true">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">No Telp</label>
              <div class="col-sm-10">
                <input type="text" name="notelp" class="form-control" required="true">
              </div>

              
            </div>
            <div class="form-group">
              <label class="col-sm-offset-2 col-sm-10">Password awal akan sama dengan nomor telepon</label>
            </div>
            <div class="col-sm-1 pull-right">
              <button type="submit" class="btn btn-primary" name=tambahuser>Simpan</button>
            </div>
          
          </form>
        </div>

      </div>
    </section>
  </div>
</div>

<?php require_once '../template/footer.php'; ?>
