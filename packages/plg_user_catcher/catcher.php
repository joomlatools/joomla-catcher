<?php
/**
 * @package     Catcher
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        https://github.com/joomlatools/joomla-catcher for the canonical source repository
 */
defined('_JEXEC') or die;

jimport('catcher.plugin.abstract');

/**
 * Catcher User Plugin.
 */
class PlgUserCatcher extends LibCatcherPluginAbstract
{
    public function onUserBeforeSave($data_old, $isNew, $data_current)
    {
        $this->_reportEvent('onUserBeforeSave', array(
            'data' => array(
                'user' => $data_old,
                'form' => $data_current
            ),
            'new'  => $isNew
        ));
    }

    public function onUserAfterSave($data, $isNew, $result)
    {
        $this->_reportEvent('onUserAfterSave', array(
            'data' => array('user' => $data, 'result' => $result),
            'new'  => $isNew
        ));
    }

    public function onUserBeforeDelete($data)
    {
        $this->_reportEvent('onUserBeforeDelete', array('data' => array('user' => $data)));
    }

    public function onUserAfterDelete($data)
    {
        $this->_reportEvent('onUserAfterDelete', array('data' => array('user' => $data)));
    }

    public function onUserBeforeSaveGroup($context, $data, $isNew)
    {
        $this->_reportEvent('onUserBeforeSaveGroup', array(
            'message' => array(
                'text'       => 'LIB_CATCHER_MESSAGE_CONTEXT',
                'parameters' => array('onUserBeforeSaveGroup', $context)
            ),
            'data'    => array('form' => $data),
            'new'     => $isNew
        ));
    }

    public function onUserAfterSaveGroup($context, $data, $isNew)
    {
        $this->_reportEvent('onUserAfterSaveGroup', array(
            'message' => array(
                'text'       => 'LIB_CATCHER_MESSAGE_CONTEXT',
                'parameters' => array('onUserAfterSaveGroup', $context)
            ),
            'data'    => array('group' => $data),
            'new'     => $isNew
        ));
    }

    public function onUserBeforeDeleteGroup($data)
    {
        $this->_reportEvent('onUserBeforeDeleteGroup', array('data' => array('group' => $data)));
    }

    public function onUserAfterDeleteGroup($data)
    {
        $this->_reportEvent('onUserAfterDeleteGroup', array('data' => array('group' => $data)));
    }

    public function onUserLogin($user, $options)
    {
        $this->_reportEvent('onUserLogin', array('data' => array('user' => $user, 'options' => $options)));
    }

    public function onUserAfterLogin($options)
    {
        $this->_reportEvent('onUserAfterLogin', array('data' => array('options' => $options)));
    }

    public function onUserLogout($credentials, $options)
    {
        $this->_reportEvent('onUserLogout', array(
            'data' => array(
                'credentials' => $credentials,
                'options'     => $options
            )
        ));
    }

    public function onUserAfterLogout($options)
    {
        $this->_reportEvent('onUserAfterLogout', array('data' => array('options' => $options)));
    }

    public function onUserLogoutFailure($parameters)
    {
        $this->_reportEvent('onUserLogoutFailure', array('data' => array('parameters' => $parameters)));
    }

    public function onUserLoginFailure($credentials, $response)
    {
        $this->_reportEvent('onUserLoginFailure', array(
            'data' => array(
                'credentials' => $credentials,
                'response'    => $response
            )
        ));
    }

    public function onUserAuthorisationFailure($authorization)
    {
        $this->_reportEvent('onUserAuthorisationFailure', array('data' => array('authorization' => $authorization)));
    }

    public function onUserAuthorisation($response, $options)
    {
        $this->_reportEvent('onUserAuthorisation', array(
            'data' => array(
                'response' => $response,
                'options'  => $options
            )
        ));
    }
}