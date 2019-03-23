<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1
* @package		OM Helpdesk
* @subpackage	
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



/**
* 
*
* @package	Omhelpdesk
*/
class plgSearchOmhelpdeskInstallerScript
{
	/**
	* Executed at plugin install.
	*
	* @access	public
	* @param	JAdapterInstance	$adapter	The object responsible for running this script
	*
	* @return	boolean	True on success.
	*/
	public function install($adapter)
	{
		// Enable plugin
		$db  = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->update('#__extensions');
		$query->set($db->quoteName('enabled') . ' = 1');
		$query->where($db->quoteName('type') . ' = ' . $db->quote('plugin'));
		$query->where($db->quoteName('element') . ' = ' . $db->quote('omhelpdesk'));
		$query->where($db->quoteName('folder') . ' = ' . $db->quote('search'));
		$db->setQuery($query);
		$db->execute();
	}


}



