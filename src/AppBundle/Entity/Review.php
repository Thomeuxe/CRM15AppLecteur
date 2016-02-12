<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Review
 *
 * @ORM\Table(name="Review")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ReviewRepository")
 * @Vich\Uploadable
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
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="review_image", fileNameProperty="imageName")
     *
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $imageName;


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
     * Get excerpt
     *
     * @param integer $length
     * @return string
     */
    public function getExcerpt($length)
    {
        $excerpt = $this->synopsis;
        if (strlen($this->synopsis) > $this->$length) {
            $excerpt = substr($excerpt, 0, $length);
            $excerpt = substr($excerpt,0,strrpos($excerpt," "));
            $excerpt = $excerpt . '...';
        }
        return $excerpt;
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
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Review
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param string $imageName
     *
     * @return Review
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
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
