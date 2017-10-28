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
 * User Class.
 *
 * Create, Update, Delete application user groups according to user role
 *
 * @category	Controller
 *
 * @author	Manish Jangir <manishjangir.com>
 */
class Usergroup extends MY_AdminController
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
        $this->baseControllerUrl = base_url('admin/user-groups');

        //Set module name
        $this->crudName = 'User Group';

        //Set doctrine entity name
        $this->entityName = 'Entity\UserGroup';
    }

    /**
     * index action.
     *
     * Index page of User Group module
     */
    public function index()
    {

        //Check if User Group LISTING action is permitted
        checkMenuPermission('admin_user_groups', 'LISTING', true);

        //Get user groups to list in data table
        $data = $this->objectManager->getRepository($this->entityName)->getPagedList($this->offset, $this->limit, $this->postParams);

        //Set the paginator for listing
        $paginator = $this->paginator->setOptions($data, $this->page, $this->baseControllerUrl, $this->limit);

        //Prepare the view parameters
        $view_data = [];
        $view_data['data'] = $data;                            //Data got from model
        $view_data['page'] = $this->page;                      //Current page number
        $view_data['listStartFrom'] = $this->offset + 1;                          //Serial number of the table records
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
            $jsonResponse['html'] = $this->load->view('admin/usergroup/index', $view_data, true);
            echo json_encode($jsonResponse);
        } else {

            //If request is not ajax then render the view with layout
            return $this->load->view('layout/backend', [
                'content'          => $this->load->view('admin/usergroup/index', $view_data, true),
                'pageHeading'      => 'User Groups',
                'pageSubHeading'   => '',
                'activeLinksAlias' => ['admin_user_groups'],
                'breadCrumbs'      => ['User Groups' => ''],
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
    public function alias_exists($alias, $id)
    {
        $record = $this->objectManager->getRepository('Entity\UserGroup')->findOneBy(['alias' => $alias]);
        if ($record !== null && $record->getId() == $id) {
            return true;
        }

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

        //Check if id is present in the get request
        $id = (!empty($this->queryParams['id'])) ? $this->queryParams['id'] : null;

        //Check if User Group UPDATE or ADD action is permitted
        if (!empty($id)) {
            checkMenuPermission('admin_user_groups', 'UPDATE', true);
        } else {
            checkMenuPermission('admin_user_groups', 'ADD', true);
        }

        //Check if request is POST. If yes then proceed with add or update
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            //If data is posted then return json response only
            header('Content-Type: application/json');

            //Set validation rules
            $this->form_validation->set_rules('roleId', 'User Role', 'trim|required',
                    ['required' => 'Please select User Role']);
            $this->form_validation->set_rules('groupName', 'Group Name', 'trim|required|xss_clean',
                    ['required' => 'Please enter Group Name']);
            $this->form_validation->set_rules('alias', 'Alias', 'trim|required|callback_alias_exists['.$id.']|xss_clean',
                    ['required'        => 'Please enter Alias Name',
                        'alias_exists' => 'Alias Name must be unique for each User Group',
                    ]);
            $this->form_validation->set_rules('description', 'Description', 'trim|xss_clean');

            //If form is successfully validated
            if ($this->form_validation->run() == true) {
                try {

                    //Create the UserGroup object
                    if ($id === null) {
                        //Following properties will be set in case of new record
                        $group = new Entity\UserGroup();
                        $group->setCreatedAt(new \DateTime());
                        $group->setUpdatedAt(new \DateTime());
                        $group->setStatus('ACTIVE');
                    } else {
                        //Following properties will be set in case of update record
                        $group = $this->objectManager->getRepository($this->entityName)->find($id);
                        $group->setUpdatedAt(new \DateTime());
                    }

                    //Get Role object by role id
                    $role = $this->objectManager->getRepository('Entity\Role')->find($this->postParams['roleId']);

                    //Set UserGroup object properties
                    $group->setRole($role);
                    $group->setAlias($this->postParams['alias']);
                    $group->setGroupName($this->postParams['groupName']);
                    $group->setDescription($this->postParams['description']);

                    //Now flush the object and save it
                    $this->objectManager->persist($group);
                    $this->objectManager->flush($group);

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
                        'form'   => '#form_usergroup',
                        'errors' => $errors,
                    ],
                ]);
                exit;
            }
        } else {
            //If request method is not post then render the form with layout

            //Set view form attributes and variables
            $view_data['form']['attributes'] = [
                'id' => 'form_usergroup',
            ];
            $view_data['form']['action'] = ($id === null) ? $this->baseControllerUrl.'/add-update' : $this->baseControllerUrl.'/add-update?id='.$id;
            $view_data['form']['cancelUrl'] = $this->baseControllerUrl;
            $view_data['form']['viewUrl'] = $this->baseControllerUrl.'/view?id='.$id;

            //Set other view parameters if new record is added
            $view_data['userRoleDropdown'] = getUserRoleDropdown(true);

            if ($id === null) {
                $viewFile = 'admin/usergroup/add';
                $view_data['pageHeading'] = 'Add User Group';
            } else {
                //Set other view parameters if a record is updated
                $view_data['userGroup'] = $this->objectManager->getRepository($this->entityName)->find($id);
                $viewFile = 'admin/usergroup/update';
                $view_data['pageHeading'] = 'Update Group';
            }

            //If request is ajax then return only view
            $this->load->view($viewFile, $view_data);
        }
    }

    /**
     * view action.
     *
     * View a User Group details
     */
    public function view()
    {

        //Check if User Group VIEW action is permitted
        checkMenuPermission('admin_user_groups', 'VIEW', true);

        //Check if the request is ajax
        if (!$this->input->is_ajax_request()) {
            return redirect($this->baseControllerUrl);
        }

        //Get the record ID from query string
        $id = (!empty($this->queryParams['id'])) ? $this->queryParams['id'] : null;

        //If record ID is not empty then get the actual record object from database
        if (!empty($id)) {
            //Get actual record object
            $record = $this->objectManager->getRepository('Entity\UserGroup')->find($id);
            $this->load->view('admin/usergroup/view', ['record' => $record]);
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

        //Check if User Group DELETE action is permitted
        checkMenuPermission('admin_user_groups', 'DELETE', true);

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
     * permissions action.
     *
     * Add/Update permissions for a user group to access the application resources
     */
    public function permissions()
    {

        //Check if User Group UPDATE_PERMISSIONS action is permitted
        checkMenuPermission('admin_user_groups', 'UPDATE_PERMISSIONS', true);

        //Get the record ID from get request
        $id = (!empty($this->queryParams['id'])) ? $this->queryParams['id'] : null;

        //Get the correct user group object of this id
        $userGroup = $this->objectManager->getRepository('Entity\UserGroup')->find($id);

        //If user group is not empty then get all permitted links
        if (!empty($userGroup)) {

            //Get Links
            $links = $this->objectManager->getRepository('Entity\Link')->getLinksByGroupId($userGroup, $userGroup->getRole()->getId());
            $links = $this->getNestedMenus($links);

            //Set view variables
            $viewData = [];
            $viewData['links'] = $links;
            $viewData['userGroupId'] = $userGroup->getId();
            $viewData['groupName'] = $userGroup->getGroupName();
            $viewData['cancelUrl'] = $this->baseControllerUrl;
            $viewData['saveUrl'] = $this->baseControllerUrl.'/update-permissions';

            //Return the view with rendered layout
            return $this->load->view('layout/backend', [
                'content'          => $this->load->view('admin/usergroup/permissions', $viewData, true),
                'pageHeading'      => 'Manage User Group Permissions',
                'pageSubHeading'   => '',
                'activeLinksAlias' => ['admin_manage_users', 'admin_manage_users_user_list'],
                'breadCrumbs'      => ['Manage Users' => '', 'User Groups' => '', 'Update Permissions' => ''],
            ]);
        } else {
            redirect($this->baseControllerUrl);
        }
    }

    /**
     * getNestedMenus function.
     *
     * Function to create nested menu
     *
     * @param array $arr    Array which has to be made as nested
     * @param int   $parent Parent id of the link. Default is 0
     *
     * @return array $navigation Nested array of links
     */
    private function getNestedMenus($arr, $parent = 0)
    {
        $navigation = [];
        foreach ($arr as $menu) {
            if ($menu['parentId'] == $parent) {
                $menu['sub'] = isset($menu['sub']) ? $menu['sub'] : $this->getNestedMenus($arr, $menu['id']);
                $navigation[] = $menu;
            }
        }

        return $navigation;
    }

    /**
     * updatepermissions action.
     *
     * Save User Group permission action
     */
    public function updatepermissions()
    {

        //Check if User Group UPDATE_PERMISSIONS action is permitted
        checkMenuPermission('admin_user_groups', 'UPDATE_PERMISSIONS', true);

        //Check if request is post
        if (!empty($this->postParams)) {
            $postData = $this->postParams;
            $menu = $postData['menu'];
            $userGroupId = $postData['userGroupId'];
            $group = $this->objectManager->getRepository($this->entityName)->find($userGroupId);

            //Get existing permissions and remove them
            $existingData = $this->objectManager->getRepository('Entity\LinkPermission')->findBy(['group' => $group]);
            if (!empty($existingData)) {
                foreach ($existingData as $ed) {
                    $this->objectManager->remove($ed);
                    $this->objectManager->flush();
                }
            }

            //Now again re-assign the permissions
            foreach ($menu as $menuId => $menuItem) {
                $link = $this->objectManager->getRepository('Entity\Link')->findOneBy(['id' => $menuId]);
                $permissions = json_encode($menuItem['permissions']);
                $linkPermission = new Entity\LinkPermission();
                $linkPermission->setPermissions($permissions);
                $linkPermission->setGroup($group);
                $linkPermission->setCreatedAt(new \DateTime());
                $linkPermission->setUpdatedAt(new \DateTime());
                $linkPermission->setLink($link);
                $this->objectManager->persist($linkPermission);
                $this->objectManager->flush();
            }

            //Update sessionMenuPermissions variable
            $this->navigation->setSessionMenuPermissions();

            //If permissions updated successfully, then show a success message
            $response = [
                'html'         => '',
                'notification' => [
                    [
                        'status'  => 'success',
                        'message' => 'Permissions updated successfully.',
                        'type'    => 'toastr',
                    ],
                ],
                'location' => [
                    'refresh' => [
                        'timeout' => 2000,
                    ],
                ],
            ];
            echo json_encode($response);
            exit;
        }
    }
}
