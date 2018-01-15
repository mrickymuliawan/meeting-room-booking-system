<?php 
  require_once '../../assets/PHPExcel/Classes/PHPExcel.php';
	
	$link = mysqli_connect("localhost", "root", "", "mbsr"); 
	$tanggalmulai = $_POST['tanggalmulai'];
	$tanggalselesai = $_POST['tanggalselesai']; 	
	$file = new PHPExcel();
	$file->getProperties()->setTitle( "Data Booking" );
	
		 
	$file->createSheet ( NULL,0);
	$file->setActiveSheetIndex ( 0 );
	$sheet = $file->getActiveSheet ( 0 );
	$sheet->setTitle ( "Report Booking" );
 	
 	$styleArray = array(
      'borders' => array(
          	  'allborders' => array(
              'style' => PHPExcel_Style_Border::BORDER_THIN
          )
      ),
    );


	$styleArray2 = array(
    	'font'  => array(
        		'bold'  => true,
      	),
	);

	$styleArray3 = array(
    	'font'  => array(
        		'bold'  => true,
        		'size'  => 18,
      	),
	);
	$file->getActiveSheet()->getColumnDimension('A')->setWidth(3.55);
 	$file->getActiveSheet()->getColumnDimension('B')->setWidth(3);
 	$file->getActiveSheet()->getColumnDimension('C')->setWidth(11.30);
	$file->getActiveSheet()->getColumnDimension('D')->setWidth(5.86);
	$file->getActiveSheet()->getColumnDimension('E')->setWidth(10.75);
	$file->getActiveSheet()->getColumnDimension('F')->setWidth(15.75);
	$file->getActiveSheet()->getColumnDimension('G')->setWidth(10.60);
	$file->getActiveSheet()->getColumnDimension('H')->setWidth(10);
	$file->getActiveSheet()->getColumnDimension('I')->setWidth(6.60);
	$file->getActiveSheet()->getColumnDimension('J')->setWidth(11.60);
	$file->getActiveSheet()->getColumnDimension('K')->setWidth(13.60);
	$file->getActiveSheet()->getColumnDimension('L')->setWidth(11.90);
	$file->getActiveSheet()->getColumnDimension('M')->setWidth(11.90);
	$file->getActiveSheet()->getColumnDimension('N')->setWidth(10);
	$file->getActiveSheet()->getColumnDimension('O')->setWidth(13);
	$file->getActiveSheet()->getColumnDimension('P')->setWidth(14);
	$file->getActiveSheet()->getColumnDimension('Q')->setWidth(10);
	$file->getActiveSheet()->getColumnDimension('R')->setWidth(11);


	$sheet->setCellValue("B5","No")
		  ->setCellValue("C5","Nama Ruang")
		  ->setCellValue("D5","Lantai")
		  ->setCellValue("E5","Gedung")
		  ->setCellValue("F5","Judul Meeting")
		  ->setCellValue("G5","Bagian")
		  ->setCellValue("H5","Divisi")
		  ->setCellValue("I5","Snack")
		  ->setCellValue("J5","Makan Siang")
		  ->setCellValue("K5","Jumlah Peserta")
		  ->setCellValue("L5","PIC")
		  ->setCellValue("M5","NoTelp PIC")
		  ->setCellValue("N5","Tipe")
		  ->setCellValue("O5","Tanggal Mulai")
		  ->setCellValue("P5","Tanggal Selesai")
		  ->setCellValue("Q5","Jam Mulai")
		  ->setCellValue("R5","Jam Selesai");

			 
	$sql ="SELECT DISTINCT nama_ruang,lantai_ruang,gedung,judul_meeting,divisi,bagian,snack,makan_siang,jumlah_peserta,
							pic,notelp_pic,tipe,tanggal_mulai,tanggal_selesai ,jam_mulai,jam_selesai FROM tb_book bk
                      join tb_waktu wk on wk.id_book=bk.id_book
                      join tb_ruang rg on bk.id_ruang=rg.id_ruang
                      join tb_user us on bk.id_user=us.id_user
                      where
                      date(waktu) >= '$tanggalmulai' AND date(waktu) <= '$tanggalselesai'
                      group by bk.id_book
                      order by bk.id_ruang,tanggal_mulai,jam_mulai";
	$result=mysqli_query($link,$sql);
	$nourut = 1;
	$nomor=5;
	$rowresult = mysqli_num_rows($result)+5;


	$file->setActiveSheetIndex(0)->mergeCells('B2:R3');
	$sheet->setCellValue("B2","Laporan Rapat Booking BRI");
	$file->getActiveSheet()->getStyle('B2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	

	$file->getActiveSheet()->getStyle("B2")->applyFromArray($styleArray3);
	$file->getActiveSheet()->getStyle("B5:R".$rowresult)->applyFromArray($styleArray);
	$file->getActiveSheet()->getStyle("B5:R5")->applyFromArray($styleArray2);
    $file->getActiveSheet()->getStyle("B5:R".$rowresult)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	
	while($row=mysqli_fetch_array($result)){
		$nomor++;
		$sheet->setCellValue ( "B".$nomor, $nourut++ )
			  ->setCellValue ( "C".$nomor, $row["nama_ruang"])
			  ->setCellValue ( "D".$nomor, $row["lantai_ruang"])
			  ->setCellValue ( "E".$nomor, $row["gedung"] )
			  ->setCellValue ( "F".$nomor, $row["judul_meeting"])
			  ->setCellValue ( "G".$nomor, $row['bagian'])
			  ->setCellValue ( "H".$nomor, $row['divisi'])
			  ->setCellValue ( "I".$nomor, $row['snack'])
			  ->setCellValue ( "J".$nomor, $row['makan_siang'])
			  ->setCellValue ( "K".$nomor, $row['jumlah_peserta'])
			  ->setCellValue ( "L".$nomor, $row['pic'] )
			  ->setCellValue ( "M".$nomor, $row['notelp_pic'] )
			  ->setCellValue ( "N".$nomor, $row['tipe'] )
			  ->setCellValue ( "O".$nomor, date('d-M-Y',strtotime($row['tanggal_mulai'])))
			  ->setCellValue ( "P".$nomor, date('d-M-Y',strtotime($row['tanggal_selesai'])))
			  ->setCellValue ( "Q".$nomor, $row['jam_mulai'] )
			  ->setCellValue ( "R".$nomor, $row['jam_selesai'] );
			  
	}
		 
	header ( 'Content-Type: application/vnd.ms-excel' );
	//namanya adalah keluarga.xls
	header ( 'Content-Disposition: attachment;filename="Report.xls"' ); 
	header ( 'Cache-Control: max-age=0' );
	$writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
	$writer->save ( 'php://output' );
		
?>