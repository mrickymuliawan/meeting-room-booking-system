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
            <a href="tambahuser.php" class="btn btn-primary">Tambah User</a>
          </div>
        </div>
        <br>
           <table class="table table-data table-hover text-center" width="100%">
            <thead>
              <tr>
                <th>NO</th>
                <th>NAMA USER</th>
                <th>NO TELP</th>
                <th>OPSI</th>
              </tr>
            </thead>
            <tbody>
          <?php 
          $sql ="SELECT * FROM tb_user";
          $query = mysqli_query($koneksi,$sql);
          $no=1;
          ?>
          <?php while ($result = mysqli_fetch_assoc($query)): ?>
          <tr>
                <td><?=$no?></td>
                <td><?=$result['nama_user']?></td>
                <td><?=$result['no_telp']?></td>
                <td>
                  <a href="edituser.php?iduser=<?=$result['id_user']?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>
                </td>
              </tr>
          <?php 
            $no++;
            endwhile; 
          ?>
            </tbody>
        </table>
         
        </div>

      </div>
    </section>
  </div>
</div>



<?php require_once '../template/footer.php'; ?>
