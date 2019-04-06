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
* @author		Marcin Krasucki - openmed.io - marcin.krasucki@at@intuigo.pl
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
class plgSearchOmhelpdesk extends JPlugin
{
	/**
	* Constructor.
	*
	* @access	public
	* @param	string	&$subject	The object to observe.
	* @param	array	$config	An array that holds the plugin configuration.
	*
	* @return	void
	*/
	public function __construct(&$subject, $config)
	{
		parent::__construct($subject, $config);
		$this->loadLanguage();
	}

	/**
	* Search datas.
	* The items must contains the following fields that are used in a common
	* display routine: href, title, section, created, text, browsernav..
	*
	* @access	public
	* @param	string	$text	Target search string.
	* @param	string	$phrase	Matching option (possible values: exact|any|all).  Default is "any"
	* @param	string	$ordering	Ordering option (possible values: newest|oldest|popular|alpha|category).  Default is "newest".
	* @param	mixed	$areas	An array if the search is to be restricted to areas or null to search all areas.
	*
	* @return	array	Search results.
	*/
	public function onContentSearch($text, $phrase = '', $ordering = '', $areas = null)
	{
		if (is_array( $areas )) {
			if (!array_intersect( $areas, array_keys( $this->onContentSearchAreas() ) )) {
				return array();
			}
		}

		if (empty($areas))
			$areas = array_keys($this->onContentSearchAreas());

		$db     = JFactory::getDbo();
		$app    = JFactory::getApplication();
		$limit     = $this->params->def('search_limit', 50);

		// Sanitize
		$text = strtolower(trim($text));

		// Empty search
		if ($text == '')
			return array();

		// Load component
		include_once(JPATH_ADMINISTRATOR . '/components/com_omhelpdesk/helpers/loader.php');

		$rows = array();
		foreach($areas as $area)
		{
			$model = OmhelpdeskHelper::componentModel($area);

			if (!$model)
				continue;

			$model->setState('context', 'search.plugin');
			$model->setState('list.limit', $limit);

			$model->setState('search.plugin', $text);
			$model->setState('search.plugin.method', $phrase);
			$model->setState('search.plugin.ordering', $ordering);


			$items = $model->getItems();

			// Discount limit for the next searches areas
			$limit -= count($items);

			$rows[] = $items;
		}

		$results = array();

		if (count($rows))
		{
			foreach ($rows as $row)
			{
				$new_row = array();

				foreach ($row as $item)
				{
					// Complete the declaration of the required fields
					// see : https://docs.joomla.org/J3.x:Creating_a_search_plugin

					// @title
					// Item title
					if (!isset($item->title))
						$item->title = JText::_('OMHELPDESK_ERROR_TITLE_NOT_FOUND');

					// @text
					// Item complete description
					if (!isset($item->text))
						$item->text = '';

					// @href
					// Item route (URL)
					if (!isset($item->href))
						$item->href = '';

					// @section
					// Sub-title for showing the area or the component name, view, type of item...
					if (!isset($item->section))
						$item->section = '';

					// @created
					// Item creation date
					if (!isset($item->created))
						$item->created = '';

					// @browsernav
					// Set to '1' for opening the link in a new window (_blank target)
					if (!isset($item->browsernav))
						$item->browsernav = '2';

					$new_row[] = $item;
				}

				$results = array_merge($results, (array) $new_row);
			}
		}

		return $results;
	}

	/**
	* Determine areas searchable by this plugin.
	*
	* @access	public
	*
	* @return	array	An array of search areas.
	*/
	public function onContentSearchAreas()
	{
		static $areas = array(
			'tickets' => 'OMHELPDESK_VIEW_TICKET',
			'categories' => 'OMHELPDESK_VIEW_CATEGORY',
			'sprints' => 'OMHELPDESK_VIEW_SPRINT',
			'teams' => 'OMHELPDESK_VIEW_TEAM',
			'pilots' => 'OMHELPDESK_VIEW_PILOT',
			'sdepartments' => 'OMHELPDESK_VIEW_SOURCE_DEPARTMENT'
		);

		return $areas;
	}


}



