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
            ));*/
          
            $data=[
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
                'motif_travail' => "1",
                'motif_sante' => "1",
                'motif_famille' => "1",
                'motif_handicap' => "1",
                'motif_sport' => "1",
                'motif_judiciaire' => "1",
                'motif_missions' => "1",
                'motif_enfants' => "1",
                'motif_courses' => "1",
                'qrcode' => $qrcodeGenerator->generateQrCode()->writeDataUri()
            ];

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
            $pdf->SetFont('Arial','',12);
            $pdf->Text(45, 54.5, $data["prenom"]." ".$data["nom"]);
            $pdf->Text(45, 61.5, $data["naissance_date"]);
            $pdf->Text(105, 61.5, $data["naissance_lieu"]);
            $pdf->Text(49, 69.2, $data["adresse"]);

            if ($data["motif_travail"] == "1")   {   $pdf->Text(31.4, 93.9, 'X');   }
            if ($data["motif_courses"] == "1")   {   $pdf->Text(31.4, 109, 'X');   }
            if ($data["motif_sante"] == "1")     {   $pdf->Text(31.4, 127.9, 'X');   }
            if ($data["motif_famille"] == "1")   {   $pdf->Text(31.4, 141.5, 'X');   }
            if ($data["motif_handicap"] == "1")  {   $pdf->Text(31.4, 155.3, 'X');   }
            if ($data["motif_sport"] == "1")     {   $pdf->Text(31.4, 168.2, 'X');   }
            if ($data["motif_judiciaire"] == "1"){   $pdf->Text(31.4, 189.5, 'X');   }
            if ($data["motif_missions"] == "1")  {   $pdf->Text(31.4, 202.5, 'X');   }
            if ($data["motif_enfants"] == "1")   {   $pdf->Text(31.4, 217.8, 'X');   }

            $pdf->Text(41, 229.7, $data["fait_lieu"]);
            $pdf->Text(36, 237, $data["fait_date"]);
            $pdf->Text(92, 237, $data["fait_heures"].":".$data["fait_minutes"]);

            $pdf->Image($pic, 150, 220, 35, 35, 'png');
            $pdf->AddPage();
            $pdf->Image($pic, 10, 10, 100, 100, 'png');
            $pdf->Output();

    }
}