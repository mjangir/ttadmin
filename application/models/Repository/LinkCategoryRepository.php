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
 * LinkCategoryRepository Class.
 *
 * LinkCategory Entity Doctrine Repository
 *
 * @category	Repository
 *
 * @author	Manish Jangir <manishjangir.com>
 */
class LinkCategoryRepository extends EntityRepository
{
    /**
     * Get link categories list.
     * 
     * @return object
     */
    public function getList()
    {
        $querybuilder = $this->_em
                ->getRepository($this->getEntityName())
                ->createQueryBuilder('tbl');

        return $querybuilder->select('tbl')
                        ->groupBy('tbl.name')
                        ->orderBy('tbl.id', 'ASC')
                        ->getQuery()->getResult();
    }

    /**
     * Get link categories.
     * 
     * @return object
     */
    public function getCategories()
    {
        $querybuilder = $this->_em
                ->getRepository($this->getEntityName())
                ->createQueryBuilder('l');

        return $querybuilder->select('l')
                        ->getQuery()->getResult();
    }

    /**
     * Get paged link categories.
     * 
     * @param int $offset
     * @param int $limit
     * 
     * @return Paginator
     */
    public function getPagedCategories($offset = 0, $limit = 10)
    {
        $em = $this->_em;
        $qb = $em->createQueryBuilder();

        $qb->select('c')
                ->from('Entity\LinkCategory', 'c')
                ->orderBy('c.id')
                ->setMaxResults($limit)
                ->setFirstResult($offset);
        $query = $qb->getQuery();
        $paginator = new Paginator($query);

        return $paginator;
    }
}
