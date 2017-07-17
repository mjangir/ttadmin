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
 * Dashboard Class.
 *
 * Handles backend dashboard functionalities
 *
 * @category	Controller
 *
 * @author	Manish Jangir <manishjangir.com>
 */
class Dashboard extends MY_AdminController
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
     * Calls parent class constructor and sets base url of the controller
     */
    public function __construct()
    {
        parent::__construct();
        //Set base url of the controller
        $this->baseControllerUrl = base_url('admin/dashboard');
    }

    /**
     * index action.
     * 
     * Handles dashboard index page
     */
    public function index()
    {
        $view_data = array();

        return $this->load->view('layout/backend', array(
            'content' => $this->load->view('admin/dashboard/index', $view_data, true),
            'pageHeading' => 'Dashboard',
            'pageSubHeading' => '',
            'activeLinksAlias' => array('admin_dashboard'),
            'breadCrumbs' => array('Dashboard' => ''),
        ));
    }
}
