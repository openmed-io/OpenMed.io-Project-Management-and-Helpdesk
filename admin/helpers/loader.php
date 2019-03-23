<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1
* @package		OM Helpdesk
* @subpackage	OM Helpdesk
* @copyright	
* @author		Marcin Krasucki - openmed.io - marcin.krasucki@intuigo.pl
* @license		GNU GPL
*
*             .oooO  Oooo.
*             (   )  (   )
* -------------\ (----) /----------------------------------------------------------- +
*               \_)  (_/
*/

// no direct access
defined('_JEXEC') or die('Restricted access');


// Some usefull constants
if(!defined('DS')) define('DS',DIRECTORY_SEPARATOR);
if(!defined('BR')) define("BR", "<br />");
if(!defined('LN')) define("LN", "\n");

// Main component aliases
if (!defined('COM_OMHELPDESK')) define('COM_OMHELPDESK', 'com_omhelpdesk');
if (!defined('OMHELPDESK_CLASS')) define('OMHELPDESK_CLASS', 'Omhelpdesk');

// Component paths constants
if (!defined('JPATH_ADMIN_OMHELPDESK')) define('JPATH_ADMIN_OMHELPDESK', JPATH_ADMINISTRATOR . '/components/' . COM_OMHELPDESK);
if (!defined('JPATH_SITE_OMHELPDESK')) define('JPATH_SITE_OMHELPDESK', JPATH_SITE . '/components/' . COM_OMHELPDESK);

$app = JFactory::getApplication();

// This constant is used for replacing JPATH_COMPONENT, in order to share code between components.
if (!defined('JPATH_OMHELPDESK')) define('JPATH_OMHELPDESK', ($app->isSite()?JPATH_SITE_OMHELPDESK:JPATH_ADMIN_OMHELPDESK));

// Load the component Dependencies
require_once(dirname(__FILE__) . '/helper.php');


jimport('joomla.version');
$version = new JVersion();

if (version_compare($version->RELEASE, '3.0', '<'))
	throw new JException('Joomla! 3.x is required.');

// Proxy alias class : CONTROLLER
if (!class_exists('CkJController')){ 	jimport('legacy.controller.legacy'); 	class CkJController extends JControllerLegacy{}}

// Proxy alias class : MODEL
if (!class_exists('CkJModel')){			jimport('legacy.model.legacy');			class CkJModel extends JModelLegacy{}}

// Proxy alias class : VIEW
if (!class_exists('CkJView')){	if (!class_exists('JViewLegacy', false))	jimport('legacy.view.legacy'); class CkJView extends JViewLegacy{}}

require_once(dirname(__FILE__) . '/../classes/loader.php');

OmhelpdeskClassLoader::setup(false, false);
OmhelpdeskClassLoader::discover('Omhelpdesk', JPATH_ADMIN_OMHELPDESK, false, true);

// Some helpers
OmhelpdeskClassLoader::register('JToolBarHelper', JPATH_ADMINISTRATOR ."/includes/toolbar.php", true);

CkJController::addModelPath(JPATH_OMHELPDESK . '/models', 'OmhelpdeskModel');
// Register JDom
JLoader::register('JDom', JPATH_ADMIN_OMHELPDESK . '/dom/dom.php', true);

//Instance JDom
if (!isset($app->dom))
{
	if (!class_exists('JDom'))
		jexit('JDom is required');

	JDom::getInstance();	
}

