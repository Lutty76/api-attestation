<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use App\Service\QrcodeGenerator;
use App\Service\PDFGenerator;
use App\DTO\Attestation;

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

    public function qrcode(PDFGenerator $pdfGenerator, SerializerInterface $serializer): Response
    {
        

          /*return new Response($this->renderView('attestation_page1.svg.twig',
            ));*/
            $jsonAttestation = '{"creationDate":"31\/10\/2020","creationHeure":"18","creationMinute":"38","nom":"Germond","prenom":"Jonathan","dateNaissance":"01\/01\/1970","lieuNaissance":"Soupe primordiale","adresse":"22 rue du cherche midi, \u00cele de Phatt","codePostal":"75900","ville":"Somewhere","sortieDate":"31\/10\/2020","sortieHeure":"15","sortieMinute":"00","motifTravail":true,"motifCourse":true,"motifSante":true,"motifFamille":true,"motifHandicap":true,"motifSport":true,"motifJudiciaire":false,"motifMissions":true,"motifEnfants":true}';
 

            $attestation = $serializer->deserialize($jsonAttestation, 'App\DTO\Attestation', 'json');
           // $mpdf->WriteHTML($this->renderView('attestation_page2.svg.twig',['qrcode' => ]));
           $pdfGenerator->generatePDF($attestation)->Output();
            

          

    }
}