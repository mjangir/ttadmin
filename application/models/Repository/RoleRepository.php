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

/**
 * RoleRepository Class.
 *
 * Role Entity Doctrine Repository
 *
 * @category	Repository
 *
 * @author	Manish Jangir <manishjangir.com>
 */
class RoleRepository extends EntityRepository
{
    /**
     * Get User Roles.
     *
     * @return object
     */
    public function getRoles()
    {
        $querybuilder = $this->_em
                ->getRepository($this->getEntityName())
                ->createQueryBuilder('r');

        return $querybuilder->select('r')
                        ->groupBy('r.role')
                        ->orderBy('r.id', 'ASC')
                        ->getQuery()->getResult();
    }

    /**
     * Get User Roles Dropdown List.
     *
     * @return object
     */
    public function getRolesList()
    {
        $querybuilder = $this->_em->createQueryBuilder();
        $querybuilder->select(['r.id', 'r.role'])
                ->from('Entity\Role', 'r')
                ->orderBy('r.role', 'ASC');

        return $querybuilder->getQuery()->getResult(\Doctrine\ORM\AbstractQuery::HYDRATE_ARRAY);
    }
}
