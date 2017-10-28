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

if (!function_exists('encrypt')) {

    /**
     * Function to encrypt data using encryption key defined in constant.php.
     *
     * @param string $string
     * @param string $salt
     *
     * @return string
     */
    function encrypt($string, $salt = null)
    {
        $key = ($salt === null) ? ENCRYPTION_KEY : $salt;

        return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))));
    }
}

if (!function_exists('decrypt')) {

    /**
     * Function to decrypt data using encryption key defined in constant.php.
     *
     * @param string $encrypted
     * @param string $salt
     *
     * @return string
     */
    function decrypt($encrypted, $salt = null)
    {
        $key = ($salt === null) ? ENCRYPTION_KEY : $salt;

        return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($encrypted), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
    }
}

if (!function_exists('getCountryDropdown')) {

    /**
     * get country dropdown list.
     *
     * @param bool $selectOption
     *
     * @return array
     */
    function getCountryDropdown($selectOption = false)
    {
        $ci = &get_instance();
        $ci->load->library('doctrine');
        $countries = $ci->doctrine->em->getRepository('Entity\Country')->findBy([], ['countryName' => 'ASC']);
        $dropdown = [];
        if ($selectOption) {
            $dropdown[''] = 'Select Country';
        }
        if (!empty($countries)) {
            foreach ($countries as $country) {
                $dropdown[$country->getId()] = $country->getCountryName();
            }
        }

        return $dropdown;
    }
}

if (!function_exists('getStateDropdown')) {

    /**
     * get state dropdown list.
     *
     * @param int  $countryId
     * @param bool $selectOption
     *
     * @return array
     */
    function getStateDropdown($countryId = null, $selectOption = false)
    {
        $ci = &get_instance();
        $ci->load->library('doctrine');
        if ($countryId !== null) {
            $states = $ci->doctrine->em->getRepository('Entity\State')->findBy(['countryId' => $countryId], ['stateName' => 'ASC']);
        } else {
            $states = $ci->doctrine->em->getRepository('Entity\State')->findBy([], ['stateName' => 'ASC']);
        }

        $dropdown = [];
        if ($selectOption) {
            $dropdown[''] = 'Select State';
        }
        if (!empty($states)) {
            foreach ($states as $state) {
                $dropdown[$state->getId()] = $state->getStateName();
            }
        }

        return $dropdown;
    }
}

if (!function_exists('getCityDropdown')) {

    /**
     * get city dropdown list.
     *
     * @param int  $stateId
     * @param bool $selectOption
     *
     * @return array
     */
    function getCityDropdown($stateId = null, $selectOption = false)
    {
        $ci = &get_instance();
        $ci->load->library('doctrine');
        if ($stateId !== null) {
            $cities = $ci->doctrine->em->getRepository('Entity\City')->findBy(['stateId' => $stateId], ['cityName' => 'ASC']);
        } else {
            $cities = $ci->doctrine->em->getRepository('Entity\City')->findBy([], ['cityName' => 'ASC']);
        }

        $dropdown = [];
        if ($selectOption) {
            $dropdown[''] = 'Select City';
        }
        if (!empty($cities)) {
            foreach ($cities as $city) {
                $dropdown[$city->getId()] = $city->getCityName();
            }
        }

        return $dropdown;
    }
}

if (!function_exists('getUserDropdown')) {

    /**
     * Get user dropdown list.
     *
     * @param bool $excludeInActive
     *
     * @return string
     */
    function getUserDropdown($excludeInActive = true)
    {
        $ci = &get_instance();
        $ci->load->library('doctrine');
        $users = $ci->doctrine->em->getRepository('Entity\User')->findBy([], ['firstName' => 'ASC']);
        $dropdown = [];
        if (!empty($users)) {
            foreach ($users as $user) {
                if ($excludeInActive && $user->getStatus() == 'INACTIVE') {
                    continue;
                }
                $dropdown[$user->getId()] = $user->getFirstName().' '.$user->getLastName();
            }
        }

        return $dropdown;
    }
}

if (!function_exists('getLinkCategoryDropdown')) {

    /**
     * Get link category dropdown list.
     *
     * @param bool $selectOption
     *
     * @return array
     */
    function getLinkCategoryDropdown($selectOption = false)
    {
        $ci = &get_instance();
        $ci->load->library('doctrine');
        $categories = $ci->doctrine->em->getRepository('Entity\LinkCategory')->findAll();
        $dropdown = [];
        if ($selectOption) {
            $dropdown[''] = 'Select Link Category';
        }
        if (!empty($categories)) {
            foreach ($categories as $category) {
                $dropdown[$category->getId()] = $category->getName();
            }
        }

        return $dropdown;
    }
}

if (!function_exists('getLinkDropdown')) {

    /**
     * Get link dropdown list.
     *
     * @param bool $onlyParent
     * @param int  $linkCategoryId
     *
     * @return array
     */
    function getLinkDropdown($onlyParent = false, $linkCategoryId = null)
    {
        $ci = &get_instance();
        $ci->load->library('doctrine');
        if (!$linkCategoryId) {
            $links = $ci->doctrine->em->getRepository('Entity\Link')->findAll();
        } else {
            $linkCategory = $ci->doctrine->em->getRepository('Entity\LinkCategory')->find($linkCategoryId);
            $links = $ci->doctrine->em->getRepository('Entity\Link')->findBy(['linkCategory' => $linkCategory]);
        }
        $dropdown = [];
        if (!empty($links)) {
            foreach ($links as $link) {
                if ($onlyParent && $link->getParentId() != 0) {
                    continue;
                }
                $dropdown[$link->getId()] = $link->getName();
            }
        }

        return $dropdown;
    }
}

