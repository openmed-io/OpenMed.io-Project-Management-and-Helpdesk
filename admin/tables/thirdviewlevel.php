<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1
* @package		OM Helpdesk
* @subpackage	Viewlevels
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
* Omhelpdesk Table class
*
* @package	Omhelpdesk
* @subpackage	Viewlevel
*/
class OmhelpdeskCkTableThirdviewlevel extends OmhelpdeskClassTable
{
	/**
	* Constructor
	*
	* @access	public
	* @param	object	&$db	Database connector object
	* @param	string	$tbl	Table name
	* @param	string	$key	Primary key
	*
	* @return	void
	*/
	public function __construct(&$db, $tbl = '#__viewlevels', $key = 'id')
	{
		parent::__construct($tbl, $key, $db);
	}


}

// Load the fork
OmhelpdeskHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('OmhelpdeskTableThirdviewlevel')){ class OmhelpdeskTableThirdviewlevel extends OmhelpdeskCkTableThirdviewlevel{} }

