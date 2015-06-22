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
 * Catcher Extension Plugin.
 */
class PlgExtensionCatcher extends LibCatcherPluginAbstract
{
    public function onExtensionChangeState($context, $pks, $value)
    {
        $data = array('items' => $pks, 'state' => $value);

        $this->_reportEvent('onExtensionChangeState', array(
            'message' => array(
                'text'       => 'LIB_CATCHER_MESSAGE_CONTEXT',
                'parameters' => array('onExtensionChangeState', $context)
            ),
            'data'    => $data
        ));
    }

    public function onExtensionBeforeSave($context, $data, $isNew)
    {
        $this->_reportEvent('onExtensionBeforeSave', array(
            'message' => array(
                'text'       => 'LIB_CATCHER_MESSAGE_CONTEXT',
                'parameters' => array('onExtensionBeforeSave', $context)
            ),
            'data'    => array('form' => $data),
            'new'     => $isNew
        ));
    }

    public function onExtensionAfterSave($context, $data, $isNew)
    {
        $this->_reportEvent('onExtensionAfterSave', array(
            'message' => array(
                'text'       => 'LIB_CATCHER_MESSAGE_CONTEXT',
                'parameters' => array('onExtensionAfterSave', $context)
            ),
            'data'    => array('item' => $data),
            'new'     => $isNew
        ));
    }

    public function onExtensionBeforeDelete($context, $data)
    {
        $this->_reportEvent('onExtensionBeforeDelete', array(
            'message' => array(
                'text'       => 'LIB_CATCHER_MESSAGE_CONTEXT',
                'parameters' => array('onExtensionBeforeDelete', $context)
            ),
            'data'    => array('item' => $data)
        ));
    }

    public function onExtensionAfterDelete($context, $data)
    {
        $this->_reportEvent('onExtensionAfterDelete', array(
            'message' => array(
                'text'       => 'LIB_CATCHER_MESSAGE_CONTEXT',
                'parameters' => array('onExtensionAfterDelete', $context)
            ),
            'data'    => array('item' => $data)
        ));
    }

    public function onExtensionAfterInstall($installer, $eid)
    {
        $data = array('eid' => $eid);

        if (($manifest = $installer->manifest) && $manifest instanceof SimpleXMLElement) {
            $data['manifest'] = htmlspecialchars($manifest->asXML());
        }

        $this->_reportEvent('onExtensionAfterInstall', array('data' => $data));
    }

    public function onExtensionAfterUninstall($installer, $eid, $result)
    {
        $data = array('eid' => $eid, 'result' => $result);

        if (($manifest = $installer->manifest) && $manifest instanceof SimpleXMLElement) {
            $data['manifest'] = htmlspecialchars($manifest->asXML());
        }

        $this->_reportEvent('onExtensionAfterUninstall', array('data' => $data));
    }

    public function onExtensionAfterUpdate($installer, $eid)
    {
        $data = array('eid' => $eid);

        if (($manifest = $installer->manifest) && $manifest instanceof SimpleXMLElement) {
            $data['manifest'] = htmlspecialchars($manifest->asXML());
        }

        $this->_reportEvent('onExtensionAfterUpdate', array('data' => $data));
    }
}