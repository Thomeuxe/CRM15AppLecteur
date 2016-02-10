<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Booking;
use AppBundle\Form\BookingType;
use Doctrine\ORM\EntityRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/booking")
 */
class BookingController extends Controller
{
    /**
     * @Route("/")
     * @Security("has_role('ROLE_EDITOR')")
     */
    public function indexAction(Request $request)
    {
        $bookings = $this->getDoctrine()
            ->getRepository('AppBundle:Booking')
            ->findAll();

        $booking = new Booking();

        $form = $this->createForm(BookingType::class);

        $form->handleRequest($request);

        $user = $this->getUser();

        $form->remove("review");

        $form->add('review', EntityType::class, array(
            'class' => 'AppBundle:Review',
            'query_builder' => function (EntityRepository $er) use ($user) {
                $qb = $er->createQueryBuilder('r');
                if(null != $user) {
                    return $qb
                        ->where($qb->expr()->eq('r.user', $user->getId()))
                        ->orderBy('r.title', 'ASC');
                } else {
                    return $qb
                        ->orderBy('r.title', 'ASC');
                }
            },
        ));

        if ($form->isSubmitted() && $form->isValid()) {
            // ... perform some action, such as saving the task to the database

            die("Form submitted");
        }

        return $this->render('booking/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
