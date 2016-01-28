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
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startDate", type="date", nullable=false)
     */
    private $startdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endDate", type="date", nullable=false)
     */
    private $enddate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="valid", type="boolean", nullable=false)
     */
    private $valid = '0';

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Review", inversedBy="bookings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $review;




    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set startdate
     *
     * @param \DateTime $startdate
     *
     * @return Booking
     */
    public function setStartdate($startdate)
    {
        $this->startdate = $startdate;

        return $this;
    }

    /**
     * Get startdate
     *
     * @return \DateTime
     */
    public function getStartdate()
    {
        return $this->startdate;
    }

    /**
     * Set enddate
     *
     * @param \DateTime $enddate
     *
     * @return Booking
     */
    public function setEnddate($enddate)
    {
        $this->enddate = $enddate;

        return $this;
    }

    /**
     * Get enddate
     *
     * @return \DateTime
     */
    public function getEnddate()
    {
        return $this->enddate;
    }

    /**
     * Set valid
     *
     * @param boolean $valid
     *
     * @return Booking
     */
    public function setValid($valid)
    {
        $this->valid = $valid;

        return $this;
    }

    /**
     * Get valid
     *
     * @return boolean
     */
    public function getValid()
    {
        return $this->valid;
    }

    /**
     * Set review
     *
     * @param \AppBundle\Entity\Review $review
     *
     * @return Booking
     */
    public function setReview(\AppBundle\Entity\Review $review)
    {
        $this->review = $review;

        return $this;
    }

    /**
     * Get review
     *
     * @return \AppBundle\Entity\Review
     */
    public function getReview()
    {
        return $this->review;
    }
}
