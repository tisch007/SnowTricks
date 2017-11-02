<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use UserBundle\Entity\Image;
use UserBundle\Form\ImageType;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    public function indexAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $userId = $user->getId();
        $repository = $this->getDoctrine()->getManager()->getRepository('UserBundle:Image');
        $userImages = $repository->findByUser($userId);

        return $this->render('UserBundle:User:index.html.twig', array(
            'user' => $user,
            'userImages' => $userImages,
        ));
    }

    public function addImageAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $userId = $user->getId();
        $repository = $this->getDoctrine()->getManager()->getRepository('UserBundle:Image');
        $userImages = $repository->findByUser($userId);

        $image = new image ();
        $formBuilder = $this->get('form.factory')->createBuilder(ImageType::class, $image);
        $form = $formBuilder->getForm();


        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            var_dump($image);


            if ($image->getImageFile() != null) {
                $image->setUser($user);


                $em = $this->getDoctrine()->getManager();
                if (!empty($userImages)) {
                    $em->remove($userImages[0]);
                    $em->flush();
                }
                $em->persist($image);
                $em->flush();
                $request->getSession()->getFlashBag()->add('notice', 'L\'avatar à été enregistré');
            }
            return $this->redirectToRoute('user_profil');
        }

        return $this->render('UserBundle:User:image.html.twig', array(
            'userImages' => $userImages,
            'form' => $form->createView(),
        ));
    }
}
