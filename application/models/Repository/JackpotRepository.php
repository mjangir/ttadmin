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
 * JackpotRepository Class.
 *
 * LinkCategory Entity Doctrine Repository
 *
 * @category	Repository
 *
 * @author	Manish Jangir <manishjangir.com>
 */
class JackpotRepository extends EntityRepository
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
                ->from('Entity\Jackpot', 'tbl')
                ->orderBy('tbl.id');

        $prepare->setMaxResults($limit)
                ->setFirstResult($offset);

        $query = $qb->getQuery();
        $paginator = new Paginator($query);

        return $paginator;
    }
}
