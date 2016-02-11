<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Critic
 *
 * @ORM\Table(name="Critic")
 * @ORM\Entity
 */
class Critic
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
     * @var integer
     *
     * @ORM\Column(name="score", type="integer", nullable=false)
     *
     * @Assert\Range(
     *      min = 0,
     *      max = 5,
     *      minMessage = "You cannot set a score below {{ limit }}",
     *      maxMessage = "You cannot set a score above {{ limit }}"
     * )
     */
    private $score;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", length=65535, nullable=false)
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Review", inversedBy="critics")
     * @ORM\JoinColumn(nullable=false)
     */
    private $review;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="critics")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;


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
     * Set score
     *
     * @param integer $score
     *
     * @return Critic
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return integer
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Critic
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set review
     *
     * @param \AppBundle\Entity\Review $review
     *
     * @return Critic
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

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * ToString
     *
     * @return string
     */
    public function __toString()
    {
        return strval($this->getScore()) . '/5';
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return Critic
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
}
