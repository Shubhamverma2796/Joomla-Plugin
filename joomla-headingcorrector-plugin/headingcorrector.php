<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  System.headingcorrector
 *
 * @copyright   (C) 2022 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Factory;


class PlgSystemHeadingCorrector extends CMSPlugin
{
    /**
     * Load the language file on instantiation
     * 
     * @var    boolean
     * @since  4.0.0
     */ 
	 
    protected $app;

    /**
     * Constructor.
     *
     * @param   object  &$subject  The object to observe.
     * @param   array   $config    An optional associative array of configuration settings.
     *
     * @since  4.0.0
     */
	
    public function __construct(&$subject, $config)
    {
		$this->loadLanguage('PLG_SYSTEM_HEADINGCORRECTOR');
        parent::__construct($subject, $config);
    }


	 
    public function onContentPrepare()
    {

        $app = Factory::getApplication();
        $isSite = $app->isClient('site');
        $document = Factory::getDocument();
        if ($isSite) {
            $document->addScript('media/plg_system_headingcorrector/js/heading-corrector.es6.js');
            return;
        }
    }
}