<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>

<div class="container-fluid">
  <div class="row" >

  
    <div class="span2">
      <!--Sidebar content-->
    </div>



    <div class="span10">
      <!--Body content-->

        <form  enctype="multipart/form-data"  action="<?php echo JRoute::_('index.php?option=com_academics&layout=edit&id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm">
            <div class="form-horizontal">
                <fieldset class="adminform">
                    <legend><?php echo JText::_('Course details'); ?></legend>
                    <div class="row-fluid">
                        <div class="span8">
                            <?php foreach ($this->form->getFieldset() as $field): ?>
                                <div class="control-group">
                                    <div class="control-label"><?php echo $field->label; ?></div>
                                    <div class="controls"><?php echo $field->input; ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </fieldset>
            </div>
            <input type="hidden" name="task" value="course.edit" />
            <?php echo JHtml::_('form.token'); ?>
        </form>

    </div>
  </div>
</div>

