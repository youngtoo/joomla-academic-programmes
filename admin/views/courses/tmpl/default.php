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
  <div class="row-fluid">

    <div class="span2">
	  <!--Sidebar content-->
	  <ul class="nav nav-list">
	  <li class="nav-header">Options</li>
	  <li class=""><a href="index.php?option=com_academics">Academics</a></li>
      <li class=""><a href="index.php?option=com_academics&view=programmes">Programmes</a></li>
      <li class="active"><a href="index.php?option=com_academics&view=courses">Courses</a></li>

      <li class="nav-header">Other Tools</li>
      <li><a href="index.php?option=com_ievent">Event Manager</a></li>
      </ul>
    </div>



    <div class="span10">
      <!--Body content-->
    <div class="page-header">
        <h1>Courses Manager <small>Manage your courses</small></h1>
    </div>


    <div>
      <!-- Table -->
      <form action="index.php?option=com_academics&view=courses" method="post" id="adminForm" name="adminForm">
	<table class="table table-striped table-hover">
		<thead>
		<tr>
			<th width="1%"><?php echo JText::_('No.'); ?></th>
			<th width="2%">
				<?php echo JHtml::_('grid.checkall'); ?>
			</th>
			<th width="90%">
				<?php echo JText::_('Title') ;?>
			</th>
			<th width="5%">
				<?php echo JText::_('Published'); ?>
			</th>
			<th width="2%">
				<?php echo JText::_('ID'); ?>
			</th>
		</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="5">
					<?php echo $this->pagination->getListFooter(); ?>
				</td>
			</tr>
		</tfoot>
		<tbody>
			<?php if (!empty($this->items)) : ?>
				<?php foreach ($this->items as $i => $row) :
					$link = JRoute::_('index.php?option=com_academics&task=course.edit&id=' . $row->id);
				?>
					<tr>
						<td><?php echo $this->pagination->getRowOffset($i); ?></td>
						<td>
							<?php echo JHtml::_('grid.id', $i, $row->id); ?>
						</td>
						<td>
							<a href="<?php echo $link; ?>" title="<?php echo JText::_('Edit'); ?>">
								<?php echo $row->title; ?>
							</a>
						</td>
						<td align="center">
							<?php echo JHtml::_('jgrid.published', $row->published, $i, 'courses.', true, 'cb'); ?>
						</td>
						<td align="center">
							<?php echo $row->id; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
	<input type="hidden" name="task" value=""/>
	<input type="hidden" name="boxchecked" value="0"/>
	<?php echo JHtml::_('form.token'); ?>
</form>

      <!-- ./ Table -->
    </div>

    </div>


  </div>
</div>