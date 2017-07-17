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
 * MY_AdminController Class.
 *
 * This class extends CI_Controller class to add some additional functionalities
 * to the application controllers
 *
 * @category	Controller
 *
 * @author	Manish Jangir <manishjangir.com>
 */
class MY_AdminController extends CI_Controller
{
    /**
     * Doctrine Object Manager.
     *
     * @var object
     */
    protected $objectManager;

    /**
     * Query string parameters returned by GET request.
     * 
     * @var array
     */
    protected $queryParams;

    /**
     * Query string parameters returned by POST request.
     * 
     * @var array
     */
    protected $postParams;

    /**
     * Page number which is being shown currently.
     *
     * @var int
     */
    protected $page;

    /**
     * Current offset of pagination.
     *
     * @var int
     */
    protected $offset;

    /**
     * Number of records to be shown in the listing table.
     *
     * @var int
     */
    protected $limit;

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
     * User ID of currently logged user.
     *
     * @var int
     */
    protected $loggedUserId;

    /**
     * Doctrine User object of currently logged user.
     *
     * @var object
     */
    protected $loggedUserObject;

    /**
     * Session key to store the search form states through out the application.
     *
     * @var string
     */
    protected $sessionKey;

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
        if (empty($loggedUserData['id']) || $loggedUserData['roleId'] != ADMIN_ROLE_ID) {
            redirect('auth/login');
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
            'sidebarLinks' => !empty($links['backend_sidebar_links']) ? $links['backend_sidebar_links'] : array(),
        ));

        //Create search form session storage key
        $role = $this->uri->segment(1);
        $segmentPrefix = $this->uri->segment(2);

        $postData = $this->input->post();
        $getData = $this->input->get();
        $sessionKey = strtolower($role.'_'.$segmentPrefix.'_'.$this->controller.'_'.$this->action.'_sess');
        $this->sessionKey = $sessionKey;

        //The following piece of code does a special thing. Generally in ajax based pages, when a user searches
        //for anything and refreshes the page, all the searched data gets lost. We prevent this thing here.
        //When a user submits search form, we store all the post and get data in a session key and retain the
        //previous search query on page refresh until the user does not press Reset Search button.
        $previousPost = array();
        $previousGet = array();
        $previousPage = null;
        $sessKey = $this->session->userdata($sessionKey);
        if (!empty($sessKey)) {
            $previousPost = $this->session->userdata($sessionKey)['post'];
            $previousPage = $this->session->userdata($sessionKey)['page'];
        }

        $newPost = array_merge($previousPost, $postData);
        $newGet = array_merge($previousGet, $getData);
        if (!empty($getData['page']) && !empty($postData['bjaction']) && ($postData['bjaction'] == 'reset-search' || $postData['bjaction'] == 'search')) {
            $newPage = 1;
        } else {
            $newPage = (!empty($getData['page'])) ? $getData['page'] : 1;
        }

        $container = array();
        $container['post'] = $newPost;
        $container['get'] = $newGet;
        $container['page'] = $newPage;
        $this->session->set_userdata($sessionKey, $container);

        $finalData = $this->session->userdata($sessionKey);
        $this->postParams = $finalData['post'];
        $this->queryParams = $finalData['get'];
        $this->page = $finalData['page'];
        $this->limit = 40;
        $this->offset = ($this->page == 0) ? 0 : ($this->page - 1) * $this->limit;

        //Clear the cache each time
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
    }
}
