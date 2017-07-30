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
class Demo extends MY_GuestUserController
{
    /**
     * index action.
     * 
     * Home page default action
     */
    public function index()
    {
        $userId = 1;

        if($this->input->get('user'))
        {
            $userId = $this->input->get('user');
        }
        return $this->load->view('layout/demo', array(
            'content' => $this->load->view('frontend/demo/index', array('userId' => $userId), true),
        ));
    }
}
