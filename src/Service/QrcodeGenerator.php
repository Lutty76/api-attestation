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


    public function generateQrCode(){

        $qrCodeContents = $this->twig->render('qr.txt.twig', [
            'creation_date' => "2020-01-31",
            'creation_heures' => "15",
            'creation_minutes' => "20",
            'nom' => "Germond",
            'prenom' => "Jonathan",
            'naissance_date' => "01-01-1970",
            'naissance_lieu' => "Soupe primordiale",
            'adresse' => "22 rue du cherche midi, Île de Phatt",
            'fait_date' => "2020-01-31",
            'fait_heures' => "15",
            'fait_minutes' => "22",
            'motifs_join' => "Parce que !"
        ]);
        $qrCode = new QrCode($qrCodeContents);

        header('Content-Type: '.$qrCode->getContentType());
        return $qrCode;

    }
}
