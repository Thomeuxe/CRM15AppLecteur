<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Review;
use AppBundle\Form\ReviewType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
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
     * @Route("/{id}", requirements={"id" = "\d+"}, name="review_show")
     */
    public function showAction($id)
    {
        $review = $this->getDoctrine()
            ->getRepository('AppBundle:Review')
            ->findOneById($id);

        if (!$review) {
            throw $this->createNotFoundException('This review does not exist');
        }

        return $this->render('review/show.html.twig', [
            'review' => $review,
        ]);
    }

    /**
     * @Route("/add", name="review_add")
     * @Security("has_role('ROLE_EDITOR')")
     */
    public function addAction(Request $request)
    {
        $review = new Review();

        $review->setUser($this->getUser());

        $form = $this->createForm(ReviewType::class, $review);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($review);
            $em->flush();

            return $this->render('review/add.html.twig', [
                'form' => $form->createView()
            ]);
        }

        return $this->render('review/add.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
