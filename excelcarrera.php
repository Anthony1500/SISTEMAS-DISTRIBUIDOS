<?php 
require_once 'controlador/excel.php';

activeErrorReporting();
noCli();

require_once 'Classes/PHPExcel.php';
require ('controlador/coneccion.php');
//require_once 'controlador/mostrar.php';
$sql = "sp_listacarrera";
	$resultado =  sqlsrv_query($conn,$sql);
$fila = 7; //Establecemos en que fila inciara a imprimir los datos

	
	//Objeto de PHPExcel
	$objPHPExcel  = new PHPExcel();
	
	//Propiedades de Documento
	$objPHPExcel->getProperties()->setCreator("Javier")->setDescription("Reporte Carrera");
	
	//Establecemos la pestaña activa y nombre a la pestaña
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle("CARRERA");

	$estiloTituloReporte = array(
		'font' => array(
		'name'      => 'Arial',
		'bold'      => true,
		'italic'    => false,
		'strike'    => false,
		'size' =>13
		),
		'fill' => array(
		'type'  => PHPExcel_Style_Fill::FILL_SOLID
		),
		'borders' => array(
		'allborders' => array(
		'style' => PHPExcel_Style_Border::BORDER_NONE
		)
		),
		'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
		)
		);
		
		$estiloTituloColumnas = array(
		'font' => array(
		'name'  => 'Arial',
		'bold'  => true,
		'size' =>10,
		'color' => array(
		'rgb' => 'FFFFFF'
		)
		),
		'fill' => array(
		'type' => PHPExcel_Style_Fill::FILL_SOLID,
		'color' => array('rgb' => '538DD5')
		),
		'borders' => array(
		'allborders' => array(
		'style' => PHPExcel_Style_Border::BORDER_THIN
		)
		),
		'alignment' =>  array(
		'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
		)
		);
		
		$estiloInformacion = new PHPExcel_Style();
		$estiloInformacion->applyFromArray( array(
		'font' => array(
		'name'  => 'Arial',
		'color' => array(
		'rgb' => '000000'
		)
		),
		'fill' => array(
		'type'  => PHPExcel_Style_Fill::FILL_SOLID
		),
		'borders' => array(
		'allborders' => array(
		'style' => PHPExcel_Style_Border::BORDER_THIN
		)
		),
		'alignment' =>  array(
		'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
		)
		));
		
		$objPHPExcel->getActiveSheet()->getStyle('B1:G5')->applyFromArray($estiloTituloReporte);
		$objPHPExcel->getActiveSheet()->getStyle('B6:G6')->applyFromArray($estiloTituloColumnas);
		
		$objPHPExcel->getActiveSheet()->setCellValue('D3', ' REPORTE CARRERA');
		$objPHPExcel->getActiveSheet()->mergeCells('F3:G3');
		
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
		$objPHPExcel->getActiveSheet()->setCellValue('B6', 'CODIGO CARRERA');
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('C6', 'NOMBRE CARRERA');
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('D6', 'CAMPO AMPLIO');
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('E6', ' CAMPO DETALLADO ');
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('F6', 'CAMPO ESPECIFICO ');
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('G6', 'CODIGO FACULTAD');
		


$i = 2;
while($rows = sqlsrv_fetch_array($resultado))
{
$objPHPExcel->setActiveSheetIndex(0)

->setCellValue('B'.$fila, $rows['codcarrera'])
->setCellValue('C'.$fila, $rows['nombrecarrera'])
->setCellValue('D'.$fila, $rows['campoamplio'])
->setCellValue('E'.$fila, $rows['campodetallado'])
->setCellValue('F'.$fila, $rows['campoespecifico'])
->setCellValue('G'.$fila, $rows['codfacultad']);
$fila++; //Sumamos 1 para pasar a la siguiente fila
}
$fila = $fila-1;
$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "B7:G".$fila);

	
	$filaGrafica = $fila+2;
	// definir origen de los valores
	$values = new PHPExcel_Chart_DataSeriesValues('Number', 'seguimiento!$D$7:$D$'.$fila);
	
	// definir origen de los rotulos
	$categories = new PHPExcel_Chart_DataSeriesValues('String', 'proyecto!$B$7:$B$'.$fila);
	
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);



$objPHPExcel->getActiveSheet()->setTitle('Seuimiento');

$objPHPExcel->setActiveSheetIndex(0);

getHeaders();
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header('Content-Disposition: attachment;filename="Carrera.xlsx"');
	header('Cache-Control: max-age=0');
	ob_end_clean();
$objWriter->save('php://output');
exit;
