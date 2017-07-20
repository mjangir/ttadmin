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
 * Jackpotgame Class.
 *
 * @category	Controller
 * @author	Manish Jangir <manishjangir.com>
 */
class Jackpotgame extends MY_AdminController
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
        $this->baseControllerUrl = base_url('admin/jackpot-game');

        //Set module name
        $this->crudName = 'Jackpot Game';

        //Set doctrine entity name
        $this->entityName = 'Entity\JackpotGame';
    }

    public function index()
    {
    }

    /**
     * jackpot game users action.
     *
     * Get all users on a jackpot game
     */
    public function users()
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
        $jackpotGame = $this->objectManager->getRepository($this->entityName)->find($jackpotGameId);

        if(!$jackpotGame)
        {
            $this->session->set_flashdata('messages', array('error@#@No Jackpot Game Found'));
            redirect('admin/jackpots');
        }
        $view_data = array(
            'users' => $jackpotGame->getUsers(),
            'game'  => $jackpotGame
        );

        return $this->load->view('layout/backend', array(
            'content'           => $this->load->view('admin/jackpotgame/users', $view_data, true),
            'pageHeading'       => 'Jackpot Game Users',
            'pageSubHeading'    => '',
            'activeLinksAlias'  => array('admin_jackpots'),
            'breadCrumbs'       => array('Jackpot Game Users' => ''),
        ));

    }
}


