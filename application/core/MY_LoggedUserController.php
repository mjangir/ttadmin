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
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * MY_LoggedUserController Class.
 *
 * This class extends CI_Controller class to add some additional functionalities
 * to the application controllers
 *
 * @category	Controller
 *
 * @author	Manish Jangir <manishjangir.com>
 */
class MY_LoggedUserController extends CI_Controller
{
    /**
     * Doctrine Object Manager.
     *
     * @var object
     */
    protected $objectManager;

    /**
     * Current action.
     *
     * @var string
     */
    protected $action;

    /**
     * Current controller.
     *
     * @var string
     */
    protected $controller;

    /**
     * Class constructor.
     * 
     * Calls parent class constructor and sets common properties to all
     * controllers who are extending this class
     */
    public function __construct()
    {
        parent::__construct();

        //Doctrine entity manager
        $this->objectManager = $this->doctrine->em;

        //Current action of the controller
        $this->action = $this->router->fetch_method();

        //Current called controller name
        $this->controller = $this->router->fetch_class();

        //Redirect to login page if user is not logged in
        $loggedUserData = getLoggedUserData();
        if (empty($loggedUserData['id'])) {
            redirect('auth/login');
        }
        else if($loggedUserData['userGroupId'] == ADMIN_GROUP_ID && $this->controller != 'settings')
        {
            redirect('/admin');
        }

        //Set current logged user ID
        $this->loggedUserId = $loggedUserData['id'];

        //Set current logged user doctrine object
        $this->loggedUserObject = $this->objectManager->getRepository('Entity\User')->find($this->loggedUserId);

        //Set global vars to layout file
        $links = getNavigationMenus();
        $this->load->vars(array(
            'settings' => getSettings(),
            'loggedUser' => getLoggedUserData(),
            'mainNavLinks' => !empty($links['frontend_main_navigation_links']) ? $links['frontend_main_navigation_links'] : array(),
            'footerLinks' => !empty($links['frontend_footer_links']) ? $links['frontend_footer_links'] : array(),
            'sidebarLinks' => !empty($links['frontend_logged_user_sidebar_links']) ? $links['frontend_logged_user_sidebar_links'] : array(),
        ));

        //Clear cache on each request
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
    }
}
