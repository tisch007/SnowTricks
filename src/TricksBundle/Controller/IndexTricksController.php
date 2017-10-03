<?php

namespace TricksBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexTricksController extends Controller
{
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('TricksBundle:Tricks');
        $listTricks = $repository->FindAll();
        return $this->render('TricksBundle:Tricks:index.html.twig', array('listTricks' => $listTricks));
    }
}
