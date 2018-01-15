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
          Edit Book Ruang
        </h1>
        <br>
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
          <h3 class="box-title">Book Ruang</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            
          </div>
        </div>
        <!-- box body -->
        <div class="box-body">
          <?php
              $sql = "SELECT * FROM tb_user WHERE role = '$_SESSION[role]'";
              $qry = mysqli_query($koneksi,$sql);
              $status = mysqli_fetch_assoc($qry);


          ?>



          <?php 
          $idbook=$_GET['idbook'];
          $sql ="SELECT *, 
                 nama_ruang,lantai_ruang,gedung,kapasitas
                 FROM tb_book bk
                 inner join tb_ruang rg on bk.id_ruang=rg.id_ruang
                 where id_book='$idbook'";
          $query = mysqli_query($koneksi,$sql);
          $result = mysqli_fetch_assoc($query);
          ?>
          <form class="form-horizontal" action="../../function/book-model.php" method='post'>
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Ruang</label>
              <div class="col-sm-10">
                <input type="hidden" name="idruang" value="<?=$result['id_ruang']?>">
                <input type="text" name="namaruang" class="form-control" 
                value="<?=$result['nama_ruang']?>" readonly>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Gedung</label>
              <div class="col-sm-10">
                <input type="text" name="gedung" class="form-control" 
                value="<?=$result['gedung']?>" readonly>
              </div>
            </div>
                
            <div class="form-group">
              <label class="col-sm-2 control-label">Lantai Ruang</label>
              <div class="col-sm-10">
                <input type="text" name="lantai" class="form-control" 
                value="<?=$result['lantai_ruang']?>" readonly>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Kapasitas</label>
              <div class="col-sm-10">
                <input type="text" name="kapasitas" class="form-control" 
                value="<?=$result['kapasitas']?>" readonly>
              </div>
            </div>


            <br>

            <div class="form-group">
              <label class="col-sm-2 control-label">Judul Meeting</label>
              <div class="col-sm-10">
                <input type='text' class="form-control  edited" name="judulmeeting" 
                value="<?=$result['judul_meeting']?>">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">PIC</label>
              <div class="col-sm-4">
                <input type="text" class="form-control  edited" name="pic" required="true" 
                value="<?=$result['pic']?>">
              </div>
              <label class="col-sm-2 control-label">No telp PIC</label>
              <div class="col-sm-4">
                <input type="text" class="form-control  edited" name="notelppic" required="true" 
                value="<?=$result['notelp_pic']?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Divisi/Peserta</label>
              <div class="col-sm-4">
                <input type="text" class="form-control  edited" name="divisi" required="true" 
                value="<?=$result['divisi']?>">
              </div>
              <label class="col-sm-2 control-label">Bagian</label>
              <div class="col-sm-4">
                <input type="text" class="form-control  edited" name="bagian" 
                value="<?=$result['bagian']?>">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Jumlah Peserta</label>
              <div class="col-sm-10">
                <input type="text" class="form-control  edited" name="jumlahpeserta"
                value="<?=$result['jumlah_peserta']?>">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Periode</label>
              <div class="col-sm-10">
                  <label class="radio-inline">
                  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="hari" > 
                  Hari
                </label>
                <label class="radio-inline">
                  <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="rentang"> 
                  Rentang Tanggal
                </label>
                
              </div>
            </div>

            <div class="form-group tanggal-hari">
              <label class="col-sm-2 control-label">Tanggal</label>
              <div class="col-sm-4">
                <input type="text" class="form-control ed edited" name="tanggal" required="true"
                value="<?= date("d M Y",strtotime($result['tanggal_mulai'])) ?>">
              </div>
            </div>
            
            <div class="form-group tanggal-rentang">
              <label class="col-sm-2 control-label">Tanggal Mulai</label>
              <div class="col-sm-4">
                <input type="text" class="form-control ed edited" name="tanggalmulai" readonly="true"
                value="<?= date("d M Y",strtotime($result['tanggal_mulai'])) ?>">
              </div>
               <label class="col-sm-2 control-label">Tanggal Selesai</label>
              <div class="col-sm-4">
                <input type="text" class="form-control  edited" name="tanggalselesai" readonly="true"
                value="<?= date("d M Y",strtotime($result['tanggal_selesai'])) ?>">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Jam Mulai</label>
              <div class="col-sm-4">
                <select name="jammulai" class="form-control  edited" 
                value="<?=$result['jam_mulai']?>">
                  <option value="08"
                  <?php if($result['jam_mulai']=='08:00:00') echo "selected";?> >
                    08:00
                  </option>
                  <option value="09" 
                  <?php if($result['jam_mulai']=='09:00:00') echo "selected";?> >
                    09:00
                  </option>
                  <option value="10" 
                  <?php if($result['jam_mulai']=='10:00:00') echo "selected";?> >
                    10:00
                  </option>
                  <option value="11"
                  <?php if($result['jam_mulai']=='11:00:00') echo "selected";?> >
                    11:00
                  </option>
                  <option value="12" 
                  <?php if($result['jam_mulai']=='12:00:00') echo "selected";?> >
                    12:00
                  </option>
                  <option value="13"
                  <?php if($result['jam_mulai']=='13:00:00') echo "selected";?> >
                    13:00
                  </option>
                  <option value="14" 
                  <?php if($result['jam_mulai']=='14:00:00') echo "selected";?> >
                    14:00
                  </option>
                  <option value="15" 
                  <?php if($result['jam_mulai']=='15:00:00') echo "selected";?> >
                    15:00
                  </option>
                  <option value="16" 
                  <?php if($result['jam_mulai']=='16:00:00') echo "selected";?> >
                    16:00
                  </option>
                  <option value="17" 
                  <?php if($result['jam_mulai']=='17:00:00') echo "selected";?> >
                    17:00
                  </option>
                </select>
              </div>
              <label class="col-sm-2 control-label"> Jam Selesai </label>
              <div class="col-sm-4">
                <select name="jamselesai" class="form-control edited"
                value="<?=$result['jam_selesai']?>">
                  <option value="08" 
                  <?php if($result['jam_selesai']=='08:00:00') echo "selected";?> >
                    08:00
                  </option>
                  <option value="09" 
                  <?php if($result['jam_selesai']=='09:00:00') echo "selected";?> >
                    09:00
                  </option>
                  <option value="10"
                  <?php if($result['jam_selesai']=='10:00:00') echo "selected";?> >
                    10:00
                  </option>
                  <option value="11" 
                  <?php if($result['jam_selesai']=='11:00:00') echo "selected";?> >
                    11:00
                  </option>
                  <option value="12"
                  <?php if($result['jam_selesai']=='12:00:00') echo "selected";?> >
                    12:00
                  </option>
                  <option value="13" 
                  <?php if($result['jam_selesai']=='13:00:00') echo "selected";?> >
                    13:00
                  </option>
                  <option value="14"
                  <?php if($result['jam_selesai']=='14:00:00') echo "selected";?> >
                    14:00
                  </option>
                  <option value="15" 
                  <?php if($result['jam_selesai']=='15:00:00') echo "selected";?> >
                    15:00
                  </option>
                  <option value="16"
                  <?php if($result['jam_selesai']=='16:00:00') echo "selected";?> >
                    16:00
                  </option>
                  <option value="17" 
                  <?php if($result['jam_selesai']=='17:00:00') echo "selected";?> >
                    17:00
                  </option>
                </select>
              </div>
            </div>
             <div class="form-group">
              <label class="col-sm-2 control-label">Snack</label>
              <div class="col-sm-1">
                <input type="checkbox" name="snack" 
                <?php if($result['snack']=='ya') echo "checked";?>>
              </div>
              <label class="col-sm-2 control-label">Makan Siang</label>
              <div class="col-sm-1">
                <input type="checkbox" name="makansiang" 
                <?php if($result['makan_siang']=='ya') echo "checked";?>>
              </div>
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
          <a href="../../function/book-model.php?hapus=true&idbook=<?=$result['id_book']?>" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>

