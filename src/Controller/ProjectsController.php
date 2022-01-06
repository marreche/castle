<?php


namespace App\Controller;

use App\Entity\Projects;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectsController extends AbstractController
{
    #[Route("/")]
    public function homepage()
    {
        return new Response('This is the homepage for the Stronghold Technical Test 2022');
    }

    
    #[Route("/projects")]
    public function new(EntityManagerInterface $entityManager)
    {
        $projects = new Projects();
        $projects->setName('My first Project')
            ->setAmount(10000)
            ->setStartDate(new \DateTime('2022-01-06'));

        $entityManager->persist($projects);
        $entityManager->flush();

        return new Response(sprintf('Nice! The shiny new project id is #%d, name:%s',
        $projects->getId(),
        $projects->getName()
        ));
    }
}