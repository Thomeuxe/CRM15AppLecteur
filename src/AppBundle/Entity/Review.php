<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Review
 *
 * @ORM\Table(name="Review")
 * @ORM\Entity(repositoryClass="ReviewRepository")
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getCritics()
    {
        return $this->critics;
    }

    /**
     * @param mixed $critics
     */
    public function setCritics($critics)
    {
        $this->critics = $critics;
    }

    /**
     * @return mixed
     */
    public function getBookings()
    {
        return $this->bookings;
    }

    /**
     * @param mixed $bookings
     */
    public function setBookings($bookings)
    {
        $this->bookings = $bookings;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }
}
