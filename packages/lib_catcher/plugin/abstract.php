<?php
/**
 * @package     Catcher
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        https://github.com/nooku/joomla-catcher for the canonical source repository
 */
defined('_JEXEC') or die;

/**
 * Catcher Abstract Plugin.
 */
abstract class LibCatcherPluginAbstract extends JPlugin
{
    public function __construct(&$subject, $config = array())
    {
        parent::__construct($subject, $config);

        // Load library translations.
        JFactory::getLanguage()->load('lib_catcher', JPATH_ROOT);
    }

    /**
     * Reports an event.
     *
     * @param string $event The name of the event to report.
     * @param array $config An optional configuration array.
     */
    protected function _reportEvent($event, $config = array())
    {
        $config = array_merge(array(
            'data'    => array(),
            'message' => array(),
            'new'     => null
        ), $config);

        if (!isset($config['message']['text'])) {
            $config['message'] = array('text' => 'LIB_CATCHER_MESSAGE_DEFAULT', 'parameters' => array($event));
        }

        $events = $this->params->get('events', array());

        if (in_array($event, $events))
        {
            $message = '<div class="well">';

            $args = $config['message']['parameters'];
            array_unshift($args, $config['message']['text']);
            $message .= call_user_func_array(array('JText', 'sprintf'), $args);

            if (isset($config['new']))
            {
                if ($config['new']) {
                    $message .= '<br/><br/>' . JText::_('LIB_CATCHER_ITEM_NEW');
                } else {
                    $message .= '<br/><br/>' . JText::_('LIB_CATCHER_ITEM_NOT_NEW');
                }
            }

            if ($this->params->get('show_data') && ($data = $this->_renderData($config['data'])))
            {
                $signature = sprintf('%s_%s', $event, md5($data . microtime()));

                $message .= '<br/><br/><div class="panel-group" id="accordion">
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h5 class="panel-title">
                                    <a data-toggle="collapse" class="btn btn-warning btn-small" data-parent="#accordion" href="#' .
                                    $signature . '">'.
                                      JText::_('LIB_CATCHER_DISPLAY_HIDE_DATA')
                                    .'</a>
                                  </h5>
                                </div>
                                <div id="' . $signature . '" class="panel-collapse collapse">
                                  <div class="panel-body" style="word-break: break-all;">';

                $message .= $data;

                $message .= '</div></div></div></div>';
            }

            $message .= '</div>';

            JFactory::getApplication()->enqueueMessage($message, 'warning');
        }
    }

    /**
     * Renders event data
     *
     * @param array $data An associative array containing data
     * @param int $level Indentation level
     * @return string The rendered data
     */
    protected function _renderData($data, $level = 1)
    {
        $data = (array) $data;
        $output = '';

        if ($data)
        {
            foreach($data as $key => $value)
            {
                for ($i = 0; $i < 3*$level; $i++) {
                    $output .= '&nbsp;';
                }

                $output .= "<strong>{$key}</strong>: ";

                if ($value instanceof JObject) {
                    $value = $value->getProperties();
                }

                if ($value instanceof stdClass) {
                    $value = (array) $value;
                }

                if (is_array($value))
                {
                    if (!empty($value) || !is_numeric(key($value)))
                    {
                        $output .= '<br/>';
                        $value = $this->_renderData($value, $level + 1);
                    }
                    else $value = implode(', ', $value);
                }

                if (is_object($value) && method_exists($value, '__toString')) {
                    $value = (string) $value;
                }

                if (!is_object($value)) {
                    $output .= $value;
                }

                $output .= '<br/>';
            }
        }

        return $output;
    }
}