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
    protected $_message = '<strong>%s</strong> triggered in <strong>%s</strong> context';

    protected function _publishMessage($config = array())
    {
        if(!isset($config['event'])) {
            throw new InvalidArgumentException('The Event name is missing.');
        }

        $events = $this->params->get('events', array());

        if (in_array($config['event'], $events))
        {
            $text       = isset($config['message']) ? $config['message'] : $this->_message;
            $data       = isset($config['data']) ? $config['data'] : array();
            $parameters = isset($config['parameters']) ? $config['parameters'] : array();
            $new        = isset($config['new']) ? $config['new'] : null;

            $message = vsprintf($text, $parameters);

            if (isset($new))
            {
                if ($new) {
                    $message .= '<br/><br/>The item is <strong>NEW</strong>';
                } else {
                    $message .= '<br/><br/>The item is <strong>NOT</strong> new';
                }
            }

            if ($this->params->get('show_data') && ($data = $this->_formatData($data)))
            {
                $panel_signature = $config['event'] . '_' . md5($data);

                $message .= '<br/><br/><div class="panel-group" id="accordion">
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h5 class="panel-title">
                                    <a data-toggle="collapse" class="btn btn-warning btn-small" data-parent="#accordion" href="#' .
                                    $panel_signature . '">
                                      Display/Hide data
                                    </a>
                                  </h5>
                                </div>
                                <div id="' . $panel_signature . '" class="panel-collapse collapse">
                                  <div class="panel-body" style="word-break: break-all;">';

                $message .= $data;

                $message .= '</div></div></div></div>';
            }

            $message = "<hr>{$message}";

            JFactory::getApplication()->enqueueMessage($message, 'warning');
        }
    }

    protected function _formatData($data, $level = 1)
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
                    if (empty($value) || is_numeric(key($value)))
                    {
                        $value = implode(', ', $value);
                    }
                    else
                    {
                        $output .= '<br/>';
                        $value = $this->_formatData($value, $level + 1);
                    }
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