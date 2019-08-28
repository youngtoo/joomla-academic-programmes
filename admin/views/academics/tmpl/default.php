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
      <li class="active"><a href="index.php?option=com_academics">Academics</a></li>
      <li class=""><a href="index.php?option=com_academics&view=programmes">Programmes</a></li>
      <li class=""><a href="index.php?option=com_academics&view=courses">Courses</a></li>

      <li class="nav-header">Other Tools</li>
      <li><a href="index.php?option=com_ievent">Event Manager</a></li>
      </ul>
    </div>



    <div class="span10">
      <!--Body content-->
    <div class="page-header">
        <h1>Academics Manager <small>Manage your academics</small></h1>
    </div>


    <!-- Content -->

    <div class="well">
      <p>
        Shortcuts
      </p>
      <a class="btn" href="index.php?option=com_academics&view=programme&layout=edit ">Add Programme</a>
      <a class="btn" href="index.php?option=com_academics&view=course&layout=edit ">Add Course</a>
    </div>


    <!-- ./ -->

    </div>


  </div>
</div>