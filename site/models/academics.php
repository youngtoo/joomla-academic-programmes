<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * HelloWorld Model
 *
 * @since  0.0.1
 */
class AcademicsModelAcademics extends JModelItem
{
	/**
	 * @var string message
	 */
	protected $message;

	/**
	 * Get the message
         *
	 * @return  string  The message to be displayed to the user
	 */
	public function getMsg()
	{
		if (!isset($this->message))
		{
			$this->message = 'Academics';
		}

		return $this->message;
	}

	/**
	 * Get the list of programmes offered and related courses.
	 */

	 public function getCourses()
	 {
		// Create a new connection 
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query
			->select(array('a.*', 'b.*'))
			->select($db->quoteName('b.id', 'course_id'))
			->select($db->quoteName('a.title', 'programme_title'))
			->from($db->quoteName('kesra__programmes', 'a'))
			->join('RIGHT', $db->quoteName('kesra__courses', 'b') . ' ON (' . $db->quoteName('a.id') . ' = ' . $db->quoteName('b.programme_id') . ')');
			//->where($db->quoteName('b.programme_id') . ' = ' . $db->quote('a.id'));

		$db->setQuery($query);

		$results = $db->loadObjectList();
		 return $results;
	 }

	 public function getProgrammes()
	 {
		$db = JFactory::getDbo();

		// Call all academic programmes
		$query = $db->getQuery(true);
		$query->select('*');
		$query->from($db->quoteName('kesra__programmes'));
		$query->where($db->quoteName('published') . ' = '. $db->quote('1'));
		$db->setQuery($query);
		
		$results = $db->loadObjectList();

		 return $results;
	 }
}