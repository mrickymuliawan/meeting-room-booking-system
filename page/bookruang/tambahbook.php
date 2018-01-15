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
          Book Ruang <p class="coba"></p>
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
          $idruang=$_GET['idruang'];
          $sql ="SELECT * FROM tb_ruang where id_ruang=$idruang";
          $query = mysqli_query($koneksi,$sql);
          $result = mysqli_fetch_assoc($query);
          ?>
          <form class="form-horizontal" action="../../function/book-model.php" method='post'>
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Ruang</label>
              <div class="col-sm-10">
                <input type="hidden" name="idruang" value="<?=$idruang?>">
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
                <input type="text" class="form-control" name="judulmeeting" required="true">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">PIC</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="pic" required="true">
              </div>
              <label class="col-sm-2 control-label">No telp PIC</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="notelppic" required="true">
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">Divisi/Peserta</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="divisi" required="true">
              </div>
              <label class="col-sm-2 control-label">Bagian</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="bagian">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Jumlah Peserta</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="jumlahpeserta">
              </div>
            </div>


            <div class="form-group">
              <label class="col-sm-2 control-label">Periode</label>
              <div class="col-sm-10">
                <label class="radio-inline">
                  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="hari" checked=""> 
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
                <input type="text" class="form-control" name="tanggal" required="true">
              </div>
            </div>
            
            <div class="form-group tanggal-rentang">
              <label class="col-sm-2 control-label">Tanggal Mulai</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="tanggalmulai" readonly="true">
              </div>
               <label class="col-sm-2 control-label">Tanggal Selesai</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="tanggalselesai" readonly="true">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Jam Mulai</label>
              <div class="col-sm-4">
                <select name="jammulai" class="form-control">
                  <option value="8">08:00</option>
                  <option value="9">09:00</option>
                  <option value="10">10:00</option>
                  <option value="11">11:00</option>
                  <option value="12">12:00</option>
                  <option value="13">13:00</option>
                  <option value="14">14:00</option>
                  <option value="15">15:00</option>
                  <option value="16">16:00</option>
                  <option value="17">17:00</option>
                </select>
              </div>
              <label class="col-sm-2 control-label"> Jam Selesai </label>
              <div class="col-sm-4">
                <select name="jamselesai" class="form-control">
                  
                  <option value="9">09:00</option>
                  <option value="10">10:00</option>
                  <option value="11">11:00</option>
                  <option value="12">12:00</option>
                  <option value="13">13:00</option>
                  <option value="14">14:00</option>
                  <option value="15">15:00</option>
                  <option value="16">16:00</option>
                  <option value="17">17:00</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Snack</label>
              <div class="col-sm-1">
                <input type="checkbox" name="snack" value='ya'>
              </div>
              <label class="col-sm-2 control-label">Makan Siang</label>
              <div class="col-sm-1">
                <input type="checkbox" name="makansiang" value='ya'>
              </div>
            </div>
            <div class="col-sm-1 pull-right">
              <button type="submit" class="btn btn-primary" name='tambah'>Simpan</button>
            </div>
          
          </form>
        </div>

      </div>
    </section>
  </div>
</div>




<?php require_once '../template/footer.php'; ?>
<script type="text/javascript">
  
  $(function(){
    $('input[name=tanggal]').datepicker({ format:'dd M yyyy' ,startDate: new Date() });
    $('input[name=tanggalmulai]').datepicker({ format: 'dd M yyyy',startDate : new Date() });
    

    $('input[name=tanggalmulai]').change(function() {
      var batas = $(this).val()
      $('input[name=tanggalselesai]').datepicker({ format: 'dd M yyyy',startDate : new Date(batas) });
      $('input[name=tanggalselesai]').prop({'readonly':false,'required':true,'disabled':false});
    });

    
    
     

    $('.tanggal-rentang').hide()

    $('input[type=radio]').click(function(){
      if ($(this).val()=='rentang') {
        $('.tanggal-hari').hide()
        $('.tanggal-rentang').show()
        $('input[name=tanggal]').val(null).prop({'readonly':true,'required':false});
        $('input[name=tanggalmulai]').prop({'readonly':false,'required':true});
        $('input[name=tanggalselesai]').prop({'readonly':false,'required':true,'disabled':true});
      }
      else{
        $('.tanggal-hari').show()
        $('.tanggal-rentang').hide()
        $('input[name=tanggalmulai],input[name=tanggalselesai]').val(null).prop({'readonly':true,'required':false});
        $('input[name=tanggal]').prop({'readonly':false,'required':true});
      }
    })


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

</script>