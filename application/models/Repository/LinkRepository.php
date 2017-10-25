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
 * LinkRepository Class.
 *
 * Link Entity Doctrine Repository
 *
 * @category	Repository
 *
 * @author	Manish Jangir <manishjangir.com>
 */
class LinkRepository extends EntityRepository
{
    /**
     * Get dropdown list.
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
     * Get links by user group.
     *
     * @param int $userGroupId
     * @param int $roleId
     *
     * @return object
     */
    public function getLinksByGroupId($userGroupId, $roleId)
    {
        $querybuilder = $this->_em->createQueryBuilder();

        $querybuilder->select(['l.id', 'l.name', 'l.alias', 'l.parentId', 'l.href', 'l.actions', 'lp.permissions', 'lc.name as categoryName', 'lc.alias as categoryAlias'])
                ->from('Entity\Link', 'l')
                ->innerJoin('l.linkCategory', 'lc')
                ->leftJoin('Entity\LinkPermission', 'lp', 'WITH', 'lp.link = l AND lp.group = :userGroupId')
                ->where('lc.role = :roleId')
                ->setParameter('userGroupId', $userGroupId)
                ->setParameter('roleId', $roleId)
                ->orderBy('l.linkOrder', 'ASC');

        return $querybuilder->getQuery()->getResult(\Doctrine\ORM\AbstractQuery::HYDRATE_ARRAY);
    }

    public function getMenus($userGroupId)
    {
        $querybuilder = $this->_em->createQueryBuilder();

        $querybuilder->select('lp')
                ->from('Entity\LinkPermission', 'lp')
                ->innerJoin('Entity\Link', 'l', 'WITH', 'lp.link = l')
                ->innerJoin('l.linkCategory', 'lc')
                ->where('lp.group IN (:userGroupIds)')
                ->setParameter('userGroupIds', $userGroupId)
                ->orderBy('l.linkOrder', 'ASC');

        return $querybuilder->getQuery()->getResult();
    }

    /**
     * Get paged links.
     *
     * @param int   $offset
     * @param int   $limit
     * @param array $postParams
     *
     * @return Paginator
     */
    public function getPagedLinks($offset, $limit, $postParams)
    {
        $em = $this->_em;
        $qb = $em->createQueryBuilder();

        $prepare = $qb->select('l')
                ->from('Entity\Link', 'l')
                ->orderBy('l.id');

        if (!empty($postParams['linkCategory'])) {
            $prepare->andWhere('l.linkCategory = :linkCategoryId')
                    ->setParameter('linkCategoryId', $postParams['linkCategory']);
        }
        if (!empty($postParams['parentId'])) {
            $prepare->andWhere('l.parentId = :parentId')
                    ->setParameter('parentId', $postParams['parentId']);
        }
        if (!empty($postParams['name'])) {
            $prepare->andWhere('l.name LIKE :name')
                    ->setParameter('name', '%'.$postParams['name'].'%');
        }
        if (!empty($postParams['alias'])) {
            $prepare->andWhere('l.alias LIKE :alias')
                    ->setParameter('alias', '%'.$postParams['alias'].'%');
        }
        $prepare->setMaxResults($limit)
                ->setFirstResult($offset);

        $query = $qb->getQuery();
        $paginator = new Paginator($query);

        return $paginator;
    }
}
