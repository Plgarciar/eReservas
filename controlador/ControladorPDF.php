<?php
    //Espacios de nombres
    use Dompdf\Dompdf;
    
    require 'vendor/autoload.php';
    class ControladorPDF{
        public function generarInforme(){
            $reservas=new Reservas();
            $datosR=$reservas->verReservasInstalacion($_REQUEST['seleInst']);
            $datos=$reservas->verReservas();

            if(isset($_REQUEST['informe']) && $_REQUEST['seleInst']!="Selecciona instalación"){                
                $dompdf = new Dompdf();
                ob_start();
                include "./vista/vista_informe.php";
                $html = ob_get_clean();
                $dompdf->loadHtml($html);
                $dompdf->render();
                header("Content-type: application/pdf");
                header("Content-Disposition: inline; filename=documento.pdf");
                $dompdf->stream("informe.pdf");
            }else{
                header("Location: index.php?ctl=gestionarReservas");
            }

        }
        
    }
