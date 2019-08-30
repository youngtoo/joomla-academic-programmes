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
?>

<section class="mt-4 mb-2">    
    <!-- Secition Into-->
    <div class="mt-2 mb-1 p-2" style="border-left:#999 solid 3px;">
        <p class="text-justified" title="Study at KeSRA">We are delighted that you are planning to advance your knowledge in Tax and Customs administration through our comprehensive programmes in Tax and Customs Laws and procedures across the East African Region</p>
    </div>
    <!-- /.Secition Intro -->


    <div class="p-2">
        

        <!-- Academic Programmes -->
        <div title="Kenya School of revenue administration - Academic programmes" class="">
        <?php
        // Check if there is any programme.
        if(!empty($this->programmes))
        {
            // Programmes not empty
        ?>
        <div class="mt-3 mb-3  accordion" id="paccordion">
        <!-- Display some HTML-->       
            <?php
                foreach($this->programmes as $p)
                {
                ?>
                
                <div class="p-2 mt-4 mb-2">
                    <strong><?php echo $p->title;?></strong>
                </div>

                <?php
                    foreach ($this->courses as $i => $c) {
                        # code...
                        if($c->programme_id == $p->id){

                            ?>
                            
                            <div class=" d-flex my-3 py-1 px-1 justify-content-between flex-wrap align-items-center"  style="border-left:#ff0613 solid 3px; border-right:#ff0613 solid 3px;" title="<?php echo $c->title;?>">
                                <!-- Course-->
                                <div class=" py-1 px-2 m-1" style="width:400px;" >
                                <?php
                                echo $c->title;
                                $class = "";
                                $show = '';
                                if($i == 0){
                                    // Assign class active to the first item
                                    $class = 'active';
                                    $show = "show";
                                }
                                else{
                                    // Unassign class active on the other items
                                    $class = "";
                                    $show = "";
                                }

                                ?>
                                <br>
                                <a data-toggle="collapse" style="color:#ff0613;" class="mt-1"  role="button" aria-expanded="false" aria-controls="pcourse-<?php echo $c->id;?>" href="#pcourse-<?php echo $c->id;?>"><small> View requirements </small></a>
        
                        
                                </div>


                                <div class="p-2 m-1">
                                <a   class="btn btn-primary m-1 btn-sm" style="" href="<?php echo $c->document;?>" download> APPLY NOW <small></small></a>
                                </div>
                                <!-- ./ Course-->
                            </div>

                            <div class="collapse" id="pcourse-<?php echo $c->id;?>" data-parent="#paccordion" >
                                <div class="m-1 p-2 bg-light">
                                <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active " id="nav-course-<?php echo $c->id;?>-tab" data-toggle="tab" href="#nav-course-<?php echo $c->id;?>" role="tab" aria-controls="nav-course" aria-selected="true">Requirements</a>
                                    <a class="nav-item nav-link" id="nav-eligibility-<?php echo $c->id;?>-tab" data-toggle="tab" href="#nav-eligibility-<?php echo $c->id;?>" role="tab" aria-controls="nav-apply" aria-selected="true">Eligibility</a>
                                    <a class="nav-item nav-link" id="nav-apply-<?php echo $c->id;?>-tab" data-toggle="tab" href="#nav-apply-<?php echo $c->id;?>" role="tab" aria-controls="nav-apply" aria-selected="true">How To Apply</a>
                                    
                                </div>
                                </nav>
                                <div class="tab-content  border-bottom " id="nav-tabContent">
                                <div class="tab-pane fade show active p-2" id="nav-course-<?php echo $c->id;?>" role="tabpanel" aria-labelledby="nav-course-<?php echo $c->id;?>-tab">
                                    <p class="">
                                    <p class=""><small>Overview</small></p>
                                        <?php
                                        echo $c->description;
                                        ?>
                                    </p>

                                    <p class=" mb-0"><small> Duration</small></p>
                                    
                                    <div class=""> <i class="fa fa-clock p-1"></i> <?php echo $c->duration;?></div>

                                    <p class=""><small>Mode of Study</small></p>
                                    
                                    <div class=""><i class="fa fa-book-open p-1"></i> <?php echo $c->studymode;?></div>
                                </div>

                                <div class="tab-pane fade " id="nav-eligibility-<?php echo $c->id;?>" role="tabpanel" aria-labelledby="nav-apply-<?php echo $c->id;?>-tab">
                                    <p class="p-2">

                                    <?php echo $c->eligibility;?>
                                        
                                    </p>
                                </div>

                                <div class="tab-pane fade " id="nav-apply-<?php echo $c->id;?>" role="tabpanel" aria-labelledby="nav-apply-<?php echo $c->id;?>-tab">
                                    <p class="p-2">

                                    To apply:

                                                <ul>
                                                <li><a href="<?php echo $c->document;?>" download >Download</a> the Application form by clicking on the Apply button.</li>
                                                <li>Fill and submit the application form at Times Tower 8th Floor or KESRA Centre Westlands.</li>
                                                </ul>
                                        
                                    </p>
                                </div>
                                </div>
                                </div>
                            </div>
                            
                            <?php
                            //print_r($c);
                        }
                    }
                
                ?>
                <!-- first loop-->
                <?php
                }
            ?>
        </div>
        <!-- /. Display some html -->
        <?php
        }
        
        else
        {
        // If there are no academic programmes
        ?>
            <div class="p-2">
                <p>
                    Kindly contact <a href="mailto:kesra@kra.go.ke" style="color:#ff0613;">kesra@kra.go.ke</a> for more information on our
                </p>
            </div>
        <?php
        // There are no academic programmes
        }

        ?>
        </div>
        <!-- / Academic Programmes -->
    </div>
</section>


