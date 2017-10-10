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
use TricksBundle\Entity\Comment;
use TricksBundle\Entity\Video;
use TricksBundle\Entity\Image;
use TricksBundle\Form\TricksType;
use TricksBundle\Form\CommentType;
use TricksBundle\Form\VideoType;
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

    public function viewAction($id, Request $request)
    {
        //tricks
        $repository = $this->getDoctrine()->getManager()->getRepository('TricksBundle:Tricks');
        $oneTricks = $repository->Find($id);
        if (null === $oneTricks) {
            throw new NotFoundHttpException("Le trick d'id ".$id." n'existe pas.");
        }
        //video
        $repository = $this->getDoctrine()->getManager()->getRepository('TricksBundle:Video');
        $listVideo = $repository->findByTricks($id);

        //Commentaire
        $repository = $this->getDoctrine()->getManager()->getRepository('TricksBundle:Comment');
        $listComment = $repository->findByTricks($id);
        $comment = new comment();
        $formBuilder = $this->get('form.factory')->createBuilder(CommentType::class, $comment);
        $formComment = $formBuilder->getForm();

        if ($request->isMethod('POST') && $formComment->handleRequest($request)->isValid()) {
            $comment->setDateAjout(new \DateTime());
            $comment->setTricks($oneTricks);
            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Trick bien enregistrée.');
            return $this->redirectToRoute('tricks_view', array('id' => $oneTricks->getId()));
        }
        return $this->render('TricksBundle:Tricks:view.html.twig', array(
            'oneTricks' => $oneTricks,
            'listComment' => $listComment,
            'formComment' => $formComment->createView(),
            'listVideo' => $listVideo ));
    }

    public function addAction(Request $request)
    {
        //tricks
        $trick = new tricks();
        $formBuilder = $this->get('form.factory')->createBuilder(TricksType::class, $trick);
        $formTrick = $formBuilder->getForm();

        //video
        $video = new video();
        $formBuilder = $this->get('form.factory')->createBuilder(VideoType::class, $video);
        $formVideo = $formBuilder->getForm();


        if ($request->isMethod('POST') && $formTrick->handleRequest($request)->isValid()) {
            $trick->setDateAjout(new \DateTime());
            $em = $this->getDoctrine()->getManager();
            $em->persist($trick);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Trick bien enregistrée.');
            return $this->redirectToRoute('tricks_view', array('id' => $trick->getId()));
        }
        return $this->render('TricksBundle:Tricks:add.html.twig', array(
            'formTrick' => $formTrick->createView(),
            'formVideo' => $formVideo->createView()
        ));
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

        return $this->render('TricksBundle:Tricks:edit.html.twig', array('formTrick' => $form->createView()));
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