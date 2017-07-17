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
 * Ajax Class.
 *
 * Hanlde ajax dropdowns and returns only json response
 *
 * @category	Controller
 *
 * @author	Manish Jangir <manishjangir.com>
 */
class Ajax extends MY_GuestUserController
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
     * links action.
     * 
     * Provides system links dropdown content
     * 
     * @return string Links json string
     */
    public function links()
    {
        header('Content-Type: application/json');

        if ($this->input->get('category')) {
            $data = getLinkDropdown(true, $this->input->get('category'));
            echo json_encode($data);
            exit;
        }
    }
}
