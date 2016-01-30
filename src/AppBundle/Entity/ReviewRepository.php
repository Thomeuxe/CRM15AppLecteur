<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ReviewRepository
 *
 */
class ReviewRepository extends EntityRepository
{
  /**
   * @return array
   */
  public function findOneFeatured() {
      return $this->getEntityManager()
          ->createQuery(
              'SELECT b, r FROM AppBundle:Booking b LEFT JOIN b.review r WHERE b.startdate <= CURRENT_DATE() AND b.enddate >= CURRENT_DATE()'
          )
          ->getSingleResult()
          ->getReview();
  }
}
