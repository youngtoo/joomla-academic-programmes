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
        //create a folder first

        if(!JFolder::exists($this->path))
        {
           //create one
           //JFolder::create($path, 0755);
           JFactory::getApplication()->enqueueMessage(JText::_('Folder: '. $this->path . " created." ), 'info');
        }


        
      $jinput = JFactory::getApplication()->input;
      $file = $jinput->files->get("jform");
      // Import filesystem libraries. Perhaps not necessary, but does not hurt.
      jimport('joomla.filesystem.file');

      /**
       * Check file
       */
      /*
      if($file['document']['name'] == null && $file['document']['size'] == 0){
         JFactory::getApplication()->enqueueMessage(JText::_('Please upload a file.' ), 'error');
         return false;
      }
      */

      // Clean up filename to get rid of strange characters like spaces etc.
      $filename = JFile::makeSafe($file['document']['name']);
      JFactory::getApplication()->enqueueMessage(JText::_('File name: '. $filename . " all clean. In path ". $this->path ), 'info');

      // Set up the source and destination of the file
      $src = $file['document']['tmp_name'];
      
      $dest = $this->path.'/'. preg_replace( '/\s+/', '_', $filename);

      //check if file already exists
      

      if (JFile::upload($src, $dest))
      {
         // Redirect to a page of your choice.
          JFactory::getApplication()->enqueueMessage(JText::_('File uploaded successfully to: '.$dest ), 'success');
         //$url['url'] = $dest;
         //return parent::save('id', $urlVar['url']);
         return parent::save($key, $urlVar);

      } 
      else
      {
         // Redirect and throw an error message.
         JFactory::getApplication()->enqueueMessage(JText::_('An error occurred. Please try again later.' ), 'error');
         return false;
      }
        		
        //JFactory::getApplication()->enqueueMessage(JText::_('Normal save happened'), 'info');
        //return parent::save('id', $urlVar);
        JFactory::getApplication()->enqueueMessage(JText::_('An error occurred. Please try again later.' ), 'error');
        return false;
     }


}