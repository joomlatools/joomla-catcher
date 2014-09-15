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
 * Catcher Extension Plugin.
 */
class PlgExtensionCatcher extends LibCatcherPluginAbstract
{
    public function onExtensionChangeState($context, $pks, $value)
    {
        $data = array('items' => $pks, 'state' => $value);

        $this->_publishMessage(array(
            'event'      => 'onExtensionChangeState',
            'parameters' => array('onExtensionChangeState', $context),
            'data'       => $data
        ));
    }

    public function onExtensionBeforeSave($context, $data, $isNew)
    {
        $this->_publishMessage(array(
            'event'      => 'onExtensionBeforeSave',
            'parameters' => array('onExtensionBeforeSave', $context),
            'data'       => array('form' => $data),
            'new'        => $isNew
        ));
    }

    public function onExtensionAfterSave($context, $data, $isNew)
    {
        $this->_publishMessage(array(
            'event'      => 'onExtensionAfterSave',
            'parameters' => array('onExtensionAfterSave', $context),
            'data'       => array('item' => $data),
            'new'        => $isNew
        ));
    }

    public function onExtensionBeforeDelete($context, $data)
    {
        $this->_publishMessage(array(
            'event'      => 'onExtensionBeforeDelete',
            'parameters' => array('onExtensionBeforeDelete', $context),
            'data'       => array('item' => $data)
        ));
    }

    public function onExtensionAfterDelete($context, $data)
    {
        $this->_publishMessage(array(
            'event'      => 'onExtensionAfterDelete',
            'parameters' => array('onExtensionAfterDelete', $context),
            'data'       => array('item' => $data)
        ));
    }

    public function onExtensionAfterInstall($installer, $eid)
    {
        $this->_publishMessage(array(
            'event'   => 'onExtensionAfterInstall',
            'message' => '<strong>onExtensionAfterInstall</strong> has been triggered',
            'data'    => array('manifest' => $installer->getManifest(), 'eid' => $eid)
        ));
    }

    public function onExtensionAfterUninstall($installer, $eid, $result)
    {
        $this->_publishMessage(array(
            'event'   => 'onExtensionAfterUninstall',
            'message' => '<strong>onExtensionAfterUninstall</strong> has been triggered',
            'data'    => array('manifest' => $installer->getManifest(), 'eid' => $eid, 'result' => $result)
        ));
    }

    public function onExtensionAfterUpdate($installer, $eid)
    {
        $this->_publishMessage(array(
            'event'   => 'onExtensionAfterUpdate',
            'message' => '<strong>onExtensionAfterUpdate</strong> has been triggered',
            'data'    => array('manifest' => $installer->getManifest(), 'eid' => $eid)
        ));
    }
}