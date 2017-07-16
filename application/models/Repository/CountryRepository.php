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
 * CountryRepository Class.
 *
 * Country Entity Doctrine Repository
 *
 * @category	Repository
 *
 * @author	Manish Jangir <manishjangir.com>
 */
class CountryRepository extends EntityRepository
{
    /**
     * Get Countries List.
     * 
     * @return object
     */
    public function getCountries()
    {
        $querybuilder = $this->_em
                ->getRepository($this->getEntityName())
                ->createQueryBuilder('c');

        return $querybuilder->select('c')
                        ->groupBy('c.countryName')
                        ->orderBy('c.countryName', 'ASC')
                        ->getQuery()->getResult();
    }

    /**
     * Get Dropdown list of countries.
     * 
     * @return array
     */
    public function getDropdownList()
    {
        $em = $this->_em;
        $qb = $em->createQueryBuilder();

        $prepare = $qb->select('tbl.id AS key', 'tbl.countryName AS value')
                ->from('Entity\Country', 'tbl')
                ->orderBy('tbl.countryName', 'ASC');

        return $qb->getQuery()->getArrayResult();
    }
}
