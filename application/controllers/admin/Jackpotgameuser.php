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

use GuzzleHttp\Client;

/**
 * Jackpotgameuser Class.
 *
 * @category	Controller
 * @author	Manish Jangir <manishjangir.com>
 */
class Jackpotgameuser extends MY_AdminController
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
        $this->baseControllerUrl = base_url('admin/jackpot-game-users');

        //Set module name
        $this->crudName = 'Jackpot Game';

        //Set doctrine entity name
        $this->entityName = 'Entity\JackpotGame';
    }

    public function index()
    {
        //Check if Jackpot LISTING action is permitted
        checkMenuPermission('admin_jackpots', 'VIEW_JACKPOT_GAME_USERS', true);

        //Get the record ID from get request
        $jackpotGameId = (!empty($this->queryParams['id'])) ? $this->queryParams['id'] : null;

        if(empty($jackpotGameId))
        {
            redirect('admin/jackpots');
        }

        //Get jackpots to list in data table
        $jackpotGame                        = $this->objectManager->getRepository($this->entityName)->find($jackpotGameId);

        if(!$jackpotGame)
        {
            $this->session->set_flashdata('messages', array('error@#@No Jackpot Game Found'));
            redirect('admin/jackpots');
        }
        $this->postParams['jackpotGame']    = $jackpotGame;
        $users      = $this->objectManager->getRepository('Entity\Jackpot')->getJackpotUsersList($this->offset, $this->limit, $this->postParams);
        $paginator  = $this->paginator->setOptions($users, $this->page, $this->baseControllerUrl.'?id='.$jackpotGameId, $this->limit);

        $view_data = array();
        $view_data['game'] = $jackpotGame;
        $view_data['data'] = $users;                            //Data got from model
        $view_data['page'] = $this->page;                      //Current jackpot number
        $view_data['listStartFrom'] = $this->offset + 1;                  //Serial number of the table records
        $view_data['isAjaxRequest'] = $this->input->is_ajax_request();  //If request is ajax
        $view_data['pagination'] = $paginator->getPagination();      //Pagination for table

        //Check if the request is ajax. If yes then only render the view
        if ($this->input->is_ajax_request()) {
            $jsonResponse = array();
            $jsonResponse['html'] = $this->load->view('admin/jackpotgame/users', $view_data, true);
            echo json_encode($jsonResponse);
        } else {

            //If request is not ajax then render the view with layout
            return $this->load->view('layout/backend', array(
                'content' => $this->load->view('admin/jackpotgame/users', $view_data, true),
                'pageHeading' => 'Jackpot Game Users',
                'pageSubHeading' => '',
                'activeLinksAlias' => array('admin_jackpots'),
                'breadCrumbs' => array('Jackpot Game Users' => ''),
            ));
        }
    }
}


