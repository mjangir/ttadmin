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
 * Link Class.
 *
 * Create and update system links according to link categories. Each link can be
 * givn many actions which can be permitted from user group update permission page
 *
 * @category	Controller
 *
 * @author	Manish Jangir <manishjangir.com>
 */
class Link extends MY_AdminController
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
        $this->baseControllerUrl = base_url('admin/links');

        //Set module name
        $this->crudName = 'Link';

        //Set doctrine entity name
        $this->entityName = 'Entity\Link';
    }

    /**
     * index action.
     *
     * Index page of Link module
     */
    public function index()
    {

        //If Link LISTING action is permitted
        checkMenuPermission('admin_manage_system_links', 'LISTING', true);

        //Get links to list in data table
        $data = $this->objectManager->getRepository($this->entityName)->getPagedLinks($this->offset, $this->limit, $this->postParams);

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
        $view_data['listingUrl'] = $this->baseControllerUrl;

        //Link search form params
        $view_data['linkCategoryDropdown'] = getLinkCategoryDropdown(true);
        $view_data['linkDropdown'] = (isset($this->postParams['linkCategory'])) ? getLinkDropdown(false, $this->postParams['linkCategory']) : [];

        //If request is type of ajax then only render the view
        if ($this->input->is_ajax_request()) {
            $jsonResponse = [];
            $jsonResponse['html'] = $this->load->view('admin/link/index', $view_data, true);
            echo json_encode($jsonResponse);
        } else {

            //If request is not ajax then render the view with layout
            return $this->load->view('layout/backend', [
                'content'          => $this->load->view('admin/link/index', $view_data, true),
                'pageHeading'      => 'Link List',
                'pageSubHeading'   => '',
                'activeLinksAlias' => ['admin_manage_system_links'],
                'breadCrumbs'      => ['Manage System Links' => ''],
            ]);
        }
    }

    /**
     * The common action to add or update a record for this controller. In case of update record,
     * the ID of record will be provide. It will render the form only if the request to this action
     * is not POST.
     */
    public function addupdate()
    {

        //Check if id is present in the get request
        $id = (!empty($this->queryParams['id'])) ? $this->queryParams['id'] : null;

        //Check if link ADD or UPDATE actions are permitted or not
        if (!empty($id)) {
            checkMenuPermission('admin_manage_system_links', 'UPDATE', true);
        } else {
            checkMenuPermission('admin_manage_system_links', 'ADD', true);
        }

        //Check if request is POST. If yes then proceed with add or update
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            //If data is posted then return json response only
            header('Content-Type: application/json');

            //Set form validation rules
            $this->form_validation->set_rules('linkCategoryId', 'Link Category', 'trim|required',
                    ['required' => 'Please select Link Category']);
            $this->form_validation->set_rules('name', 'Link Name', 'trim|required|xss_clean',
                    ['required' => 'Please enter Link Name']);
            $this->form_validation->set_rules('alias', 'Link Alias', 'trim|required|xss_clean',
                    ['required' => 'Please enter Link Alias']);
            $this->form_validation->set_rules('href', 'Hyperlink', 'trim|required',
                    ['required' => 'Please enter Hyperlink or #']);
            $this->form_validation->set_rules('actions', 'Link Actions', 'trim|required',
                    ['required' => 'Actions cannot be empty. Use instead {"ALL":"All Rights"}']);

            //If form is successfully validated
            if ($this->form_validation->run() == true) {
                try {

                        //If new link is added
                    if ($id === null) {
                        $link = new Entity\Link();
                        $link->setCreatedAt(new \DateTime());
                        $link->setUpdatedAt(new \DateTime());
                        $link->setStatus('ACTIVE');
                    } else {
                        //If existing link is updated
                        $link = $this->objectManager->getRepository($this->entityName)->find($id);
                        $link->setUpdatedAt(new \DateTime());
                    }

                    //Get link category object by category id
                    $linkCategory = $this->objectManager->getRepository('Entity\LinkCategory')->find($this->postParams['linkCategoryId']);

                    //Set Link object properties
                    $link->setLinkCategory($linkCategory);
                    $link->setParentId((int) $this->postParams['parentId']);
                    $link->setName($this->postParams['name']);
                    $link->setAlias($this->postParams['alias']);
                    $link->setIcon($this->postParams['icon']);
                    $link->setHref($this->postParams['href']);
                    $link->setActions($this->postParams['actions']);

                    //Persist and flush the object
                    $this->objectManager->persist($link);
                    $this->objectManager->flush($link);

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
                } catch (Exception $ex) {
                    //show error message to user
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
                                'form'   => '#form_link',
                                'errors' => $errors,
                            ],
                    ]);
                exit;
            }
        } else {
            //If request method is not post then render the form with layout

            //Set view form attributes and variables
            $view_data['form']['attributes'] = [
                'id' => 'form_link',
            ];
            $view_data['form']['action'] = ($id === null) ? $this->baseControllerUrl.'/add-update' : $this->baseControllerUrl.'/add-update?id='.$id;
            $view_data['form']['cancelUrl'] = $this->baseControllerUrl;
            $view_data['form']['viewUrl'] = $this->baseControllerUrl.'/view?id='.$id;

            //Set other view parameters if new record is added
            $view_data['linkCategoryDropdown'] = getLinkCategoryDropdown(true);

            //If new link is getting added
            if ($id === null) {
                $view_data['linkDropdown'] = getLinkDropdown(true);
                $viewFile = 'admin/link/add';
                $view_data['pageHeading'] = 'Add Link';
            } else {
                //Set other view parameters if a link is updated
                $link = $this->objectManager->getRepository($this->entityName)->find($id);
                $view_data['link'] = $link;
                $view_data['linkDropdown'] = getLinkDropdown(true, $link->getLinkCategory()->getId());
                $viewFile = 'admin/link/update';
                $view_data['pageHeading'] = 'Update Link';
            }

            //If request is ajax then return only view
            $this->load->view($viewFile, $view_data);
        }
    }

    /**
     * view action.
     *
     * View link information
     */
    public function view()
    {

        //Check if Link VIEW action is permitted
        checkMenuPermission('admin_manage_system_links', 'VIEW', true);

        //Only accept ajax requests
        if (!$this->input->is_ajax_request()) {
            return redirect($this->baseControllerUrl);
        }

        //Get the record ID from get request
        $id = (!empty($this->queryParams['id'])) ? $this->queryParams['id'] : null;

        //If record ID is not empty then get the actual record object from database
        if (!empty($id)) {
            $record = $this->objectManager->getRepository('Entity\Link')->find($id);

            //Render view page
            $this->load->view('admin/link/view', ['record' => $record]);
        }
    }

    /**
     * delete action.
     *
     * Action to delete a record from the table. It will permanent remove the record from database.
     * There is no soft delete functionality as of now
     */
    public function delete()
    {

        //Check if Link DELETE action is permitted
        checkMenuPermission('admin_manage_system_links', 'DELETE', true);

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
     * Disable or Enable a link
     */
    public function status()
    {

        //Check if Link STATUS action is permitted
        checkMenuPermission('admin_manage_system_links', 'STATUS', true);

        //This action will always accept ajax requests. If the request is not XMLHTTP then redirect to listing
        if (!$this->input->is_ajax_request()) {
            redirect($this->baseControllerUrl);
        }

        //Get the record ID from get request
        $id = (!empty($this->queryParams['id'])) ? $this->queryParams['id'] : null;

        //If record ID is not empty then get the actual object from database
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
