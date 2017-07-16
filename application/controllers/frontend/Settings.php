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
 * Settings Class.
 *
 * Handles logged in user profile update and change password functionality
 *
 * @category	Controller
 *
 * @author	Manish Jangir <manishjangir.com>
 */
class Settings extends MY_LoggedUserController
{
    /**
     * Class constructor.
     * 
     * Calls parent class constructor and sets base url of the controller,
     * module name and doctrine entity name
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * index action.
     * 
     * Index page of Setting module in frontend
     */
    public function index()
    {

        //Set view data on rendered page
        $view_data = array();

        $view_data['countries'] = getCountryDropdown(true);

        $view_data['name'] = $this->loggedUserObject->getFirstName();
        $view_data['email'] = $this->loggedUserObject->getEmail();
        $view_data['gender'] = $this->loggedUserObject->getGender();
        $view_data['birthDate'] = ($this->loggedUserObject->getBirthDate()) ? $this->loggedUserObject->getBirthDate()->format('Y-m-d') : '';
        $view_data['country'] = ($this->loggedUserObject->getCountry()) ? $this->loggedUserObject->getCountry()->getId() : '';

        //Render index page
        return $this->load->view('layout/frontend_authenticated', array(
            'content' => $this->load->view('frontend/settings/index', $view_data, true),
        ));
    }

    /**
     * updateprofile action.
     * 
     * Update user profile
     */
    public function updateprofile()
    {

        //If form was submitted
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            //Validate form fields
            $this->form_validation->set_rules('name', 'Full Name', 'trim|required|xss_clean');

            //If form is successfully validated
            if ($this->form_validation->run() == true) {

                //Post fields
                $name = $this->input->post('name');
                $gender = ($this->input->post('gender')) ? $this->input->post('gender') : null;
                $birthDate = ($this->input->post('birth_date')) ? new \DateTime(date('Y-m-d', strtotime($this->input->post('birth_date')))) : null;
                $countryId = ($this->input->post('country')) ? $this->input->post('country') : null;

                //Get logged in user object
                $user = $this->loggedUserObject;

                //Set User object parameters
                $user->setFirstName($name);
                $user->setGender($gender);
                $user->setBirthDate($birthDate);

                //If country is selected in form
                if (!empty($countryId)) {
                    $country = $this->objectManager->getRepository('Entity\Country')->find($countryId);
                    $user->setCountry($country);
                }

                //Persist and flush the object
                $this->objectManager->persist($user);
                $this->objectManager->flush();

                //Set success notification message in flash messanger for next request
                $this->session->set_flashdata('messages', array('success@#@Profile updated successfully'));
                redirect(base_url('settings'));
            } else {
                //If form validation not successfully, throw validation errors
                $errors = $this->form_validation->error_array();
                $this->session->set_flashdata('formErrors', $errors);

                //Set form data if validation error occured
                $view_data['name'] = $this->input->post('name');
                $view_data['email'] = $this->input->post('email');
                $view_data['gender'] = $this->input->post('gender');
                $view_data['birthDate'] = $this->input->post('birth_date');
                $view_data['country'] = $this->input->post('country');

                $view_data['countries'] = getCountryDropdown(true);

                //Render the same form with previous filled data
                return $this->load->view('layout/frontend_authenticated', array(
                    'content' => $this->load->view('frontend/settings/index', $view_data, true),
                ));
            }
        }
    }

    /**
     * changepassword action.
     * 
     * Change logged in user password
     */
    public function changepassword()
    {

        //If form was submitted
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            //Validate form fields
            $this->form_validation->set_rules('password', 'Password', 'required');

            //If form is successfully validated
            if ($this->form_validation->run() == true) {

                //Post fields
                $password = $this->input->post('password');
                $encPassword = Utils::hash($password);

                //Get logged user object
                $user = $this->loggedUserObject;
                $user->setPassword($encPassword);

                //Persist and flush the object
                $this->objectManager->persist($user);
                $this->objectManager->flush();

                //Set success notification message in flash messanger for next request
                $this->session->set_flashdata('messages', array('success@#@Password changed successfully'));
                redirect(base_url('settings'));
            } else {

                //Set error notification message in flash messanger for next request
                $this->session->set_flashdata('messages', array('danger@#@Password is required field'));
                redirect(base_url('settings'));
            }
        }
    }
}
