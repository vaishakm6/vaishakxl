<?php include_once('./PHPExcel-1.8/Classes/PHPExcel.php');

$pFileName = 'edit-an-excel-file-using-phpexcel.xls';
$itc=$_POST['itc'];
$itn=$_POST['itn'];
$qty=$_POST['qty'];
$purchase=$_POST['purchase'];
$profit=$_POST['selling'];

/*check point*/

// Read the existing excel file

$objPHPExcel = PHPExcel_IOFactory::load($pFileName);

// Update it's data
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
//Get the row number to be appended
$conn =mysqli_connect("127.0.0.1", "root", "", "aud");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$i = mysqli_query($conn,"SELECT * FROM ind");
$row=mysqli_fetch_array($i,MYSQLI_NUM);
$j=mysqli_query($conn,"UPDATE ind SET num=$row[0]+1");
$conn->close();

// Add column headers
$objPHPExcel->getActiveSheet()
			->setCellValue('A'.$row[0], $itc)
			->setCellValue('B'.$row[0], $itn)
			->setCellValue('C'.$row[0], $qty)
			->setCellValue('D'.$row[0], $purchase)
			->setCellValue('E'.$row[0], $profit)
			;

// Generate an updated excel file
// Redirect output to a client’s web browser (Excel2007)


$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
?>
