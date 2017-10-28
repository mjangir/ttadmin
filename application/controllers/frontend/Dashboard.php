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
 * Frontend user dashboard page actions after log into the system
 *
 * @category	Controller
 *
 * @author	Manish Jangir <manishjangir.com>
 */
class Dashboard extends MY_LoggedUserController
{
    /**
     * Class constructor.
     *
     * Calls parent class constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * index action.
     *
     * Index page of Dashboard module
     */
    public function index()
    {

        //Render index page
        return $this->load->view('layout/frontend_authenticated', [
            'content' => $this->load->view('frontend/dashboard/index', [], true),
        ]);
    }
}
