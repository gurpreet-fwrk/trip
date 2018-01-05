<?php
/**
  * @var \App\View\AppView $this
  */
?>

<style>
.mp-part ul{border: 1px solid #0000004d; height: 180px; border-radius: 5px; overflow-y: scroll;}
</style>

<section class="content-header">
    <h1>
    Edit Trip
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Trip</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <?= $this->Flash->render() ?>
        <div class="col-xs-8">
            
        <?= $this->Form->create($trip, ['id' => 'trip-form', 'enctype' => 'multipart/form-data']) ?>    
            
        <!-- Basic Tab  -->     
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Basic</h3>
                
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Destination</label>
                        <?php echo $this->Form->control('location_id', ['options' => $locations, 'class' => 'form-control', 'label' => false, 'required']); ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Stopped By Location</label>
                        
                        <?php
                        $selected_stopped = array();
                        if(!empty($selected_stopped_location)){
                            for($i=0; $i<count($selected_stopped_location); $i++){
                                $selected_stopped[] = $selected_stopped_location[$i]['location_id'];
                            }
                        }
                        ?>
                        
                        <?php echo $this->Form->select('stopped_locations', $locations, ['class' => 'form-control js-example-basic-multiple','multiple' => 'multiple', 'value' => $selected_stopped, 'required']); ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Main Activities</label>
                        
                         <?php
                        $selected_act = array();
                        if(!empty($selected_activities)){
                            for($i=0; $i<count($selected_activities); $i++){
                                $selected_act[] = $selected_activities[$i]['activity_id'];
                            }
                        }
                        ?>
                        
                        <?php echo $this->Form->select('activities', $activities, ['class' => 'form-control js-example-basic-multiple','multiple' => 'multiple', 'value' => $selected_act, 'required']); ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Main Transportation</label>
                        <div class="box box-solid">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="box-group" id="accordion">
                                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                    <?php $i = 1; ?>
                                    <?php foreach ($transportations as $transportation) { ?>
                                    <div class="panel box box-primary">
                                        <div class="box-header with-border">
                                            <h4 class="box-title">
<!--                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>">-->
                                                <div class="form-group">
                                                    <div class="radio">
                                                        <?php if($transportation->id == $trip['transportation_id']){ ?>
                                                        <input type='radio' name='transportation_id' value='<?php echo $transportation->id; ?>' checked="" required /><?php echo $transportation['title_en']; ?>
                                                        <?php }else{ ?>
                                                        <input type='radio' name='transportation_id' value='<?php echo $transportation->id; ?>' required /><?php echo $transportation['title_en']; ?>
                                                        <?php } ?>
                                                    </div>
                                                </div>    
                                                <!--</a>-->
                                            </h4>
                                        </div>
                                        <div id="collapse<?php echo $i; ?>" class="trans_acc panel-collapse collapse <?php echo ($transportation->id == $trip['transportation_id']) ? 'in':'' ?>">
                                            <div class="box-body">
                                                <?php if(!empty($transportation->transportationvehicles)){ ?>
                                                <?php foreach ($transportation->transportationvehicles as $vehicle) { ?>
                                                <div class="form-group">
                                                    <div class="radio">
                                                        <label>
                                                            <?php if($vehicle['id'] == $trip['transportationvehicle_id']){ ?>
                                                            <input type="radio" name="transportationvehicle_id" value="<?php echo $vehicle['id'] ?>" checked="" required><?php echo $vehicle['title_en'] ?>
                                                            <?php }else{ ?>
                                                            <input type="radio" name="transportationvehicle_id" value="<?php echo $vehicle['id'] ?>" required><?php echo $vehicle['title_en'] ?>
                                                            <?php } ?>
                                                        </label>
                                                    </div>
                                                </div>  
                                                <?php } ?>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $i++; ?>
                                    <?php } ?>
                                   
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Basic Tab (End) -->        
            
        <!-- Overview Tab -->        
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Overview</h3>
                
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name your trip</label>
                        <?php echo $this->Form->control('title_en', array('class' => 'form-control', 'label' => false, 'id' => 'trip_title', 'required')); ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Summary of your trip</label>
                        <?php echo $this->Form->control('summary_en', array('class' => 'form-control', 'label' => false, 'id' => 'trip_summary', 'required')); ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Photos</label>
                        <input type="file" name="images[]" id="overview_images" class="form-control" multiple="" accept="image/*" required>
                        <div class="row"></div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Overview Tab (End) -->
        
        <!-- Detail Tab -->        
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Detail</h3>
                
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Meeting points</label>
                        <div class="row mp-part">
                            <div class="col-md-4">
                                <ul id="slmp" class="list-group">
                                    <?php foreach($selected_stopped_location as $stopped_location){ ?>
                                    <li class="list-group-item" data-id="<?php echo $stopped_location['location']['id']; ?>"><?php echo $stopped_location['location']['name_en']; ?></li>
                                    <?php } ?>                                    
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul id="allmpt" class="list-group"></ul>
                            </div>
                            <div class="col-md-4">
                                <ul id="allmp" class="list-group"></ul>
                            </div>
                        </div>
                        <div class="selected_meeting_points">
                            <?php foreach($selected_meetingpoints as $selected_meetingpoint){ ?>
                            <span class='rtmp' data-id='<?php echo $selected_meetingpoint['meetingpoint_id'] ?>'><?php echo $selected_meetingpoint['location'] ?> > <?php echo $selected_meetingpoint['meeting_point_type'] ?> > <?php echo $selected_meetingpoint['meeting_point'] ?> &nbsp;&nbsp;<i class='fa fa-times' aria-hidden='true'></i></span><br>
                            <?php } ?>
                        </div>
                        
                        <input type="hidden" name="meetingpoints">
                    </div>     
                    
                     
                
                    <div class="form-group">
                        <label for="exampleInputEmail1">Schedule</label>
                        <table class="table">
                            <tbody class="schedule_part">
                                <tr>
                                    <td>
                                        <select name="schedule[0][hours]" class="form-control" required>
                                            <option value="">Hours</option>
                                            <?php for($i=0; $i<24; $i++){ ?>
                                            <?php if(strlen((string)$i) == 1){ ?>
                                            <option value="<?php echo '0'.$i; ?>"><?php echo '0'.$i; ?></option>
                                            <?php }else{ ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php } ?>
                                            <?php } ?>          
                                        </select>
                                    </td>
                                    <td>
                                        <select name="schedule[0][minutes]" class="form-control" required>
                                            <option value="">Minutes</option>
                                            <?php for($i=0; $i<=45; $i+=15){ ?>
                                            <?php if(strlen((string)$i) == 1){ ?>
                                            <option value="<?php echo '0'.$i; ?>"><?php echo '0'.$i; ?></option>
                                            <?php }else{ ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php } ?>
                                            <?php } ?>          
                                        </select>
                                    </td>
                                    <td>
                                        <div class="mnt_meetingpoints">
                                            <div></div>
                                        </div>
                                        <input type="hidden" name="schedule[0][content]">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="schedule[1][hours]" class="form-control" required>
                                            <option value="">Hours</option>
                                            <?php for($i=0; $i<24; $i++){ ?>
                                            <?php if(strlen((string)$i) == 1){ ?>
                                            <option value="<?php echo '0'.$i; ?>"><?php echo '0'.$i; ?></option>
                                            <?php }else{ ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php } ?>
                                            <?php } ?>          
                                        </select>
                                    </td>
                                    <td>
                                        <select name="schedule[1][minutes]" class="form-control" required>
                                            <option value="">Minutes</option>
                                            <?php for($i=0; $i<=45; $i+=15){ ?>
                                            <?php if(strlen((string)$i) == 1){ ?>
                                            <option value="<?php echo '0'.$i; ?>"><?php echo '0'.$i; ?></option>
                                            <?php }else{ ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php } ?>
                                            <?php } ?>          
                                        </select>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <textarea class="form-control" name="schedule[1][content]" required></textarea>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="schedule[2][hours]" class="form-control" required>
                                            <option value="">Hours</option>
                                            <?php for($i=0; $i<24; $i++){ ?>
                                            <?php if(strlen((string)$i) == 1){ ?>
                                            <option value="<?php echo '0'.$i; ?>"><?php echo '0'.$i; ?></option>
                                            <?php }else{ ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php } ?>
                                            <?php } ?>          
                                        </select>
                                    </td>
                                    <td>
                                        <select name="schedule[2][minutes]" class="form-control" required>
                                            <option value="">Minutes</option>
                                            <?php for($i=0; $i<=45; $i+=15){ ?>
                                            <?php if(strlen((string)$i) == 1){ ?>
                                            <option value="<?php echo '0'.$i; ?>"><?php echo '0'.$i; ?></option>
                                            <?php }else{ ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php } ?>
                                            <?php } ?>          
                                        </select>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <textarea class="form-control" name="schedule[2][content]" required></textarea>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <?php $schedule_row = 3; ?>
                        <button type="button" onclick="addOptionValue()" class="btn btn-primary blue right">Add Row</button>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">FAQ's</label>
                        
                        <div class="form-group">
                            Why this Trip?
                            Briefly explain your travelers why they should book your trip to quickly graps their attentions
                            <?php echo $this->Form->control('faq1', array('class' => 'form-control', 'label' => false, 'required')); ?>
                        </div>
                        
                        <div class="form-group">
                            Things to prepare for the Trip?
                            Is there anything travelers should prepare for this trip?
                            <?php echo $this->Form->control('faq2', array('class' => 'form-control', 'label' => false, 'required')); ?>
                        </div>
                    </div>  
                    
                </div>
            </div>
        </div>
        <!-- Detail Tab (End) -->
        
        <!-- Price Tab -->        
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Price</h3>
                
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Please, use these price conditions as guides to calculate your trip fee and always make sure to inform your travelers about any additional expenses before the trip day.</label>
                        <div class="panel box box-primary">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <div class="form-group">
                                        <div class="radio">    
                                            <?php if($trip->include_exclude == 'all_inclusive'){ ?>
                                            <input type='radio' id='r11' name='include_exclude' value='all_inclusive' checked="" required />
                                            <?php }else{ ?>
                                            <input type='radio' id='r11' name='include_exclude' value='all_inclusive' required />
                                            <?php } ?>
                                            
                                            All inclusive 
                                        </div>
                                    </div>    
                                </h4>
                            </div>
                            <div id="collapse" class="trans_acc panel-collapse collapse <?php echo ($trip->include_exclude == 'all_inclusive') ? 'in':''; ?>">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="panel-body sub subs">

                                            <p>
                                                <img src="<?php echo $this->request->webroot ?>/images/website/all_include_1.png">
                                                <img src="<?php echo $this->request->webroot ?>/images/website/all_include_2.png">
                                                <img src="<?php echo $this->request->webroot ?>/images/website/all_include_3.png">
                                            </p>

                                            <ul class="list-group">
                                                <li class="list-group-item">Expenses, occur during a trip, are mainly included</li>
                                                <li class="list-group-item">- Public or private transportation fares : taxi, bts, mrt, etc.(Please estimate the cost of gasoline or vehicle rental fee, in case of using a private car)</li>
                                                <li class="list-group-item">- Foods; Meal(s) during the trip. (Please note that alcohol is always excluded)</li>
                                                <li class="list-group-item">- Admission fee: Amusement park, gallery, shows, and etc.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="panel box box-primary">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <div class="form-group">
                                        <div class="radio">    
                                            <?php if($trip->include_exclude == 'food_excluded'){ ?>
                                            <input type='radio' id='r12' name='include_exclude' value='food_excluded' checked="" required />
                                            <?php }else{ ?>
                                            <input type='radio' id='r12' name='include_exclude' value='food_excluded' required />
                                            <?php } ?>
                                            Food Excluded 
                                        </div>
                                    </div>    
                                </h4>
                            </div>
                            <div id="collapse" class="trans_acc panel-collapse collapse <?php echo ($trip->include_exclude == 'food_excluded') ? 'in':''; ?>">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="panel-body sub subs">

                                            <p>
                                                <img src="<?php echo $this->request->webroot ?>/images/website/food_exclude_1.png">
                                                <img src="<?php echo $this->request->webroot ?>/images/website/all_include_2.png">
                                                <img src="<?php echo $this->request->webroot ?>/images/website/all_include_3.png">
                                            </p>
                                            <ul class="list-group">
                                                <li class="list-group-item">Travelers pay for their meal(s) during a trip. Only the following expenses are included.</li>
                                                <li class="list-group-item">Reminder; Local Experts should calculate your trip’s price including these two expenses</li>
                                                <li class="list-group-item">- Public/ private transportation fares: taxi, bts, mrt, etc. (please estimate the cost of gasoline or vehicle rental fee, in case of using a private car)</li>
                                                <li class="list-group-item">Admission fee: Amusement park, gallery, shows, and etc.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="panel box box-primary">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <div class="form-group">
                                        <div class="radio">    
                                            <?php if($trip->include_exclude == 'all_excluded'){ ?>
                                            <input type='radio' id='r13' name='include_exclude' value='all_excluded' checked="" required />
                                            <?php }else{ ?>
                                            <input type='radio' id='r13' name='include_exclude' value='all_excluded' required />
                                            <?php } ?>
                                            Food, Transportation, Admission fee excluded
                                        </div>
                                    </div>    
                                </h4>
                            </div>
                            <div id="collapse" class="trans_acc panel-collapse collapse <?php echo ($trip->include_exclude == 'all_excluded') ? 'in':''; ?>">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="panel-body sub subs">

                                            <p>
                                            <img src="<?php echo $this->request->webroot ?>/images/website/food_exclude_1.png">
                                            <img src="<?php echo $this->request->webroot ?>/images/website/all_exclude_1.png">
                                            <img src="<?php echo $this->request->webroot ?>/images/website/all_exclude_2.png">
                                            </p>
                                            
                                            <ul class="list-group">
                                            <li class="list-group-item">The price you set is only for your guiding fee. All other expenses, occur during a trip, will be paid by travelers, themselves. Please roughly approximate travelers' expenses and always inform them before the trip.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Extra expense travelers should prepare</label>
                        <div class="form-group">
                            Are there any extra expenses that travelers have to pay during the trip?
                            <?php echo $this->Form->control('extra_expense_en', array('class' => 'form-control', 'label' => false, 'placeholder' => "e.g. your pocket money", 'required')); ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1"><i class="fa fa-users" aria-hidden="true"></i> Maximun travelers</label>
                        <div class="form-group">
                            <select class="form-control travel valid" id="max_travelers" name="travellers" required="" aria-invalid="false">
                                <?php for($i=1; $i<9; $i++){ ?>
                                <?php if($trip->travellers == $i){ ?>
                                <option value="<?php echo $i; ?>" selected="selected"><?php echo $i; ?></option>
                                <?php }else{ ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pricing Type</label>
                        <div class="panel box box-primary">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <div class="form-group">
                                        <div class="radio">    
                                            <input type='radio' name='pricing_type' value='basic' required /> Basic
                                        </div>
                                    </div>    
                                </h4>
                            </div>
                            <div id="collapse" class="trans_acc panel-collapse collapse">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="panel-body sub subs">
                                            <div class="col-sm-6">
                                                <div class="pric">
                                                    <h4>Price (per person)</h4>
                                                    <input type="number" min="0" placeholder="0" id="price_per_person" class="valid" aria-invalid="false">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="pric pric_rt">
                                                    <h4>Total (per trip)</h4>
                                                    <p id="total_ppp">0.00 - 0.00 <span style="color:#000;">THB</span></p>
                                                    <input type="hidden" name="basic_single_price" value="4.00">
                                                    <input type="hidden" name="basic_total_price1" value="20.00">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="panel box box-primary">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <div class="form-group">
                                        <div class="radio">    
                                            <input type='radio' name='pricing_type' value='advance' required /> Advance
                                        </div>
                                    </div>    
                                </h4>
                            </div>
                            <div id="collapse" class="trans_acc panel-collapse collapse">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="panel-body sub subs">
                                            <div class="form-group">
                                                <div class="panel-body sub subs">
                                                    <div style="font-weight: bold; margin-bottom: 10px;">
                                                        <div class="thb">
                                                            <div class="row no-margin">
                                                                <div class="col-sm-4 text-center">Persons</div>
                                                                <div class="col-sm-4 text-center">Price (per person)</div>
                                                                <div class="col-sm-4 text-center">Total (per trip)</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="advance_pricing">
<!--                                                        <div class="thb">
                                                            <div class="row no-margin">
                                                                <div class="col-sm-4 text-center">
                                                                    <div class="qt">1 <i class="fa fa-times" aria-hidden="true"></i> <i class="fa fa-user" aria-hidden="true"></i></div>
                                                                </div>
                                                                <div class="col-sm-4 text-center">
                                                                    <div class="place">
                                                                        <input type="number" placeholder="0" min="0" class="advance_pricing_amt" data-qty="1">
                                                                        <input type="hidden" name="apricing[1][persons]" value="1">
                                                                        <input type="hidden" name="apricing[1][single]" value="0.00">
                                                                        <input type="hidden" name="apricing[1][total_price]" value="0.00">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 text-center">
                                                                    <div class="amnt">
                                                                        <p>0.00 - 0.00 <span>THB</span></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>-->
                                                    </div>
                                                </div>    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Additional Options</label>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="child_price_enabled"> Enable Child Price (Age 2-12)
                                </label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="child_price" style="display:none;">
                                Price Per child <input type="number" name="child_price" min="0" placeholder="0"> THB
                            </div>
                        </div>
                        
                        
                    </div>
                    
                </div>
            </div>
            
        </div>
        <!-- Price Tab (END) --> 
        
        <!-- Condition Tab -->        
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Condition</h3>
                
                <div class="box-body">
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Extra Conditions (Optional)</label>
                        
                        <?php
                        $selected_conditions = array();
                        if(!empty($selected_extraconditions)){
                            foreach($selected_extraconditions as $sel){
                                $selected_conditions[] = $sel->extracondition_id;
                            }
                        }
                        ?>
                        
                        <?php foreach($extraconditions as $extracondition){ ?>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    
                                    <?php if(in_array($extracondition['id'], $selected_conditions)){ ?>
                                    <input type="checkbox" name="extracondition_id[]" value="<?php echo $extracondition['id']; ?>" checked="">
                                    <?php }else{ ?>
                                    <input type="checkbox" name="extracondition_id[]" value="<?php echo $extracondition['id']; ?>">
                                    <?php } ?>
                                    <?php echo $extracondition['title_en']; ?>
                                </label>
                            </div>
                        </div>
                        <?php } ?>
                            
                    </div>
                </div>
                
            </div>
        </div>
        <!-- Condition Tab (End) -->
        
        <!-- Submit Tab -->        
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Submit</h3>
                
                <div class="box-body">
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">To complete your trip listing</label>

                        <div class="form-group">
                            <p>When you've completed your trip listing, click 'Submit for approval'. Your trip will be under our review process. Please allow 3-7 business days for your trip to be approved and published on our website.</p>

                        <strong>Request for photography</strong>
                        <p>- Trips with VDO get more booking by 89%</p>
                        <p>- The photography service is FREE!</p>
                        <p>- You will not receive a payment for taking the photographer out on the tour. The photographer will take care of his own expenses (transport, meals, admission fee, etc.).</p>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="1" name="request_photographer"> Request For Photographer
                            </label>
                        </div>
                        
                        </div>
                            
                    </div>
                </div>
                
            </div>
            <div class="box-footer">
                <?= $this->Form->button(__('Submit'), ['id' => 'trip-form-submit', 'class' => 'btn btn-success']) ?>
            </div>
        </div>
        <!-- Submit Tab (End) -->
        
    <?= $this->Form->end() ?>
</section>   
<script>

$(document).ready(function(){
    $.session.clear();   
    
    var selected_mp = $.parseJSON('<?php echo json_encode($selected_meetingpoints); ?>');
    var meetingpoints = [];

    for(var i=0; i<Object.keys(selected_mp).length; i++){
            meetingpoints.push({'location': selected_mp[i]['location'], 'mt': selected_mp[i]['meeting_point_type'],'mp': selected_mp[i]['meeting_point'], 'mp_id': selected_mp[i]['meetingpoint_id'].toString()});
    }
    
    console.log(meetingpoints);
    
    $.session.set('mp_array', JSON.stringify(meetingpoints));
});

$(document).ready(function(){
    $("#max_travelers").trigger('change');
});

$().ready(function() {
//    $("#trip-form").validate({
//        rules: {
//            images[]: {
//                    required: true,
//                    extension: "|jpg|jpeg|png",
//            }
//        },
//        messages: {
//            file: {
//                    required: "Please Select File First",
//                    extension: "Only jpg, jpeg and png formats are accepted"
//            }
//        }
//    });

//$("#trip-form").validate();

$(".js-example-basic-multiple").select2();

});

/***** Basic TAB (Transportation accordion) ******/
$("input[name='transportation_id']").change(function(){
    
    $("input[name='transportationvehicle_id']").prop('checked', false);
    
    $(".trans_acc").removeClass('in');
    $(this).parent().parent().parent().parent().next('div').addClass('in'); 
});

/***** Basic TAB (Transportation accordion) (END) ******/

/***** Price TAB (price accordion) ******/

$("input[name='include_exclude']").change(function(){   
    $(this).parent().parent().parent().parent().parent().parent().find('.trans_acc').removeClass('in'); 
    $(this).parent().parent().parent().parent().next('div').addClass('in'); 
});

$("input[name='pricing_type']:first").trigger('click');
$("input[name='pricing_type']:first").parent().parent().parent().parent().next('div').addClass('in'); 

$("input[name='pricing_type']").change(function(){   
    $(this).parent().parent().parent().parent().parent().parent().find('.trans_acc').removeClass('in'); 
    $(this).parent().parent().parent().parent().next('div').addClass('in'); 
});

/***** Price TAB (price accordion) (END) ******/

/******* Multiple image Preview ********/

$(function() {
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    
                    var html = '<div class="col-md-4">';
                    html += '<img src="'+event.target.result+'" width="100%" style="margin-top:15px;">';
                    html += '</div>';
                    
                    $(html).appendTo(placeToInsertImagePreview);
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    };

    $('#overview_images').on('change', function() {
        imagesPreview(this, $(this).parent().find('div'));
    });
});

/******* Multiple image Preview (END) ********/

var stopped_location = [];

$(".js-example-basic-multiple").change(function(){
    stopped_location = [];
    $(".js-example-basic-multiple option:selected").each(function() {
        
        stopped_location.push($(this).val());
    });
    
    console.log(stopped_location);
	
	
	
	$.ajax({
		url: '<?php echo $this->request->webroot ?>admin/trips/ajaxTrip?action=getLocationsById',
		data: {location_ids: JSON.stringify(stopped_location)},
		method: 'post',
		//dataType: 'json',
		success: function(json){
			console.log(json);
			
			json = JSON.parse(json);
			
			if(json){
				var html = '';
				for(var i = 0; i < json.length; i++){
					html += '<li class="list-group-item" data-id="'+json[i]["id"]+'">'+ json[i]['name_en'] +'</li>'
				}
				$("#slmp").html(html);
			}else{
				$("#slmp").html('');
			}
		}
	});
});

$(document).delegate('#slmp li', 'click', function(){
    var id = $(this).attr('data-id'); 
    $.session.set('location_name', $(this).text());
    $.ajax({
        url: '<?php echo $this->request->webroot ?>admin/trips/ajaxTrip?action=get_meeting_points_types',
        data: {location_id: id},
        method: 'post',
        dataType: 'json',
        success: function(json){
            var html = '';
            if(json){
                for(var i=0; i<json.length; i++){
                    html+='<li class="list-group-item" data-id="'+json[i]['id']+'"><a>'+json[i]['title_<?php echo $config_language ?>']+' <i class="fa fa-caret-right" aria-hidden="true"></i></a></li>';
                }
            }
            $("#allmpt").html(html);
            $("#allmp").html('');
        }
    });
});

$(document).delegate('#allmpt li', 'click', function(){
    var meetingpointtype_id = $(this).attr('data-id');
    $.session.set('mt_name', $(this).find('a').text());
    $.ajax({
        url: '<?php echo $this->request->webroot ?>admin/trips/ajaxTrip?action=get_meeting_points',
        data: {meetingpointtype_id: meetingpointtype_id},
        method: 'post',
        dataType: 'json',
        success: function(json){
            var html = '';
            if(json){       
                var mp_ids = [];
                if($.session.get('mp_array')){
                    
                    var new_arr = JSON.parse($.session.get('mp_array'));
                    
                    $.each(new_arr, function(key, value) {
                        if(value != null){
                            mp_ids.push(value.mp_id);
                        }
                    });
                }
 
                for(var i=0; i<json.length; i++){
                    var uid = json[i]['id'].toString();

                    if($.inArray(uid, mp_ids) > -1){
                        html += '<li class="list-group-item">';
                        html += '<input type="checkbox" data-id="'+ json[i]['id'] +'" value="'+ json[i]['id'] +'" name="meetingpointtypes" checked="checked">';
                        html += '<label for="rc3" onclick class="no-margin">'+ json[i]['title_<?php echo $config_language ?>'] +'</label>';
                        html += '</li>';                             
                    }else{
                        html += '<li class="list-group-item">';
                        html += '<input type="checkbox" data-id="'+ json[i]['id'] +'" value="'+ json[i]['id'] +'" name="meetingpointtypes">';
                        html += '<label for="rc3" onclick class="no-margin">'+ json[i]['title_<?php echo $config_language ?>'] +'</label>';
                        html += '</li>'; 
                    }
                }    
            }
            $("#allmp").html(html);
        }
    });
    
});

/********** Store and remove Meeting Points *************/
$(document).delegate('#allmp li input', 'click', function(){
   var value = $(this).next('label').text();
   var id = $(this).val();
   
   if($(this).is(':checked')){
       $(this).prop('checked', true);
       store_meetingpoint(value, id);
   }else{
       remove_meetingpoint(value, id);
   }
   
});

function store_meetingpoint(value, id){
    
    if($.session.get('mp_array')){
        var meetingpoints = JSON.parse($.session.get('mp_array'));
    }else{
        var selected_mp = $.parseJSON('<?php echo json_encode($selected_meetingpoints); ?>');
        var meetingpoints = [];
        
        for(var i=0; i<Object.keys(selected_mp).length; i++){
                meetingpoints.push({'location': selected_mp[i]['location'], 'mt': selected_mp[i]['meeting_point_type'],'mp': selected_mp[i]['meeting_point'], 'mp_id': selected_mp[i]['meetingpoint_id'].toString()});
        }
        
        $.session.set('mp_array', JSON.stringify(new_arr));
    }

    meetingpoints.push({'location': $.session.get('location_name'), 'mt': $.session.get('mt_name'), 'mp': value, 'mp_id': id});
    $.session.set('mp_array', JSON.stringify(meetingpoints));
     
    var new_arr = JSON.parse($.session.get('mp_array'));
    
    var html = '';
    var html2 = '';
    
    $.each(new_arr, function(key, value) {
        if(value != null){
            html += "<span class='rtmp' data-id='"+ value.mp_id +"'>"+value.location+" > "+ value.mt +" > "+ value.mp +" &nbsp;&nbsp;<i class='fa fa-times' aria-hidden='true'></i></span><br>";
            html2 += "<span>- "+ value.mt +" ["+value.mp+"]</span><br>";
        }
    });
    
    $(".selected_meeting_points").html(html);
    $(".mnt_meetingpoints div").html(html2);
    
    $("input[name='schedule[0][content]']").val(html2);
    
    $("input[name='meetingpoints']").val($.session.get('mp_array'));
}

function remove_meetingpoint(meeting_point, id){

    if($.session.get('mp_array')){
        var new_arr = JSON.parse($.session.get('mp_array'));
    }else{
        var selected_mp = $.parseJSON('<?php echo json_encode($selected_meetingpoints); ?>');
        
        console.log('selected Mp');
        console.log(selected_mp);
        
        var new_arr = [];
        
        for(var i=0; i<Object.keys(selected_mp).length; i++){
                new_arr.push({'location': selected_mp[i]['location'], 'mt': selected_mp[i]['meeting_point_type'],'mp': selected_mp[i]['meeting_point'], 'mp_id': selected_mp[i]['meetingpoint_id']});
        }
        
        $.session.set('mp_array', JSON.stringify(new_arr));
    }

    var new_arr = JSON.parse($.session.get('mp_array'));
    
    console.log(new_arr);
    
    $.each(new_arr, function(key, value) {
        if(value != null){
            if(value.mp_id == id){
                delete new_arr[key];
                
                $( "#allmp label:contains('"+value.mp+"')").parent().find('input').prop('checked', false);
                
            }
        }
    });
    $.session.set('mp_array', JSON.stringify(new_arr));
    new_arr = JSON.parse($.session.get('mp_array'));

    var html = '';
    var html2 = '';

    $.each(new_arr, function(key, value) {
        if(value != null){
            html += "<span class='rtmp' data-id='"+ value.mp_id +"'>"+value.location+" > "+ value.mt +" > "+ value.mp +" &nbsp;&nbsp;<i class='fa fa-times' aria-hidden='true'></i></span><br>";
            html2 += "<span>- "+ value.mt +" ["+value.mp+"]</span><br>";
        }
    });
    
    $(".selected_meeting_points").html(html);
    $(".mnt_meetingpoints div").html(html2);
    
    $("input[name='schedule[0][content]']").val(html2);
    
    $("input[name='meetingpoints']").val($.session.get('mp_array'));
}

$(document).delegate('.rtmp i', 'click', function(){
    var id = $(this).parent().attr('data-id');
    
    remove_meetingpoint('', id);
    
});

/********** Store and remove Meeting Points (END) *************/

var schedule_row = '<?php echo $schedule_row ?>';

function addOptionValue(){
   
    var html = '';
    html += '<tr id="schedule_row-'+schedule_row+'">';
    html += '<td>';
    html += '<select name="schedule['+schedule_row+'][hours]" class="form-control" required>';
    html += '<option value="">Hours</option>';
    for(var i=0; i<24; i++){                   
        if(i.toString().length == 1){
        html += '<option value="0'+i+'">0'+i+'</option>';
        }else{
        html += '<option value="'+i+'">'+i+'</option>';
        }
    }
    html += '</select>';
    html += '</td>';
    html += '<td>';
    html += '<select name="schedule['+schedule_row+'][minutes]" class="form-control" required>';
    html += '<option value="">Minutes</option>';
    for(var i=0; i<=45; i+=15){                   
        if(i.toString().length == 1){
        html += '<option value="0'+i+'">0'+i+'</option>';
        }else{
        html += '<option value="'+i+'">'+i+'</option>';
        }
    }
    html += '</select>';
    html += '</td>';
    html += '<td>';
    html += '<div class="form-group">';
    html += '<textarea class="form-control" rows="3" name="schedule['+schedule_row+'][content]" required></textarea>';
    html += '</div>';
    html += '<button type="button" onclick="$(\'#schedule_row-' + schedule_row + '\').remove();" data-toggle="tooltip" rel="tooltip" title="Remove" class="btn btn-danger pull-right"><i class="fa fa-minus-circle"></i></button>';
    html += '</td>';
    html += '</tr>';
    
    $('.schedule_part').append(html)
    
    schedule_row++;

}

$("#price_per_person").bind('keyup mouseup', function(){
    change_basic_price();    
});

$("#max_travelers").change(function(){
    change_basic_price();   
    add_advance_price_tabs();
});

function change_basic_price(){
    var price = parseFloat($("#price_per_person").val());
    var persons = $("#max_travelers").val();
    var total_price =  parseFloat(price * persons);
    
    if(total_price.toFixed(2) != 'NaN'){ 
        $("#total_ppp").html(price.toFixed(2)+" - "+total_price.toFixed(2)+" <span style='color:#000;'>THB</span>");
        
        $("#total_ppp").next("input[name='basic_single_price']").val(price.toFixed(2));
        $("#total_ppp").next().next("input[name='basic_total_price1']").val(total_price.toFixed(2));
        
    }else{
        $("#total_ppp").html("0.00 - 0.00 <span style='color:#000;'>THB</span>");
        $("#total_ppp").next("input[name='basic_single_price']").val('0.00');
        $("#total_ppp").next().next("input[name='basic_total_price1']").val('0.00');
    }
}

function add_advance_price_tabs(){

    var persons = $("#max_travelers").val();

    var html = '';

    for(var i=1; i<=persons; i++){
        html += '<div class="thb">';
        html += '<div class="row no-margin">';
        html += '<div class="col-sm-4 text-center"><div class="qt">'+i+' <i class="fa fa-times" aria-hidden="true"></i> <i class="fa fa-user" aria-hidden="true"></i></div></div>';
        html += '<div class="col-sm-4 text-center"><div class="place">';
        html += '<input type="number" placeholder="0" min="0" class="advance_pricing_amt" data-qty="'+i+'">';
        html += '<input type="hidden" name="apricing['+i+'][persons]" value="'+i+'">';
        html += '<input type="hidden" name="apricing['+i+'][single]" value="0.00">';
        html += '<input type="hidden" name="apricing['+i+'][total_price]" value="0.00">';
        html += '</div></div>';
        html += '<div class="col-sm-4 text-center"><div class="amnt"><p>0.00 - 0.00 <span >THB</span></p></div></div>';
        html += '</div>';
        html += '</div>';
    }
    
    $(".advance_pricing").html(html);
}

/********* Advance Pricing Tab (price change) *********/

$(document).delegate(".advance_pricing_amt","keyup mouseup", function(){

    var persons = $(this).attr('data-qty');

    var price = parseFloat($(this).val());
    
    var total_price = parseFloat(price * persons);
    
    console.log(price.toFixed(2) +' - '+ total_price.toFixed(2));
    
    if(total_price.toFixed(2) != 'NaN'){
        $(this).parent().parent().next('div').find('p').html(price.toFixed(2) + ' - ' + total_price.toFixed(2)+' <span >THB</span>');
        $(this).next().next('input').val(price.toFixed(2));
        $(this).next().next().next('input').val(total_price.toFixed(2));
    }else{
        $(this).parent().parent().next('div').find('p').html('0.00 - 0.00 <span >THB</span>');
        $(this).next().next('input').val('0.00');
        $(this).next().next().next('input').val('0.00');
    }
    
});

/********* Advance Pricing Tab (price change) (End) *********/

/****** Enable Child price (checkbox) ********/

$("input[name='child_price_enabled']").change(function(){
   if(this.checked) {
       $(".child_price").show();
   }else{
       $(".child_price").hide();
   }
});

/****** Enable Child price (checkbox) (End) ********/

$("#trip-form").validate();

//var tripform = $("#trip-form").validate();


</script>           