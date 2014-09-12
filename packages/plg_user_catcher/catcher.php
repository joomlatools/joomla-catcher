<?php
/**
 * @package     Joomlatools Events Fix PR
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.joomlatools.com
 */
defined('_JEXEC') or die;

require_once JPATH_LIBRARIES . '/catcher/plugin/abstract.php';

/**
 * Catcher User Plugin.
 */
class PlgUserCatcher extends LibCatcherPluginAbstract
{
    public function onUserBeforeSave($data_old, $isNew, $data_current)
    {
        $this->_publishMessage(array(
            'event'   => 'onUserBeforeSave',
            'message' => '<strong>onUserBeforeSave</strong> has been triggered',
            'data'    => array(
                'user' => $data_old,
                'form' => $data_current
            ),
            'new'     => $isNew
        ));
    }

    public function onUserAfterSave($data, $isNew, $result)
    {
        $this->_publishMessage(array(
            'event'   => 'onUserAfterSave',
            'message' => '<strong>onUserAfterSave</strong> has been triggered',
            'data'    => array('user' => $data, 'result' => $result),
            'new'     => $isNew
        ));
    }

    public function onUserBeforeDelete($data)
    {
        $this->_publishMessage(array(
            'event'   => 'onUserBeforeDelete',
            'message' => '<strong>onUserBeforeDelete</strong> has been triggered',
            'data'    => array('user' => $data)
        ));
    }

    public function onUserAfterDelete($data)
    {
        $this->_publishMessage(array(
            'event'   => 'onUserAfterDelete',
            'message' => '<strong>onUserAfterDelete</strong> has been triggered',
            'data'    => array('user' => $data)
        ));
    }

    public function onUserBeforeSaveGroup($context, $data, $isNew)
    {
        $this->_publishMessage(array(
            'event'      => 'onUserBeforeSaveGroup',
            'parameters' => array('onUserBeforeSaveGroup', $context),
            'data'       => array('form' => $data),
            'new'        => $isNew
        ));
    }

    public function onUserAfterSaveGroup($context, $data, $isNew)
    {
        $this->_publishMessage(array(
            'event'      => 'onUserAfterSaveGroup',
            'parameters' => array('onUserAfterSaveGroup', $context),
            'data'       => array('group' => $data),
            'new'        => $isNew
        ));
    }

    public function onUserBeforeDeleteGroup($data)
    {
        $this->_publishMessage(array(
            'event'   => 'onUserBeforeDeleteGroup',
            'message' => '<strong>onUserBeforeDeleteGroup</strong> has been triggered',
            'data'    => array('group' => $data)
        ));
    }

    public function onUserAfterDeleteGroup($data)
    {
        $this->_publishMessage(array(
            'event'   => 'onUserAfterDeleteGroup',
            'message' => '<strong>onUserAfterDeleteGroup</strong> has been triggered',
            'data'    => array('group' => $data)
        ));
    }

    public function onUserLogin($user, $options)
    {
        $this->_publishMessage(array(
            'event'   => 'onUserLogin',
            'message' => '<strong>onUserLogin</strong> has been triggered',
            'data'    => array('user' => $user, 'options' => $options)
        ));
    }

    public function onUserAfterLogin($options)
    {
        $this->_publishMessage(array(
            'event'   => 'onUserAfterLogin',
            'message' => '<strong>onUserAfterLogin</strong> has been triggered',
            'data'    => array('options' => $options)
        ));
    }

    public function onUserLogout($credentials, $options)
    {
        $this->_publishMessage(array(
            'event'   => 'onUserLogout',
            'message' => '<strong>onUserLogout</strong> has been triggered',
            'data'    => array('credentials' => $credentials, 'options' => $options)
        ));
    }

    public function onUserAuthenticate($credentials)
    {
        $this->_publishMessage(array(
            'event'   => 'onUserAuthenticate',
            'message' => '<strong>onUserAuthenticate</strong> has been triggered',
            'data'    => array('credentials' => $credentials)
        ));
    }

    public function onUserLoginFailure($credentials, $response)
    {
        $this->_publishMessage(array(
            'event'   => 'onUserLoginFailure',
            'message' => '<strong>onUserLoginFailure</strong> has been triggered',
            'data'    => array('credentials' => $credentials, 'response' => $response)
        ));
    }


}