<?php 
    require_once '../libraries/fpdf/fpdf.php';
    require_once '../controller/alumnoController.php';

    function agregarTexto($pdf,$texto,$x,$y,$align='L',$font,$size=10,$r=0,$g=0,$b=0){
        $pdf->setFont($font,'',$size);
        $pdf->setXY($x,$y);
        $pdf->setTextColor($r,$g,$b);
        $pdf->Cell(0,10,$texto,0,0,$align);
    }

    function agregarImagen($pdf,$img,$x,$y){
        $pdf->Image($img,$x,$y,0);
    }


    $alumnoObj = new AlumnoController();
    $dataAlumno = $alumnoObj->crearCertificado($_GET["idAlumno"],$_GET["idCurso"]);

    //Creo el pdf con la libreria FPDF
    $pdf = new FPDF('L','mm',array(254,194));
    $pdf->AddPage();
    $pdf->SetFont('Times','B',16);
    agregarImagen($pdf,'../assets/certificado.jpg',0,0);
    agregarTexto($pdf,$dataAlumno['nombre'].' '.$dataAlumno['apellido'],90,65,'C','Times',40,0,84,115);
    agregarTexto($pdf,$dataAlumno['nombre_curso'],80,106,'C','Times',34,0,84,115);
    agregarTexto($pdf,'01-12-2022',90,163,'C','Courier',16,0,84,115);
    $pdf->Output();


?>