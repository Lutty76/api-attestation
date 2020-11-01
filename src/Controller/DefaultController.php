<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use App\Service\QrcodeGenerator;
use App\Service\PDFGenerator;
use App\DTO\Attestation;

class DefaultController extends AbstractController
{
    public function qrcode(Request $request, PDFGenerator $pdfGenerator, SerializerInterface $serializer): Response
    {
        if (strlen($request->getContent())==0){
            return new Response(
                '<h1>This is an API url</h1>
                <p>You should send data in json format like this :</p>
                <div style="background: #444; font-family: monospace; color: #EEE; padding: 10px">
                {<br/>
                    "creationDate":"31\/10\/2020",<br/>
                    "creationHeure":"18",<br/>
                    "creationMinute":"38",<br/>
                    "nom":"Jean",<br/>
                    "prenom":"Michu",<br/>
                    "dateNaissance":"01\/01\/1970",<br/>
                    "lieuNaissance":"Quelque Part",<br/>
                    "adresse":"22 rue du cherche midi",<br/>
                    "codePostal":"75900",<br/>
                    "ville":"Somewhere",<br/>
                    "sortieDate":"31\/10\/2020",<br/>
                    "sortieHeure":"15",<br/>
                    "sortieMinute":"00",<br/>
                    "motifTravail":true,<br/>
                    "motifCourse":true,<br/>
                    "motifSante":true,<br/>
                    "motifFamille":true,<br/>
                    "motifHandicap":true,<br/>
                    "motifSport":true,<br/>
                    "motifJudiciaire":false,<br/>
                    "motifMissions":false,<br/>
                    "motifEnfants":false<br/>
                }</div>');
        }else{
            $attestation = $serializer->deserialize($request->getContent(), 'App\DTO\Attestation', 'json');
            $pdfGenerator->generatePDF($attestation)->Output();
        }
    }
}