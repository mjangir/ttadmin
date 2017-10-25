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
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Paginator Class.
 *
 * Super pagination class written for paginating records
 *
 * @category	Library
 *
 * @author	Manish Jangir <manishjangir.com>
 */
class Paginator
{
    /**
     * Records to show per page.
     *
     * @var int
     */
    private $resultsPerPage;

    /**
     * Total number of records.
     *
     * @var int
     */
    private $totalResults;

    /**
     * Result data.
     *
     * @var object
     */
    private $results;

    /**
     * Base URL of paginated data.
     *
     * @var string
     */
    private $baseUrl;

    /**
     * Main pagination list.
     *
     * @var string
     */
    private $paging;

    /**
     * Page number.
     *
     * @var int
     */
    private $page;

    /**
     * Pagination adjacents.
     *
     * @var int
     */
    private $adjacents;

    /**
     * Show only previous and next links.
     *
     * @var bool
     */
    private $onlyPrevNext;

    /**
     * CSS class applied to link.
     *
     * @var string
     */
    private $linkClass;

    /**
     * Total number of pages.
     *
     * @var int
     */
    private $totalPages;

    /**
     * Previous page label.
     *
     * @var string
     */
    public $prevLabel = '&larr;Previous';

    /**
     * Next page label.
     *
     * @var string
     */
    public $nextLabel = 'Next&rarr;';

    /**
     * Class constructor.
     */
    public function __construct()
    {
    }

    /**
     * Set paginator options.
     *
     * @param object $pagedResults
     * @param int    $page
     * @param string $baseUrl
     * @param int    $resultsPerPage
     * @param int    $adjacents
     * @param bool   $isAjax
     * @param bool   $onlyPrevNext
     *
     * @return \Paginator
     */
    public function setOptions($pagedResults, $page, $baseUrl, $resultsPerPage = 10, $adjacents = 3, $isAjax = true, $onlyPrevNext = false)
    {
        $this->resultsPerPage = $resultsPerPage;
        $this->totalResults = $pagedResults->count();
        $this->results = $pagedResults;
        $this->baseUrl = $baseUrl;
        $this->page = $page;
        $this->adjacents = $adjacents;
        $this->onlyPrevNext = $onlyPrevNext;
        $this->linkClass = ($isAjax) ? 'ajax' : '';
        $this->totalPages = ceil($this->totalResults / $this->resultsPerPage);

        return $this;
    }

    /**
     * Get pagination links.
     *
     * @return string
     */
    public function getPagination()
    {
        return $this->generatePaging();
    }

    /**
     * Get total records.
     *
     * @return int
     */
    public function getTotalRecords()
    {
        return $this->totalResults;
    }

    /**
     * Get page number.
     *
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Get total number of pages.
     *
     * @return int
     */
    public function getTotalPages()
    {
        return $this->totalPages;
    }

    /**
     * Generate pagination links.
     *
     * @return string
     */
    private function generatePaging()
    {
        //Get total page count
        $pages = ceil($this->totalResults / $this->resultsPerPage);

        //Don't show pagination if there's only one page
        if ($pages == 1) {
            //return;
        }

        if (strpos($this->baseUrl, '?')) {
            $this->baseUrl = $this->baseUrl.'&';
        } else {
            $this->baseUrl = $this->baseUrl.'?';
        }
        if (!$this->onlyPrevNext) {
            //Handle First and previous page
            if ($this->page == 1) {
                $this->paging .= '<li class="disabled"><a href="javascript:void(0);">&laquo;</a></li>';
                $this->paging .= '<li class="disabled"><a href="#fakelink">&lsaquo;</a></li>';
            } else {
                $this->paging .= '<li><a href="'.$this->baseUrl.'page=1" class="'.$this->linkClass.'" data-replace=".paginated_tbl">&laquo;</a></li>';
                $this->paging .= '<li><a href="'.$this->baseUrl.'page='.($this->page - 1).'" class="'.$this->linkClass.'" data-replace=".paginated_tbl">&lsaquo;</a></li>';
            }

            //Print all pages from 1 to end
            $pmin = ($this->page > $this->adjacents) ? ($this->page - $this->adjacents) : 1;
            $pmax = ($this->page < ($pages - $this->adjacents)) ? ($this->page + $this->adjacents) : $pages;
            for ($i = $pmin; $i <= $pmax; ++$i) {
                if ($i == $this->page) {
                    $this->paging .= '<li class="active"><a href="javascript:void(0);">'.$i.'</a></li>';
                } elseif ($i == 1) {
                    $this->paging .= '<li><a href="'.$this->baseUrl.'page=1" class="'.$this->linkClass.'" data-replace=".paginated_tbl">1</a></li>';
                } else {
                    $this->paging .= '<li><a href="'.$this->baseUrl.'page='.$i.'" class="'.$this->linkClass.'" data-replace=".paginated_tbl">'.$i.'</a></li>';
                }
            }

            //Handle Last Pages
            if ($this->page == $pages) {
                $this->paging .= '<li class="disabled"><a href="javascript:void(0);">&rsaquo;</a></li>';
                $this->paging .= '<li class="disabled"><a href="#fakelink">&raquo;</a></li>';
            } elseif ($this->page != $pages) {
                $this->paging .= '<li><a href="'.$this->baseUrl.'page='.($this->page + 1).'" class="'.$this->linkClass.'" data-replace=".paginated_tbl">&rsaquo;</a></li>';
                $this->paging .= '<li><a href="'.$this->baseUrl.'?page='.$pages.'" class="'.$this->linkClass.'" data-replace=".paginated_tbl">&raquo;</a></li>';
            }
        } else {
            //$this->paging = '<div class="col-md-12 col-sm-12 col-xs-12">';

            if ($this->page == 1) {
                $this->paging .= '<li class="disabled previous"><a href="#fakelink">'.$this->prevLabel.'</a></li>';
            } else {
                $this->paging .= '<li class="previous"><a href="'.$this->baseUrl.'page='.($this->page - 1).'" class="'.$this->linkClass.'" data-replace=".paginated_tbl">'.$this->prevLabel.'</a></li>';
            }

            if ($this->page == $pages) {
                $this->paging .= '<li class="disabled next"><a href="javascript:void(0);">'.$this->nextLabel.'</a></li>';
            } elseif ($this->page != $pages) {
                $this->paging .= '<li class="next"><a href="'.$this->baseUrl.'page='.($this->page + 1).'" class="'.$this->linkClass.'" data-replace=".paginated_tbl">'.$this->nextLabel.'</a></li>';
            }

            //$this->paging .= '</div>';
        }

        return $this->paging;
    }
}
