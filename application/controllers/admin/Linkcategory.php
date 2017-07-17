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
 * Linkcategory Class.
 *
 * View Link Categories hard coded defined in the database. Categories can only
 * be added or updated from database directly.
 *
 * @category	Controller
 *
 * @author	Manish Jangir <manishjangir.com>
 */
class Linkcategory extends MY_AdminController
{
    /**
     * Base URL of the controller.
     *
     * @var string Base url for all actions of this controller
     */
    protected $baseControllerUrl;

    /**
     * Module Name.
     *
     * @var string Name of the entity which the controller is for 
     */
    protected $crudName;

    /**
     * Doctrine entity name.
     *
     * @var string Main entity used for this class
     */
    protected $entityName;

    /**
     * Class constructor.
     * 
     * Calls parent class constructor and sets base url of the controller,
     * module name and doctrine entity name
     */
    public function __construct()
    {
        parent::__construct();

        //Set base url of the controller
        $this->baseControllerUrl = base_url('admin/links/link-categories');

        //Set module name
        $this->crudName = 'Link Category';

        //Set doctrine entity name
        $this->entityName = 'Entity\LinkCategory';
    }

    /**
     * index action.
     * 
     * Index page of Link Category module
     */
    public function index()
    {

        //Check if Link Category LISTING action is permitted
        checkMenuPermission('admin_manage_system_links_categories', 'LISTING', true);

        //Get link categories to list in data table
        $data = $this->objectManager->getRepository($this->entityName)->getPagedCategories($this->offset, $this->limit);

        //Set the paginator for listing
        $paginator = $this->paginator->setOptions($data, $this->page, $this->baseControllerUrl, $this->limit);

        //Prepare the view parameters
        $view_data = array();
        $view_data['data'] = $data;                            //Data got from model
        $view_data['page'] = $this->page;                      //Current page number
        $view_data['listStartFrom'] = $this->offset + 1;                  //Serial number of the table records
        $view_data['isAjaxRequest'] = $this->input->is_ajax_request();  //If request is ajax
        $view_data['pagination'] = $paginator->getPagination();      //Pagination for table

        //Set common view parameters for listing page
        $view_data['postData'] = $this->postParams;
        $view_data['addUrl'] = $this->baseControllerUrl.'/add-update';
        $view_data['updateUrl'] = $this->baseControllerUrl.'/add-update';
        $view_data['viewUrl'] = $this->baseControllerUrl.'/view';
        $view_data['deleteUrl'] = $this->baseControllerUrl.'/delete';
        $view_data['statusUrl'] = $this->baseControllerUrl.'/status';
        $view_data['listingUrl'] = $this->baseControllerUrl;

        //Check if the request is ajax. If yes then only render the view
        if ($this->input->is_ajax_request()) {
            $jsonResponse = array();
            $jsonResponse['html'] = $this->load->view('admin/linkcategory/index', $view_data, true);
            echo json_encode($jsonResponse);
        } else {

            //If request is not ajax then render the view with layout
            return $this->load->view('layout/backend', array(
                'content' => $this->load->view('admin/linkcategory/index', $view_data, true),
                'pageHeading' => 'Manage Link Categories',
                'pageSubHeading' => '',
                'activeLinksAlias' => array('admin_manage_system_links', 'admin_manage_system_links_categories'),
                'breadCrumbs' => array('Manage System Links' => '', 'Link Categories' => ''),
            ));
        }
    }
}
