<?php
/**
 * @package     Catcher
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        https://github.com/joomlatools/joomla-catcher for the canonical source repository
 */
defined('_JEXEC') or die;

class pkg_catcherInstallerScript
{
    protected $_query = "UPDATE `#__extensions` SET `protected` = %u WHERE `type` = 'library' AND `element` = 'catcher'";

    public function uninstall($installer)
    {
        $db = JFactory::getDBO();
        $db->setQuery(sprintf($this->_query, 0));
        $db->query();

        return true;
    }

    public function postflight($type, $installer)
    {
        $db = JFactory::getDBO();
        $db->setQuery(sprintf($this->_query, 1));
        $db->query();

        return true;
    }
}