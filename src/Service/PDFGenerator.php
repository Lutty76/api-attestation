<?php 
namespace App\Service;

use Symfony\Component\DependencyInjection\ContainerInterface;
use App\Service\QrcodeGenerator;
use App\DTO\Attestation;
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


    public function generatePDF(Attestation $attestation){

        $qrcode =  $this->qrcodeGenerator->generateQrCode($attestation);

        $pdf = new Fpdi();

        $pdf->AddPage();
        $pdf->setSourceFile( $this->container->getParameter('kernel.project_dir') . '/public/certificate.pdf'  );
        $tplId = $pdf->importPage(1);
        $pdf->useTemplate($tplId, 5, 5, 200);

        $pdf->SetFont('Arial','',12);
        $pdf->Text(45, 54.5, utf8_decode( $attestation->getPrenom()." ".$attestation->getNom()));
        $pdf->Text(45, 61.5, $attestation->getDateNaissance());
        $pdf->Text(105, 61.5, utf8_decode( $attestation->getLieuNaissance()));
        $pdf->Text(49, 69.2, utf8_decode($attestation->getAdresse()." ".$attestation->getCodePostal()." ".$attestation->getVille()));

        if ($attestation->getMotifTravail()   ) {   $pdf->Text(31.4, 93.9 , 'X');   }
        if ($attestation->getMotifCourse()    ) {   $pdf->Text(31.4, 109  , 'X');   }
        if ($attestation->getMotifSante()     ) {   $pdf->Text(31.4, 127.9, 'X');   }
        if ($attestation->getMotifFamille()   ) {   $pdf->Text(31.4, 141.5, 'X');   }
        if ($attestation->getMotifHandicap()  ) {   $pdf->Text(31.4, 155.3, 'X');   }
        if ($attestation->getMotifSport()     ) {   $pdf->Text(31.4, 168.2, 'X');   }
        if ($attestation->getMotifJudiciaire()) {   $pdf->Text(31.4, 189.5, 'X');   }
        if ($attestation->getMotifMissions()  ) {   $pdf->Text(31.4, 202.5, 'X');   }
        if ($attestation->getMotifEnfants()   ) {   $pdf->Text(31.4, 217.8, 'X');   }

        $pdf->Text(41, 229.7, utf8_decode($attestation->getVille()));
        $pdf->Text(36, 237, $attestation->getSortieDate());
        $pdf->Text(92, 237, $attestation->getSortieHeure().":".$attestation->getSortieMinute());

        $pdf->Image($qrcode, 150, 220, 35, 35, 'png');

        $pdf->AddPage();
        $pdf->Image($qrcode, 15, 15, 115, 115, 'png');

        return $pdf;
    }
}
