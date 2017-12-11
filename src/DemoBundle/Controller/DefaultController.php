<?php

namespace DemoBundle\Controller;

use DemoBundle\Document\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    /**
     * @Route("/users")
     */
    public function indexAction()
    {

        return $this->render('DemoBundle:Default:index.html.twig', []
        );
    }

    /**
     * @Route("/api/users", options={"expose"=true})
     */

    public function getUsersAction()
    {

        $users = $this
            ->getDocumentManager()
            ->getRepository(User::class)
            ->findAll()
        ;

        return new JsonResponse($users);

    }

    protected function getDocumentManager()
    {
        return $this
            ->get('doctrine_mongodb.odm.document_manager')
        ;
    }
}
