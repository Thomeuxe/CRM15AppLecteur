<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/fiches")
 */
class ReviewsController extends Controller
{

    /**
     * @Route("/")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        $reviews = $this->getDoctrine()
            ->getRepository('AppBundle:Review')
            ->findAll();

        return $this->render('review/list.html.twig', array(
            'reviews' => $reviews,
        ));
    }
}
