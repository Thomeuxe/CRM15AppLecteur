<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Booking
 *
 * @ORM\Table(name="Booking")
 * @ORM\Entity
 */
class Booking
{
    /**
     * @var integer
     *
     * @ORM\Column(name="review_id", type="bigint", nullable=false)
     */
    private $reviewId;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}

