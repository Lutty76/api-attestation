<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

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
}