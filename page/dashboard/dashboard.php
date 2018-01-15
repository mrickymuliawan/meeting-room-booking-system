  <?php require_once '../template/header.php'; ?>
  <?php require_once '../../function/koneksi.php'; ?>


	<div class="wrapper">
	<body class="hold-transition skin-blue sidebar-mini">
	  <?php require_once '../template/headermain.php' ?>
	  <?php require_once '../template/asidebar.php' ?>	
	  <!-- =============================================== -->

	  <!-- Left side column. contains the sidebar -->
	  <div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	      <h1>
	        Dashboard
	        <small>Monitoring Ruang Rapat</small>
	      </h1>
	    </section>
	    <?php 
        $sql ="SELECT count(*) totalruang FROM tb_ruang";
        $query1=mysqli_query($koneksi,$sql);$result1 = mysqli_fetch_assoc($query1); 	
        $totalruang=$result1['totalruang'];
        $sql ="SELECT count(distinct bk.id_book) bookrentang,count(distinct bk.id_ruang) ruangbook FROM 
              tb_book bk join tb_waktu wk on bk.id_book=wk.id_book where date(waktu)=CURDATE() && 
              tipe='rentang'";
        $query2=mysqli_query($koneksi,$sql);$result1 = mysqli_fetch_assoc($query2);  
        $bookrentang=$result1['bookrentang'];
        $sql ="SELECT count(distinct bk.id_book) bookhari,count(distinct bk.id_ruang) ruangbook FROM 
              tb_book bk join tb_waktu wk on bk.id_book=wk.id_book where date(waktu)=CURDATE() && 
              tipe='hari'";     
        $query2=mysqli_query($koneksi,$sql);$result2 = mysqli_fetch_assoc($query2);  
        $bookhari=$result2['bookhari'];
        $ruangbook=$result1['ruangbook']+$result2['ruangbook'];
	     ?>
	    <!-- Main content -->
	    <section class="content">
			<div class="row">
      <div class="col-sm-4">
          <div class="small-box bg-blue">
            <div class="inner">
              <h2><?= date('F Y'); ?></h2>
              <br>
              <p>Calendar</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar"></i>
            </div>
            <a href="dashboard.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


		<div class="col-sm-4">
          <div class="small-box bg-green">
            <div class="inner">
              <h2><?=$totalruang - $ruangbook ?></h2>
              <br>
              <p>Ruang rapat kosong hari ini</p>
            </div>
            <div class="icon">
              <i class="fa fa-building"></i>
            </div>
            <a href="dashboard.php?lihatruang=true" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
		</div>


		<div class="col-sm-4">
          <div class="small-box bg-red">
            <div class="inner">
              <h2><?=$bookhari + $bookrentang?></h2>
              <br>
              <p>Total book hari ini</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar-check-o"></i>
            </div>
            <a href="dashboard.php?lihatbook=true" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
				</div>
				
			</div>
      <?php if (isset($_GET['lihatruang'])): ?>
      <div class="box">
      <!-- box header -->
        <div class="box-header with-border">
          <h3 class="box-title">Ruangan yang kosong hari ini</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            
          </div>
        </div>
        <!-- box body -->
        <div class="box-body">
          <div class="row">
          <form action="dashboard.php" method="get" class="form-tanggal">
            <div class="form-group">
              <label class="col-sm-1 control-label">Tanggal</label>
              <div class="col-sm-2">
               <input type="text" name="tanggal" class="form-control"
                value="<?= date('d M Y'); ?>" readonly>
              </div>
            </div>
            <div class="col-sm-2">
              <!-- <button class="btn btn-primary" type="submit">Go</button> -->
            </div>
          </form>
        </div>
        <br>
          <table class="table table-hover table-bordered table-striped text-center table-data" width="100%">
            <thead>
              <tr>
                <th>NO</th>
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
          $sql ="SELECT *
                FROM tb_ruang
                WHERE id_ruang NOT IN (SELECT distinct id_ruang FROM tb_book where tanggal_mulai=CURDATE())";
          $query = mysqli_query($koneksi,$sql);
          $no=1;
          ?>
          <?php while ($result = mysqli_fetch_assoc($query)): ?>
          <tr>
                <td><?=$no?></td>
                <td><?=$result['nama_ruang']?></td>
                <td><?=$result['lantai_ruang']?></td>
                <td><?=$result['gedung']?></td>
                <td><?=$result['kapasitas']?></td>  
                <td><?=$result['ketersediaan']?></td>              
                <td>
                  <?php if ($result['ketersediaan'] == 'tidak tersedia'): ?>
                    <button class="btn btn-sm btn-primary" disabled>Book <i class="fa fa-plus"></i></button>
                  <?php else: ?>
                    <a href="../bookruang/tambahbook.php?idruang=<?=$result['id_ruang']?>" class="btn btn-sm btn-primary"> Book <i class="fa fa-plus"></i></a>
                  <?php endif; ?>
                </td>
              </tr>
              <?php $no++; endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
        
      <?php endif ?>


      <?php if (isset($_GET['lihatbook'])): ?>
			<div class="box">
      <!-- box header -->
        <div class="box-header with-border">
          <h3 class="box-title">Ruangan yang sudah di book hari ini</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            
          </div>
        </div>
        <!-- box body -->
        <div class="box-body">
        <div class="row">
          <form action="dashboard.php" method="get" class="form-tanggal">
            <div class="form-group">
              <label class="col-sm-1 control-label">Tanggal</label>
              <div class="col-sm-2">
               <input type="text" name="tanggal" class="form-control"
                value="<?= date('d M Y'); ?>" readonly>
              </div>
            </div>
            <div class="col-sm-2">
              <!-- <button class="btn btn-primary" type="submit">Go</button> -->
            </div>
          </form>
        </div>
        <br>

        
         <div  class="table-responsive">
          <table class="table table-hover table-bordered table-striped text-center table-data" width="100%">
            <thead>
              <tr>
                <th>NO</th>
                <th>NAMA RUANG</th>
                <th>JUDUL MEETING</th>
                <th>DIVISI</th>
                <th>TANGGAL MULAI</th>
                <th>TANGGAL SELESAI</th>
                <th>JAM MULAI</th>
                <th>JAM SELESAI</th>
                <th>TIPE</th>
                <th>ADMIN</th>
                <th>OPSI</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $iduser=$_SESSION['id_user'];
              
              $sql ="SELECT *,nama_ruang,lantai_ruang,gedung,ketersediaan,nama_user FROM tb_book bk
              join tb_waktu wk on wk.id_book=bk.id_book
              join tb_ruang rg on bk.id_ruang=rg.id_ruang
              join tb_user us on bk.id_user=us.id_user
              where
              date(waktu)=CURDATE()
              group by bk.id_book
              order by bk.id_ruang,jam_mulai";
              $query = mysqli_query($koneksi,$sql);
              $no=1;
              ?>
              <?php while ($result = mysqli_fetch_assoc($query)): ?>
              <tr>
                <td><?=$no?></td>
                <td><?=$result['nama_ruang']?></td>
                <td><?=$result['judul_meeting']?></td>
                <td><?=$result['divisi']?></td>
                <td><?= date("d M Y",strtotime($result['tanggal_mulai'])) ?></td>
                <td><?= date("d M Y",strtotime($result['tanggal_selesai'])) ?></td>
                <th><?=$result['jam_mulai']?></th>
                <th><?=$result['jam_selesai']?></th>
                <th><?=$result['tipe']?></th>
                <td><?=$result['nama_user']?></td>
                <td>
                  <a href="../bookruang/editbook.php?idbook=<?=$result['id_book']?>" class="btn btn-sm btn-primary" >Detail <i class="fa fa-edit"></i></a>
                </td>
              </tr>
              <?php $no++; endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>

      </div>
      <?php endif ?>


      <div class="box">
      <!-- box header -->
        <div class="box-header with-border">
          <h3 class="box-title">Kalender</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            
          </div>
        </div>
        <!-- box body -->
        <div class="box-body">
         <?php 
            if (isset($_GET['bulan'])) {
              $bulantext=date('F',strtotime("01-$_GET[bulan]-$_GET[tahun]")); 
              $bulan=$_GET['bulan']; 
              $tahun=$_GET['tahun'];
            }
            else{
              $bulantext=date('F'); 
              $bulan=date('m'); 
              $tahun=date('Y');
            }
            $bprev=$bulan-1; 
            $bnext=$bulan+1;
            $tprev=$tahun; 
            $tnext=$tahun;

            if ($bulan==1) {
                $tprev=$tahun-1;
                $bprev='12'; 
                $bnext='2';
              }
            elseif ($bulan==12) {
              $tnext=$tahun+1;
              $bprev='11'; 
              $bnext='1';
            }
           

            $libur=getWeekend($tahun,$bulan);
            $hari=getDays($tahun,$bulan);
            $lastday=getLastdays($tahun,$bulan);
             ?>
            <h2 class="text-center"> <?= "$bulantext  - $tahun"  ?></h2>
          <div class="row">
            <div class="col-sm-1">
              <a href="dashboard.php?bulan=<?= $bprev?>&tahun=<?= $tprev?>#kalender"><span class="fa fa-caret-left fa-4x pull-right"></span></a>
            </div>
            <div class="col-sm-10">
              <table class="table text-right table-calendar" width="100%" id="kalender">
                <tbody>
                <?php 
                 
                  $totalrow=$lastday/7;
                  for ($row = 0; $row < $totalrow; $row ++) {
                    
                    if ($row==0) {
                      echo "<tr>";
                      for ($col = 1; $col <= 7; $col ++) {
                        $tanggal=($col + ($row * 7));
                        $namahari=$hari[$tanggal-1];
                        if (in_array($tanggal, $libur)) {
                          echo "<th class='td-libur text-center' > $namahari </th>";
                        } else {
                          echo "<th class='text-center'> $namahari </th>";
                        }
                      }
                      echo "</tr>";
                    }
                    
                     echo "<tr>";
                     for ($col = 1; $col <= 7; $col ++) {
                      $tanggal=($col + ($row * 7));

                      $query="select count(*) jam from tb_waktu where date(waktu)='$tahun/$bulan/$tanggal'";
                      $total1=mysqli_fetch_assoc(mysqli_query($koneksi,$query));

                      $query="select count(*) ruang from tb_ruang where ketersediaan='tersedia' ";
                      $total2=mysqli_fetch_assoc(mysqli_query($koneksi,$query));

                      $totaljam=$total1['jam'];
                      $totalfull=8*$total2['ruang'];
                      
                      $traffic=$totalfull-$totaljam;
                      $warning=$totalfull/2;
                      // die("$totaljam");

                      $trafficclass='';
                      if ($traffic<0) {
                       $trafficclass='td-full';
                      } 
                      elseif($traffic<=$warning) {
                        $trafficclass='td-warning';
                      }
                      elseif($traffic>$warning && $traffic < $totalfull) {
                        $trafficclass='td-green';
                      }
                      $linktgl=date('d M Y',strtotime("$tanggal-$bulan-$tahun"));
                      if (in_array($tanggal, $libur)) {
                        
                        echo "<td class='td-libur $trafficclass'><a href='../bookruang/bookruang.php?tanggal=$linktgl'> $tanggal </a></td>";
                      } else {
                        echo "<td class='$trafficclass'><a href='../bookruang/bookruang.php?tanggal=$linktgl'> $tanggal</a> </td>";
                      }
                      if ($tanggal==$lastday) {
                        break;
                      }
                     }
                     echo "</tr>";
                  }

                 ?>
                </tbody>
              </table>
              
            </div>
            <div class="col-sm-1">
              <a href="dashboard.php?bulan=<?= $bnext?>&tahun=<?= $tnext?>#kalender"><span class="fa fa-caret-right fa-4x"></span></a>
            </div>
          </div>
          <div class="col-sm-4">
            <table class="table">
                <tr>
                  <td class="td-green">  </td>
                  <td>kurang dari 50% terisi</td>
                </tr>
                <tr>
                  <td class="td-warning">  </td>
                  <td>lebih dari 50% terisi</td>
                </tr>
                <tr>
                  <td class="td-full">  </td>
                  <td>100% terisi</td>
                </tr>
            </table>
          </div>
          
        </div>
      </div>
	    </section>
	    <!-- /.content -->
	  </div>

	  <!-- =============================================== -->


	 
	  <div class="control-sidebar-bg"></div>
	</div>


	<?php require_once '../template/footer.php'; ?>
	<script type="text/javascript">
		$('.table-data').DataTable();
		$('input[name=tanggal]').datepicker({ format: 'dd M yyyy' });
	</script>

<?php 
  function getWeekend($y,$m)
  { 
      $date = "$y-$m-01";
      $first_day = date('N',strtotime($date));
      $first_sunday = 7 - $first_day + 1; 
      $first_saturday = 6 - $first_day + 1;
      $last_day =  date('t',strtotime($date));
      $days = array();
      for($i=$first_saturday; $i<=$last_day; $i=$i+7 ){
          $days[] = $i;
      }

      for($i=$first_sunday; $i<=$last_day; $i=$i+7 ){
          $days[] = $i;
      }

      return  $days;

  }

  function getDays($y,$m){
    $days = array();
    $date = "$y-$m-01";
    $last_day =  date('t',strtotime($date));
    for ($i=1; $i <= $last_day; $i++) { 
      $days[] = date('l',strtotime("$y-$m-$i"));
    }
    return $days;
  }
  function getLastdays($y,$m){
    $date = "$y-$m-01";
    $last_day =  date('t',strtotime($date));
    return $last_day;
  }
?>