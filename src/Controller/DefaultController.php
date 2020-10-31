<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Service\QrcodeGenerator;
use setasign\Fpdi\Fpdi;
use Fpdf\FPDF;

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

    public function qrcode(QrcodeGenerator $qrcodeGenerator): Response
    {
        

          /*return new Response($this->renderView('attestation_page1.svg.twig',
            [
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
                'fait_lieu' => "Mon ul",
                'motif_travail' => "0",
                'motif_sante' => "0",
                'motif_famille' => "0",
                'motif_handicap' => "0",
                'motif_sport' => "0",
                'motif_judiciaire' => "0",
                'motif_missions' => "0",
                'motif_enfants' => "0",
                'motif_courses' => "1",
                'qrcode' => $qrcodeGenerator->generateQrCode()->writeDataUri()
            ]));*/
          


           // $mpdf->WriteHTML($this->renderView('attestation_page2.svg.twig',['qrcode' => ]));

  

            // prepare a base64 encoded "data url"
            $pic = $qrcodeGenerator->generateQrCode()->writeDataUri();
            // extract dimensions from image

            // create a simple pdf document to prove this is very well possible: 
            $pdf = new Fpdi();

            $pdf->AddPage();
            // set the source file
            $pdf->setSourceFile( $this->getParameter('kernel.project_dir') . '/public/certificate.pdf'  );

            $tplId = $pdf->importPage(1);
            // use the imported page and place it at point 10,10 with a width of 100 mm
            $pdf->useTemplate($tplId, 5, 5, 200);
            $pdf->AddPage();
            $pdf->Image($pic, 10, 30, 100, 100, 'png');
            $pdf->Output();

    }
}