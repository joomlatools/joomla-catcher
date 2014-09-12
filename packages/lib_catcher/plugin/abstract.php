<?php
/**
 * @package     Joomlatools Events Fix PR
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.joomlatools.com
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
            $type       = isset($config['type']) ? $config['type'] : 'Events';
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

            if ($this->params->get('show_data') && ($data = $this->_formatData($data))) {
                $message .= '<br/><br/><strong>Data:</strong><br/><br/>' . $data;
            }

            $message = "<hr>{$message}";

            JFactory::getApplication()->enqueueMessage($message, $type);
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

                $output .= "- <u>{$key}</u>: ";

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
                    $output .= "{$value}<br/>";
                }
            }
        }

        return $output;
    }
}