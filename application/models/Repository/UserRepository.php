<?php

/**
 * SmartCMS.
 *
 * A full featured CMS software to quickly get started with a new PHP project.
 *
 * @author	Manish Jangir <mjangir70@gmail.com>
 * @copyright	Copyright (c) 2016, Manish Jangir (http://manishjangir.com/)
 *
 * @link	http://manishjangir.com
 * @since	Version 1.0.0
 * @filesource
 */

namespace Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * UserRepository Class.
 *
 * User Entity Doctrine Repository
 *
 * @category	Repository
 *
 * @author	Manish Jangir <manishjangir.com>
 */
class UserRepository extends EntityRepository
{
    /**
     * Get paged list.
     *
     * @param int $offset
     * @param int $limit
     * @param int $postParams
     * 
     * @return Paginator
     */
    public function getPagedList($offset = 0, $limit = 10, $postParams)
    {
        $em = $this->_em;
        $qb = $em->createQueryBuilder();

        $prepare = $qb->select('tbl')
                ->from('Entity\User', 'tbl')
                ->orderBy('tbl.id');

        $prepare->setMaxResults($limit)
                ->setFirstResult($offset);

        $query = $qb->getQuery();
        $paginator = new Paginator($query);

        return $paginator;
    }

    /**
     * Get Users Dropdown List.
     * 
     * @param array $postParams
     * @param array $queryParams
     * 
     * @return type
     */
    public function getDropdownList($postParams, $queryParams)
    {
        $em = $this->_em;
        $qb = $em->createQueryBuilder();

        $prepare = $qb->select('tbl.id')
                ->addSelect("CONCAT( CONCAT(tbl.firstName, ' '),  tbl.lastName) AS full_name")
                ->from('Entity\User', 'tbl');

        $searchIn = $qb->expr()->concat('tbl.firstName', $qb->expr()->concat($qb->expr()->literal(' '), 'tbl.lastName')
        );

        if (!empty($queryParams['q'])) {
            $qb->add('where', $qb->expr()->like($searchIn, ':keyword'))
                    ->setParameter('keyword', '%'.$queryParams['q'].'%');
        }

        return $qb->getQuery()->getArrayResult();
    }
}
