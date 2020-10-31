<?php 
namespace App\Service;

use Endroid\QrCode\QrCode;
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

        header('Content-Type: '.$qrCode->getContentType());
        return $qrCode->writeDataUri();

    }
}
