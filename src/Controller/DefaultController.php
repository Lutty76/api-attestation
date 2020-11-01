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
        $attestation = $serializer->deserialize($request->getContent(), 'App\DTO\Attestation', 'json');
        $pdfGenerator->generatePDF($attestation)->Output();
    }
}