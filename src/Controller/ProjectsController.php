<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Repository\ProjectRepository;
use App\Services\semantic\ProjectsGui;

class ProjectsController extends Controller
{

    /**
     * @Route("/index", name="index")
     */
    public function index(ProjectsGui $gui){
        $gui->buttons();
        return $gui->renderView('Projects/index.html.twig');
    }

    /**
     * @Route("/projects", name="projects")
     */
    public function all(ProjectRepository $projectRepo){
        $projects=$projectRepo->findAll();
        return $this->render('Projects/all.html.twig',["projects"=>$projects]);
    }

}
