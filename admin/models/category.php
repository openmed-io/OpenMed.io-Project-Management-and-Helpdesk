<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1
* @package		OM Helpdesk
* @subpackage	Categories
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
* Omhelpdesk Item Model
*
* @package	Omhelpdesk
* @subpackage	Classes
*/
class OmhelpdeskCkModelCategory extends OmhelpdeskClassModelItem
{
	/**
	* View list alias
	*
	* @var string
	*/
	protected $view_item = 'category';

	/**
	* View list alias
	*
	* @var string
	*/
	protected $view_list = 'categories';

	/**
	* Constructor
	*
	* @access	public
	* @param	array	$config	An optional associative array of configuration settings.
	*
	* @return	void
	*/
	public function __construct($config = array())
	{
		parent::__construct();
	}

	/**
	* Method to delete item(s).
	*
	* @access	public
	* @param	array	&$pks	Ids of the items to delete.
	*
	* @return	boolean	True on success.
	*/
	public function delete(&$pks)
	{
			if (!count( $pks ))
				return true;

			//Integrity : Restrict delete categories which are referred by tickets
			$model = CkJModel::getInstance('ticket', 'OmhelpdeskModel');
			$model->integrityRestrict('category', $pks,
				// Label Key
				'done',

				// Parent Label Key
				'ordering'
			);

			if (!parent::delete($pks))
				return false;



			return true;
	}

	/**
	* Method to get the layout (including default).
	*
	* @access	public
	*
	* @return	string	The layout alias.
	*/
	public function getLayout()
	{
		$jinput = JFactory::getApplication()->input;
		return $jinput->get('layout', '', 'STRING');
	}

	/**
	* Returns a Table object, always creating it.
	*
	* @access	public
	* @param	string	$type	The table type to instantiate.
	* @param	string	$prefix	A prefix for the table class name. Optional.
	* @param	array	$config	Configuration array for model. Optional.
	*
	*
	* @since	1.6
	*
	* @return	JTable	A database object
	*/
	public function getTable($type = 'category', $prefix = 'OmhelpdeskTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	/**
	* Method to increment hits (check session and layout)
	*
	* @access	public
	* @param	array	$layouts	List of authorized layouts for hitting the object.
	*
	*
	* @since	11.1
	*
	* @return	boolean	Null if skipped. True when incremented. False if error.
	*/
	public function hit($layouts = null)
	{
		return parent::hit(array());
	}

	/**
	* Method to get the data that should be injected in the form.
	*
	* @access	protected
	*
	* @return	mixed	The data for the form.
	*/
	protected function loadFormData()
	{
		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState('com_omhelpdesk.edit.category.data', array());

		if (empty($data)) {
			//Default values shown in the form for new item creation
			$data = $this->getItem();

			// Prime some default values.
			if ($this->getState('category.id') == 0)
			{
				$jinput = JFactory::getApplication()->input;

				$data->id = 0;
				$data->published = 1;
				$data->category = null;
				$data->desciption = null;
				$data->admin = $jinput->get('filter_admin', $this->getState('filter.admin'), 'INT');
				$data->deputy_admin = $jinput->get('filter_deputy_admin', $this->getState('filter.deputy_admin'), 'INT');
				$data->modification_date = null;
				$data->ordering = null;
				$data->created_by = $jinput->get('filter_created_by', $this->getState('filter.created_by'), 'INT');
				$data->modified_by = $jinput->get('filter_modified_by', $this->getState('filter.modified_by'), 'INT');
				$data->creation_date = null;

			}
		}
		return $data;
	}

	/**
	* Method to auto-populate the model state.
	* 
	* This method should only be called once per instantiation and is designed to
	* be called on the first call to the getState() method unless the model
	* configuration flag to ignore the request is set.
	* 
	* Note. Calling getState in this method will result in recursion.
	*
	* @access	protected
	*
	*
	* @since	11.1
	*
	* @return	void
	*/
	protected function populateState()
	{
		$app = JFactory::getApplication();
		$session = JFactory::getSession();
		$acl = OmhelpdeskHelper::getActions();



		parent::populateState();

		//Only show the published items
		if (!$acl->get('core.admin') && !$acl->get('core.edit.state'))
			$this->setState('filter.published', 1);
	}

	/**
	* Preparation of the item query.
	*
	* @access	protected
	* @param	object	&$query	returns a filled query object.
	* @param	integer	$pk	The primary id key of the category
	*
	* @return	void
	*/
	protected function prepareQuery(&$query, $pk)
	{
		//FROM : Main table
		$query->from('#__omhelpdesk_categories AS a');

		// Primary Key is always required
		$this->addSelect('a.id');


		switch($this->getState('context', 'all'))
		{


			case 'all':
				//SELECT : raw complete query without joins
				$this->addSelect('a.*');

				// Disable the pagination
				$this->setState('list.limit', null);
				$this->setState('list.start', null);

				// Item search : Based on Primary Key
				$query->where('a.id = ' . (int) $pk);
				break;
		}

		$this->orm->select(array(
			'created_by',
			'published'
		));

		$this->orm->access('a', array(
			'publish' => 'published',
			'author' => 'created_by'
		));

		// ORDERING
		$orderCol = $this->getState('list.ordering');
		$orderDir = $this->getState('list.direction', 'ASC');

		if ($orderCol)
			$this->addOrder($orderCol . ' ' . $orderDir);



		// Apply all SQL directives to the query
		$this->applySqlStates($query);
	}

	/**
	* Prepare and sanitise the table prior to saving.
	*
	* @access	protected
	* @param	JTable	$table	A JTable object.
	*
	*
	* @since	1.6
	*
	* @return	void
	*/
	protected function prepareTable($table)
	{
		$date = JFactory::getDate();


		if (empty($table->id))
		{
			// Set ordering to the last item if not set
			$conditions = $this->getReorderConditions($table);
			$conditions = (count($conditions)?implode(" AND ", $conditions):'');
			$table->ordering = $table->getNextOrder($conditions);

			//Defines automatically the author of this element
			$table->created_by = JFactory::getUser()->get('id');

			//Creation date
			if (empty($table->creation_date))
				$table->creation_date =  JFactory::getDate()->toSql();
		}
		else
		{
			//Modification date
			$table->modification_date = JFactory::getDate()->toSql();

			//Defines automatically the editor of this element
			$table->modified_by = JFactory::getUser()->get('id');
		}

	}

	/**
	* Save an item.
	*
	* @access	public
	* @param	array	$data	The post values.
	*
	* @return	boolean	True on success.
	*/
	public function save($data)
	{
			//Convert from a non-SQL formated date (modification_date)
			$data['modification_date'] = OmhelpdeskHelperDates::getSqlDate($data['modification_date'], array('Y-m-d H:i'), true, 'USER_UTC');

			//Convert from a non-SQL formated date (creation_date)
			$data['creation_date'] = OmhelpdeskHelperDates::getSqlDate($data['creation_date'], array('Y-m-d H:i'), true, 'USER_UTC');
			//Some security checks
			$acl = OmhelpdeskHelper::getActions();

			//Secure the published tag if not allowed to change
			if (isset($data['published']) && !$acl->get('core.edit.state'))
				unset($data['published']);

			//Secure the author key if not allowed to change
			if (isset($data['created_by']) && !$acl->get('core.edit'))
				unset($data['created_by']);

			if (parent::save($data)) {
				return true;
			}
			return false;


	}


}

// Load the fork
OmhelpdeskHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('OmhelpdeskModelCategory')){ class OmhelpdeskModelCategory extends OmhelpdeskCkModelCategory{} }

