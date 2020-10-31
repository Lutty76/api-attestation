<?php 
namespace App\Service;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\ErrorCorrectionLevel;
use Twig\Environment;


class QrcodeGenerator
{

    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }


    public function generateQrCode($data){

        $qrCodeContents = $this->twig->render('qr.txt.twig', $data);
        $qrCode = new QrCode($qrCodeContents);
        $qrCode->setSize(600);
        $qrCode->setMargin(1); 
        $qrCode->setErrorCorrectionLevel(ErrorCorrectionLevel::MEDIUM());

        header('Content-Type: '.$qrCode->getContentType());
        return $qrCode->writeDataUri();

    }
}
