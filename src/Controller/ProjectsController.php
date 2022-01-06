<?php


namespace App\Controller;

use App\Entity\Projects;
use Doctrine\ORM\EntityManagerInterface;
use http\Message\Body;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectsController extends AbstractController
{
    #[Route("/", name: "homepage")]
    public function homepage()
    {
        return $this->render('Projects/homepage.html.twig');
    }

    #[Route("/projects", name: "Project list")]
    public function show(EntityManagerInterface $entityManager)
    {
        $repository = $entityManager->getRepository(Projects::class);
        $projects = $repository->findAll();

        return $this->render('Projects/projects.html.twig', [
            'projects' => $projects
        ]);
    }


    #[Route("/projects/add")]
    public function add(Request $request, EntityManagerInterface $entityManager)
    {
        $projects = new Projects();
        $projects->setName('Project Name')
            ->setAmount(10000)
            ->setStartDate(new \DateTime('NOW'));

        $form = $this->createFormBuilder($projects)
            ->add('name',TextType::class)
            ->add('amount', IntegerType::class)
            ->add('startdate', DateType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Project'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $name = $form['name']->getData();
            $amount = $form['amount']->getData();
            $start_date = $form['startdate']->getData();

            $projects->setName($name)
                ->setAmount($amount)
                ->setStartDate($start_date);

            $entityManager->persist($projects);
            $entityManager->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('Projects/form.html.twig', array(
            'form' => $form->createView(),
        ));

    }


    #[Route("/projects/{name}")]
    public function find($name, EntityManagerInterface $entityManager)
    {
        $repository = $entityManager->getRepository(Projects::class);
        $projects = $repository->findBy(['name' => $name]);
        if (!$projects) {
            throw $this->createNotFoundException(sprintf('no entry found with name "%s"', $name));
        }

        return $this->render('Projects/projects.html.twig', [
            'projects' => $projects
        ]);
    }

    #[Route("/projects/show/total")]
    public function total(EntityManagerInterface $entityManager)
    {
        $projects = $entityManager->getRepository(Projects::class);
        $total_projects = $projects->createQueryBuilder('a')
            ->select('count(a.id)')
            ->getQuery()
            ->getSingleScalarResult();
        $total_amount = $projects->createQueryBuilder('b')
            ->select("sum(b.amount) as total")
            ->getQuery()
            ->getSingleScalarResult();

        return new Response(
            '<html><body> Total number of Projects: '.$total_projects.' </body></html>
            <br>
            <html><body> Total amount: '.$total_amount.' </body></html>');
    }
}