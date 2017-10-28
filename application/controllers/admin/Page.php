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
 * Page Class.
 *
 * Create, Update, Delete application pages. There will be a unique alias name
 * for each page for e.g. about-us. Following base_url('page/alias-name') will
 * lead to open the respected page
 *
 * @category	Controller
 *
 * @author	Manish Jangir <manishjangir.com>
 */
class Page extends MY_AdminController
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
        $this->baseControllerUrl = base_url('admin/cms/pages');

        //Set module name
        $this->crudName = 'Page';

        //Set doctrine entity name
        $this->entityName = 'Entity\Page';
    }

    /**
     * index action.
     *
     * Index page of Page module
     */
    public function index()
    {

        //Check if Page LISTING action is permitted
        checkMenuPermission('admin_manage_pages', 'LISTING', true);

        //Get pages to list in data table
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
        $view_data['listingUrl'] = $this->baseControllerUrl;

        //Check if the request is ajax. If yes then only render the view
        if ($this->input->is_ajax_request()) {
            $jsonResponse = [];
            $jsonResponse['html'] = $this->load->view('admin/page/index', $view_data, true);
            echo json_encode($jsonResponse);
        } else {

            //If request is not ajax then render the view with layout
            return $this->load->view('layout/backend', [
                'content'          => $this->load->view('admin/page/index', $view_data, true),
                'pageHeading'      => 'Manage Pages',
                'pageSubHeading'   => '',
                'activeLinksAlias' => ['admin_manage_cms', 'admin_manage_pages'],
                'breadCrumbs'      => ['Manage Pages' => ''],
            ]);
        }
    }

    /**
     * alias_exists function.
     *
     * Checks weather given alias name exists in database or not
     *
     * @param string $alias Alias Name to check in database
     *
     * @return bool
     */
    public function alias_exists($alias)
    {
        $record = $this->objectManager->getRepository('Entity\Page')->findOneBy(['alias' => $alias]);

        return $record === null;
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

        //Get page id from GET requeest
        $id = (!empty($this->queryParams['id'])) ? $this->queryParams['id'] : null;

        //Check if Page UPDATE or ADD action is permitted
        if (!empty($id)) {
            checkMenuPermission('admin_manage_pages', 'UPDATE', true);
        } else {
            checkMenuPermission('admin_manage_pages', 'ADD', true);
        }

        //Check if request is POST. If yes then proceed with add or update
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            //If data is posted then return json response only
            header('Content-Type: application/json');

            //Set form validation rules
            $this->form_validation->set_rules('name', 'Page Name', 'trim|required|xss_clean',
                    ['required' => 'Please enter Page Name']);
            $this->form_validation->set_rules('title', 'Page Title', 'trim|required|xss_clean',
                    ['required' => 'Please enter Page Title']);
            $this->form_validation->set_rules('content', 'Content', 'trim|xss_clean');
            $this->form_validation->set_rules('metaKeywords', 'Meta Keywords', 'trim|xss_clean');
            $this->form_validation->set_rules('metaDescription', 'Meta Description', 'trim|xss_clean');
            if ($id === null) {
                $this->form_validation->set_rules('alias', 'Alias Name', 'trim|required|callback_alias_exists|xss_clean',
                        ['required'            => 'Please enter Alias Name',
                                'alias_exists' => 'Alias Name must be unique for each page',
                        ]);
            }

            //If form is successfully validated
            if ($this->form_validation->run() == true) {
                try {
                    //If new page is created
                    if ($id === null) {
                        $page = new Entity\Page();
                        $page->setCreatedBy($this->loggedUserId);
                        $page->setCreatedOn(new \DateTime());
                        $page->setAlias($this->postParams['alias']);
                        $page->setStatus('ACTIVE');
                    } else {
                        //If existing page is updated
                        $page = $this->objectManager->getRepository($this->entityName)->find($id);
                        $page->setUpdatedOn(new \DateTime());
                        $page->setUpdatedBy($this->loggedUserId);
                    }

                    //Set Page object properties
                    $page->setName($this->postParams['name']);
                    $page->setTitle($this->postParams['title']);
                    $page->setContent($this->postParams['content']);
                    $page->setMetaDescription($this->postParams['metaDescription']);
                    $page->setMetaKeywords($this->postParams['metaKeywords']);

                    //Persist and flush the object
                    $this->objectManager->persist($page);
                    $this->objectManager->flush($page);

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
                //Throw the validation errors, if validation not successful
                $errors = $this->form_validation->error_array();
                echo json_encode([
                    'validation' => [
                        'form'   => '#form_page',
                        'errors' => $errors,
                    ],
                ]);
                exit;
            }
        } else {
            //If request method is not post then render the form with layout

            //Set view form attributes and variables
            $view_data['form']['attributes'] = [
                'id' => 'form_page',
            ];
            $view_data['form']['action'] = ($id === null) ? $this->baseControllerUrl.'/add-update' : $this->baseControllerUrl.'/add-update?id='.$id;
            $view_data['form']['cancelUrl'] = $this->baseControllerUrl;
            $view_data['form']['viewUrl'] = $this->baseControllerUrl.'/view?id='.$id;

            //Set other view parameters if new record is added
            if ($id === null) {
                $viewFile = 'admin/page/add';
                $view_data['pageHeading'] = 'Add Page';
            } else {
                //Set other view parameters if a record is updated
                $view_data['page'] = $this->objectManager->getRepository($this->entityName)->find($id);
                $viewFile = 'admin/page/update';
                $view_data['pageHeading'] = 'Update Page';
            }

            //Return the layout with view form
            return $this->load->view('layout/backend', [
                'content'          => $this->load->view($viewFile, $view_data, true),
                'pageHeading'      => $view_data['pageHeading'],
                'pageSubHeading'   => '',
                'activeLinksAlias' => ['admin_manage_cms', 'admin_manage_pages'],
                'breadCrumbs'      => ['Manage Pages' => $this->baseControllerUrl, $view_data['pageHeading'] => ''],
            ]);
        }
    }

    /**
     * addupdate action.
     *
     * Action to delete a record from the table. It will permanent remove the record from database.
     * There is no soft delete functionality as of now
     */
    public function delete()
    {

        //Check if Page DELETE action is permitted
        checkMenuPermission('admin_manage_pages', 'DELETE', true);

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
     * Enable or Disable a page
     */
    public function status()
    {

        //Check if Page STATUS action is permitted
        checkMenuPermission('admin_manage_pages', 'STATUS', true);

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

                //Create new status of the object according to previous status
                $newStatus = ($recordObj->getStatus() == 'ACTIVE') ? 'INACTIVE' : 'ACTIVE';

                //Set new status and updated date of the object
                $recordObj->setStatus($newStatus);
                $recordObj->setUpdatedOn(new \DateTime());

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
