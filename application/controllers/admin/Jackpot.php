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
 * Jackpot Class.
 *
 * @category	Controller
 * @author	Manish Jangir <manishjangir.com>
 */
class Jackpot extends MY_AdminController
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
        $this->baseControllerUrl = base_url('admin/jackpots');

        //Set module name
        $this->crudName = 'Jackpot';

        //Set doctrine entity name
        $this->entityName = 'Entity\Jackpot';
    }

    /**
     * index action.
     *
     * Index jackpot of Jackpot module
     */
    public function index()
    {

        //Check if Jackpot LISTING action is permitted
        checkMenuPermission('admin_jackpots', 'LISTING', true);

        //Get jackpots to list in data table
        $data = $this->objectManager->getRepository($this->entityName)->getPagedList($this->offset, $this->limit, $this->postParams);

        //Set the paginator for listing
        $paginator = $this->paginator->setOptions($data, $this->page, $this->baseControllerUrl, $this->limit);

        //Prepare the view parameters
        $view_data = array();
        $view_data['data'] = $data;                            //Data got from model
        $view_data['page'] = $this->page;                      //Current jackpot number
        $view_data['listStartFrom'] = $this->offset + 1;                  //Serial number of the table records
        $view_data['isAjaxRequest'] = $this->input->is_ajax_request();  //If request is ajax
        $view_data['pagination'] = $paginator->getPagination();      //Pagination for table

        //Set common view parameters for listing jackpot
        $view_data['postData'] = $this->postParams;
        $view_data['addUrl'] = $this->baseControllerUrl.'/add-update';
        $view_data['updateUrl'] = $this->baseControllerUrl.'/add-update';
        $view_data['viewUrl'] = $this->baseControllerUrl.'/view';
        $view_data['gameHistoryUrl'] = $this->baseControllerUrl.'/game-history';
        $view_data['deleteUrl'] = $this->baseControllerUrl.'/delete';
        $view_data['statusUrl'] = $this->baseControllerUrl.'/status';
        $view_data['listingUrl'] = $this->baseControllerUrl;
        $view_data['normalBidBattleUrl'] = $this->baseControllerUrl.'/normal-bid-battle';
        $view_data['gamblingBidBattleUrl'] = $this->baseControllerUrl.'/gambling-bid-battle';

        //Check if the request is ajax. If yes then only render the view
        if ($this->input->is_ajax_request()) {
            $jsonResponse = array();
            $jsonResponse['html'] = $this->load->view('admin/jackpot/index', $view_data, true);
            echo json_encode($jsonResponse);
        } else {

            //If request is not ajax then render the view with layout
            return $this->load->view('layout/backend', array(
                'content' => $this->load->view('admin/jackpot/index', $view_data, true),
                'pageHeading' => 'Manage Jackpots',
                'pageSubHeading' => '',
                'activeLinksAlias' => array('admin_jackpots'),
                'breadCrumbs' => array('Manage Jackpots' => ''),
            ));
        }
    }

    /**
     * addupdate action.
     *
     * The common action to add or update a record for this controller. In case of update record,
     * the ID of record will be provide. It will render the form only if the request to this action
     * is not POST.
     */
    public function addupdate()
    {

        //Get jackpot id from GET requeest
        $id = (!empty($this->queryParams['id'])) ? $this->queryParams['id'] : null;

        //Check if Jackpot UPDATE or ADD action is permitted
        if (!empty($id)) {
            checkMenuPermission('admin_jackpots', 'UPDATE', true);
        } else {
            checkMenuPermission('admin_jackpots', 'ADD', true);
        }

        //Check if request is POST. If yes then proceed with add or update
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            //If data is posted then return json response only
            header('Content-Type: application/json');

            //Set form validation rules
            $this->form_validation->set_rules('title', 'Jackpot Title', 'trim|required|xss_clean',
                    array('required' => 'Please enter Jackpot Title'));
            $this->form_validation->set_rules('amount', 'Jackpot Amount', 'trim|required|xss_clean',
                    array('required' => 'Please enter Jackpot Amount'));
            $this->form_validation->set_rules('game_clock_time', 'Game Clock Time', 'trim|required|xss_clean',
                    array('required' => 'Please enter Game Clock Time'));
            $this->form_validation->set_rules('dooms_day_time', 'Dooms Day Clock Time', 'trim|required|xss_clean',
                    array('required' => 'Please enter Dooms Day Clock Time'));

            //If form is successfully validated
            if ($this->form_validation->run() == true) {
                try {
                    //If new jackpot is created
                    if ($id === null) {
                        $jackpot = new Entity\Jackpot();
                        $jackpot->setUniqueId(generateRandomString(20));
                        $jackpot->setCreatedBy($this->loggedUserObject);
                        $jackpot->setUpdatedBy($this->loggedUserObject);
                        $jackpot->setCreatedAt(new \DateTime());
                        $jackpot->setUpdatedAt(new \DateTime());
                        $jackpot->setGameStatus('NOT_STARTED');
                        $jackpot->setStatus('ACTIVE');
                    } else {
                        //If existing jackpot is updated
                        $jackpot = $this->objectManager->getRepository($this->entityName)->find($id);
                        $jackpot->setUpdatedAt(new \DateTime());
                        $jackpot->setUpdatedBy($this->loggedUserObject);
                    }

                    //Set Jackpot object properties
                    $jackpot->setTitle($this->postParams['title']);
                    $jackpot->setAmount($this->postParams['amount']);
                    $jackpot->setGameClockTime(convertTimeFormatToSeconds($this->postParams['game_clock_time']));
                    $jackpot->setDoomsDayTime(convertTimeFormatToSeconds($this->postParams['dooms_day_time']));
                    $jackpot->setGameClockRemaining(convertTimeFormatToSeconds($this->postParams['game_clock_time']));
                    $jackpot->setDoomsDayRemaining(convertTimeFormatToSeconds($this->postParams['dooms_day_time']));
                    $jackpot->setMinPlayersRequired($this->postParams['min_players_required']);
                    $jackpot->setDurationSetting($this->prepareDurationSetting($this->postParams));

                    //Persist and flush the object
                    $this->objectManager->persist($jackpot);
                    $this->objectManager->flush($jackpot);

                    // Copy default normal bid battle levels from settings (only for add new)
                    if ($id === null) {
                        $this->copyNormalBidBattleLevelsFromSettings($jackpot);
                    }

                    // Update in socket state
                    $client         = new Client();
                    $newJpId        = ($id == null) ? $jackpot->getId() : $id;
                    $accessToken    = $this->session->userdata('accessToken');

                    if($id == null)
                    {
                        $result = $client->post(API_BASE_PATH.'/api/jackpots/insert-in-socket/'.$newJpId.'?access_token='.$accessToken);
                    }
                    else
                    {
                        $result = $client->post(API_BASE_PATH.'/api/jackpots/update-in-socket/'.$newJpId.'?access_token='.$accessToken);
                    }

                    $response = json_decode($result->getBody()->getContents(), true);

                    if(isset($response['status']) && $response['status'] == 'success')
                    {
                        $additionalMessage = 'Also updated in socket state.';
                    }
                    else
                    {
                        $additionalMessage = 'But '.$response['message'];
                    }

                    //Return success if added successfully
                    echo json_encode(array(
                        'html' => '',
                        'notification' => array(
                            array(
                                'status' => 'success',
                                'message' => $this->crudName.' saved successfully <br/>'.$additionalMessage,
                                'type' => 'toastr',
                            ),
                        ),
                        'location' => array(
                            'redirect' => array(
                                'url' => $this->baseControllerUrl,
                                'timeout' => 2000,
                            ),
                        ),
                    ));
                    exit;
                } catch (Exception $ex) {
                    die($ex->getMessage());
                    //show error message to user
                    echo json_encode(array(
                        'html' => '',
                        'notification' => array(
                            array(
                                'status' => 'error',
                                'message' => 'Error occured while processing.',
                                'type' => 'toastr',
                            ),
                        ),
                    ));
                    exit;
                }
            } else {
                //Throw the validation errors, if validation not successful
                $errors = $this->form_validation->error_array();
                echo json_encode(array(
                    'validation' => array(
                        'form' => '#form_jackpot',
                        'errors' => $errors,
                    ),
                ));
                exit;
            }
        } else {
            //If request method is not post then render the form with layout

            //Set view form attributes and variables
            $view_data['form']['attributes'] = array(
                'id' => 'form_jackpot',
            );
            $view_data['form']['action']    = ($id === null) ? $this->baseControllerUrl.'/add-update' : $this->baseControllerUrl.'/add-update?id='.$id;
            $view_data['form']['cancelUrl'] = $this->baseControllerUrl;
            $view_data['form']['viewUrl']   = $this->baseControllerUrl.'/view?id='.$id;

            //Set other view parameters if new record is added
            if ($id === null) {
                $viewFile = 'admin/jackpot/add';
                $view_data['pageHeading'] = 'Add Jackpot';
            } else {
                //Set other view parameters if a record is updated
                $view_data['jackpot'] = $this->objectManager->getRepository($this->entityName)->find($id);
                $viewFile = 'admin/jackpot/update';
                $view_data['pageHeading'] = 'Update Jackpot';
            }

            //Return the layout with view form
            return $this->load->view('layout/backend', array(
                'content'           => $this->load->view($viewFile, $view_data, true),
                'pageHeading'    => $view_data['pageHeading'],
                'pageSubHeading' => '',
                'activeLinksAlias'  => array('admin_jackpots'),
                'breadCrumbs'       => array('Manage Jackpots' => $this->baseControllerUrl, $view_data['pageHeading'] => ''),
            ));
        }
    }

    public function prepareDurationSetting($post)
    {
        if(isset($post['duration_setting']))
        {
            return json_encode($post['duration_setting']);
        }
        return json_encode([]);
    }

    /**
     * add update normal bid battles
     */
    public function normalbidbattle()
    {

        //Get jackpot id from GET requeest
        $id = (!empty($this->queryParams['id'])) ? $this->queryParams['id'] : null;

        if($id == null)
        {
        	redirect($this->baseControllerUrl);
        }

        checkMenuPermission('admin_jackpots', 'NORMAL_BID_BATTLE', true);

        // If game is currently running, we dont allow to upate levels
        if(!$this->input->is_ajax_request() && $this->checkIfGameIsRunning($id, true))
        {
            $this->session->set_flashdata('messages', array('error@#@You cannot modify the battle levels because a jackpot game is currently being played'));
            redirect(base_url('admin/jackpots'));
        }

        $jackpot = $this->objectManager->getRepository($this->entityName)->find($id);

        //Check if request is POST. If yes then proceed with add or update
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            //If data is posted then return json response only
            header('Content-Type: application/json');

            //If form is successfully validated
            try {

                if($this->input->is_ajax_request() && $this->checkIfGameIsRunning($id, true))
                {
                    echo json_encode(array(
                        'html' => '',
                        'notification' => array(
                            array(
                                'status' => 'error',
                                'message' => 'You cannot update battle levels as the game is already running',
                                'type' => 'toastr',
                            ),
                        ),
                    ));
                    exit;
                }

                $this->updateNormalBidBattleLevels($jackpot, $this->postParams);

                try{

                    // Update in socket state
                    $client         = new Client();
                    $newJpId        = $jackpot->getId();
                    $accessToken    = $this->session->userdata('accessToken');
                    $result         = $client->post(API_BASE_PATH.'/api/jackpots/update-battle-in-socket/'.$newJpId.'?access_token='.$accessToken);

                    $response = json_decode($result->getBody()->getContents(), true);

                }catch(Exception $e)
                {

                }


                //Return success if added successfully
                echo json_encode(array(
                    'html' => '',
                    'notification' => array(
                        array(
                            'status' => 'success',
                            'message' => ' Battle levels saved successfully',
                            'type' => 'toastr',
                        ),
                    ),
                    'location' => array(
                        'redirect' => array(
                            'url' => $this->baseControllerUrl.'/normal-bid-battle?id='.$id,
                            'timeout' => 2000,
                        ),
                    ),
                ));
                exit;
            } catch (Exception $ex) {
                //die($ex->getMessage());
                //show error message to user
                echo json_encode(array(
                    'html' => '',
                    'notification' => array(
                        array(
                            'status' => 'error',
                            'message' => 'Error occured while processing.',
                            'type' => 'toastr',
                        ),
                    ),
                ));
                exit;
            }
        } else {
            //If request method is not post then render the form with layout

            //Set view form attributes and variables
            $view_data['form']['attributes'] = array(
                'id' => 'form_normal_battle_levels',
            );
            $view_data['form']['action']    = $this->baseControllerUrl.'/normal-bid-battle?id='.$id;
            $view_data['form']['cancelUrl'] = $this->baseControllerUrl;

           	//Set other view parameters if a record is updated
           	$view_data['jackpot'] 		= $jackpot;
            $view_data['levels'] 		= $this->getBattleLevels($jackpot);
            $viewFile 					= 'admin/jackpot/normal-bid-battle';
            $view_data['pageHeading'] 	= 'Manage Normal Bid Battle';

            //Return the layout with view form
            return $this->load->view('layout/backend', array(
                'content'           => $this->load->view($viewFile, $view_data, true),
                'pageHeading'    => $view_data['pageHeading'],
                'pageSubHeading' => '',
                'activeLinksAlias'  => array('admin_jackpots'),
                'breadCrumbs'       => array('Manage Jackpots' => $this->baseControllerUrl, $view_data['pageHeading'] => ''),
            ));
        }
    }

    /**
     * Update normal battle levels
     * @param type $model
     * @param type $params
     */
    public function updateNormalBidBattleLevels($model, $params)
    {
        $oldRecords = $this->objectManager->getRepository('Entity\JackpotBattleLevel')->findBy( array( 'jackpot' => $model ) );
        $createdAt  = new \DateTime();
        $updatedAt 	= new \DateTime();

        if($oldRecords) {
            foreach ($oldRecords as $record) {
                $this->objectManager->remove($record);
            }
        }

        if(isset($params['levels']) && !empty($params['levels'])) {
        	$i = 1;
        	$total = count($params['levels']);
            foreach($params['levels'] as $newRecord) {

                if(!empty($newRecord['level_name']) && !empty($newRecord['battle_type'])) {
                    $entity = new Entity\JackpotBattleLevel();
                    $entity->setJackpot($model);
                    $entity->setBattleType($newRecord['battle_type']);
                    $entity->setOrder($i);
                    $entity->setLevelName($newRecord['level_name']);
                    $entity->setDuration($newRecord['duration']);
                    $entity->setPrizeType($newRecord['prize_type']);
                    $entity->setPrizeValue($newRecord['prize_value']);
                    $entity->setDefaultAvailableBids($newRecord['default_bids']);
                    $entity->setLastBidWinnerPercent($newRecord['last_bid_winner_percent']);
                    $entity->setLongestBidWinnerPercent($newRecord['longest_bid_winner_percent']);
                    $entity->setMinPlayersRequiredToStart($newRecord['min_players_to_start']);
                    $entity->setMinWinsToUnlockNextLevel($newRecord['min_wins_to_unlock_next']);
                    $entity->setIncrementSeconds($newRecord['increment_seconds']);
                    $entity->setCreatedAt($createdAt);
                    $entity->setUpdatedAt($updatedAt);

                    if($i == $total)
                    {
                    	$entity->setIsLastLevel(1);
                    }
                    else
                    {
                    	$entity->setIsLastLevel(0);
                    }

                    $this->objectManager->persist($entity);

                    $i++;
                }
            }
        }
        $this->objectManager->flush();
        return $model;
    }

    /**
     * Copy Normal Bid Battle Levels From Settings

     * @param Jackpot $jackpot
     */
    public function copyNormalBidBattleLevelsFromSettings($jackpot)
    {
        $settingEntity = $this->objectManager->getRepository('Entity\Setting')->findOneBy(array('key' => 'normal_battle_levels_json'));

        //If key is not empty them update the new value
        if (!empty($settingEntity))
        {
            $levels = $settingEntity->getValue();

            $normalBattleLevels = isset($levels) && !empty($levels) ? json_decode($levels, true) : null;

            if($normalBattleLevels && is_array($normalBattleLevels) && count($normalBattleLevels) > 0)
            {
                $i          = 1;
                $total      = count($normalBattleLevels);
                $createdAt  = new \DateTime();
                $updatedAt  = new \DateTime();

                foreach($normalBattleLevels as $level)
                {
                    if(!empty($level['level_name']) && !empty($level['battle_type']))
                    {
                        $entity = new Entity\JackpotBattleLevel();
                        $entity->setJackpot($jackpot);
                        $entity->setBattleType($level['battle_type']);
                        $entity->setOrder($i);
                        $entity->setLevelName($level['level_name']);
                        $entity->setDuration($level['duration']);
                        $entity->setPrizeType($level['prize_type']);
                        $entity->setPrizeValue($level['prize_value']);
                        $entity->setDefaultAvailableBids($level['default_bids']);
                        $entity->setLastBidWinnerPercent($level['last_bid_winner_percent']);
                        $entity->setLongestBidWinnerPercent($level['longest_bid_winner_percent']);
                        $entity->setMinPlayersRequiredToStart($level['min_players_to_start']);
                        $entity->setMinWinsToUnlockNextLevel($level['min_wins_to_unlock_next']);
                        $entity->setIncrementSeconds($level['increment_seconds']);
                        $entity->setCreatedAt($createdAt);
                        $entity->setUpdatedAt($updatedAt);

                        if($i == $total)
                        {
                            $entity->setIsLastLevel(1);
                        }
                        else
                        {
                            $entity->setIsLastLevel(0);
                        }

                        $this->objectManager->persist($entity);

                        $i++;
                    }
                }

                $this->objectManager->flush();
                return true;
            }
        }

        return false;
    }

    /**
     * add update gambling bid battles
     */
    public function gamblingbidbattle()
    {

        //Get jackpot id from GET requeest
        $id = (!empty($this->queryParams['id'])) ? $this->queryParams['id'] : null;

        if($id == null)
        {
            redirect($this->baseControllerUrl);
        }

        checkMenuPermission('admin_jackpots', 'GAMBLING_BID_BATTLE', true);

        // If game is currently running, we dont allow to upate levels
        if(!$this->input->is_ajax_request() && $this->checkIfGameIsRunning($id, true))
        {
            $this->session->set_flashdata('messages', array('error@#@You cannot modify the battle levels because a jackpot game is currently being played'));
            redirect(base_url('admin/jackpots'));
        }

        $jackpot = $this->objectManager->getRepository($this->entityName)->find($id);

        //Check if request is POST. If yes then proceed with add or update
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            //If data is posted then return json response only
            header('Content-Type: application/json');

            //If form is successfully validated
            try {

                if($this->input->is_ajax_request() && $this->checkIfGameIsRunning($id, true))
                {
                    echo json_encode(array(
                        'html' => '',
                        'notification' => array(
                            array(
                                'status' => 'error',
                                'message' => 'You cannot update battle levels as the game is already running',
                                'type' => 'toastr',
                            ),
                        ),
                    ));
                    exit;
                }

                $this->updateGamblingBidBattleLevels($jackpot, $this->postParams);

                try{

                    // Update in socket state
                    $client         = new Client();
                    $newJpId        = $jackpot->getId();
                    $accessToken    = $this->session->userdata('accessToken');
                    $result         = $client->post(API_BASE_PATH.'/api/jackpots/update-battle-in-socket/'.$newJpId.'?access_token='.$accessToken);

                    $response = json_decode($result->getBody()->getContents(), true);

                }catch(Exception $e)
                {

                }


                //Return success if added successfully
                echo json_encode(array(
                    'html' => '',
                    'notification' => array(
                        array(
                            'status' => 'success',
                            'message' => ' Battle levels saved successfully',
                            'type' => 'toastr',
                        ),
                    ),
                    'location' => array(
                        'redirect' => array(
                            'url' => $this->baseControllerUrl.'/gambling-bid-battle?id='.$id,
                            'timeout' => 2000,
                        ),
                    ),
                ));
                exit;
            } catch (Exception $ex) {
                //die($ex->getMessage());
                //show error message to user
                echo json_encode(array(
                    'html' => '',
                    'notification' => array(
                        array(
                            'status' => 'error',
                            'message' => 'Error occured while processing.',
                            'type' => 'toastr',
                        ),
                    ),
                ));
                exit;
            }
        } else {
            //If request method is not post then render the form with layout

            //Set view form attributes and variables
            $view_data['form']['attributes'] = array(
                'id' => 'form_gambling_battle_levels',
            );
            $view_data['form']['action']    = $this->baseControllerUrl.'/gambling-bid-battle?id='.$id;
            $view_data['form']['cancelUrl'] = $this->baseControllerUrl;

            //Set other view parameters if a record is updated
            $view_data['jackpot']       = $jackpot;
            $view_data['levels']        = $this->getBattleLevels($jackpot, 'GAMBLING');
            $viewFile                   = 'admin/jackpot/gambling-bid-battle';
            $view_data['pageHeading']   = 'Manage Gambling Bid Battle';

            //Return the layout with view form
            return $this->load->view('layout/backend', array(
                'content'           => $this->load->view($viewFile, $view_data, true),
                'pageHeading'    => $view_data['pageHeading'],
                'pageSubHeading' => '',
                'activeLinksAlias'  => array('admin_jackpots'),
                'breadCrumbs'       => array('Manage Jackpots' => $this->baseControllerUrl, $view_data['pageHeading'] => ''),
            ));
        }
    }

    /**
     * Update gambling battle levels
     * @param type $model
     * @param type $params
     */
    public function updateGamblingBidBattleLevels($model, $params)
    {
        $oldRecords = $this->objectManager->getRepository('Entity\JackpotBattleLevel')->findBy( array( 'jackpot' => $model ) );
        $createdAt  = new \DateTime();
        $updatedAt  = new \DateTime();

        if($oldRecords) {
            foreach ($oldRecords as $record) {
                $this->objectManager->remove($record);
            }
        }

        if(isset($params['levels']) && !empty($params['levels'])) {
            $i = 1;
            $total = count($params['levels']);
            foreach($params['levels'] as $newRecord) {

                if(!empty($newRecord['level_name']) && !empty($newRecord['battle_type'])) {
                    $entity = new Entity\JackpotBattleLevel();
                    $entity->setJackpot($model);
                    $entity->setBattleType($newRecord['battle_type']);
                    $entity->setOrder($i);
                    $entity->setLevelName($newRecord['level_name']);
                    $entity->setDuration($newRecord['duration']);
                    $entity->setPrizeType($newRecord['prize_type']);
                    $entity->setPrizeValue(0);
                    $entity->setDefaultAvailableBids($newRecord['default_bids']);
                    $entity->setMinBidsToGamb($newRecord['min_bids_to_gamb']);
                    $entity->setLastBidWinnerPercent($newRecord['last_bid_winner_percent']);
                    $entity->setLongestBidWinnerPercent($newRecord['longest_bid_winner_percent']);
                    $entity->setMinPlayersRequiredToStart($newRecord['min_players_to_start']);
                    $entity->setMinWinsToUnlockNextLevel(0);
                    $entity->setCreatedAt($createdAt);
                    $entity->setUpdatedAt($updatedAt);

                    if($i == $total)
                    {
                        $entity->setIsLastLevel(1);
                    }
                    else
                    {
                        $entity->setIsLastLevel(0);
                    }

                    $this->objectManager->persist($entity);

                    $i++;
                }
            }
        }
        $this->objectManager->flush();
        return $model;
    }

    public function getBattleLevels($jackpot, $type = 'NORMAL')
    {
    	$levels = array();

    	if($jackpot->getBattleLevels()->count() > 0)
    	{
    		foreach ($jackpot->getBattleLevels() as $level)
    		{
    			if($level->getBattleType() == $type)
    			{
    				$levels[] = $level;
    			}
    		}
    	}

    	return $levels;
    }

    /**
     * addupdate action.
     *
     * Action to delete a record from the table. It will permanent remove the record from database.
     * There is no soft delete functionality as of now
     */
    public function delete()
    {

        //Check if Jackpot DELETE action is permitted
        checkMenuPermission('admin_jackpots', 'DELETE', true);

        //Delete will always accept ajax requests. If the request is not XMLHTTP then redirect to listing
        if (!$this->input->is_ajax_request()) {
            redirect($this->baseControllerUrl);
        }

        //Get the record ID from get request
        $id = (!empty($this->queryParams['id'])) ? $this->queryParams['id'] : null;

        //If record ID is not empty then get the actual object from database
        if (!empty($id)) {

            //Get actual record object
            $recordObj = $this->objectManager->getRepository($this->entityName)->find($id);

            // Check if gameis being played right now
            $gameResponse = $this->checkIfGameIsRunning($id);

            if($gameResponse != false)
            {
                echo json_encode($gameResponse);
                exit;
            }

            //If the object is not empty
            if (!empty($recordObj)) {

                //Delete the record from database
                $this->objectManager->remove($recordObj);
                $this->objectManager->flush();

                //If record deleted successfully then show the success message
                $response = array(
                    'html' => '',
                    'notification' => array(
                        array(
                            'status' => 'success',
                            'message' => $this->crudName.' deleted successfully.',
                            'type' => 'toastr',
                        ),
                    ),
                );
            } else {

                //If record not found in database with the given ID, then show No record found message
                $response = array(
                    'html' => '',
                    'notification' => array(
                        array(
                            'status' => 'error',
                            'message' => 'No record found.',
                            'type' => 'toastr',
                        ),
                    ),
                );
            }
        }

        //Final print the reponse as JSON
        echo json_encode($response);
        exit;
    }

    /**
     * status action.
     *
     * Enable or Disable a jackpot
     */
    public function status()
    {

        //Check if Jackpot STATUS action is permitted
        checkMenuPermission('admin_jackpots', 'STATUS', true);

        //This action will always accept ajax requests. If the request is not XMLHTTP then redirect to listing
        if (!$this->input->is_ajax_request()) {
            redirect($this->baseControllerUrl);
        }

        //Get the record ID from get request
        $id = (!empty($this->queryParams['id'])) ? $this->queryParams['id'] : null;

        //If record ID is not empty then get the actual record object from database
        if (!empty($id)) {

            //Get actual record object
            $recordObj = $this->objectManager->getRepository($this->entityName)->find($id);

            //If the object is not empty
            if (!empty($recordObj)) {

                // Check if gameis being played right now
                $gameResponse = $this->checkIfGameIsRunning($id);

                if($gameResponse != false)
                {
                    echo json_encode($gameResponse);
                    exit;
                }

                //Create new status of the object according to previous status
                $newStatus = ($recordObj->getStatus() == 'ACTIVE') ? 'INACTIVE' : 'ACTIVE';

                //Set new status and updated date of the object
                $recordObj->setStatus($newStatus);
                $recordObj->setUpdatedAt(new \DateTime());

                //Persist and save the object
                $this->objectManager->persist($recordObj);
                $this->objectManager->flush();

                //If record marked as active or in-active then show the success message
                $response = array(
                    'html' => '',
                    'notification' => array(
                        array(
                            'status' => 'success',
                            'message' => $this->crudName.' marked as '.strtolower($newStatus).' successfully.',
                            'type' => 'toastr',
                        ),
                    ),
                );
            } else {

                //If record not found in database with the given ID, then show No record found message
                $response = array(
                    'html' => '',
                    'notification' => array(
                        array(
                            'status' => 'error',
                            'message' => 'No record found.',
                            'type' => 'toastr',
                        ),
                    ),
                );
            }
        }

        //Final print the reponse as JSON
        echo json_encode($response);
        exit;
    }

    /**
     * Check if game is currently being played
     *
     * @param  int $id
     * @return array
     */
    public function checkIfGameIsRunning($id, $bool = false)
    {
        // Check if gameis being played right now
        $return         = false;
        $client         = new Client();
        $accessToken    = $this->session->userdata('accessToken');
        $result         = $client->post(API_BASE_PATH.'/api/jackpots/check-socket-game-state/'.$id.'?access_token='.$accessToken);

        $body = json_decode($result->getBody()->getContents(), true);

        if(isset($body['status']) && $body['status'] == 'success')
        {
            if($body['state'] == 'STARTED')
            {
            	if($bool == true)
	        	{
	        		$return = true;
	        	}
	        	else
	        	{
	        		$return = array(
	                    'html' => '',
	                    'notification' => array(
	                        array(
	                            'status' => 'error',
	                            'message' => 'Sorry but the game is being played currently.',
	                            'type' => 'toastr',
	                        ),
	                    ),
	                );
	        	}
            }
        }

        return $return;
    }

    /**
     * gamehistory action
     *
     * View jackpot game history
     */
    public function gamehistory()
    {
        //Check if Jackpot STATUS action is permitted
        checkMenuPermission('admin_jackpots', 'VIEW_GAME_HISTORY', true);

        //This action will always accept ajax requests. If the request is not XMLHTTP then redirect to listing
        if (!$this->input->is_ajax_request()) {
            redirect($this->baseControllerUrl);
        }

        //Get the record ID from get request
        $id = (!empty($this->queryParams['id'])) ? $this->queryParams['id'] : null;

        //If record ID is not empty then get the actual record object from database
        if (!empty($id)) {
            //Get actual record object
            $recordObj = $this->objectManager->getRepository($this->entityName)->find($id);

            //If the object is not empty
            $view_data                          = array();
            $view_data['games']                 = $recordObj->getJackpotGames();
            $view_data['pageHeading']           = 'Jackpot Games';
            $view_data['jackpotTitle']          = $recordObj->getTitle();
            $view_data['jackpotGameBidsUrl']    = 'jackpot-game/bids';
            $view_data['jackpotGameUsersUrl']   = 'jackpot-game-users';
            $viewFile                           = 'admin/jackpot/game-history';

            //If request is ajax then return only view
            $this->load->view($viewFile, $view_data);
        }
    }
}


