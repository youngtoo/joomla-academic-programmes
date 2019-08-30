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
use Joomla\CMS\Log\Log;

/**
 * HelloWorld Controller
 *
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 * @since       0.0.9
 */
class AcademicsControllerCourse extends JControllerForm
{
    //
    protected $path = JPATH_ROOT.'/downloads/programmes';

   public function save($key = NULL, $urlVar = NULL)
   {
      
      # Get the application input
      $jinput = JFactory::getApplication()->input;
      # Get the file itself from the request
      $file = $jinput->files->get("jform");

      // Import filesystem libraries. Perhaps not necessary, but does not hurt.
      jimport('joomla.filesystem.file');

      /**
       * Check file
       */
      
      if($file['document']['name'] == null && $file['document']['size'] == 0){
         JFactory::getApplication()->enqueueMessage(JText::_('Please upload a file.' ), 'error');
         return false;
      }
      

      // Clean up filename to get rid of strange characters like spaces etc.
      $filename = JFile::makeSafe($file['document']['name']);
      JFactory::getApplication()->enqueueMessage(JText::_('File name: '. $filename . " all clean. In path ". $this->path ), 'info');

      // Set up the source and destination of the file
      $src = $file['document']['tmp_name'];

      # Strip any spaces in between and replace with underscore
      $dest = $this->path.'/'. preg_replace( '/\s+/', '_', $filename);
      #
      
      # Check is the location of folder exists
      if(!JFolder::exists($this->path))
      {
         # Create one
         JFolder::create($path, 0755);
         JFactory::getApplication()->enqueueMessage(JText::_('New folder: '. $this->path . " created!" ), 'success');
      } 
      
      else
      {
         # Run code if the folder location already exis
         JFactory::getApplication()->enqueueMessage(JText::_('Files will be uploaded to: '. $this->path . "!" ), 'info');
      }

      //check if file already exists
      if (JFile::upload($src, $dest))
      {
         // Redirect to a page of your choice.
          JFactory::getApplication()->enqueueMessage(JText::_('File uploaded successfully to: '.$dest ), 'success');
         $document['name'] = $dest;
         return parent::save($key, $urlVar);
         //return parent::save('document', $dest);

      } 
      else
      {
         // Redirect and throw an error message.
         JFactory::getApplication()->enqueueMessage(JText::_('File already exists: '. $dest ), 'info');
         return parent::save($key, $urlVar);
      }
        		
        //JFactory::getApplication()->enqueueMessage(JText::_('Normal save happened'), 'info');
        //return parent::save('id', $urlVar);
        JFactory::getApplication()->enqueueMessage(JText::_('An error occurred. Please try again later.' ), 'error');
        return false;
   }


}