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
    public function indexAction()
    {
        $reviews = $this->getDoctrine()
            ->getRepository('AppBundle:Review')
            ->findAll();

        return $this->render('review/index.html.twig', [
            'reviews' => $reviews,
        ]);
    }

    /**
     * @Route("/{id}", name="review_show")
     */
    public function showAction($id)
    {
        $review = $this->getDoctrine()
            ->getRepository('AppBundle:Review')
            ->findOneById($id);

        return $this->render('review/show.html.twig', [
            'review' => $review,
        ]);
    }
}
