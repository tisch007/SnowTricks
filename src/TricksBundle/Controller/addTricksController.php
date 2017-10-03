<?php
/**
 * Created by PhpStorm.
 * User: cyrille
 * Date: 02/10/2017
 * Time: 14:58
 */


namespace TricksBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TricksBundle\Entity\Tricks;
use TricksBundle\Form\TricksType;
use Symfony\Component\HttpFoundation\Request;
class AddTricksController extends Controller
{
    public function addAction(Request $request)
    {
        $trick = new tricks();
        $formBuilder = $this->get('form.factory')->createBuilder(TricksType::class, $trick);
        $form = $formBuilder->getForm();

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($trick);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Trick bien enregistrée.');
            return $this->redirectToRoute('tricks_view', array('id' => $trick->getId()));
        }
        return $this->render('TricksBundle:Tricks:add.html.twig', array('form' => $form->createView()));
    }
}