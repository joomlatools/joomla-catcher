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
 * Catcher Content Plugin.
 */
class PlgContentCatcher extends LibCatcherPluginAbstract
{
    public function onContentChangeState($context, $pks, $value)
    {
        $data = array('items' => $pks, 'state' => $value);

        $this->_reportEvent('onContentChangeState', array(
            'message' => array(
                'text'       => 'LIB_CATCHER_MESSAGE_CONTEXT',
                'parameters' => array('onContentStateChange', $context)
            ),
            'data'    => $data
        ));
    }

    public function onContentBeforeSave($context, $data, $isNew)
    {
        $this->_reportEvent('onContentBeforeSave', array(
            'message' => array(
                'text'       => 'LIB_CATCHER_MESSAGE_CONTEXT',
                'parameters' => array('onContentBeforeSave', $context)
            ),
            'data'    => array('form' => $data),
            'new'     => $isNew
        ));
    }

    public function onContentAfterSave($context, $data, $isNew)
    {
        $this->_reportEvent('onContentAfterSave', array(
            'message' => array(
                'text'       => 'LIB_CATCHER_MESSAGE_CONTEXT',
                'parameters' => array('onContentAfterSave', $context)
            ),
            'data'    => array('item' => $data),
            'new'     => $isNew
        ));
    }

    public function onContentBeforeDelete($context, $data)
    {
        $this->_reportEvent('onContentBeforeDelete', array(
            'message' => array(
                'text'       => 'LIB_CATCHER_MESSAGE_CONTEXT',
                'parameters' => array('onContentBeforeDelete', $context)
            ),
            'data'    => array('item' => $data)
        ));
    }

    public function onContentAfterDelete($context, $data)
    {
        $this->_reportEvent('onContentAfterDelete', array(
            'message' => array(
                'text'       => 'LIB_CATCHER_MESSAGE_CONTEXT',
                'parameters' => array('onContentAfterDelete', $context)
            ),
            'data'    => array('item' => $data)
        ));
    }

    public function onContentBeforeDisplay($context, $data, $params, $limitstart)
    {
        $this->_reportEvent('onContentBeforeDisplay', array(
            'message' => array(
                'text'       => 'LIB_CATCHER_MESSAGE_CONTEXT',
                'parameters' => array('onContentBeforeDisplay', $context)
            ),
            'data'    => array('item' => $data, 'parameters' => $params, 'limitstart' => $limitstart)
        ));
    }

    public function onContentAfterDisplay($context, $data, $params, $limitstart)
    {
        $this->_reportEvent('onContentAfterDisplay', array(
            'message' => array(
                'text'       => 'LIB_CATCHER_MESSAGE_CONTEXT',
                'parameters' => array('onContentAfterDisplay', $context)
            ),
            'data'    => array('item' => $data, 'parameters' => $params, 'limitstart' => $limitstart)
        ));
    }

    public function onContentAfterTitle($context, $data, $params, $limitstart)
    {
        $this->_reportEvent('onContentAfterTitle', array(
            'message' => array(
                'text'       => 'LIB_CATCHER_MESSAGE_CONTEXT',
                'parameters' => array('onContentAfterTitle', $context)
            ),
            'data'    => array('item' => $data, 'parameters' => $params, 'limitstart' => $limitstart)
        ));
    }

    public function onContentPrepare($context, $data, $params, $page)
    {
        $this->_reportEvent('onContentPrepare', array(
            'message' => array(
                'text'       => 'LIB_CATCHER_MESSAGE_CONTEXT',
                'parameters' => array('onContentPrepare', $context)
            ),
            'data'    => array('item' => $data, 'parameters' => $params, 'page' => $page)
        ));
    }

    public function onContentPrepareForm($form, $data)
    {
        $this->_reportEvent('onContentPrepareForm', array(
            'data' => array(
                'form' => $form->getName(),
                'data' => $data
            )
        ));
    }

    public function onContentPrepareData($context, $data)
    {
        $this->_reportEvent('onContentPrepareData', array(
            'message' => array(
                'text'       => 'LIB_CATCHER_MESSAGE_CONTEXT',
                'parameters' => array('onContentPrepareData', $context)
            ),
            'data'    => array('form' => $data)
        ));
    }
}