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
   * Finds all entities in the repository.
   *
   * @return array The entities.
   */
  public function findAll()
  {
    return $this->findBy([], ['id' => 'DESC']);
  }

  /**
   * @return array
   */
  public function findOneFeatured() {
      return $this->getEntityManager()
          ->createQuery(
              'SELECT b, r FROM AppBundle:Booking b LEFT JOIN b.review r WHERE b.valid = true AND b.startdate <= CURRENT_DATE() ORDER BY b.enddate DESC'
          )
          ->setMaxResults(1)
          ->getSingleResult()
          ->getReview();
  }
}