<?php require_once '../template/footer.php'; ?>
<script type="text/javascript">
  $(function(){
    $('input,select').prop('disabled','true');    
    $('input[name=tanggal]').datepicker({ format: 'dd M yyyy' });
    $('input[name=tanggalmulai]').datepicker({ format: 'dd M yyyy' ,startDate:new Date() });
    $('input[name=tanggalselesai]').datepicker({ format: 'dd M yyyy' });


    $('.tanggal-rentang,.tanggal-hari').hide()
    <?php if($result['tipe']=='rentang'): ?>
      showrentang();
      $('input[value=hari]').prop('disabled','true')
      $('input[value=rentang]').prop('checked','true')
    <?php else: ?>
      showhari();
      $('input[value=rentang]').prop('disabled','true')
      $('input[value=hari]').prop('checked','true')
    <?php endif; ?>

    <?php if($_SESSION['role'] =='admin'): ?>
      $('.form-control').removeClass('edited')
      $('.btn-danger').removeClass('edited')
      $('.btn-primary').removeClass('edited')
    <?php endif; ?>
    
      <?php if($result['id_user']!=$_SESSION['id_user'] ): ?>
            $('.edited').prop('disabled','true')
      <?php endif; ?>


      
      // $('input[value=rentang]').prop('checked','true')
    

    // $('input[type=radio]').click(function(){
    //   if ($(this).val()=='rentang') {
    //     showrentang()
    //   }
    //   else{
    //     showhari()
    //   }
    // })


    $('select[name=jammulai]').change(function(){
      var jammulai = parseInt($(this).val());
      $('select[name=jamselesai] option').prop('disabled',false).each(function(){
  
        var jamselesai = parseInt($(this).val());
        if (jamselesai <= jammulai ) {
          $(this).prop('disabled',true);
        }
        
      })

    })

    $('select[name=jamselesai]').change(function(){
      var jamselesai = parseInt($(this).val());
      $('select[name=jammulai] option').prop('disabled',false).each(function(){

        var jammulai = parseInt($(this).val());
        if (jamselesai <= jammulai ) {
          $(this).prop('disabled',true);
        }
        
      })

    })

  })
  function showrentang(){
    $('.tanggal-hari').hide()
    $('.tanggal-rentang').show()
    $('input[name=tanggal]').val(null).prop({'readonly':true,'required':false});
    $('input[name=tanggalmulai],input[name=tanggalselesai]').prop({'readonly':false,'required':true});
  }
  function showhari(){
    $('.tanggal-hari').show()
    $('.tanggal-rentang').hide()
    $('input[name=tanggalmulai],input[name=tanggalselesai]').val(null).prop({'readonly':true,'required':false});
    $('input[name=tanggal]').prop({'readonly':false,'required':true});
  }
</script>


