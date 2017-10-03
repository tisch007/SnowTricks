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
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;



class TricksController extends Controller
{
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('TricksBundle:Tricks');
        $listTricks = $repository->FindAll();
        return $this->render('TricksBundle:Tricks:index.html.twig', array('listTricks' => $listTricks));
    }

    public function viewAction($id)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('TricksBundle:Tricks');
        $oneTricks = $repository->Find($id);
        return $this->render('TricksBundle:Tricks:view.html.twig', array('oneTricks' => $oneTricks));
    }

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

    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $trick = $em->getRepository('TricksBundle:Tricks')->find($id);

        if (null === $trick) {
            throw new NotFoundHttpException("Le trick d'id ".$id." n'existe pas.");
        }
        $formBuilder = $this->get('form.factory')->createBuilder(TricksType::class, $trick);
        $form = $formBuilder->getForm();

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Trick bien modifiée.');
            return $this->redirectToRoute('tricks_view', array('id' => $trick->getId()));
        }

        return $this->render('TricksBundle:Tricks:edit.html.twig', array('form' => $form->createView()));
    }

    public function deleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $trick = $em->getRepository('TricksBundle:Tricks')->find($id);
        if ($trick == null) {
            throw new NotFoundHttpException();
        }
        $form = $this->get('form.factory')->create();

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            $em->remove($trick);
            $em->flush();
            $request->getSession()->getFlashBag()->add('success', "Le trick a été supprimée !");
            return $this->redirectToRoute('tricks_homepage');
        }
        return $this->render('TricksBundle:Tricks:delete.html.twig', array(
            'trick' => $trick,
            'form'   => $form->createView()));
    }
}