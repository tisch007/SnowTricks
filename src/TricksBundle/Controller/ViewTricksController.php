<?php
/**
 * Created by PhpStorm.
 * User: cyrille
 * Date: 02/10/2017
 * Time: 15:06
 */

namespace TricksBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ViewTricksController extends Controller
{
    public function viewAction($id)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('TricksBundle:Tricks');
        $oneTricks = $repository->Find($id);
        return $this->render('TricksBundle:Tricks:view.html.twig', array('oneTricks' => $oneTricks));
    }
}