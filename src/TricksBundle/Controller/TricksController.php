<?php

namespace TricksBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TricksController extends Controller
{
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('TricksBundle:Tricks');
        $listTricks = $repository->FindAll();
        return $this->render('TricksBundle:Tricks:index.html.twig', array('listTricks' => $listTricks));
    }

    public function addAction()
    {
        return $this->render('TricksBundle:Tricks:add.html.twig');
    }

    public function viewAction($id)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('TricksBundle:Tricks');
        $oneTricks = $repository->Find($id);
        return $this->render('TricksBundle:Tricks:view.html.twig', array('oneTricks' => $oneTricks));
    }

    public function updateAction($id)
    {
        return $this->render('TricksBundle:Tricks:update.html.twig');
    }

    public function deleteAction($id)
    {

    	/*
 		return $this->redirectToRoute('oc_platform_home');
    	REDIRECTION*/
    }
}
