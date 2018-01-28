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
 * Setting Class.
 *
 * Update application general, homepage, login and notification settings. All the
 * settings are hard coded stored in database with a unique alias. They can only
 * be updated not created or delete.
 *
 * @category	Controller
 *
 * @author	Manish Jangir <manishjangir.com>
 */
class Setting extends MY_AdminController
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
        $this->baseControllerUrl = base_url('admin/setting');

        //Set module name
        $this->crudName = 'Setting';

        //Set doctrine entity name
        $this->entityName = 'Entity\Setting';
    }

    /**
     * index action.
     *
     * Index page of Setting module
     */
    public function index()
    {

        //Get all settings from database
        $settingEntity = $this->objectManager->getRepository($this->entityName)->findAll();
        $settings = [];
        foreach ($settingEntity as $setting) {
            $settings[$setting->getKey()] = $setting->getValue();
        }

        //Set view parameters
        $view_data = [];
        $view_data['settings'] = $settings;
        $view_data['saveUrl'] = $this->baseControllerUrl.'/save';

        //Render index page with layout
        return $this->load->view('layout/backend', [
            'content'          => $this->load->view('admin/setting', $view_data, true),
            'pageHeading'      => 'Manage Settings',
            'pageSubHeading'   => '',
            'activeLinksAlias' => ['admin_setting'],
            'breadCrumbs'      => ['Manage Settings' => ''],
        ]);
    }

    /**
     * save action.
     *
     * Saves updated settings
     */
    public function save()
    {
        $isAjax = false;

        //Check if request is POST. If yes then proceed with add or update
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            if ($this->input->post('normal_battle_levels') && $this->input->post('normal_battle_levels') == 1) {
                $levels = $this->input->post('levels') ? json_encode($this->input->post('levels')) : json_encode([]);
                //Get setting entity by key
                $settingEntity = $this->objectManager->getRepository($this->entityName)->findOneBy(['key' => 'normal_battle_levels_json']);

                //If key is not empty them update the new value
                if (!empty($settingEntity)) {
                    $settingEntity->setValue($levels);
                    $this->objectManager->persist($settingEntity);
                    $this->objectManager->flush();
                }

                $isAjax = true;
            } elseif ($this->input->post('advance_battle_levels') && $this->input->post('advance_battle_levels') == 1) {
                $levels = $this->input->post('levels') ? json_encode($this->input->post('levels')) : json_encode([]);
                //Get setting entity by key
                $settingEntity = $this->objectManager->getRepository($this->entityName)->findOneBy(['key' => 'advance_battle_levels_json']);

                //If key is not empty them update the new value
                if (!empty($settingEntity)) {
                    $settingEntity->setValue($levels);
                    $this->objectManager->persist($settingEntity);
                    $this->objectManager->flush();
                }

                $isAjax = true;
            } else {
                //Get all posted data
                $settings = $this->input->post('settings');

                foreach ($settings as $key => $value) {

                    //Get setting entity by key
                    $settingEntity = $this->objectManager->getRepository($this->entityName)->findOneBy(['key' => $key]);

                    //If key is not empty them update the new value
                    if (!empty($settingEntity)) {
                        $settingEntity->setValue($value);
                        $this->objectManager->persist($settingEntity);
                        $this->objectManager->flush();
                    }
                }
            }

            // Update Global Settings In NodeJS
            $client = new Client();
            $accessToken = $this->session->userdata('accessToken');
            $result = $client->post(API_BASE_PATH.'/api/settings/update-global-settings?access_token='.$accessToken);

            if ($isAjax) {
                //Return success if added successfully
                echo json_encode([
                    'html'         => '',
                    'notification' => [
                        [
                            'status'  => 'success',
                            'message' => 'Settings updated successfully',
                            'type'    => 'toastr',
                        ],
                    ],
                    'location' => [
                        'redirect' => [
                            'url'     => base_url('admin/setting'),
                            'timeout' => 2000,
                        ],
                    ],
                ]);
            } else {
                //Return success if added successfully
                $this->session->set_flashdata('messages', ['success@#@Settings updated successfully']);
                redirect(base_url('admin/setting'));
            }
        }
    }
}
