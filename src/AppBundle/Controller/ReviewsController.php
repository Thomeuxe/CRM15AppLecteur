<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Critic;
use AppBundle\Entity\Review;
use AppBundle\Form\CriticType;
use AppBundle\Form\ReviewType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\User;

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
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction(Request $request, $id)
    {
        $review = $this->getDoctrine()
            ->getRepository('AppBundle:Review')
            ->findOneById($id);

        if (!$review) {
            throw $this->createNotFoundException('This review does not exist');
        }

        $critic = new Critic();

        $critic->setReview($review);

        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $critic->setUser($this->getUser());
        }

        $criticForm = $this->createForm(CriticType::class, $critic);

        $criticForm->handleRequest($request);

        if ($criticForm->isSubmitted() && $criticForm->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($critic);
            $em->flush();

            $this->addFlash('notice', 'Votre critique a bien été publiée !');
        }

        return $this->render('review/show.html.twig', [
            'review' => $review,
            'criticForm' => $criticForm->createView()
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

            $this->addFlash('notice', 'Votre fiche lecture a bien été crée !');

            return $this->render('review/add.html.twig', [
                'form' => $form->createView()
            ]);
        }

        return $this->render('review/add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/{username}", name="review_user")
     */
    public function showFromUserAction($username)
    {
        $user = $this->getDoctrine()
            ->getRepository('UserBundle:User')
            ->findOneByUsernameCanonical($username);

        if(!$user) {
            throw $this->createNotFoundException('The user does not exist');
        }

        $reviews = $user->getReviews();

        return $this->render('review/user.html.twig', [
            'user' => $user,
            'reviews' => $reviews
        ]);
    }
}
