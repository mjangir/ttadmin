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
 * Home Class.
 *
 * Handles home page functionalities
 *
 * @category	Controller
 *
 * @author	Manish Jangir <manishjangir.com>
 */
class Home extends MY_GuestUserController
{
    /**
     * index action.
     * 
     * Home page default action
     */
    public function index()
    {
        return $this->load->view('layout/frontend', array(
            'content' => $this->load->view('frontend/home/index', array(), true),
        ));
    }
}
