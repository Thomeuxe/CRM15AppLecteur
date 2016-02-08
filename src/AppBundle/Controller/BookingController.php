<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Booking;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * @Route("/booking")
 */
class BookingController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction(Request $request)
    {
        $bookings = $this->getDoctrine()
            ->getRepository('AppBundle:Booking')
            ->findAll();

        $booking = new Booking();

        $form = $this->createFormBuilder($booking)
            ->add('startdate', DateType::class, array(
                'widget' => 'single_text',
                'html5'  => false,
                'format' => 'dd/MM/yyyy',
                'attr' => array('class'=>'form-control')
            ))
            ->add('enddate', DateType::class, array(
                'widget' => 'single_text',
                'html5'  => false,
                'format' => 'dd/MM/yyyy',
                'attr' => array('class'=>'form-control')
            ))
            ->add('review')
            ->add('save', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // ... perform some action, such as saving the task to the database

            die("Form submitted");
        }

        return $this->render('booking/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
