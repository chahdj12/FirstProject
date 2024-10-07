<?php

namespace App\Controller;
use App\Entity\Client;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ClientController extends AbstractController
{
    #[Route('/client/add', name: 'add_client')]
    public function addClient(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $client = new Client();
        $client->setNom('chahed');
        $client->setPrenom('jouini');
        $client->setAge('12');
        $client2 = new Client();
        $client2->setNom('ali');
        $client2->setPrenom('bensalah');
        $client2->setAge('12');

        //ajouter loperaton dinsertion
        $entityManager->persist($client);
        $entityManager->persist($client2);
        $entityManager->flush();

        //execute la transaction
        return $this->render('client/detail.html.twig', [
            'client' => $client2,
        ]);
    }
}