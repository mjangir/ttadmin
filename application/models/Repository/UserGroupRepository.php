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
 * UserGroupRepository Class.
 *
 * UserGroup Entity Doctrine Repository
 *
 * @category	Repository
 *
 * @author	Manish Jangir <manishjangir.com>
 */
class UserGroupRepository extends EntityRepository
{
    /**
     * Get User Groups.
     * 
     * @return object
     */
    public function getUserGroups()
    {
        $querybuilder = $this->_em
                ->getRepository($this->getEntityName())
                ->createQueryBuilder('g');

        return $querybuilder->select('g')
                        ->getQuery()->getResult();
    }

    /**
     * Get User Groups With Their Roles.
     * 
     * @return object
     */
    public function getUserGroupsWithRole()
    {
        $querybuilder = $this->_em->createQueryBuilder();
        $querybuilder->select(array('ug.id', 'ug.alias', 'ug.description', 'CONCAT(ug.groupName,\' - \',r.role) AS groupName'))
                ->from('Application\Entity\UserGroup', 'ug')
                ->innerJoin('ug.role', 'r');

        return $querybuilder->getQuery()->getResult(\Doctrine\ORM\AbstractQuery::HYDRATE_ARRAY);
    }

    /**
     * Get User Groups List.
     * 
     * @return object
     */
    public function getUserGroupsList()
    {
        $querybuilder = $this->_em->createQueryBuilder();
        $querybuilder->select(array('ug.id', 'ug.groupName'))
                ->from('Application\Entity\UserGroup', 'ug')
                ->orderBy('ug.groupName', 'ASC');

        return $querybuilder->getQuery()->getResult(\Doctrine\ORM\AbstractQuery::HYDRATE_ARRAY);
    }

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
                ->from('Entity\UserGroup', 'tbl')
                ->orderBy('tbl.id');

        $prepare->setMaxResults($limit)
                ->setFirstResult($offset);

        $query = $qb->getQuery();
        $paginator = new Paginator($query);

        return $paginator;
    }
}
