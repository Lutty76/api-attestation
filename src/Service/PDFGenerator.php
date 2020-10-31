<?php 
namespace App\Service;

use Symfony\Component\DependencyInjection\ContainerInterface;
use App\Service\QrcodeGenerator;
use setasign\Fpdi\Fpdi;
use Fpdf\FPDF;


class PDFGenerator
{

    private $qrcodeGenerator;
    private $container;

    public function __construct(QrcodeGenerator $qrcodeGenerator,ContainerInterface $container)
    {
        $this->qrcodeGenerator = $qrcodeGenerator;
        $this->container = $container;
    }


    public function generatePDF($data){

        // prepare a base64 encoded "data url"
        $qrcode =  $this->qrcodeGenerator->generateQrCode($data);
        // extract dimensions from image

        // create a simple pdf document to prove this is very well possible: 
        $pdf = new Fpdi();

        $pdf->AddPage();
        // set the source file
        $pdf->setSourceFile( $this->container->getParameter('kernel.project_dir') . '/public/certificate.pdf'  );

        $tplId = $pdf->importPage(1);
        // use the imported page and place it at point 10,10 with a width of 100 mm
        $pdf->useTemplate($tplId, 5, 5, 200);
        $pdf->SetFont('Arial','',12);
        $pdf->Text(45, 54.5, utf8_decode($data["prenom"]." ".$data["nom"]));
        $pdf->Text(45, 61.5, $data["naissance_date"]);
        $pdf->Text(105, 61.5, utf8_decode($data["naissance_lieu"]));
        $pdf->Text(49, 69.2, utf8_decode($data["adresse"]." ".$data["zipcode"]." ".$data["ville"]));

        if ($data["motif_travail"] == "1")   {   $pdf->Text(31.4, 93.9, 'X');   }
        if ($data["motif_courses"] == "1")   {   $pdf->Text(31.4, 109, 'X');   }
        if ($data["motif_sante"] == "1")     {   $pdf->Text(31.4, 127.9, 'X');   }
        if ($data["motif_famille"] == "1")   {   $pdf->Text(31.4, 141.5, 'X');   }
        if ($data["motif_handicap"] == "1")  {   $pdf->Text(31.4, 155.3, 'X');   }
        if ($data["motif_sport"] == "1")     {   $pdf->Text(31.4, 168.2, 'X');   }
        if ($data["motif_judiciaire"] == "1"){   $pdf->Text(31.4, 189.5, 'X');   }
        if ($data["motif_missions"] == "1")  {   $pdf->Text(31.4, 202.5, 'X');   }
        if ($data["motif_enfants"] == "1")   {   $pdf->Text(31.4, 217.8, 'X');   }

        $pdf->Text(41, 229.7, utf8_decode($data["fait_lieu"]));
        $pdf->Text(36, 237, $data["fait_date"]);
        $pdf->Text(92, 237, $data["fait_heures"].":".$data["fait_minutes"]);

        $pdf->Image($qrcode, 150, 220, 35, 35, 'png');
        $pdf->AddPage();
        $pdf->Image($qrcode, 15, 15, 115, 115, 'png');
        return $pdf;
    }
}
