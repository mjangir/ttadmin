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

use Entity\User;
use GuzzleHttp\Client;

/**
 * Auth Class.
 *
 * Hanlde user registration, site login, social media login, forgot password etc
 *
 * @category	Controller
 *
 * @author	Manish Jangir <manishjangir.com>
 */
class Auth extends MY_GuestUserController
{
    /**
     * index action.
     * 
     * Redirects to login action if index action is called
     */
    public function index()
    {

        //Redirect to login page directly
        redirect(base_url('auth/login'), true);
    }

    /**
     * login action.
     * 
     * Handels user login
     */
    public function login()
    {

        //If form was submitted
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            //Validate form fields
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email',
                    array('required' => 'Please enter Email ID',
                          'valid_email' => 'Please enter a valid Email ID'
                    ));
            $this->form_validation->set_rules('password', 'Password', 'trim|required',
                        array('required' => 'Please enter Password'));

            //If form is successfully validated
            if ($this->form_validation->run() == true) {

                //Get system settings
                $settings = getSettings();

                //Post fields
                $email = $this->input->post('email');
                $password = $this->input->post('password');

                $client = new Client(); 
                $result = $client->post(API_BASE_PATH.'/auth/login', array(
                            'json' => array(
                                'email'     => $email,
                                'password'  => $password
                            )));
                $response = json_decode($result->getBody()->getContents(), true);

                //If user not found or the password mismatched, throw error
                if (!isset($response['status']) || $response['status'] != 'success' || !isset($response['data']['token'])) {
                    $loginErr = 'Incorrect Email or Password';
                    if (isset($settings['invalid_login_message']) &&
                       !empty($settings['invalid_login_message'])) {
                        $loginErr = $settings['invalid_login_message'];
                    }
                    $this->session->set_flashdata('formErrors', array($loginErr));
                    redirect(base_url('auth/login'));
                } else {

                    $user = $this->doctrine->em->getRepository('Entity\User')
                                            ->findOneBy(array(
                                                'email' => $email,
                                                'status' => 'ACTIVE',
                                            ));

                    //If user matched successfully, then store user in session
                    $loggedUser = array(
                        'id'            => $user->getId(),
                        'email'         => $user->getEmail(),
                        'userGroupId'   => (string)$user->getUserGroup()->getId(),
                        'roleId'        => $user->getUserGroup()->getRole()->getId(),
                        'firstName'     => $user->getName(),
                        'lastName'      => $user->getName(),
                        'fullName'      => $user->getName(),
                        'photo'         => $user->getPhoto(),
                        'createdOn'     => $user->getCreatedAt()->format('Y-m-d'),
                    );

                    $this->session->set_userdata('loggedUser', $loggedUser);
                    $this->session->set_userdata('accessToken', $response['data']['token']);

                    //Update sessionMenuPermissions variable
                    $this->navigation->setSessionMenuPermissions();

                    //Redirect to user dashboard
                    redirect(base_url('my-account'));
                }
            } else {

                //Throw the validation errors, if validation not successful
                $errors = $this->form_validation->error_array();
                $this->session->set_flashdata('formErrors', $errors);
                redirect(base_url('auth/login'));
            }
        } else {

            //If get request instead of form submission, show view form
            return $this->load->view('layout/frontend', array(
                'content' => $this->load->view('auth/login', array(), true),
                'metaTitle' => 'Login Into Your Account',
            ));
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
    public function email_exists($email)
    {
        $record = $this->objectManager->getRepository('Entity\User')->findOneBy(array('email' => $email));

        return $record === null;
    }

    /**
     * register action.
     * 
     * Handels user registration
     */
    public function register()
    {

        //If form was submitted
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            //Validate form fields
            $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean',
                    array('required' => 'Please enter First Name'));
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_email_exists|xss_clean',
                    array('required' => 'Please enter Email ID',
                        'valid_email' => 'Please enter valid a Email ID',
                        'email_exists' => 'Email ID already taken'));
            $this->form_validation->set_rules('password', 'Password', 'trim|required',
                    array('required' => 'Please enter Password'));
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]',
                    array('required' => 'Please enter Confirm Password',
                          'matches' => 'Password does not match with Confirm Password'
                    ));

            //If form is successfully validated
            if ($this->form_validation->run() == true) {

                //Get system settings
                $settings = getSettings();

                //Try to save user in database and catch errors if any occurs
                try {

                    //Prepare user parameters
                    $firstName = $this->input->post('first_name');
                    $lastName = $this->input->post('last_name');
                    $email = $this->input->post('email');
                    $password = $this->input->post('password');
                    $passwordHash = Utils::hash($this->input->post('password'));
                    $role = $this->objectManager->getRepository('Entity\Role')->find(GUEST_ROLE_ID);
                    $userGroup = $this->objectManager->getRepository('Entity\UserGroup')->find(GUEST_GROUP_ID);
                    $status = ($settings['enable_signup_email_confirmation'] == 1) ? 'INACTIVE' : 'ACTIVE';

                    //Create User object and set properties
                    $user = new User();
                    $user->setFirstName($firstName);
                    $user->setLastName($lastName);
                    $user->setEmail($email);
                    $user->setRole($role);
                    $user->setUserGroup($userGroup);
                    $user->setPassword($passwordHash);
                    $user->setCreatedOn(new DateTime());
                    $user->setStatus($status);

                    //Persist and flush the user
                    $this->objectManager->persist($user);
                    $this->objectManager->flush();

                    //If signup confirmation email is enabled from backend
                    if ($settings['enable_signup_email_confirmation'] == 1) {

                        //Create confirmation link
                        $userInfoString = json_encode(array('userId' => $user->getId(), 'dateCreated' => date('Y-m-d')));
                        $encryptedString = rawurlencode($this->utils->encrypt($userInfoString));
                        $confirmationLink = base_url('auth/confirm-registration').'?salt='.$encryptedString;

                        //Send the email with confirmation link
                        $mailReplaceArray = array(
                            '[NAME]' => $firstName.' '.$lastName,
                            '[CONFIRMATION_LINK]' => $confirmationLink,
                        );
                        $send = $this->swiftmailer->sendmail('signup_confirm', $email, $mailReplaceArray);

                        //If sign up confirm notification message is set from backend
                        $message = (isset($settings['signup_confirm_message']) && !empty($settings['signup_confirm_message'])) ? $settings['signup_confirm_message'] : 'A confirmation link has been sent to your email ID to complete your registration.';
                    } else {

                        //If sign up success email is enabled from backend then send a mail to respected user
                        if (isset($settings['send_signup_success_email']) && $settings['send_signup_success_email'] == 1) {
                            $mailReplaceArray = array(
                                '[NAME]' => $firstName.' '.$lastName,
                                '[EMAIL]' => $email,
                                '[PASSWORD]' => $password,
                            );
                            $send = $this->swiftmailer->sendmail('signup_success', $email, $mailReplaceArray);
                        }

                        //If sign up success notification message is set by backend
                        $message = (isset($settings['signup_success_message']) && !empty($settings['signup_success_message'])) ? $settings['signup_success_message'] : 'Registration successfully!!';
                    }

                    //Set notification message in session flash messanger for next request
                    //and redirect to login page
                    $this->session->set_flashdata('messages', array('success@#@'.$message));
                    redirect(base_url('auth/login'));
                } catch (Exception $e) {

                    //If email could not be sent due to any swift mailer error or other things
                    if ($e instanceof Swift_TransportException) {
                        $message = 'Registration successfull but confirmation email could not be sent.';
                    } else {
                        $message = 'Registration failed due to some error';
                    }
                    $message = (isset($settings['signup_failed_message']) && !empty($settings['signup_failed_message'])) ? $settings['signup_failed_message'] : $message;
                    $this->session->set_flashdata('messages', array('danger@#@'.$message));
                    redirect(base_url('auth/register'));
                }
            } else {
                //If form validation not successfully, throw validation errors
                $errors = $this->form_validation->error_array();
                $afterValidationData = $this->input->post();
                $afterValidationData['formErrors'] = $errors;

                return $this->load->view('layout/frontend', array(
                    'content' => $this->load->view('auth/register', $afterValidationData, true),
                    'metaTitle' => 'Create Your Account',
                ));
            }
        } else {
            //If request is get instead of form submission, show view form
            return $this->load->view('layout/frontend', array(
                'content' => $this->load->view('auth/register', array(), true),
                'metaTitle' => 'Create Your Account',
            ));
        }
    }

    /**
     * confirmregistration action.
     * 
     * Confirm action to complete the user registration
     */
    public function confirmregistration()
    {

        //Get the encrypted string that was send in the confirmation link
        $salt = rawurldecode($this->input->get('salt'));

        //Decrypt the encrypted string
        $decryptedSalt = $this->utils->decrypt($salt);

        //If it got decrypted successfully then proceed further
        if (!empty($decryptedSalt)) {

            //Get system settings
            $settings = getSettings();

            //Get the decrypted information in array format
            $arrayInfo = json_decode($decryptedSalt, true);
            $userId = $arrayInfo['userId'];

            //Get the user object for given user id
            $user = $this->doctrine->em->getRepository('Entity\User')->find($userId);

            //Make the user active and save it
            $user->setStatus('ACTIVE');
            $this->doctrine->em->persist($user);
            $this->doctrine->em->flush();

            //Set success notification message in session flash messanger for next request
            $message = (isset($settings['signup_success_message']) && !empty($settings['signup_success_message'])) ? $settings['signup_success_message'] : 'Registration successfully!!';
            $this->session->set_flashdata('messages', array('success@#@'.$message));
            redirect(base_url('auth/login'));
        } else {
            //Set error notification message in session flash messanger for next request
            $message = (isset($settings['confirm_email_failed_message']) && !empty($settings['confirm_email_failed_message'])) ? $settings['confirm_email_failed_message'] : 'Confirmation link seems to be expired or invalid.';
            $this->session->set_flashdata('messages', array('danger@#@'.$message));
            redirect(base_url('auth/register'));
        }
    }

    /**
     * forgotpassword action.
     * 
     * Handles forgot password functionality
     */
    public function forgotpassword()
    {

        //If forgot password form is submitted
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            //Validate signup form
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean',
                    array('required' => 'Please enter your registered Email ID',
                          'valid_email' => 'Please enter a valid Email ID'
                    ));

            //If form is successfully validated
            if ($this->form_validation->run() == true) {

                //Get system settings
                $settings = getSettings();

                //Try to check if email exists in database. If yes then send password
                //reset link
                try {

                    //User submitted email
                    $emailId = $this->input->post('email');

                    //Get the user for given email id
                    $user = $this->doctrine->em->getRepository('Entity\User')->findOneBy(array('email' => $emailId));

                    //If user not found in database
                    if ($user === null) {
                        return $this->load->view('layout/frontend', array(
                            'content' => $this->load->view('auth/forgotpassword', $_POST, true),
                            'errors' => array('No user found regarding this email'),
                        ));
                    }

                    //If user found, get user ID
                    $userId = $user->getId();

                    //Prepare Encrypted String
                    $userInfoString = json_encode(array('userId' => $userId, 'dateCreated' => date('Y-m-d H:i:s')));
                    $encryptedString = rawurlencode($this->utils->encrypt($userInfoString));
                    $resetPasswordLink = base_url('auth/reset-password').'?salt='.$encryptedString;

                    //Send the email with password reset link
                    $mailReplaceArray = array(
                        '[NAME]' => $user->getFirstName().' '.$user->getLastName(),
                        '[PASSWORD_RESET_LINK]' => $resetPasswordLink,
                    );
                    $send = $this->swiftmailer->sendmail('forgot_password', $emailId, $mailReplaceArray);

                    //Set success notification message in session flash messanger for next request
                    $message = (isset($settings['send_password_reset_link_success_message']) && !empty($settings['send_password_reset_link_success_message'])) ? $settings['send_password_reset_link_success_message'] : 'A password reset link has been sent to your email';
                    $this->session->set_flashdata('messages', array('success@#@'.$message));
                    redirect(base_url('auth/forgot-password'));
                } catch (Exception $e) {

                    //Set error notification message in session flash messanger for next request
                    $message = (isset($settings['send_password_reset_link_failed_message']) && !empty($settings['send_password_reset_link_failed_message'])) ? $settings['send_password_reset_link_failed_message'] : 'Password reset link could not be sent';
                    $this->session->set_flashdata('messages', array('danger@#@'.$message));
                    redirect(base_url('auth/forgot-password'));
                }
            } else {
                //If form validation not success, then throw validation errors
                $errors = $this->form_validation->error_array();
                $afterValidationData = $this->input->post();
                $afterValidationData['formErrors'] = $errors;

                return $this->load->view('layout/frontend', array(
                    'content' => $this->load->view('auth/forgotpassword', $afterValidationData, true),
                    'metaTitle' => 'Forgot Your Password?',
                ));
            }
        } else {
            //If request is get instead of form submission, show view form
            return $this->load->view('layout/frontend', array(
                'content' => $this->load->view('auth/forgotpassword', array(), true),
                'metaTitle' => 'Forgot Your Password',
            ));
        }
    }

    /**
     * resetpassword action.
     * 
     * Handles reset password functionality when user clicks on password reset link
     */
    public function resetpassword()
    {

        //Get the salt value from password reset link
        $salt = ($this->input->get('salt')) ? $this->input->get('salt') : null;

        //If salt is not found, redirect to login page
        if ($salt === null) {
            redirect(base_url('auth/login'));
        }

        //Check if request is POST. If yes then proceed with reset password
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            //Set form validation rules
            $this->form_validation->set_rules('password', 'Password', 'trim|required',
                    array('required' => 'Please enter Password',
                    ));
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]',
                    array('required' => 'Please enter Confirm Password',
                          'matches' => 'Password does not match with Confirm Password'
                    ));

            //If form is successfully validated
            if ($this->form_validation->run() == true) {

                //Get user submitted password and decrypt reset link salt value
                $password = $this->input->post('password');
                $decryptedSalt = $this->utils->decrypt(rawurldecode($salt));

                //If the decrypted salt string is valid
                if (!empty($decryptedSalt)) {

                    //Get system settings
                    $settings = getSettings();

                    //Get decrypted information in array format
                    $arrayInfo = json_decode($decryptedSalt, true);
                    $userId = $arrayInfo['userId'];

                    //Get appropriate user for given user id
                    $user = $this->doctrine->em->getRepository('Entity\User')->find($userId);
                    $encPassword = Utils::hash($password);
                    $user->setPassword($encPassword);

                    //Persist and save the entity
                    $this->objectManager->persist($user);
                    $this->objectManager->flush();

                    //Set success notification message in session flash messanger for next request
                    $message = (isset($settings['password_reset_success_message']) && !empty($settings['password_reset_success_message'])) ? $settings['password_reset_success_message'] : 'Password reset successfully';
                    $this->session->set_flashdata('messages', array('success@#@'.$message));
                    redirect(base_url('auth/login'));
                } else {

                    //Set error notification message in session flash messanger for next request
                    $message = (isset($settings['password_reset_failed_message']) && !empty($settings['password_reset_failed_message'])) ? $settings['password_reset_failed_message'] : 'Password reset link seems to be invalid or expired';
                    $this->session->set_flashdata('messages', array('danger@#@'.$message));
                    redirect(base_url('auth/reset-password?salt='.rawurlencode($salt)));
                }
            } else {

                //If form not validated then show errors
                $errors = $this->form_validation->error_array();
                $afterValidationData = array();
                $afterValidationData['formErrors'] = $errors;
                $afterValidationData['salt'] = $salt;

                return $this->load->view('layout/frontend', array(
                    'content' => $this->load->view('auth/resetpassword', $afterValidationData, true),
                    'metaTitle' => 'Reset Your Password',
                ));
            }
        } else {

            //If request is get instead of form submission, show view form
            return $this->load->view('layout/frontend', array(
                'content' => $this->load->view('auth/resetpassword', array('salt' => $salt), true),
                'metaTitle' => 'Reset Your Password',
            ));
        }
    }

    /**
     * logout action.
     * 
     * Clear outs all sessions and logs out the user
     */
    public function logout()
    {

        //Get all session data stored by user
        $user_data = $this->session->all_userdata();

        //Iterate over the data and remove all except certain important things
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }

        //Destroy the session
        $this->session->sess_destroy();

        //Redirect to login page after successfully logout
        redirect(base_url('auth/login'));
    }

    /**
     * social action.
     * 
     * Login through social media sites (Facebook, google, twitter, linkedin etc.)
     */
    public function social($provider)
    {

        //Log when login initialized
        log_message('debug', "controllers.HAuth.login($provider) called");

        try {
            log_message('debug', 'controllers.HAuth.login: loading HybridAuthLib');

            //Load the hybridauth library
            $this->load->library('HybridAuthLib');

            //Check if the social website login is enabled or not
            if ($this->hybridauthlib->providerEnabled($provider)) {
                log_message('debug', "controllers.HAuth.login: service $provider enabled, trying to authenticate.");

                //If it is enabled then get the service object
                $service = $this->hybridauthlib->authenticate($provider);

                if ($service->isUserConnected()) {
                    log_message('debug', 'controller.HAuth.login: user authenticated.');

                    //Get logged user profile
                    $userProfile = $service->getUserProfile();

                    log_message('info', 'controllers.HAuth.login: user profile:'.PHP_EOL.print_r($userProfile, true));

                    //Access Token Info
                    $accessTokenData = $service->getAccessToken();

                    //Register the user after oauth if not exist in database
                    $registeredUser = $this->registerOauthUser($userProfile, $accessTokenData, $provider);

                    //If user registered successfully, create user session and let the user login
                    if ($registeredUser) {
                        $loggedUser = array(
                            'id' => $registeredUser->getId(),
                            'email' => $registeredUser->getEmail(),
                            'userGroupId' => $registeredUser->getUserGroup()->getId(),
                            'roleId' => $registeredUser->getUserGroup()->getRole()->getId(),
                            'firstName' => $registeredUser->getFirstName(),
                            'lastName' => $registeredUser->getLastName(),
                            'fullName' => $registeredUser->getFirstName().' '.$registeredUser->getLastName(),
                            'photo' => $registeredUser->getPhoto(),
                            'createdOn' => $registeredUser->getCreatedOn()->format('Y-m-d'),
                        );

                        $this->session->set_userdata('loggedUser', $loggedUser);

                        //Update sessionMenuPermissions variable
                        $this->navigation->setSessionMenuPermissions();

                        //Redirect to user dashboard
                        redirect(base_url('my-account'));
                    }
                } else {
                    // Cannot authenticate user
                    show_error('Cannot authenticate user');
                }
            } else {
                // This service is not enabled.
                log_message('error', 'controllers.HAuth.login: This provider is not enabled ('.$provider.')');
                show_404($_SERVER['REQUEST_URI']);
            }
        } catch (Exception $e) {
            $error = 'Unexpected error';

            switch ($e->getCode()) {

                case 0 : $error = 'Unspecified error.';
                    break;
                case 1 : $error = 'Hybriauth configuration error.';
                    break;
                case 2 : $error = 'Provider not properly configured.';
                    break;
                case 3 : $error = 'Unknown or disabled provider.';
                    break;
                case 4 : $error = 'Missing provider application credentials.';
                    break;
                case 5 : log_message('debug', 'controllers.HAuth.login: Authentification failed. The user has canceled the authentication or the provider refused the connection.');
                    //redirect();
                    if (isset($service)) {
                        log_message('debug', 'controllers.HAuth.login: logging out from service.');
                        $service->logout();
                    }
                    show_error('User has cancelled the authentication or the provider refused the connection.');
                    break;
                case 6 : $error = 'User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again.';
                    break;
                case 7 : $error = 'User not connected to the provider.';
                    break;
            }

            if (isset($service)) {
                $service->logout();
            }

            log_message('error', 'controllers.HAuth.login: '.$error);
            show_error('Error authenticating user.');
        }
    }

    /**
     * endpont action.
     * 
     * Social media oauth redirect action. Each user will reach here 
     * after authenticating from social site.
     */
    public function endpoint()
    {
        log_message('debug', 'controllers.HAuth.endpoint called.');
        log_message('info', 'controllers.HAuth.endpoint: $_REQUEST: '.print_r($_REQUEST, true));

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            log_message('debug', 'controllers.HAuth.endpoint: the request method is GET, copying REQUEST array into GET array.');
            $_GET = $_REQUEST;
        }

        log_message('debug', 'controllers.HAuth.endpoint: loading the original HybridAuth endpoint script.');
        require_once APPPATH.'/third_party/hybridauth/index.php';
    }

    /**
     * registerOauthUser function.
     * 
     * Registers a user after authenticating from social media site
     * 
     * @param type $userProfile     User profile got after authentication
     * @param type $accessTokenData Access token information
     * @param type $provider        P      rovider Name
     * 
     * @return bool
     */
    private function registerOauthUser($userProfile, $accessTokenData, $provider)
    {
        $socialType = strtoupper($provider);

        //Access Token Informatoiin
        $accessToken = $accessTokenData['access_token'];
        $accessTokenSecret = $accessTokenData['access_token_secret'];
        $refreshToken = $accessTokenData['refresh_token'];
        $accessTokenExpiresIn = $accessTokenData['expires_in'];
        $accessTokenExpiresAt = date('Y-m-d H:i:s', strtotime($accessTokenData['expires_at']));

        //User Information
        $identifier = $userProfile->identifier;
        $firstName = ($userProfile->firstName) ? $userProfile->firstName : null;
        $lastName = ($userProfile->lastName) ? $userProfile->lastName : null;
        $displayName = ($userProfile->displayName) ? $userProfile->displayName : null;
        $gender = ($userProfile->gender) ? $userProfile->gender : null;
        $email = ($userProfile->email) ? $userProfile->email : null;
        //$emailVerified  = ($userProfile->emailVerified) ? $userProfile->emailVerified : NULL;
        $photoURL = ($userProfile->photoURL) ? $userProfile->photoURL : null;
        $profileURL = ($userProfile->profileURL) ? $userProfile->profileURL : null;
        $birthDay = ($userProfile->birthDay) ? $userProfile->birthDay : null;
        $birthMonth = ($userProfile->birthMonth) ? $userProfile->birthMonth : null;
        $birthYear = ($userProfile->birthYear) ? $userProfile->birthYear : null;
        $birthDate = null;
        if ($birthDay && $birthMonth && $birthYear) {
            $birthDate = (string) $birthYear.'-'.$birthMonth.'-'.$birthDay;
        }
        if (!$displayName) {
            $displayName = $firstName.' '.$lastName;
        }
        if (strtolower($gender) == 'm' || strtolower($gender) == 'male') {
            $gender = 'MALE';
        } elseif (strtolower($gender) == 'f' || strtolower($gender) == 'female') {
            $gender = 'FEMALE';
        }

        if (!$identifier || !$displayName || !$email) {
            return false;
        }

        //Find if a user already exists
        $user = $this->objectManager->getRepository('Entity\User')->findOneBy(array('email' => $email));

        //If user not found then register as a new user with random password
        if ($user === null) {

            //Create User object
            $user = new User();
            $userGroup = $this->objectManager->getRepository('Entity\UserGroup')->findOneBy(array('id' => GUEST_ROLE_ID));
            $role = $this->objectManager->getRepository('Entity\Role')->findOneBy(array('id' => GUEST_GROUP_ID));
            $password = Utils::generateRandomString();
            $encryptedPass = Utils::hash($password);

            //Set User object properties
            $user->setEmail($email);
            $user->setPassword($encryptedPass);
            $user->setFirstName($firstName);
            $user->setLastName($lastName);
            $user->setPhoto($photoURL);
            $user->setUserGroup($userGroup);
            $user->setRole($role);
            $user->setCreatedOn(new DateTime());
            $user->setStatus('ACTIVE');
            if (!empty($birthDate)) {
                $user->setBirthDate(new DateTime($birthDate));
            }
            if (!empty($gender)) {
                $user->setGender(strtoupper($gender));
            }

            //Persist User object
            $this->objectManager->persist($user);

            //Create SocialLogin object to store his/here access token information
            $socialLogin = new SocialLogin();
            $socialLogin->setUser($user);
            $socialLogin->setSocialId($identifier);
            $socialLogin->setProfileUrl($profileURL);
            $socialLogin->setSocialType($socialType);
            $socialLogin->setAccessToken($accessToken);
            $socialLogin->setAccessTokenSecret($accessTokenSecret);
            $socialLogin->setAccessTokenExpiresAt(new DateTime($accessTokenExpiresAt));
            $socialLogin->setAccessTokenExpiresIn($accessTokenExpiresIn);
            $socialLogin->setRefreshToken($refreshToken);
            $socialLogin->setCreatedOn(new DateTime());

            //Persist and flush both User and SocialLogin objects
            $this->objectManager->persist($socialLogin);
            $this->objectManager->flush();

            //Try to send the email to user with login credentials for future
            try {
                $mailReplaceArray = array(
                    '[NAME]' => $displayName,
                    '[PROVIDER]' => $provider,
                    '[EMAIL]' => $email,
                    '[PASSWORD]' => $password,
                );
                $this->swiftmailer->sendmail('signup_through_social_media', $email, $mailReplaceArray);
            } catch (Exception $exc) {
                //TO DO
            }
        } else {

            //If user already exists then update his/her access token
            $user = $this->objectManager->getRepository('Entity\User')->findOneBy(array('email' => $email));
            $user->setPhoto($photoURL);

            $socialLogin = $this->objectManager->getRepository('Entity\SocialLogin')->findOneBy(array('user' => $user, 'socialType' => $socialType));
            if ($socialLogin === null) {
                $socialLogin = new SocialLogin();
                $socialLogin->setUser($user);
                $socialLogin->setSocialType($socialType);
                $socialLogin->setCreatedOn(new DateTime());
            } else {
                $socialLogin->setUpdatedOn(new DateTime());
            }
            $socialLogin->setSocialId($identifier);
            $socialLogin->setProfileUrl($profileURL);
            $socialLogin->setAccessToken($accessToken);
            $socialLogin->setAccessTokenSecret($accessTokenSecret);
            $socialLogin->setAccessTokenExpiresAt(new DateTime($accessTokenExpiresAt));
            $socialLogin->setAccessTokenExpiresIn($accessTokenExpiresIn);
            $socialLogin->setRefreshToken($refreshToken);

            $this->objectManager->persist($user);
            $this->objectManager->persist($socialLogin);
            $this->objectManager->flush();
        }

        return $user;
    }
}
