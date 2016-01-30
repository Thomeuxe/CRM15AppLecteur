<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Review
 *
 * @ORM\Table(name="Review")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ReviewRepository")
 */
class Review
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="synopsis", type="text", length=65535, nullable=false)
     */
    private $synopsis;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Critic", mappedBy="review")
     */
    private $critics;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Booking", mappedBy="review")
     */
    private $bookings;

    /**
    * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="reviews")
    * @ORM\JoinColumn(nullable=false)
    */
    private $user;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->critics = new \Doctrine\Common\Collections\ArrayCollection();
        $this->bookings = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set title
     *
     * @param string $title
     *
     * @return Review
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set synopsis
     *
     * @param string $synopsis
     *
     * @return Review
     */
    public function setSynopsis($synopsis)
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    /**
     * Get synopsis
     *
     * @return string
     */
    public function getSynopsis()
    {
        return $this->synopsis;
    }

    /**
     * Add critic
     *
     * @param \AppBundle\Entity\Critic $critic
     *
     * @return Review
     */
    public function addCritic(\AppBundle\Entity\Critic $critic)
    {
        $this->critics[] = $critic;

        return $this;
    }

    /**
     * Remove critic
     *
     * @param \AppBundle\Entity\Critic $critic
     */
    public function removeCritic(\AppBundle\Entity\Critic $critic)
    {
        $this->critics->removeElement($critic);
    }

    /**
     * Get critics
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCritics()
    {
        return $this->critics;
    }

    /**
     * Add booking
     *
     * @param \AppBundle\Entity\Booking $booking
     *
     * @return Review
     */
    public function addBooking(\AppBundle\Entity\Booking $booking)
    {
        $this->bookings[] = $booking;

        return $this;
    }

    /**
     * Remove booking
     *
     * @param \AppBundle\Entity\Booking $booking
     */
    public function removeBooking(\AppBundle\Entity\Booking $booking)
    {
        $this->bookings->removeElement($booking);
    }

    /**
     * Get bookings
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBookings()
    {
        return $this->bookings;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return Review
     */
    public function setUser(\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * ToString
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getTitle();
    }
}
