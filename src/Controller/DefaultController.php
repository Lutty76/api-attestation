<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Service\QrcodeGenerator;
use App\Service\PDFGenerator;

class DefaultController extends AbstractController
{
    public function number(): Response
    {
        $number = random_int(0, 100);

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }

    public function qr(): Response
    {
        return $this->render('qr.txt.twig', [
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
    }

    public function qrcode(PDFGenerator $pdfGenerator): Response
    {
        

          /*return new Response($this->renderView('attestation_page1.svg.twig',
            ));*/
          
            $data=[
                'creation_date' => "31/10/2020",
                'creation_heures' => "18",
                'creation_minutes' => "38",
                'nom' => "Germond",
                'prenom' => "Jonathan",
                'naissance_date' => "01/01/1970",
                'naissance_lieu' => "Soupe primordiale",
                'adresse' => "22 rue du cherche midi, Île de Phatt",
                'zipcode' => "75900",
                'ville' => "Somewhere",
                'fait_date' => "31/10/2020",
                'fait_heures' => "15",
                'fait_minutes' => "00",
                'fait_lieu' => "Somewhere",
                'motif_travail' => "1",
                'motif_sante' => "1",
                'motif_famille' => "1",
                'motif_handicap' => "1",
                'motif_sport' => "1",
                'motif_judiciaire' => "1",
                'motif_missions' => "1",
                'motif_enfants' => "1",
                'motif_courses' => "1",
                'motifs_join' => "achats"
            ];
           // $mpdf->WriteHTML($this->renderView('attestation_page2.svg.twig',['qrcode' => ]));
           $pdfGenerator->generatePDF($data)->Output();
            

          

    }
}