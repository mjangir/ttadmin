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
 * User Class.
 *
 * Create, Update, Delete, Block/unblock application users with user role and groups.
 *
 * @category	Controller
 *
 * @author	Manish Jangir <manishjangir.com>
 */
class User extends MY_AdminController
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
        $this->baseControllerUrl = base_url('admin/users');

        //Set module name
        $this->crudName = 'User';

        //Set doctrine entity name
        $this->entityName = 'Entity\User';
    }

    /**
     * index action.
     *
     * Index page of User module
     */
    public function index()
    {

        //Check if User LISTING action is permitted
        checkMenuPermission('admin_users', 'LISTING', true);

        //Get user to list in data table
        $data = $this->objectManager->getRepository($this->entityName)->getPagedList($this->offset, $this->limit, $this->postParams);

        //Set the paginator for listing
        $paginator = $this->paginator->setOptions($data, $this->page, $this->baseControllerUrl, $this->limit);

        //Prepare the view parameters
        $view_data = [];
        $view_data['data'] = $data;                            //Data got from model
        $view_data['page'] = $this->page;                      //Current page number
        $view_data['listStartFrom'] = $this->offset + 1;                  //Serial number of the table records
        $view_data['isAjaxRequest'] = $this->input->is_ajax_request();  //If request is ajax
        $view_data['pagination'] = $paginator->getPagination();      //Pagination for table

        //Set common view parameters for listing page
        $view_data['postData'] = $this->postParams;
        $view_data['addUrl'] = $this->baseControllerUrl.'/add-update';
        $view_data['updateUrl'] = $this->baseControllerUrl.'/add-update';
        $view_data['viewUrl'] = $this->baseControllerUrl.'/view';
        $view_data['deleteUrl'] = $this->baseControllerUrl.'/delete';
        $view_data['statusUrl'] = $this->baseControllerUrl.'/status';
        $view_data['permissionUrl'] = $this->baseControllerUrl.'/permissions';
        $view_data['listingUrl'] = $this->baseControllerUrl;

        //Check if the request is ajax. If yes then only render the view
        if ($this->input->is_ajax_request()) {
            $jsonResponse = [];
            $jsonResponse['html'] = $this->load->view('admin/user/index', $view_data, true);
            echo json_encode($jsonResponse);
        } else {

            //If request is not ajax then render the view with layout
            return $this->load->view('layout/backend', [
                'content'          => $this->load->view('admin/user/index', $view_data, true),
                'pageHeading'      => 'System Users',
                'pageSubHeading'   => '',
                'activeLinksAlias' => ['admin_users'],
                'breadCrumbs'      => ['Manage Users' => ''],
            ]);
        }
    }

    /**
     * email_exists function.
     *
     * Checks weather given email exists in database or not
     *
     * @param string $email Email to check in database
     *
     * @return bool
     */
    public function email_exists($email, $id)
    {
        $record = $this->objectManager->getRepository('Entity\User')->findOneBy(['email' => $email]);

        if ($record !== null && $record->getId() == $id) {
            return true;
        }

        return $record === null;
    }

    /**
     * valid_user_group function.
     *
     * Checks weather given user group exists in selected role or not
     *
     * @param string $groupId User Group check for
     *
     * @return bool
     */
    public function valid_user_group($groupId)
    {
        $record = $this->objectManager->getRepository('Entity\UserGroup')->find($groupId);

        return $record->getRole()->getId() == $this->input->post('roleId');
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

        //Check if id is present in the get request
        $id = (!empty($this->queryParams['id'])) ? $this->queryParams['id'] : null;

        //Check if User ADD or UPDATE actino is permitted
        if (!empty($id)) {
            checkMenuPermission('admin_users', 'UPDATE', true);
        } else {
            checkMenuPermission('admin_users', 'ADD', true);
        }

        //Check if request is POST. If yes then proceed with add or update
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            //If data is posted then return json response only
            header('Content-Type: application/json');

            //Set validation rules
            $this->form_validation->set_rules('userGroupId', 'User Group', 'trim|required|callback_valid_user_group',
                    ['required'                => 'Please select User Group',
                            'valid_user_group' => 'This User Group does not exist in Selected Role',
                    ]);
            $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean',
                    ['required' => 'Please enter Name']);
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_email_exists['.$id.']|xss_clean',
                    ['required'       => 'Please enter Email ID',
                        'valid_email' => 'Please enter valid a Email ID',
                        'email_exists'=> 'Email ID is already taken',
                    ]);
            if ($id === null) {
                $this->form_validation->set_rules('password', 'Password', 'trim|required',
                            ['required' => 'Please enter Password']);
                $this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'trim|required|matches[password]',
                            ['required'   => 'Please enter Confirm Password',
                                'matches' => 'Password does not match with Confirm Password',
                ]);
            }

            //If form is successfully validated
            if ($this->form_validation->run() == true) {
                $request = [
                    'name'          => $this->postParams['name'],
                    'email'         => $this->postParams['email'],
                    'userGroupId'   => $this->postParams['userGroupId'],
                    'gender'        => $this->postParams['gender'],
                    'phone'         => $this->postParams['phone'],
                    'countryId'     => !empty($this->postParams['countryId']) ? $this->postParams['country'] : null,
                    'createdBy'     => $this->loggedUserId,
                    'updatedBy'     => $this->loggedUserId,
                ];

                $client = new Client();

                //Create the User object
                if ($id === null) {
                    $request['password'] = $this->postParams['password'];
                    $result = $client->post(API_BASE_PATH.'/api/users?access_token='.$this->session->userdata('accessToken'), [
                        'json' => $request,
                    ]);
                } else {
                    $result = $client->put(API_BASE_PATH.'/api/users/'.$id.'?access_token='.$this->session->userdata('accessToken'), [
                        'json' => $request,
                    ]);
                }

                $response = json_decode($result->getBody()->getContents(), true);

                if (isset($response['status']) && $response['status'] == 'success') {
                    //Return success if added successfully
                    echo json_encode([
                        'html'         => '',
                        'notification' => [
                            [
                                'status'  => 'success',
                                'message' => $this->crudName.' saved successfully.',
                                'type'    => 'toastr',
                            ],
                        ],
                        'location' => [
                            'redirect' => [
                                'url'     => $this->baseControllerUrl,
                                'timeout' => 2000,
                            ],
                        ],
                    ]);
                    exit;
                } else {
                    echo json_encode([
                        'html'         => '',
                        'notification' => [
                            [
                                'status'  => 'error',
                                'message' => 'Error occured while processing.',
                                'type'    => 'toastr',
                            ],
                        ],
                    ]);
                    exit;
                }
            } else {
                //Throw the validation errors, if validation not successfully
                $errors = $this->form_validation->error_array();
                echo json_encode([
                    'validation' => [
                        'form'   => '#form_user',
                        'errors' => $errors,
                    ],
                ]);
                exit;
            }
        } else {
            //If request method is not post then render the form with layout

            //Set view form attributes and variables
            $view_data['form']['attributes'] = [
                'id' => 'form_user',
            ];
            $view_data['form']['action'] = ($id === null) ? $this->baseControllerUrl.'/add-update' : $this->baseControllerUrl.'/add-update?id='.$id;
            $view_data['form']['cancelUrl'] = $this->baseControllerUrl;
            $view_data['form']['viewUrl'] = $this->baseControllerUrl.'/view?id='.$id;

            //Set other view parameters if new record is added
            $view_data['userRoleDropdown'] = getUserRoleDropdown(true);
            $view_data['userGroupDropdown'] = getUserGroupDropdown(true);
            $view_data['countryDropdown'] = getCountryDropdown(true);

            if ($id === null) {
                $viewFile = 'admin/user/add';
                $view_data['pageHeading'] = 'Add User';
            } else {
                //Set other view parameters if a record is updated
                $view_data['user'] = $this->objectManager->getRepository($this->entityName)->find($id);
                $viewFile = 'admin/user/update';
                $view_data['pageHeading'] = 'Update User';
            }

            //If request is ajax then return only view
            $this->load->view($viewFile, $view_data);
        }
    }

    /**
     * view action.
     *
     * View a user details
     */
    public function view()
    {

        //Check if User VIEW action is permitted
        checkMenuPermission('admin_users', 'VIEW', true);

        //Check if the request is ajax
        if (!$this->input->is_ajax_request()) {
            return redirect($this->baseControllerUrl);
        }

        //Get the record ID from get request
        $id = (!empty($this->queryParams['id'])) ? $this->queryParams['id'] : null;

        //If record ID is not empty then get the actual record object from database
        if (!empty($id)) {
            //Get actual record object
            $record = $this->objectManager->getRepository($this->entityName)->find($id);

            //Render view popup page
            $this->load->view('admin/user/view', ['record' => $record]);
        }
    }

    /**
     * delete action.
     *
     * Action to delete a record from the table. It will permanent remove the record from database.
     * There is no soft delete functionality as of now
     *
     * @return delete
     */
    public function delete()
    {

        //Check if User DELETE action is permitted
        checkMenuPermission('admin_users', 'DELETE', true);

        //Delete will always accept ajax requests. If the request is not XMLHTTP then redirect to listing
        if (!$this->input->is_ajax_request()) {
            redirect($this->baseControllerUrl);
        }

        //Get the record ID from query string
        $id = (!empty($this->queryParams['id'])) ? $this->queryParams['id'] : null;

        //If record ID is not empty then get the actual record object from database
        if (!empty($id)) {

            //Get actual record object
            $recordObj = $this->objectManager->getRepository($this->entityName)->find($id);

            //If the object is not empty
            if (!empty($recordObj)) {

                //Delete the record from database
                $this->objectManager->remove($recordObj);
                $this->objectManager->flush();

                //If record deleted successfully then show the success message
                $response = [
                    'html'         => '',
                    'notification' => [
                        [
                            'status'  => 'success',
                            'message' => $this->crudName.' deleted successfully.',
                            'type'    => 'toastr',
                        ],
                    ],
                ];
            } else {

                //If record not found in database with the given ID, then show No record found message
                $response = [
                    'html'         => '',
                    'notification' => [
                        [
                            'status'  => 'error',
                            'message' => 'No record found.',
                            'type'    => 'toastr',
                        ],
                    ],
                ];
            }
        }

        //Final print the reponse as JSON
        echo json_encode($response);
        exit;
    }

    /**
     * status action.
     *
     * Make a user Active or Inactive
     */
    public function status()
    {

        //Check if User STATUS action is permitted
        checkMenuPermission('admin_users', 'STATUS', true);

        //This action will always accept ajax requests. If the request is not XMLHTTP then redirect to listing
        if (!$this->input->is_ajax_request()) {
            redirect($this->baseControllerUrl);
        }

        //Get the record ID from query string
        $id = (!empty($this->queryParams['id'])) ? $this->queryParams['id'] : null;

        //If record ID is not empty then get the actual record object from database
        if (!empty($id)) {

            //Get actual record object
            $recordObj = $this->objectManager->getRepository($this->entityName)->find($id);

            //If the object is not empty
            if (!empty($recordObj)) {

                //Create new status of the object according to previous status
                $newStatus = ($recordObj->getStatus() == 'ACTIVE') ? 'INACTIVE' : 'ACTIVE';

                //Set new status and updated date of the object
                $recordObj->setStatus($newStatus);
                $recordObj->setUpdatedAt(new \DateTime());

                //Persist and save the object
                $this->objectManager->persist($recordObj);
                $this->objectManager->flush();

                //If record marked as active or in-active then show the success message
                $response = [
                        'html'         => '',
                        'notification' => [
                            [
                                'status'  => 'success',
                                'message' => $this->crudName.' marked as '.strtolower($newStatus).' successfully.',
                                'type'    => 'toastr',
                            ],
                        ],
                ];
            } else {

                //If record not found in database with the given ID, then show No record found message
                $response = [
                    'html'         => '',
                    'notification' => [
                        [
                            'status'  => 'error',
                            'message' => 'No record found.',
                            'type'    => 'toastr',
                        ],
                    ],
                ];
            }
        }

        //Final print the reponse as JSON
        echo json_encode($response);
        exit;
    }
}
