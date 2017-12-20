<section class="content-header">
    <h1>
    Trips
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View</li>
    </ol>
</section>

<?php //echo "<pre>"; print_r($trip); echo "</pre>"; ?>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?= h('Info') ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tbody>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <td><?= $this->Number->format($trip->id) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('User') ?></th>
                                <td><?= $trip->has('user') ? $this->Html->link($trip->user->name, ['controller' => 'Users', 'action' => 'view', $trip->user->id]) : '' ?></td>
                            </tr>

                            <tr>
                                <th><?= __('Created') ?></th>
                                <td><?= h($trip->created) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Modified') ?></th>
                                <td><?= h($trip->modified) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            
            
            <!------ Basic Tab -------->
            <div class="box">    
                <div class="box-header">
                    <h3 class="box-title"><?= h('Basic Tab') ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tbody>
                            <tr>
                                <th><?= __('Destination') ?></th>
                                <td><?= $this->Html->link($trip->location->name_en, ['controller' => 'Locations', 'action' => 'view', $trip->location->id]) ?></td>
                            </tr>

                            <tr>
                                <th><?= __('Stopped By Locations') ?></th>
                                <td>
                                <?php
                                if(!empty($trip->triplocations)){
                                    echo '<ul class="list-group">';
                                    foreach($trip->triplocations as $triplocations){
                                        echo '<li class="list-group-item">';
                                        echo $triplocations->has('location') ? $this->Html->link($triplocations->location->name_en, ['controller' => 'Locations', 'action' => 'view', $triplocations->location->id]) : ''; 
                                        echo '</li>';
                                    }
                                    echo '</ul>';
                                }
                                ?>
                                </td>
                            </tr>
                            
                            <tr>
                                <th><?= __('Main Activities') ?></th>
                                <td>
                                <?php
                                if(!empty($trip->tripactivities)){
                                    echo '<ul class="list-group">';
                                    foreach($trip->tripactivities as $tripactivities){
                                        echo '<li class="list-group-item">';
                                        echo $tripactivities->has('activity') ? $this->Html->link($tripactivities->activity->title_en, ['controller' => 'Activities', 'action' => 'view', $tripactivities->activity->id]) : ''; 
                                        echo '</li>';
                                    }
                                    echo '</ul>';
                                }
                                ?>
                                </td>
                            </tr>
                            
                            <tr>
                                <th><?= __('Main Transportation') ?></th>
                                <td>
                                  
                                    <?= $this->Html->link($trip->transportation->title_en, ['controller' => 'Transportations', 'action' => 'view', $trip->transportation->id]) ?> (<?= $this->Html->link($trip->transportationvehicle->title_en, ['controller' => 'Transportationvehicles', 'action' => 'view', $trip->transportationvehicle->id]) ?>)
                                
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
                <!------ Basic Tab (End) -------->
                
            <!------ Overview Tab -------->
            <div class="box">    
                <div class="box-header">
                    <h3 class="box-title"><?= h('Overview Tab') ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tbody>
                            <tr>
                                <th><?= __('Title (English)') ?></th>
                                <td><?= h($trip->title_en) ?></td>
                            </tr>

                            <tr>
                                <th><?= __('Title (Arabic)') ?></th>
                                <td><?= h($trip->title_ar) ?></td>
                            </tr>
                            
                            <tr>
                                <th><?= __('Summary (English)') ?></th>
                                <td><?= h($trip->summary_en) ?></td>
                            </tr>

                            <tr>
                                <th><?= __('Summary (Arabic)') ?></th>
                                <td><?= h($trip->summary_ar) ?></td>
                            </tr>

                            <tr>
                                <th><?= __('Photos') ?></th>
                                <td>
                                <?php
                                if(!empty($trip->tripgallery)){
                                    foreach($trip->tripgallery as $image){ ?>
                                        <img src="<?php echo $this->request->webroot; ?>images/trips/<?php echo $image->file; ?>" width="100px"><?php
                                    }
                                }
                                ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
                <!------ Overview Tab (End) -------->
                
            <!------ Detail Tab -------->
            <div class="box">    
                <div class="box-header">
                    <h3 class="box-title"><?= h('Detail Tab') ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tbody>
                            <tr>
                                <th><?= __('Meeting points') ?></th>
                                <td>
                                <?php
                                if(!empty($trip->tripmeetingpoints)){
                                    echo '<ul class="list-group">';
                                    foreach($trip->tripmeetingpoints as $tripmeetingpoints){
                                        echo '<li class="list-group-item">';
                                        echo $tripmeetingpoints->location.' > '.$tripmeetingpoints->meeting_point_type.' > '.$tripmeetingpoints->meeting_point;
                                        echo '</li>';
                                    }
                                    echo '</ul>';
                                }
                                ?>
                                </td>
                            </tr>

                            <tr>
                                <th><?= __('Schedule') ?></th>
                                <td>
                                <?php
                                if($trip->schedule != ''){ 
                                    echo '<table class="table table-striped">';
                                    $schedule = json_decode($trip->schedule);
                                    foreach($schedule as $sc){ ?>
                                        <tr>
                                            <td><?php echo $sc->hours.':'.$sc->minutes; ?></td>
                                            <td><?php echo $sc->content; ?></td>
                                        </tr> <?php
                                    }
                                    
                                    echo '</table>';
                                }
                                ?>
                                </td>
                            </tr>

                            <tr>
                                <th><?= __('FAQ') ?></th>
                                <td>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Question</th>
                                                <th>Answer</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Why this Trip?</td>
                                                <td><?php echo $trip->faq1; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Things to prepare fot the Trip?</td>
                                                <td><?php echo $trip->faq2; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!------ Detail Tab (End) -------->
            
            <!------ Price Tab -------->
            <div class="box">    
                <div class="box-header">
                    <h3 class="box-title"><?= h('Price Tab') ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tbody>
                            <tr>
                                <th><?= __('Include Exclude') ?></th>
                                <td>
                                    <?php
                                    if($trip->include_exclude == 'all_inclusive')echo 'All included';
                                    elseif($trip->include_exclude == 'all_excluded') echo 'Food, Transportation, Admission fee excluded';
                                    elseif($trip->include_exclude == 'food_excluded') echo 'Food Excluded';
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th><?= __('Extra expense travelers should prepare') ?></th>
                                <td><?= h($trip->extra_expense_en) ?></td>
                            </tr>
                            
                            <tr>
                                <th><?= __('Maximun travelers') ?></th>
                                <td><?= h($trip->travellers) ?></td>
                            </tr>
                            
                            <tr>
                                <th><?= __('Pricing Type') ?></th>
                                <td><?= h(ucwords($trip->pricing_type)) ?></td>
                            </tr>
                            
                            <tr>
                                <th><?= __('Pricing') ?></th>
                                <td>
                                    <table class="table table-striped">
                                    <?php if($trip->pricing_type == 'basic'){ ?>
                                            <tr>
                                                <th>Price Per Person</th>
                                                <td><?php echo $trip->basic_price_per_person; ?> THB</td>
                                            </tr>
                                            <tr>
                                                <th>Travelers</th>
                                                <td><?php echo $trip->travellers; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Total Price</th>
                                                <td><?php echo $trip->basic_total_price; ?> THB</td>
                                            </tr>
                                    <?php } ?>
                                            
                                    <?php if($trip->pricing_type == 'advance' && !empty($trip->tripprices)){ ?>
                                            <thead>
                                                <tr>
                                                    <th>Persons</th>
                                                    <th>Price Per Person</th>
                                                    <th>Total Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($trip->tripprices as $price){ ?>
                                                <tr>
                                                    <td><?php echo $price->person; ?> x <i class="fa fa-user"></i></td>
                                                    <td><?php echo $price->price_per_person; ?></td>
                                                    <td><?php echo $price->total_price; ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                    <?php } ?>
                                    </table>
                                </td>
                            </tr>
                            
                            <tr>
                                <th><?= __('Child Price') ?></th>
                                <td>
                                    <?php echo ($trip->child_price_enabled == '0')? 'No' : 'Yes'; ?>
                                    <br>
                                    <?php echo ($trip->child_price_enabled == '1')? $trip->child_price : ''; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!------ Price Tab (End) -------->
                
           <!------ Condition Tab -------->
            <div class="box">    
                <div class="box-header">
                    <h3 class="box-title"><?= h('Condition Tab') ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tbody>
                            <tr>
                                <th><?= __('Extra conditions') ?></th>
                                <td>
                                    <?php
                                    if(!empty($trip->tripextraconditions)){
                                        echo '<ul class="list-group">';
                                        foreach($trip->tripextraconditions as $conditions){
                                            echo '<li class="list-group-item">';
                                            echo $conditions->extracondition->title_en;
                                            echo '</li>';
                                        }
                                        echo '</ul>';
                                    }else{
                                        echo 'No Extra conditions selected';
                                    }
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!------ Condition Tab (End) --------> 
            
            <!------ To complete your trip listing Tab -------->
            <div class="box">    
                <div class="box-header">
                    <h3 class="box-title"><?= h('To complete your trip listing Tab') ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tbody>
                            <tr>
                                <th><?= __('Request for photographer') ?></th>
                                <td><?php echo ($trip->request_photographer == '1')? 'Yes' : 'No'; ?> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!------ To complete your trip listing Tab (End) --------> 
            
        </div>
    </div>
</section>       