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
          Ruang Rapat
        </h1>
        
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
          
          <form class="form-horizontal" action="../../function/ruangrapat-model.php" method='post'>
            <div class="form-group">
              <label for="ruangan" class="col-sm-2 control-label">Nama Ruang</label>
              <div class="col-sm-10">
                <input type="text" name="namaruang" class="form-control" required="true">
              </div>
            </div>

            <div class="form-group">
              <label for="ruangan" class="col-sm-2 control-label">Gedung</label>
              <div class="col-sm-10">
                <input type="text" name="gedung" class="form-control" required="true">
              </div>
            </div>
                
            <div class="form-group">
              <label for="ruangan" class="col-sm-2 control-label">Lantai Ruang</label>
              <div class="col-sm-10">
                
                <select class="form-control" name=lantairuang>
                 <?php for ($i=1; $i < 10; $i++) { 
                   echo "<option value='$i'>Lantai $i</option>";
                 } ?>   
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="ruangan" class="col-sm-2 control-label">Kapasitas</label>
              <div class="col-sm-10">
                <input type="number" name="kapasitas" class="form-control">
              </div>
            </div>

            <div class="col-sm-1 pull-right">
              <button type="submit" class="btn btn-primary" name=tambahruang>Simpan</button>
            </div>
          
          </form>
        </div>

      </div>
    </section>
  </div>
</div>



<?php require_once '../template/footer.php'; ?>
