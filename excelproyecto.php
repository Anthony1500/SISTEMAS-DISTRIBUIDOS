<?php 
require_once 'controlador/excel.php';

activeErrorReporting();
noCli();

require_once 'Classes/PHPExcel.php';
require ('controlador/coneccion.php');
//require_once 'controlador/mostrar.php';
$sql = "sp_listaproyecto";
	$resultado =  sqlsrv_query($conn,$sql);
$fila = 7; //Establecemos en que fila inciara a imprimir los datos

	
	//Objeto de PHPExcel
	$objPHPExcel  = new PHPExcel();
	
	//Propiedades de Documento
	$objPHPExcel->getProperties()->setCreator("wilian")->setDescription("Reporte Proyecto");
	
	//Establecemos la pestaña activa y nombre a la pestaña
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle("Proyecto");
	
	
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
		
		$objPHPExcel->getActiveSheet()->getStyle('B1:K5')->applyFromArray($estiloTituloReporte);
		$objPHPExcel->getActiveSheet()->getStyle('B6:K6')->applyFromArray($estiloTituloColumnas);
		
		$objPHPExcel->getActiveSheet()->setCellValue('E3', ' REPORTE PROYECTO ');
		$objPHPExcel->getActiveSheet()->mergeCells('J3:K3');
		
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
		$objPHPExcel->getActiveSheet()->setCellValue('B6', 'CODIGO PROYECTO');
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('C6', 'DESCRIPCION');
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('D6', 'MODALIDAD PROYECTO');
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('E6', ' FECHA INGRESO ');
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('F6', 'NIVEL ');
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('G6', 'NUMERO RESOLUCION');
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('H6', 'FECHA RESOLUCION');
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('I6', 'AÑO');
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('J6', 'VALOR');
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('K6', 'CODIGO CARRERA');
		


$i = 2;
while($rows = sqlsrv_fetch_array($resultado))
{
$objPHPExcel->setActiveSheetIndex(0)

->setCellValue('B'.$fila, $rows['codproyecto'])
->setCellValue('C'.$fila, $rows['descripcionp'])
->setCellValue('D'.$fila, $rows['modalidaproyecto'])
->setCellValue('E'.$fila, $rows['fechaingresoproyecto']->format('Y-m-d'))
->setCellValue('F'.$fila, $rows['nivel'])
->setCellValue('G'.$fila, $rows['numerodelaresolucion_CES'])
->setCellValue('H'.$fila, $rows['fecharesolucion']->format('Y-m-d'))
->setCellValue('I'.$fila, $rows['year'])
->setCellValue('J'.$fila, $rows['valor'])
->setCellValue('K'.$fila, $rows['codcarrera']);
$fila++; //Sumamos 1 para pasar a la siguiente fila
}
$fila = $fila-1;
$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "B7:K".$fila);

	
	$filaGrafica = $fila+2;
	// definir origen de los valores
	$values = new PHPExcel_Chart_DataSeriesValues('Number', 'Proyecto!$D$7:$D$'.$fila);
	
	// definir origen de los rotulos
	$categories = new PHPExcel_Chart_DataSeriesValues('String', 'proyecto!$B$7:$B$'.$fila);
	
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);



$objPHPExcel->getActiveSheet()->setTitle('Proyecto');

$objPHPExcel->setActiveSheetIndex(0);

getHeaders();
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header('Content-Disposition: attachment;filename="Proyecto.xlsx"');
	header('Cache-Control: max-age=0');
	ob_end_clean();
$objWriter->save('php://output');
exit;
