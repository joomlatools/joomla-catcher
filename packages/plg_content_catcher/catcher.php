<?php
/**
 * @package     Catcher
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        https://github.com/nooku/joomla-catcher for the canonical source repository
 */
defined('_JEXEC') or die;

require_once JPATH_LIBRARIES . '/catcher/plugin/abstract.php';

/**
 * Catcher Content Plugin.
 */
class PlgContentCatcher extends LibCatcherPluginAbstract
{
    public function onContentChangeState($context, $pks, $value)
    {
        $data = array('items' => $pks, 'state' => $value);

        $this->_publishMessage(array(
            'event'      => 'onContentChangeState',
            'parameters' => array('onContentStateChange', $context),
            'data'       => $data
        ));
    }

    public function onContentBeforeSave($context, $data, $isNew)
    {
        $this->_publishMessage(array(
            'event'      => 'onContentBeforeSave',
            'parameters' => array('onContentBeforeSave', $context),
            'data'       => array('form' => $data),
            'new'        => $isNew
        ));
    }

    public function onContentAfterSave($context, $data, $isNew)
    {
        $this->_publishMessage(array(
            'event'      => 'onContentAfterSave',
            'parameters' => array('onContentAfterSave', $context),
            'data'       => array('item' => $data),
            'new'        => $isNew
        ));
    }

    public function onContentBeforeDelete($context, $data)
    {
        $this->_publishMessage(array(
            'event'      => 'onContentBeforeDelete',
            'parameters' => array('onContentBeforeDelete', $context),
            'data'       => array('item' => $data)
        ));
    }

    public function onContentAfterDelete($context, $data)
    {
        $this->_publishMessage(array(
            'event'      => 'onContentAfterDelete',
            'parameters' => array('onContentAfterDelete', $context),
            'data'       => array('item' => $data)
        ));
    }

    public function onContentBeforeDisplay($context, $data, $params, $limitstart)
    {
        $this->_publishMessage(array(
            'event'      => 'onContentBeforeDisplay',
            'parameters' => array('onContentBeforeDisplay', $context),
            'data'       => array('item' => $data, 'parameters' => $params, 'limitstart' => $limitstart)
        ));
    }

    public function onContentAfterDisplay($context, $data, $params, $limitstart)
    {
        $this->_publishMessage(array(
            'event'      => 'onContentAfterDisplay',
            'parameters' => array('onContentAfterDisplay', $context),
            'data'       => array('item' => $data, 'parameters' => $params, 'limitstart' => $limitstart)
        ));
    }

    public function onContentAfterTitle($context, $data, $params, $limitstart)
    {
        $this->_publishMessage(array(
            'event'      => 'onContentAfterTitle',
            'parameters' => array('onContentAfterTitle', $context),
            'data'       => array('item' => $data, 'parameters' => $params, 'limitstart' => $limitstart)
        ));
    }

    public function onContentPrepare($context, $data, $params, $page)
    {
        $this->_publishMessage(array(
            'event'      => 'onContentPrepare',
            'parameters' => array('onContentPrepare', $context),
            'data'       => array('item' => $data, 'parameters' => $params, 'page' => $page)
        ));
    }

    public function onContentPrepareForm($form, $data)
    {
        $this->_publishMessage(array(
            'event'      => 'onContentPrepareForm',
            'message'    => '<strong>onContentPrepareForm</strong> has been triggered',
            'data'       => array('form' => $form->getName(), 'data' => $data)
        ));
    }

    public function onContentPrepareData($context, $data)
    {
        $this->_publishMessage(array(
            'event'      => 'onContentPrepareData',
            'parameters' => array('onContentPrepareData', $context),
            'data'       => array('form' => $data)
        ));
    }

    public function onContentSearch($text, $phrase, $ordering, $areas)
    {
        $this->_publishMessage(array(
            'event'      => 'onContentSearch',
            'message'    => '<strong>onContentSearch</strong> has been triggered',
            'data'       => array('text' => $text, 'phrase' => $phrase, 'ordering' => $ordering, 'areas' => $areas)
        ));
    }

    public function onContentSearchAreas()
    {
        $this->_publishMessage(array(
            'event'      => 'onContentSearchAreas',
            'message'    => '<strong>onContentSearchAreas</strong> has been triggered',
        ));
    }
}