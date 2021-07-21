<?php 
require_once 'controlador/excel.php';

activeErrorReporting();
noCli();

require_once 'Classes/PHPExcel.php';
require ('controlador/coneccion.php');
//require_once 'controlador/mostrar.php';
$sql = "sp_listacon";
	$resultado =  sqlsrv_query($conn,$sql);
$fila = 7; //Establecemos en que fila inciara a imprimir los datos
$gdImage = imagecreatefrompng('imagenes/logoecuador.png');
$gdImage1 = imagecreatefrompng('imagenes/uti.png');
	
	//Objeto de PHPExcel
	$objPHPExcel  = new PHPExcel();
	
	//Propiedades de Documento
	$objPHPExcel->getProperties()->setCreator("john")->setDescription("Reporte Consultor");
	
	//Establecemos la pestaña activa y nombre a la pestaña
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle("Consultor");
	
	$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
	$objDrawing->setName('Logotipo');
	$objDrawing->setDescription('Logotipo');
	$objDrawing->setImageResource($gdImage);
	$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
	$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
	$objDrawing->setHeight(100);
	$objDrawing->setCoordinates('B1');
	$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
	$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
	$objDrawing->setName('Logotipo');
	$objDrawing->setDescription('Logotipo');
	$objDrawing->setImageResource($gdImage1);
	$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
	$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
	$objDrawing->setHeight(100);
	$objDrawing->setCoordinates('K1');
	$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
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
		
		$objPHPExcel->getActiveSheet()->setCellValue('G3', ' REPORTE CONSULTOR ');
		$objPHPExcel->getActiveSheet()->mergeCells('J3:K3');
		
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
		$objPHPExcel->getActiveSheet()->setCellValue('B6', 'DNI');
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('C6', 'NOMBRES');
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('D6', 'APELLIDOS');
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('E6', ' DIRECCION ');
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('F6', 'CORREO ');
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('G6', 'EDAD');
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('H6', 'TELEFONO');
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('I6', 'CELULAR');
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('J6', 'TITULO SEGUN NIVEL');
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('K6', 'TITULO TERCER NIVEL');
		


$i = 2;
while($rows = sqlsrv_fetch_array($resultado))
{
$objPHPExcel->setActiveSheetIndex(0)

->setCellValue('B'.$fila, $rows['dni'])
->setCellValue('C'.$fila, $rows['nombres'])
->setCellValue('D'.$fila, $rows['apellidos'])
->setCellValue('E'.$fila, $rows['direccion'])
->setCellValue('F'.$fila, $rows['correo'])
->setCellValue('G'.$fila, $rows['edad'])
->setCellValue('H'.$fila, $rows['telefono'])
->setCellValue('I'.$fila, $rows['celular'])
->setCellValue('J'.$fila, $rows['titulosegundonivel'])
->setCellValue('K'.$fila, $rows['titulotercernivel']);
$fila++; //Sumamos 1 para pasar a la siguiente fila
}
$fila = $fila-1;
$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "B7:K".$fila);

	
	$filaGrafica = $fila+2;
	// definir origen de los valores
	$values = new PHPExcel_Chart_DataSeriesValues('Number', 'consultor!$D$7:$D$'.$fila);
	
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



$objPHPExcel->getActiveSheet()->setTitle('Consultor');

$objPHPExcel->setActiveSheetIndex(0);

getHeaders();
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header('Content-Disposition: attachment;filename="Consultor.xlsx"');
	header('Cache-Control: max-age=0');
	ob_end_clean();
$objWriter->save('php://output');
exit;