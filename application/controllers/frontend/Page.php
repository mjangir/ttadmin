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
 * Handles applications pages which are created from backend and codebase.
 *
 * @category	Controller
 *
 * @author	Manish Jangir <manishjangir.com>
 */
class Page extends MY_GuestUserController
{
    /**
     * Class constructor.
     *
     * Calls parent class constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * index action.
     *
     * Index action which resolves pages by their slug
     *
     * @param string $slug Slug of the page
     */
    public function index($slug = 'any')
    {

        //Get page by slug
        $page = $this->doctrine->em->getRepository('Entity\Page')->findOneBy(['alias' => $slug]);

        //If page is not found or inactive, redirect to home page
        if (!$page || $page->getStatus() == 'INACTIVE') {
            redirect('/');
        }

        //Set view data
        $view_data = [
            'pageContent' => $page->getContent(),
        ];

        //Render requested page with meta tags
        return $this->load->view('layout/frontend', [
            'content'         => $this->load->view('frontend/page/index', $view_data, true),
            'metaTitle'       => $page->getTitle(),
            'metaDescription' => $page->getMetaDescription(),
            'metaKeywords'    => $page->getMetaKeywords(),
        ]);
    }

    /**
     * contact action.
     *
     * Handles contact us form
     */
    public function contact()
    {

        //If form was submitted
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            //Validate form fields
            $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
            $this->form_validation->set_rules('name', 'Full Name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required');
            $this->form_validation->set_rules('message', 'Message', 'trim|required');

            //If form is successfully validated
            if ($this->form_validation->run() == true) {

                //Get system settings
                $settings = getSettings();

                try {

                    //Post parameters
                    $subject = $this->input->post('subject');
                    $name = $this->input->post('name');
                    $email = $this->input->post('email');
                    $phone = $this->input->post('phone');
                    $message = $this->input->post('message');

                    //Create ContactUsRequest Object to store the message in database
                    $contactUsRequest = new Entity\ContactUsRequest();
                    $contactUsRequest->setSubject($subject);
                    $contactUsRequest->setName($name);
                    $contactUsRequest->setEmail($email);
                    $contactUsRequest->setContactNo($phone);
                    $contactUsRequest->setMessage($message);
                    $contactUsRequest->setCreatedOn(new \DateTime());

                    //Persist and flush the object
                    $this->objectManager->persist($contactUsRequest);
                    $this->objectManager->flush();

                    //Send the form data to admin email
                    $mailReplaceArray = [
                        '[NAME]'    => $name,
                        '[EMAIL]'   => $email,
                        '[PHONE]'   => $phone,
                        '[MESSAGE]' => $message,
                    ];
                    $this->swiftmailer->sendmail('contact_us_admin_copy', ADMIN_EMAIL, $mailReplaceArray, $subject);

                    //If Auto-Reply on contact us form is enabled from backend, send an email back to visitor
                    if (isset($settings['enable_contact_us_auto_reply']) && $settings['enable_contact_us_auto_reply'] == 1) {
                        $mailReplaceArray = [
                            '[NAME]' => $name,
                        ];
                        $this->swiftmailer->sendmail('contact_us_auto_reply', $email, $mailReplaceArray);
                    }

                    //Set success notification message in flash messanger for next request
                    $this->session->set_flashdata('messages', ['success@#@Thank you for contacting us. We will get you soon!']);
                    redirect(base_url('page/contact'));
                } catch (Exception $e) {
                    $this->session->set_flashdata('messages', ['danger@#@Error occured while processing your request. Please try again later.']);
                    redirect(base_url('page/contact'));
                }
            } else {
                //If form validation not successfully, throw validation errors
                $errors = $this->form_validation->error_array();
                $this->session->set_flashdata('formErrors', $errors);

                return $this->load->view('layout/frontend', [
                    'content'   => $this->load->view('frontend/page/contact', $_POST, true),
                    'metaTitle' => 'Contact Us',
                ]);
            }
        } else {
            //If request is get instead of form submission, show view form
            return $this->load->view('layout/frontend', [
                'content'   => $this->load->view('frontend/page/contact', [], true),
                'metaTitle' => 'Contact Us',
            ]);
        }
    }
}
