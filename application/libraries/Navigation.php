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
 * Navigation Class.
 *
 * Provides only permitted navigation menus for both frontend and backend
 *
 * @category	Library
 *
 * @author	Manish Jangir <manishjangir.com>
 */
class Navigation
{
    /**
     * Codeigniter Singleton Instance.
     * 
     * @var object
     */
    private $ci;

    /**
     * Class constructor.
     * 
     * Sets Codeigniter instance
     */
    public function __construct()
    {

        //Assign CI instance
        $this->ci = &get_instance();
    }

    /**
     * Method to prepare nested array of menus.
     * 
     * @param array $arr
     * @param int   $parent
     * 
     * @return array
     */
    public function getNestedMenus($arr, $parent = 0)
    {
        $navigation = array();
        foreach ($arr as $menu) {
            if ($menu['parent_id'] == $parent) {
                $menu['sub'] = isset($menu['sub']) ? $menu['sub'] : $this->getNestedMenus($arr, $menu['link_id']);
                $navigation[] = $menu;
            }
        }

        return $navigation;
    }

    /**
     * Returns permitted menus for logged in user.
     * 
     * @return array $navigationMenus
     */
    public function getPermittedLinks()
    {

        //Get doctrine object manager
        $objectManager = $this->ci->doctrine->em;

        //Get logged in user data
        $loggedUser = getLoggedUserData();

        //Set guest user group id by default as it is accessible to all
        $groupIds = array(1);

        //If user is logged in then get his role id and accessible user group id
        //If user is admin then he can access all portals
        if (!empty($loggedUser)) {
            $roleId = $loggedUser['roleId'];
            $groupIds[] = $loggedUser['userGroupId'];
            if ($roleId == 4) {
                $groupIds[] = 3;
                $groupIds[] = 2;
            }
        }
        sort($groupIds);
        $whereGroup = array();
        foreach ($groupIds as $groupId) {
            $whereGroup[] = $objectManager->getRepository('Entity\UserGroup')->find($groupId);
        }

        //$links = $objectManager->getRepository('Entity\LinkPermission')->findBy(array('group' => $whereGroup));
        $links = $objectManager->getRepository('Entity\Link')->getMenus($groupIds);
        
        $linkArray = array();
        foreach ($links as $link) {
            if ($link->getLink()->getStatus() == 'INACTIVE') {
                continue;
            }
            $linkCategoryAlias = $link->getLink()->getLinkCategory()->getAlias();
            $userGroupId = $link->getGroup()->getId();
            $permissions = $link->getPermissions();
            $linkId = $link->getLink()->getId();
            $linkName = $link->getLink()->getName();
            $linkAlias = $link->getLink()->getAlias();
            $parentLinkId = $link->getLink()->getParentId();
            $icon = $link->getLink()->getIcon();
            $href = $link->getLink()->getHref();
            $linkOrder = $link->getLink()->getLinkOrder();

            if (strpos($href, 'http') !== true) {
                $href = base_url($href);
            }

            $linkArray[$linkCategoryAlias][] = array(
                'link_id' => $linkId,
                'link_name' => $linkName,
                'link_alias' => $linkAlias,
                'parent_id' => $parentLinkId,
                'permissions' => $permissions,
                'user_group_id' => $userGroupId,
                'anchor_href' => $href,
                'link_icon' => $icon,
                'order' => $linkOrder
            );
        }
        $navigationMenus = array();
        foreach ($linkArray as $linkCategoryAlias => $menuGroup) {
            $navigationMenus[$linkCategoryAlias] = $this->getNestedMenus($menuGroup);
        }

        return $navigationMenus;
    }

    /**
     * When the permissions of links will updated, sessionMenuPermissions session variable will also get updated.
     */
    public function setSessionMenuPermissions()
    {
        $menuPermissions = array();
        $objectManager = $this->ci->doctrine->em;
        $loggedUser = getLoggedUserData();
        $userGroupId = $loggedUser['userGroupId'];
        $userGroup = $objectManager->getRepository('Entity\UserGroup')->find($userGroupId);
        $links = $objectManager->getRepository('Entity\LinkPermission')->findBy(array('group' => $userGroup));

        foreach ($links as $link) {
            $alias = $link->getLink()->getAlias();
            $permissions = $link->getPermissions();
            $permissions = json_decode($permissions);
            $menuPermissions[$alias] = $permissions;
        }
        $this->ci->session->set_userdata('sessionMenuPermissions', $menuPermissions);
    }

    /**
     * Get sessionMenuPermissions method.
     * 
     * @return array Returns array of menus stored in session
     */
    public function getSessionMenuPermissions()
    {
        return $this->ci->session->userdata('sessionMenuPermissions');
    }
}