if (!function_exists('getUserRoleDropdown')) {

    /**
     * Get user role dropdown list.
     *
     * @param bool $selectOption
     *
     * @return array
     */
    function getUserRoleDropdown($selectOption = false)
    {
        $ci = &get_instance();
        $ci->load->library('doctrine');
        $roles = $ci->doctrine->em->getRepository('Entity\Role')->findAll();
        $dropdown = [];
        if ($selectOption) {
            $dropdown[''] = 'Select User Role';
        }
        if (!empty($roles)) {
            foreach ($roles as $role) {
                $dropdown[$role->getId()] = $role->getRole();
            }
        }

        return $dropdown;
    }
}

if (!function_exists('getUserGroupDropdown')) {

    /**
     * Get user group dropdown list.
     *
     * @param bool $selectOption
     * @param bool $excludeInActive
     *
     * @return array
     */
    function getUserGroupDropdown($selectOption = false, $excludeInActive = true)
    {
        $ci = &get_instance();
        $ci->load->library('doctrine');
        $groups = $ci->doctrine->em->getRepository('Entity\UserGroup')->findAll();
        $dropdown = [];
        if ($selectOption) {
            $dropdown[''] = 'Select User Group';
        }
        if (!empty($groups)) {
            foreach ($groups as $group) {
                if ($excludeInActive && $group->getStatus() == 'INACTIVE') {
                    continue;
                }
                $dropdown[$group->getId()] = $group->getGroupName();
            }
        }

        return $dropdown;
    }
}

if (!function_exists('getLoggedUserData')) {

    /**
     * Get logged user data.
     *
     * @return array
     */
    function getLoggedUserData()
    {
        $ci = &get_instance();

        return $ci->session->userdata('loggedUser');
    }
}

if (!function_exists('getSystemSettings')) {

    /**
     * Get system settings.
     *
     * @return array
     */
    function getSystemSettings()
    {
        $ci = &get_instance();

        return $ci->session->userdata('settings');
    }
}

if (!function_exists('getNavigationMenus')) {

    /**
     * Get navigation menus.
     *
     * @return array
     */
    function getNavigationMenus()
    {
        $ci = &get_instance();

        return $ci->navigation->getPermittedLinks();
    }
}

/**
 * Check menu permission.
 *
 * @param string $alias
 * @param string $permission
 * @param bool   $redirect
 *
 * @return bool
 */
function checkMenuPermission($alias, $permission, $redirect = false)
{
    $ci = &get_instance();
    $menuPermissions = $ci->navigation->getSessionMenuPermissions();

    if (empty($menuPermissions[$alias]) || !in_array($permission, $menuPermissions[$alias])) {
        if ($redirect) {
            if ($ci->input->is_ajax_request()) {
                header('Content-Type: application/json');
                echo json_encode([
                    'html'         => '',
                    'notification' => [
                        [
                            'status'  => 'error',
                            'message' => 'Sorry! You are not authorised to access this resource',
                            'type'    => 'toastr',
                        ],
                    ],
                ]);
                exit;
            } else {
                $ci->session->set_flashdata('messages', ['danger@#@Sorry! You are not authorised to access this resource']);
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            return false;
        }
    } else {
        return true;
    }
}

/**
 * Check if email is valid.
 *
 * @param string $email
 *
 * @return bool
 */
function isValidEmail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        return true;
    } else {
        return false;
    }
}

/**
 * Creates string slug.
 *
 * @param string $text
 *
 * @return string
 */
function slugify($text)
{
    $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
    $text = trim($text, '-');
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    $text = strtolower($text);
    $text = preg_replace('~[^-\w]+~', '', $text);
    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}

/**
 * Generates random sting.
 *
 * @param int $length
 *
 * @return string
 */
function generateRandomPassword($length = 8)
{
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $password = substr(str_shuffle($chars), 0, $length);

    return $password;
}

/**
 * Get system settings.
 *
 * @return array $settings
 */
function getSettings()
{
    $ci = &get_instance();
    $settings = [];
    $settingEntity = $ci->doctrine->em->getRepository('Entity\Setting')->findAll();
    foreach ($settingEntity as $setting) {
        $settings[$setting->getKey()] = $setting->getValue();
    }

    return $settings;
}

/**
 * Generate Random String.
 *
 * @return array $settings
 */
function generateRandomString($length = 20)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    return $randomString;
}

/**
 * Convert Time Format To Seconds.
 */
function convertTimeFormatToSeconds($str_time)
{
    $str_time = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", '00:$1:$2', $str_time);

    sscanf($str_time, '%d:%d:%d', $hours, $minutes, $seconds);

    return $hours * 3600 + $minutes * 60 + $seconds;
}

/**
 * Convert Seconds To Time Format.
 */
function convertSecondsToTimeFormat($seconds)
{
    $t = round($seconds);

    return sprintf('%02d:%02d:%02d', ($t / 3600), ($t / 60 % 60), $t % 60);
}
