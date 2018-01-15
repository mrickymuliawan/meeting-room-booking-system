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
        <br>
        <?php if(isset($_GET['info'])) {?>
        <div class="alert alert-success alert-dismissable">
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
          <h3 class="box-title">Ruang rapat</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            
          </div>
        </div>
        <!-- box body -->
        <div class="box-body">
        <div class="row">
          <div class="col-sm-2 pull-right">
            <a href="tambahruang.php" class="btn btn-primary">Tambah Ruang</a>
          </div>
        </div>
        <br>
           <table class="table table-hover text-center table-data" width="100%">
            <thead>
              <tr>
                <th>NAMA RUANG</th>
                <th>LANTAI</th>
                <th>GEDUNG</th>
                <th>KAPASITAS</th>
                <th>KETERSEDIAAN</th>
                <th>OPSI</th>
              </tr>
            </thead>
            <tbody>
          <?php 
          $sql ="SELECT * FROM tb_ruang";
          $query = mysqli_query($koneksi,$sql);
          
          ?>
          <?php while ($result = mysqli_fetch_assoc($query)): ?>
          <tr>
                <td><?=$result['nama_ruang']?></td>
                <td><?=$result['lantai_ruang']?></td>
                <td><?=$result['gedung']?></td>
                <td><?=$result['kapasitas']?></td>   
                <td><?=$result['ketersediaan']?></td>                 
                <td>
                  <a href="editruang.php?idruang=<?=$result['id_ruang']?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>
                </td>
              </tr>
              <?php endwhile; ?>
            </tbody>
        </table>
         
        </div>

      </div>
    </section>
  </div>
</div>


<!-- 
<div class="modal fade" id="booking" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Booking Ruangan</h4>
      </div>
      <form class="form-horizontal">
        <div class="modal-body">
            <div class="form-group">
              <label for="nama" class="col-sm-2 control-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" placeholder="Nama">
              </div>
            </div>
            <div class="form-group">
              <label for="divisi" class="col-sm-2 control-label">Divisi</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="divisi" name="divisi" placeholder="Divisi">
              </div>
            </div>
            <div class="form-group">
              <label for="ruangan" class="col-sm-2 control-label">Ruangan</label>
              <div class="col-sm-10">
                <select class="form-control">
                    <option>Ruang Rapat</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select>
              </div>
            </div>
            <div class="form-group">
              <label for="tanggal" class="col-sm-2 control-label">Tanggal</label>
              <div class="col-sm-10">
                <input type="text" class="form-control pull-right" id="tanggal" name="tanggal">
              </div>
            </div>
            <div class="form-group">
              <label for="jamdimulai" class="col-sm-2 control-label">Jam Dimulai</label>
                <div class="col-sm-10">
                  <input type="time" class="form-control timepicker" name="jamdimulai" id="jamdimulai">
                </div>
            </div>
            <div class="form-group">
              <label for="jamberakhir" class="col-sm-2 control-label">Jam Berakhir</label>
                <div class="col-sm-10">
                  <input type="time" class="form-control timepicker" name="jamberakhir" id="jamberakhir">
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
    </form>
    </div>
  </div>
</div>
 -->





<?php require_once '../template/footer.php'; ?>

<script>
  $(function() {
    $('#tanggal').datepicker({
      autoclose: true,
    })

    $('.table-data').DataTable();

  })
</script>