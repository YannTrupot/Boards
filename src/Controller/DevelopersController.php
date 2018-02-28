<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Developer;
use App\Services\semantic\DevelopersGui;
use App\Repository\DevelopersRepository;

class DevelopersController extends Controller
{
    /**
     * @Route("/developers", name="developers")
     */
    public function index(DevelopersGui $gui,DevelopersRepository $devsrepo)
    {
        $devs = $devsrepo->getAll();
        $dt = $gui->getTable($devs);
        return $gui->renderView('developers/index.html.twig');
    }
    /**
     * @Route("developer/update/{id}", name="developer_update")
     */
    public function update(Developer $dev,DevelopersGui $devsGui){
        $devsGui->getForm($dev);
        return $devsGui->renderView('developers/frm.html.twig');
    }
    /**
     * @Route("developer/submit", name="developer_submit")
     */
    public function submit(Request $request,DevelopersRepository $devsrepo){
        $dev=$devsrepo->find($request->get("id"));
        if(isset($dev)){
            $dev->setId($request->get("id"));
            $dev->setIdentity($request->get("identity"));
            $devsrepo->update($dev);
        }
        return $this->forward("App\Controller\DevelopersController::index");
    }

    /**
     * @Route("developer/add", name="developer_add")
     */
    public function add(Developer $dev,DevelopersGui $devsGui){
        $devsGui->getForm($dev);
        return $devsGui->renderView('developers/add.html.twig');
    }
}
