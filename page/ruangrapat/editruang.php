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
          <?php 
          $idruang=$_GET['idruang'];
          $sql ="SELECT * FROM tb_ruang where id_ruang=$idruang";
          $query = mysqli_query($koneksi,$sql);
          $result = mysqli_fetch_assoc($query);
          ?>
          <form class="form-horizontal" action="../../function/ruangrapat-model.php" method='post'>
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Ruang</label>
              <div class="col-sm-10">
                <input type="text" name="namaruang" class="form-control" value="<?=$result['nama_ruang']?>" required="true">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Gedung</label>
              <div class="col-sm-10">
                <input type="text" name="gedung" class="form-control" value="<?=$result['gedung']?>" required="true">
              </div>
            </div>
                
             <div class="form-group">
              <label class="col-sm-2 control-label">Lantai Ruang</label>
              <div class="col-sm-10">
                <select class="form-control" name=lantairuang>
                 <?php for ($i=1; $i < 10; $i++) { 
                    if ($i == $result['lantai_ruang']) {
                      echo "<option value='$i' selected>Lantai $i</option>";
                    }
                    else{
                      echo "<option value='$i'>Lantai $i</option>";
                    }
                   
                 } ?>   
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Kapasitas</label>
              <div class="col-sm-10">
                <input type="text" name="kapasitas" class="form-control" value="<?=$result['kapasitas']?>">
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">Ketersediaan</label>
              <div class="col-sm-10">
                <select class="form-control" name="ketersediaan">
                  <option value="tersedia" <?php if($result['ketersediaan']=='tersedia') echo "selected";?> >Tersedia
                  </option>
                  <option value="tidak tersedia" <?php if($result['ketersediaan']=='tidak tersedia') echo "selected";?> >Tidak tersedia
                  </option>
                </select>
              </div>
            </div>

            <div class="col-sm-2 pull-right">
              <input type="hidden" name="idruang" value=<?= $idruang ?>>
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-hapus"> Hapus </button>
              <button type="submit" class="btn btn-primary" name=editruang>Simpan</button>
            </div>
          
          </form>
        </div>

      </div>
    </section>
  </div>
</div>
<div class="modal fade" id="modal-hapus" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Hapus</h4>
      </div>

      <div class="modal-body">
        <strong>Anda yakin ingin menghapus data?</strong><br>
        <small>Data yang terhapus tidak dapat dikembalikan</small>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <a href="../../function/ruangrapat-model.php?hapusruang=true&idruang=<?=$result['id_ruang']?>" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>


<?php require_once '../template/footer.php'; ?>
