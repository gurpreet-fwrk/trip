<style>
    .error{border: 1px solid red;}
    label.error{display:none !important;}
    .subs .icons li img{width: 50%;}
    .subs .icons li{padding: 0;}
    .price_accordian_head .panel-title label{float: none; padding: 0px 10px;}
    .price_accordian_head .panel-title label input{opacity: 0;}
    .price_accordian_head .panel-heading {padding: 0px;}
</style>
<div class="main-loader-container _2G9Ry7uLWE8xGyg0Ueyndc" data-reactid="203" style="display:none;"><div class="_1FNksn-DOC2GvjPqw1ilJA" data-reactid="204"><div class="DA2lM5bvfdkZyFAb775Wh" data-reactid="205"></div><div class="r52LMBdnmQ_U7l8cHHUBu" data-reactid="206"></div></div></div>

<section class="basic">
  <div class="second">
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <div class="base">
            <div class="tab">
              <h2><?php echo $this->Text->lang('list_trip'); ?></h2>
              
              <?php if($_GET['step'] == '1'){ ?>
              <button class="tablinks active" onclick="openCity(event, 'London', '1')" id="defaultOpen"><span>1</span><?php echo $this->Text->lang('text_basic'); ?></button>
              <?php }else{ ?>
              <button class="tablinks active" onclick="openCity(event, 'London', '1')"><span>1</span><?php echo $this->Text->lang('text_basic'); ?></button>
              <?php } ?>
              
              <?php if($_GET['step'] == '2'){ ?>
              <button class="tablinks" onclick="openCity(event, 'Paris', '2')" id="defaultOpen"><span>2</span><?php echo $this->Text->lang('text_overview'); ?></button>
              <?php }else{ ?>
              <button class="tablinks" onclick="openCity(event, 'Paris', '2')"><span>2</span><?php echo $this->Text->lang('text_overview'); ?></button>
              <?php } ?>
              
              <?php if($_GET['step'] == '3'){ ?>
              <button class="tablinks" onclick="openCity(event, 'Tokyo', '3')" id="defaultOpen"><span>3</span><?php echo $this->Text->lang('text_detail'); ?></button>
              <?php }else{ ?>
              <button class="tablinks" onclick="openCity(event, 'Tokyo', '3')"><span>3</span><?php echo $this->Text->lang('text_detail'); ?></button>
              <?php } ?>
              
              <?php if($_GET['step'] == '4'){ ?>
              <button class="tablinks" onclick="openCity(event, 'Usa', '4')" id="defaultOpen"><span>4</span><?php echo $this->Text->lang('text_price'); ?></button>
              <?php }else{ ?>
              <button class="tablinks" onclick="openCity(event, 'Usa', '4')"><span>4</span><?php echo $this->Text->lang('text_price'); ?></button>
              <?php } ?>
              
              <?php if($_GET['step'] == '5'){ ?>
              <button class="tablinks" onclick="openCity(event, 'Miami', '5')" id="defaultOpen"><span>5</span><?php echo $this->Text->lang('text_condition'); ?></button>
              <?php }else{ ?>
              <button class="tablinks" onclick="openCity(event, 'Miami', '5')"><span>5</span><?php echo $this->Text->lang('text_condition'); ?></button>
              <?php } ?>
              
              <?php if($_GET['step'] == '6'){ ?>
              <button class="tablinks" onclick="openCity(event, 'Newyork', '6')" id="defaultOpen"><span>6</span><?php echo $this->Text->lang('text_submit'); ?></button>
              <?php }else{ ?>
              <button class="tablinks" onclick="openCity(event, 'Newyork', '6')"><span>6</span><?php echo $this->Text->lang('text_submit'); ?></button>
              <?php } ?>

              <button class="tablinks" onclick="openCity(event, 'Delete')"><?php echo $this->Text->lang('text_delete_trip'); ?></button>
              
            </div>
          </div>
        </div>
        <div class="col-sm-9">
            
            <?php //echo "<pre>"; print_r($trip2); echo "</pre>"; ?>
            <?php
            
            $trip2 = $trip->toArray();
            //echo "<pre>"; print_r($trip2); echo "</pre>";
            $error = 0;
            
            if($trip2['pricing_type'] === 'advance'){
                if(empty($selected_stopped_location) || empty($selected_activities) || empty($galleries) || empty($selected_tripprices)){
                    
                    $error = 1;
                }
            }elseif(empty($selected_stopped_location) || empty($selected_activities) || empty($galleries)){
                $error = 1;
            }

            foreach($trip2 as $key => $value){

                if($key != 'operating_days'){
                    if($key != 'child_price'){
                        if($key != 'extracondition_id'){
                            //if($trip2['pricing_type'] === 'advance' && ($key !== 'basic_price_per_person' || $key !== 'basic_total_price')){
                                if(($value === '') || ($value === NULL)){
                                    //echo $key.' : '.$value.'<br>';
                                    $error = 1;
                                }
                            //}
                        }    
                    }
                }
            }
            ?>
            
            <?php //echo "<pre>"; print_r($galleries); echo "</pre>"; ?>
            
            <div id="London" class="tabcontent">
               <?= $this->Form->create($trip, array('enctype' => 'multipart/form-data', 'id' => 'basic_tab')) ?>
              <h3 class="subhead"><?php echo $this->Text->lang('text_basic'); ?></h3>
              <div class="basetrip">
                <div class="form-group">
                  <div class="col-sm-3">
                    <label class="control-label"> <img src="<?php echo $this->request->webroot  ?>images/website/a.png" /> <?php echo $this->Text->lang('text_destination'); ?></label>
                  </div>
                  <div class="col-sm-9">
                    <?php echo $this->Form->control('location_id', ['options' => $locations, 'class' => 'form-control', 'label' => false, 'required']); ?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-3">
                    <label class="control-label"> <img src="<?php echo $this->request->webroot  ?>images/website/b.png" /><?php echo $this->Text->lang('text_stopped_location'); ?></label>
                  </div>
                  <div class="col-sm-9">
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
                </div>
                <div class="form-group">
                  <div class="col-sm-3">
                    <label class="control-label"> <img src="<?php echo $this->request->webroot  ?>images/website/c.png" /><?php echo $this->Text->lang('text_main_activities'); ?></label>
                  </div>
                  <div class="col-sm-9">
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
                </div>
                <!-- <a class="suggest" href="#">Add more suggest activities</a> -->
                <div class="form-group">
                  <div class="col-sm-3">
                    <label class="control-label loc"> <img src="<?php echo $this->request->webroot  ?>images/website/d.png" /> <?php echo $this->Text->lang('text_main_transportation'); ?></label>
                  </div>
                  <div class="col-sm-9">
                    <!--<div class="radio-btn">
                      <input type="radio" value="value-1" id="rc1" name="rc1">
                      <label for="rc1" onclick>Radio button</label>
                    </div>
                    <div class="radio-btn">
                      <input type="radio" value="value-2" id="rc2" name="rc1">
                      <label for="rc2" onclick>Radio button</label>
                    </div>-->
                    
                <div class="panel-group accord" id="accordion">
                    <?php foreach ($transportations as $transportation) { ?>
                    <div class="panel panel-default transport-acc">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <label for='r14' style='width: auto;'>
                             
                            <?php if($transportation->id == $trip['transportation_id']){ ?>
                              <input type='radio' name='transportation_id' value='<?php echo $transportation->id; ?>'  checked="" required />
                            <?php echo $transportation['title_'.$config_language]; ?>
                            <?php }else{ ?>
                            <input type='radio' name='transportation_id' value='<?php echo $transportation->id; ?>' required />
                            <?php echo $transportation['title_'.$config_language]; ?>
                            <?php } ?>
                            
                            </label>
                        </h4>
                      </div>
                      <div id="collapseFive" class="transportv-acc">
                        <?php if(!empty($transportation->transportationvehicles)){ ?>
                        <div class="panel-body sub subs">
                            <div class="conditions-top">
                              <?php foreach ($transportation->transportationvehicles as $vehicle) { ?>
                                <div class="col-md-4 padding-left-n">
                                    <div class="form-group">
                                        <?php if($vehicle['id'] == $trip['transportationvehicle_id']){ ?>
                                        <input type="radio" value="<?php echo $vehicle['id'] ?>" name="transportationvehicle_id" id="c11" checked="" required>
                                        <?php }else{ ?>
                                        <input type="radio" value="<?php echo $vehicle['id'] ?>" name="transportationvehicle_id" id="c11" required>
                                        <?php } ?>
                                        <label><img class="image-one" src="<?php echo $this->request->webroot  ?>images/website/shirt.png" alt=""> <img class="image-two" src="<?php echo $this->request->webroot  ?>images/website/shirtb.png" alt="">
                                        </label>
                                        <p><?php echo $vehicle['title_'.$config_language] ?></p>
                                    </div>
                                </div>
                              <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        <!--panel-body-->
                    </div>
                    </div><!--default_end-->
                  <?php } ?>
                
              </div>
              <!--accord end-->
              <input type="hidden" name="tab" value="basic">
                  </div>
                </div>
                <div class="right">
                  <button type="button" class="btn btn-primary blue basic_submit"><?php echo $this->Text->lang('text_save'); ?></button>
                  <button type="button" class="btn btn-default blue grey basic_submit"><?php echo $this->Text->lang('text_next'); ?></button>
                </div>
              </div>
          <?= $this->Form->end() ?>
            </div>
            
            
            <div id="Paris" class="tabcontent">
                
                <div class="loader_img" style="display:none;"><img src="<?php echo $this->request->webroot ?>images/website/loading.gif"></div>
                
                <?= $this->Form->create($trip, array('enctype' => 'multipart/form-data', 'id' => 'myForm')) ?>
              <h3 class="subheadb"><?php echo $this->Text->lang('text_overview'); ?></h3>
              <div class="overview">
                <div class="form-group">
                  <label for="exampleInputEmail1"><?php echo $this->Text->lang('text_name_your_trip'); ?></label>
                  <?php echo $this->Form->control('title_'.$config_language, array('class' => 'form-control', 'label' => false, 'id' => 'trip_title')); ?>
<!--                  <p class="help-block right">150 Characters left</p>-->
                </div>
                <div class="form-group">
                  <label for="exampleInputSummary"><?php echo $this->Text->lang('text_summary_your_trip'); ?></label>
                  <?php echo $this->Form->control('summary_'.$config_language, array('class' => 'form-control', 'label' => false, 'id' => 'trip_summary')); ?>
<!--                  <p class="help-block right">250 Characters left</p>-->
                </div>
                <div class="form-group photos">
                  <label for="exampleInputPassword1"><?php echo $this->Text->lang('text_photos'); ?></label>
                  <p class="help-block"><?php echo $this->Text->lang('text_upload_only_photos'); ?></p>
                  <div class="gallery">
                      
                      <?php foreach($galleries as $gallery){ ?>
                      <div class="gal_child">
                          <img src="<?php echo $this->request->webroot ?>images/trips/<?php echo $gallery['file'] ?>"><span data-file='<?php echo $gallery['file'] ?>' data-id="<?php echo $gallery['id'] ?>" class='remove_img' title='Click to remove' style='cursor:pointer;'><i class="fa fa-trash-o" aria-hidden="true"></i>
</span><br clear=\"left\"/>
                      </div>
                      <?php } ?>
                      
                  </div>
                  <span id="selectedFiles">
                      <input type="file" name="images[]" id="files" class="form-control" multiple>
            
                  <a>+ <?php echo $this->Text->lang('text_add_photos'); ?></a> </span> </div>
                  
                  <input type="hidden" name="tab" value="overview">
                  
                <div class="right">
                  <button type="submit" class="btn btn-primary blue"><?php echo $this->Text->lang('text_save'); ?></button>
                  <button type="submit" class="btn btn-default blue grey"><?php echo $this->Text->lang('text_next'); ?></button>
                </div>
              </div>
              <?= $this->Form->end() ?>
            </div>
            
            <?= $this->Form->create($trip, array('enctype' => 'multipart/form-data', 'id' => 'detail_tab')) ?>
            <div id="Tokyo" class="tabcontent">
              <h3 class="subheadb"><?php echo $this->Text->lang('text_trip_detail'); ?></h3>
              <div class="meeting">
                <h3><?php echo $this->Text->lang('text_meeting_point'); ?></h3>
                <div class="row">
                  <div class="col-sm-4">
                      <?php //print_r($selected_stopped_location); ?>
                      
                    <ul id="slmp">
                      <?php foreach($selected_stopped_location as $stopped_location){ ?>
                      <li data-id="<?php echo $stopped_location['location']['id']; ?>"><a><?php echo $stopped_location['location']['name_'.$config_language]; ?> <i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
                      <?php } ?>
                    </ul>
                  </div>
                  <div class="col-sm-4">
                      <ul id="allmpt"></ul>
                  </div>
                  <div class="col-sm-4">
                      <ul id="allmp"></ul>
                  </div>
                </div>
                <!--row--> 
                
              </div>
              
              <div class="selected_meeting_points">
                  <?php foreach($selected_meetingpoints as $selected_meetingpoint){ ?>
                  <span class='rtmp' data-id='<?php echo $selected_meetingpoint['meetingpoint_id'] ?>'><?php echo $selected_meetingpoint['location'] ?> > <?php echo $selected_meetingpoint['meeting_point_type'] ?> > <?php echo $selected_meetingpoint['meeting_point'] ?> &nbsp;&nbsp;<i class='fa fa-times' aria-hidden='true'></i></span><br>
                  <?php } ?>
                  
              </div>
              
              <!--meeting-->
              <?php
              
                $schedule = array();
                
                if($trip->schedule != ''){
              
                    $schedule1 = json_decode($trip->schedule);

                    foreach ($schedule1 as $row) { 
                        if (is_object($row)) {
                            $schedule[] = get_object_vars($row);
                        }
                    }
                }
                //echo "<pre>"; print_r($schedule); echo "</pre>";
                
                ?>
              
              <h3 class="sch"><?php echo $this->Text->lang('text_schedule'); ?></h3>
              
              <?php if(!empty($schedule)){ ?>
              <div class="schedule_part">
              <?php for($j=0; $j<count($schedule);$j++){ ?>
              <?php if($j == 0){ ?>
              
              <div class="minutes mnt">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="tme">
                      <div class="hour">
                        <select name="schedule[0][hours]" class="form-control" required>
                            <option value="">Hours</option>
                            <?php for($i=0; $i<24; $i++){ ?>
                            
                            <?php if(strlen((string)$i) == 1){ ?>
                            
                            <?php if($schedule[$j]['hours'] == '0'.$i){ ?>
                            <option value="<?php echo '0'.$i; ?>" selected><?php echo '0'.$i; ?></option>
                            <?php }else{ ?>
                            <option value="<?php echo '0'.$i; ?>"><?php echo '0'.$i; ?></option>
                            <?php } ?>
                            
                            <?php }else{ ?>
                            <?php if($schedule[$j]['hours'] == $i){ ?>
                            <option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
                            <?php }else{ ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php } ?>
                            
                            <?php } ?>
                            
                            <?php } ?>                          
                        </select>
                      </div>
                      <div class="colon">:</div>
                      <div class="hour">
                        <select name="schedule[0][minutes]" class="form-control" required>
                            <option value="">Minutes</option>
                            <?php for($i=0; $i<=45; $i+=15){ ?>
                            
                            <?php if(strlen((string)$i) == 1){ ?>
                            
                            <?php if($schedule[$j]['minutes'] == '0'.$i){ ?>
                            <option value="<?php echo '0'.$i; ?>" selected><?php echo '0'.$i; ?></option>
                            <?php }else{ ?>
                            <option value="<?php echo '0'.$i; ?>"><?php echo '0'.$i; ?></option>
                            <?php } ?>
                            
                            <?php }else{ ?>
                            
                            <?php if($schedule[$j]['minutes'] == $i){ ?>
                            <option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
                            <?php }else{ ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php } ?>
                            
                            <?php } ?>
                            
                            <?php } ?>   
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 mnt_meetingpoints"> 
                    <h4>Meet up at our meeting point</h4>
                    <div><?php echo $schedule[$j]['content']; ?></div>
                    <input type="hidden" name="schedule[0][content]" value="<?php echo $schedule[$j]['content']; ?>">
                  </div>
                </div>
              </div>
              <!--minutes-->
              
              <?php } ?>
              
              
              <?php if($j == 1 || $j == 2){ ?>
                  <div class="minutes">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="tme">
                        <div class="hour">
                          <select name="schedule[<?php echo $j; ?>][hours]" class="form-control" required>
                              <option value="">Hours</option>
                              <?php for($i=0; $i<24; $i++){ ?>
                            
                            <?php if(strlen((string)$i) == 1){ ?>
                            
                            <?php if($schedule[$j]['hours'] == '0'.$i){ ?>
                            <option value="<?php echo '0'.$i; ?>" selected><?php echo '0'.$i; ?></option>
                            <?php }else{ ?>
                            <option value="<?php echo '0'.$i; ?>"><?php echo '0'.$i; ?></option>
                            <?php } ?>
                            
                            <?php }else{ ?>
                            <?php if($schedule[$j]['hours'] == $i){ ?>
                            <option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
                            <?php }else{ ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php } ?>
                            
                            <?php } ?>
                            
                            <?php } ?>       
                          </select>
                        </div>
                        <div class="colon">:</div>
                        <div class="hour">
                          <select name="schedule[<?php echo $j; ?>][minutes]" class="form-control" required>
                              <option value="">Minutes</option>
                              <?php for($i=0; $i<=45; $i+=15){ ?>
                            
                            <?php if(strlen((string)$i) == 1){ ?>
                            
                            <?php if($schedule[$j]['minutes'] == '0'.$i){ ?>
                            <option value="<?php echo '0'.$i; ?>" selected><?php echo '0'.$i; ?></option>
                            <?php }else{ ?>
                            <option value="<?php echo '0'.$i; ?>"><?php echo '0'.$i; ?></option>
                            <?php } ?>
                            
                            <?php }else{ ?>
                            
                            <?php if($schedule[$j]['minutes'] == $i){ ?>
                            <option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
                            <?php }else{ ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php } ?>
                            
                            <?php } ?>
                            
                            <?php } ?>   
                          </select> 
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                          <textarea class="form-control" rows="3" name="schedule[<?php echo $j; ?>][content]" required><?php echo $schedule[$j]['content']; ?></textarea>
<!--                        <p class="help-block right">250 Characters left</p>-->
                      </div>
                    </div>
                  </div>
                </div>
                <!--minutes-->
              <?php } ?>
              <?php $schedule_row = 3; ?>
                
                <?php if($j >= 3){ ?>
                  <div class="minutes" id="schedule_row-<?php echo $schedule_row; ?>">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="tme">
                        <div class="hour">
                          <select name="schedule[<?php echo $j; ?>][hours]" class="form-control" required>
                              <option value="">Hours</option>
                              <?php for($i=0; $i<24; $i++){ ?>
                            
                            <?php if(strlen((string)$i) == 1){ ?>
                            
                            <?php if($schedule[$j]['hours'] == '0'.$i){ ?>
                            <option value="<?php echo '0'.$i; ?>" selected><?php echo '0'.$i; ?></option>
                            <?php }else{ ?>
                            <option value="<?php echo '0'.$i; ?>"><?php echo '0'.$i; ?></option>
                            <?php } ?>
                            
                            <?php }else{ ?>
                            <?php if($schedule[$j]['hours'] == $i){ ?>
                            <option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
                            <?php }else{ ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php } ?>
                            
                            <?php } ?>
                            
                            <?php } ?>       
                          </select>
                        </div>
                        <div class="colon">:</div>
                        <div class="hour">
                          <select name="schedule[<?php echo $j; ?>][minutes]" class="form-control" required>
                              <option value="">Minutes</option>
                              <?php for($i=0; $i<=45; $i+=15){ ?>
                            
                            <?php if(strlen((string)$i) == 1){ ?>
                            
                            <?php if($schedule[$j]['minutes'] == '0'.$i){ ?>
                            <option value="<?php echo '0'.$i; ?>" selected><?php echo '0'.$i; ?></option>
                            <?php }else{ ?>
                            <option value="<?php echo '0'.$i; ?>"><?php echo '0'.$i; ?></option>
                            <?php } ?>
                            
                            <?php }else{ ?>
                            
                            <?php if($schedule[$j]['minutes'] == $i){ ?>
                            <option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
                            <?php }else{ ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php } ?>
                            
                            <?php } ?>
                            
                            <?php } ?>   
                          </select> 
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                          <textarea class="form-control" rows="3" name="schedule[<?php echo $j; ?>][content]" required><?php echo $schedule[$j]['content']; ?></textarea>
<!--                        <p class="help-block right">250 Characters left</p>-->
                      </div>
                        <button type="button" onclick="$('#schedule_row-<?php echo $schedule_row ?>').remove();" data-toggle="tooltip" rel="tooltip" title="Remove" class="btn btn-danger pull-right"><i class="fa fa-minus-circle"></i></button>
                    </div>
                  </div>
                </div>
                <!--minutes-->
                <?php $schedule_row++; ?>
              <?php } ?>
              

              <?php } ?>
              </div>
              <button type="button" onclick="addOptionValue()" class="btn btn-primary blue right"><?php echo $this->Text->lang('text_add_more'); ?></button>
              <?php }else{ ?>
              
              
              
              
              <div class="schedule_part">
                  <div class="minutes mnt">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="tme">
                      <div class="hour">
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
                      </div>
                      <div class="colon">:</div>
                      <div class="hour">
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
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 mnt_meetingpoints"> 
                    <h4>Meet up at our meeting point</h4>
                    <div></div>
                    <input type="hidden" name="schedule[0][content]" value="">
                  </div>
                </div>
              </div>
              <!--minutes-->
                <div class="minutes">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="tme">
                        <div class="hour">
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
                        </div>
                        <div class="colon">:</div>
                        <div class="hour">
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
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                          <textarea class="form-control" rows="3" name="schedule[1][content]" required></textarea>
<!--                        <p class="help-block right">250 Characters left</p>-->
                      </div>
                    </div>
                  </div>
                </div>
                <!--minutes-->

                <div class="minutes">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="tme">
                        <div class="hour">
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
                        </div>
                        <div class="colon">:</div>
                        <div class="hour">
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
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <textarea class="form-control" rows="3" name="schedule[2][content]" required></textarea>
<!--                        <p class="help-block right">255 Characters left</p>-->
                      </div>
                    </div>
                  </div>
                </div>
                <!--minutes-->
                <?php $schedule_row = 3; ?>
              </div>
              <button type="button" onclick="addOptionValue()" class="btn btn-primary blue right"><?php echo $this->Text->lang('text_add_more'); ?></button>
              <?php } ?>
              
              
              <h3 class="sch" style="margin-bottom:15px;"><?php echo $this->Text->lang('text_faq_title'); ?></h3>
              <div class="form-group">
                <label for="exampleInputSummary"><?php echo $this->Text->lang('text_faq1_detail_tab'); ?></label>
                <p class="help-block"><?php echo $this->Text->lang('text_faq11_detail_tab'); ?></p>
                <?php echo $this->Form->control('faq1', array('class' => 'form-control', 'label' => false, 'required')); ?>
<!--                <p class="help-block right">250 Characters left</p>-->
              </div>
              <div class="form-group">
                <label for="exampleInputSummary"><?php echo $this->Text->lang('text_faq2_detail_tab'); ?></label>
                <p class="help-block"><?php echo $this->Text->lang('text_faq22_detail_tab'); ?></p>
                <?php echo $this->Form->control('faq2', array('class' => 'form-control', 'label' => false, 'required')); ?>
<!--                <p class="help-block right">250 Characters left</p>-->
              </div>
              
              <input type="hidden" name="tab" value="detail">
              
              <div class="right">
                  <button type="button" class="btn btn-primary blue detail_submit"><?php echo $this->Text->lang('text_save'); ?></button>
                  <button type="button" class="btn btn-default blue grey detail_submit"><?php echo $this->Text->lang('text_next'); ?></button>
              </div>
            </div>
            <?= $this->Form->end() ?>
            
            
            <div id="Usa" class="tabcontent">
              <?= $this->Form->create($trip, array('enctype' => 'multipart/form-data', 'id' => 'price_tab')) ?>
                
                <?php //echo "<pre>"; print_r($selected_tripprices); echo "</pre>"; ?>
                
              <h3 class="subheadb"><?php echo $this->Text->lang('text_price'); ?></h3>
              <p style="color: #9b9b9b;">
                  <?php echo ($config_language == 'en') ? 'Please, use these price conditions as guides to calculate your trip fee and always make sure to inform your travelers about any additional expenses before the trip day.' : 'يرجى استخدام شروط الأسعار هذه كدليل لحساب رسوم رحلتك ودائما التأكد من إبلاغ المسافرين عن أي نفقات إضافية قبل يوم الرحلة'; ?>
              </p>
              <div class="panel-group accord" id="accordion">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <label for='r11' style='width: auto;'>
                          <?php if($trip->include_exclude != ''){ ?>
                          <?php if($trip->include_exclude == 'all_inclusive'){ ?>
                          <input type='radio' id='r11' name='include_exclude' value='all_inclusive' checked="" required />
                          <?php }else{ ?>
                          <input type='radio' id='r11' name='include_exclude' value='all_inclusive' required />
                          <?php } ?>
                          <?php }else{ ?>
                          <input type='radio' id='r11' name='include_exclude' value='all_inclusive' checked="" required />
                          <?php } ?>
                          
                        <?php echo ($config_language == 'en') ? 'All inclusive' : 'الجميع مشمول'; ?> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"></a> </label>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body sub subs">
                    
                    <ul class="icons">
<!--                        <li><i class="fa fa-cutlery" aria-hidden="true"></i></li>
                        <li><i class="fa fa-bus" aria-hidden="true"></i></li>-->
                        <li><img src="<?php echo $this->request->webroot ?>images/website/all_include_1.png"></li>
                        <li><img src="<?php echo $this->request->webroot ?>images/website/all_include_2.png"></li>
                        <li><img src="<?php echo $this->request->webroot ?>images/website/all_include_3.png"></li>
                    </ul>
                    
                      <ul>
                        <li><?php echo ($config_language == 'en') ? 'Expenses, occur during a trip, are mainly included' : 'يتم تضمين النفقات، أثناء الرحلة، بشكل رئيسي'; ?></li>
                        <li><?php echo ($config_language == 'en') ? '- Public or private transportation fares : taxi, bts, mrt, etc.(Please estimate the cost of gasoline or vehicle rental fee, in case of using a private car)' : '- رسوم النقل العامة أو الخاصة: سيارات الأجرة، بتس، مرت، الخ (يرجى تقدير تكلفة البنزين أو رسوم تأجير المركبات، في حالة استخدام سيارة خاصة)'; ?></li>
                        <li><?php echo ($config_language == 'en') ? '- Foods; Meal(s) during the trip. (Please note that alcohol is always excluded)' : 'يتم تضمين النفقات- الأطعمة؛ وجبة (وجبات) أثناء الرحلة. (يرجى ملاحظة أن الكحول هو دائما مستبعد)'; ?></li>
                        <li><?php echo ($config_language == 'en') ? '- Admission fee: Amusement park, gallery, shows, and etc.' : '- رسوم الدخول: متنزه، معرض، معارض، وما إلى ذلك.'; ?></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class=panel-title>
                      <label for='r12' style='width: auto;'>
                        <?php if($trip->include_exclude == 'food_excluded'){ ?>
                          <input type='radio' id='r12' name='include_exclude' value='food_excluded' checked="" required />
                        <?php }else{ ?>
                        <input type='radio' id='r12' name='include_exclude' value='food_excluded' required />
                        <?php } ?>
                        <?php echo ($config_language == 'en') ? 'Food Excluded' : 'الغذاء المستثنى'; ?> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"></a> </label>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="panel-body sub subs">
                        <ul class="icons">
<!--                        <li><i class="fa fa-cutlery" aria-hidden="true"></i></li>
                            <li><i class="fa fa-bus" aria-hidden="true"></i></li>-->
                            <li><img src="<?php echo $this->request->webroot ?>images/website/food_exclude_1.png"></li>
                            <li><img src="<?php echo $this->request->webroot ?>images/website/all_include_2.png"></li>
                            <li><img src="<?php echo $this->request->webroot ?>images/website/all_include_3.png"></li>
                        </ul>
                      <ul>
                        <li><?php echo ($config_language == 'en') ? 'Travelers pay for their meal(s) during a trip. Only the following expenses are included.' : 'يدفع المسافرون ثمن وجباتهم خلال الرحلة. يتم تضمين النفقات التالية فقط.'; ?></li>
                        <li><?php echo ($config_language == 'en') ? 'Reminder; Local Experts should calculate your trip’s price including these two expenses' : 'تذكير؛ يجب على الخبراء المحليين حساب سعر رحلتك بما في ذلك هذين المصاريف'; ?></li>
                        <li><?php echo ($config_language == 'en') ? '- Public/ private transportation fares: taxi, bts, mrt, etc. (please estimate the cost of gasoline or vehicle rental fee, in case of using a private car)' : '- أسعار النقل العام / الخاص: سيارات الأجرة، بتس، مرت، الخ (يرجى تقدير تكلفة البنزين أو رسوم تأجير المركبات، في حالة استخدام سيارة خاصة))'; ?></li>
                        <li><?php echo ($config_language == 'en') ? 'Admission fee: Amusement park, gallery, shows, and etc.' : 'رسوم الدخول: متنزه، معرض، معارض، وما إلى ذلك.'; ?></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class=panel-title>
                      <label for='r13' style='width: auto;'>
                          <?php if($trip->include_exclude == 'all_excluded'){ ?>
                          <input type='radio' id='r13' name='include_exclude' value='all_excluded' checked="" required />
                          <?php }else{ ?>
                        <input type='radio' id='r13' name='include_exclude' value='all_excluded' required />
                          <?php } ?>
                        
                        <?php echo ($config_language == 'en') ? 'Food, Transportation, Admission fee excluded' : 'الغذاء، النقل، رسوم القبول مستثناة'; ?> <a data-toggle="collapse" data-parent="#accordion"
                         href="#collapseThree"></a> </label>
                    </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse">
                    <div class="panel-body sub subs">
                        <ul class="icons">
<!--                        <li><i class="fa fa-cutlery" aria-hidden="true"></i></li>
                            <li><i class="fa fa-bus" aria-hidden="true"></i></li>-->
                            <li><img src="<?php echo $this->request->webroot ?>images/website/food_exclude_1.png"></li>
                            <li><img src="<?php echo $this->request->webroot ?>images/website/all_exclude_1.png"></li>
                            <li><img src="<?php echo $this->request->webroot ?>images/website/all_exclude_2.png"></li>
                        </ul>
                      <ul>
                        <li><?php echo ($config_language == 'en') ? 'The price you set is only for your guiding fee. All other expenses, occur during a trip, will be paid by travelers, themselves. Please roughly approximate travelers\' expenses and always inform them before the trip.' : 'السعر الذي تحدده هو فقط لرسم التوجيه الخاص بك. جميع النفقات الأخرى، تحدث خلال رحلة، وسوف تدفع من قبل المسافرين، أنفسهم. يرجى تقريبا تقريبي نفقات المسافرين ودائما إبلاغهم قبل الرحلة.'; ?></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <!--accord end-->
              
              <div class="form-group">
                <label for="exampleInputSummary"><?php echo $this->Text->lang('text_add_expense_title'); ?></label>
                <p class="help-block"><?php echo $this->Text->lang('text_add_expense_question'); ?> </p>
                
                <?php echo $this->Form->control('extra_expense_'.$config_language, array('class' => 'form-control', 'label' => false, 'placeholder' => $this->Text->lang('text_add_expense_ph'), 'required')); ?>
                
<!--                <p class="help-block">250 Characters left</p>-->
              </div>
              <div class="form-group">
                <div class="col-sm-4 no-padding">
                  <label for="inputEmail3" class="control-label" style="line-height: 40px;"><i class="fa fa-users" aria-hidden="true"></i> <?php echo $this->Text->lang('text_max_travellers'); ?> </label>
                </div>
                <div class="col-sm-4 no-padding">
                    <select class="form-control travel" id="max_travelers" name="travellers" required>
                        <?php for($i=1; $i<9; $i++){ ?>
                        <?php if($trip->travellers == $i){ ?>
                        <option value="<?php echo $i; ?>" selected="selected"><?php echo $i; ?></option>
                        <?php }else{ ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                        <?php } ?>
                  </select>
                </div>
                <div class="col-sm-4 no-padding">&nbsp;</div>
              </div>
              <div class="row">
                <div class="pricing">
                  <div class="col-sm-6">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                      <div class="panel panel-default">
                        <div class="panel-heading price_accordian_head" role="tab" id="headingOne">
                            <h4 class="panel-title">
                            <label for='ab'>
                            <input type='radio' id='ab' name='pricing_type' value='basic' required />
                            <i class="fa fa-check-circle"></i>
                            <?php echo $this->Text->lang('text_basic_pricing'); ?> <a data-toggle="collapse" data-parent="#accordion" href="#collapseD"></a></label>
                            </h4>
                        </div>
                        <div id="collapseD" class="panel-collapse collapse price_accordian_body" role="tabpanel" aria-labelledby="headingOne">
                          <div class="panel-body">
                            <div class="col-sm-6">
                                <div class="pric">
                                    <h4>Price (per person)</h4>
                                    <?php if($trip->pricing_type == 'basic'){ ?>
                                    <input type="number" min="0" placeholder="0" id="price_per_person" value="<?php echo $trip->basic_price_per_person; ?>">
                                    <?php }else{ ?>
                                    <input type="number" min="0" placeholder="0" id="price_per_person">
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="pric pric_rt">
                                <h4>Total (per trip)</h4>
                                <?php if($trip->pricing_type == 'basic'){ ?>
                                <p id="total_ppp"><?php echo number_format($trip->basic_price_per_person,2) ?> - <?php echo number_format($trip->basic_total_price,2) ?> <span>THB</span></p>
                                <input type="hidden" name="basic_single_price" value="<?php echo number_format($trip->basic_price_per_person,2) ?>">
                                <input type="hidden" name="basic_total_price1" value="<?php echo number_format($trip->basic_total_price,2) ?>">
                                <?php }else{ ?>
                                <p id="total_ppp">0.00 - 0.00 <span>THB</span></p>
                                <input type="hidden" name="basic_single_price" value="0.00">
                                <input type="hidden" name="basic_total_price1" value="0.00">
                                <?php } ?>
                               </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading price_accordian_head" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                            <label for='bc'>
                            <input type='radio' id='bc' name='pricing_type' value='advance' required />
                            <i class="fa fa-check-circle"></i>
                            <?php echo $this->Text->lang('text_advance_pricing'); ?> <a data-toggle="collapse" data-parent="#accordion" href="#collapseE"></a></label>
                            </h4>
                        </div>
                        <div id="collapseE" class="panel-collapse collapse price_accordian_body" role="tabpanel" aria-labelledby="headingTwo">
                          <div class="panel-body advance_pricing">
                          
                          
                        <?php if($trip->pricing_type == 'advance' && !empty($selected_tripprices)){ ?>
 
                       
                        <?php for($i=0;$i<count($selected_tripprices);$i++){ ?>
                              
                        <div class="thb">
                          <div class="row no-margin">
                              <div class="col-sm-4 text-center"><div class="qt"><?php echo $i+1; ?> <i class="fa fa-times" aria-hidden="true"></i> <i class="fa fa-user" aria-hidden="true"></i></div></div>
                              <div class="col-sm-4 text-center"><div class="place">
                                      <input type="text" placeholder="0" min="0" value="<?php echo $selected_tripprices[$i]['price_per_person']; ?>" class="advance_pricing_amt" data-qty="<?php echo $i; ?>">
                                      <input type="hidden" name="apricing[<?php echo $i; ?>][persons]" value="<?php echo $selected_tripprices[$i]['person']; ?>">
                                      <input type="hidden" name="apricing[<?php echo $i; ?>][single]" value="<?php echo $selected_tripprices[$i]['price_per_person']; ?>">
                                      <input type="hidden" name="apricing[<?php echo $i; ?>][total_price]" value="<?php echo $selected_tripprices[$i]['total_price']; ?>">
                                  </div></div>
                             <div class="col-sm-4 text-center"><div class="amnt"><p><?php echo number_format($selected_tripprices[$i]['price_per_person'], 2); ?> - <?php echo number_format($selected_tripprices[$i]['total_price'], 2); ?> <span >THB</span></p></div></div>  
                          </div>
                        </div>
                        <?php } ?>

                              
                        <?php }else{ ?>
                            
                            <script>$("#max_travelers").trigger('change');</script>
                            
                              <div class="thb">
                          <div class="row no-margin">
                              <div class="col-sm-4 text-center"><div class="qt">1 <i class="fa fa-times" aria-hidden="true"></i> <i class="fa fa-user" aria-hidden="true"></i></div></div>
                              <div class="col-sm-4 text-center"><div class="place">
                                      <input type="number" placeholder="0" min="0" class="advance_pricing_amt" data-qty="1">
                                      <input type="hidden" name="apricing[0][persons]" value="1">
                                      <input type="hidden" name="apricing[0][single]" value="0.00">
                                      <input type="hidden" name="apricing[0][total_price]" value="0.00">
                                  </div></div>
                             <div class="col-sm-4 text-center"><div class="amnt"><p>0.00 - 0.00 <span >THB</span></p></div></div>  
                          </div>
                        </div>
                        <?php } ?>
                              
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-sm-6">
                    <div class="per">
                    <h3>0.00 - 0.00 THB</h3>
                    <span>Price (per person)</span>
                        <p>
                            is recommended for an all-inclusive trip. The price range (shown above) is only the guideline to get higher booking rate. However, you are free to set your own price
                        </p>
                    </div>
                  </div>
 
                   
                  
                </div>
              </div>
              
               <div class="checkbox-btn no-margin addopt">
                     <h3><?php echo $this->Text->lang('text_additional_options'); ?></h3>
                          <?php if($trip->child_price_enabled == 1){ ?>
                            <input type="checkbox" id="rc3" name="child_price_enabled" checked="">
                          <?php }else{ ?>
                          <input type="checkbox" id="rc3" name="child_price_enabled">
                          <?php } ?>
                          <label for="rc3" onclick class="no-margin"><?php echo $this->Text->lang('text_enable_child_price'); ?></label>
                          <div class="child_price" style="<?php echo ($trip->child_price_enabled == '1') ? 'display:block;' : 'display:none;'; ?>">
                              <?php if($trip->child_price_enabled == 1){ ?>
                              Price Per child <input type="number" name="child_price" min="0" placeholder="0" value="<?php echo number_format($trip->child_price, 2); ?>"> THB
                              <?php }else{ ?>
                              Price Per child <input type="number" name="child_price" min="0" placeholder="0"> THB
                              <?php } ?>
                        </div>
               </div>
              <div class="checkbox-btn no-margin addopt">
                          <?php if($trip->hotel_pickup == 1){ ?>
                          <input type="checkbox" id="rc3" name="hotel_pickup" value="1" checked="">
                          <?php }else{ ?>
                          <input type="checkbox" id="rc3" value="1" name="hotel_pickup">
                          <?php } ?>
                          
                          <label for="rc3" onclick class="no-margin">Free Hotel Pickup</label>
                          
                     </div>
                    
              <div class="right">
                  <button type="button" class="btn btn-primary blue price_submit"><?php echo $this->Text->lang('text_save'); ?></button>
                  <button type="button" class="btn btn-default blue grey price_submit"><?php echo $this->Text->lang('text_next'); ?></button>
                </div>
              <?= $this->Form->end() ?>
            </div>
            
            <div id="Miami" class="tabcontent">
              <h3 class="subheadb"><?php echo $this->Text->lang('text_extra_conditions'); ?> <span><?php echo $this->Text->lang('text_optional'); ?></span></h3>
              <?php //echo "<pre>"; print_r($trip); echo "</pre>"; ?>
              <?php //echo "<pre>"; print_r($selected_extraconditions); echo "</pre>"; ?>
              
              <?= $this->Form->create($trip, array('enctype' => 'multipart/form-data', 'id' => 'condition_tab')) ?>
              <div class="conditions-top">
                  
                <?php
                $selected_conditions = array();
                if(!empty($selected_extraconditions)){
                    foreach($selected_extraconditions as $sel){
                        $selected_conditions[] = $sel->extracondition_id;
                    }
                }
                ?>
                
                <?php foreach($extraconditions as $extracondition){ ?>
                  
                <div class="col-md-4 padding-left-n">
                  <div class="form-group">
                      
                    <?php if(in_array($extracondition['id'], $selected_conditions)){ ?>
                      <input type="checkbox" name="extracondition_id[]" value="<?php echo $extracondition['id']; ?>" checked="">
                    <?php }else{ ?>
                      <input type="checkbox" name="extracondition_id[]" value="<?php echo $extracondition['id']; ?>">
                    <?php } ?>
                    
                    <label>
                        <img class="image-one" src="<?php echo $this->request->webroot  ?>images/uploads/<?php echo $extracondition['icon']; ?>" alt="">
                        <img class="image-two" src="<?php echo $this->request->webroot  ?>images/uploads/<?php echo $extracondition['selected_icon']; ?>" alt="">
                    </label>
                    <p><?php echo $extracondition['title_'.$config_language]; ?></p>
                  </div>
                </div>
                  
                <?php } ?>
                  
                  
                
              </div>
              <!--condition-top-->
<!--              <div class="conditions">
                <h3 class="subheadb">Operating Day</h3>
                <p>Please select days</p>
                <ul>
                  <li> <span>Monday</span>
                    <div class="my-toggle-btn-wrapper">
                      <div class="my-toggle-btn">
                        <input type="checkbox" id="checkbox1">
                        <label for="checkbox1"> </label>
                      </div>
                    </div>
                  </li>
                  <li> <span>Tuesday</span>
                    <div class="my-toggle-btn-wrapper">
                      <div class="my-toggle-btn">
                        <input type="checkbox" id="checkbox2">
                        <label for="checkbox2"> </label>
                      </div>
                    </div>
                  </li>
                  <li> <span>Wednesday</span>
                    <div class="my-toggle-btn-wrapper">
                      <div class="my-toggle-btn">
                        <input type="checkbox" id="checkbox3">
                        <label for="checkbox3"> </label>
                      </div>
                    </div>
                  </li>
                  <li> <span>Thrusday</span>
                    <div class="my-toggle-btn-wrapper">
                      <div class="my-toggle-btn">
                        <input type="checkbox" id="checkbox4">
                        <label for="checkbox4"> </label>
                      </div>
                    </div>
                  </li>
                  <li> <span>Friday</span>
                    <div class="my-toggle-btn-wrapper">
                      <div class="my-toggle-btn">
                        <input type="checkbox" id="checkbox5">
                        <label for="checkbox5"> </label>
                      </div>
                    </div>
                  </li>
                  <li> <span>Saturday</span>
                    <div class="my-toggle-btn-wrapper">
                      <div class="my-toggle-btn">
                        <input type="checkbox" id="checkbox6">
                        <label for="checkbox6"> </label>
                      </div>
                    </div>
                  </li>
                  <li> <span>Sunday</span>
                    <div class="my-toggle-btn-wrapper">
                      <div class="my-toggle-btn">
                        <input type="checkbox" id="checkbox7">
                        <label for="checkbox7"> </label>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>-->
              <!--conditions-->
              <div class="right">
                  <button type="button" class="btn btn-primary blue"><?php echo $this->Text->lang('text_save'); ?></button>
                  <button type="button" class="btn btn-default blue grey"><?php echo $this->Text->lang('text_next'); ?></button>
                </div> 
            </form>
            </div>
            
            <div id="Newyork" class="tabcontent">
              <div class="sub">
                <h3 class="subheadb">To complete your trip listing</h3>
                <p style="color:#9b9b9b;"> When you've completed your trip listing, click 'Submit for approval'. Your trip will be under our review process. Please allow 3-7 business days for your trip to be approved and published on our website. </p>
                <h3 style="font-size:15px;">Request for photography</h3>
                <ul>
                  <li>- Trips with VDO get more booking by 89%</li>
                  <li>- The photography service is FREE!</li>
                  <li>- You will not receive a payment for taking the photographer out on the tour. The photographer will take care of his own expenses (transport, meals, admission fee, etc.).</li>
                </ul>
                <?php if($trip->request_photographer == 0){ ?>
                <button type="button" class="btn btn-primary blue" id="request-photo">Request for photographer</button>
                <p style="display:none;">
                    You have requested photographer for your trip. We will contact you once your trip has been confirmed.
                </p>
                <?php }else{ ?>
                <p>
                    You have requested photographer for your trip. We will contact you once your trip has been confirmed.
                </p>
                <?php } ?>
              </div>
              <div class="right">
<!--                <button type="submit" class="btn btn-primary blue">Save</button>-->
                    <?php if($trip->status == '3'){ ?>
                    <div class="alert alert-warning"><?php echo $this->Text->lang('text_approval_msg'); ?></div>
                    <?php }else{ ?>
                    <button type="submit" class="btn btn-default blue grey" id="subfa">Submit for approval</button>
                    <?php } ?>
              </div>
            </div>
          </form>
        </div>
        <!--col-sm-9--> 
        
      </div>
    </div>
  </div>
</section>


<?php if($trip->pricing_type == 'basic' || $trip->pricing_type == ''){ ?>
<script>$("#ab").trigger('click')</script>
<?php }else{ ?>
<script>$("#bc").trigger('click')</script>
<?php } ?>

<script>

/******   For (Submit for Approval) button   *****/

var validation_error = '<?php echo $error ?>';

if(validation_error == '1'){
    $("#subfa").prop('disabled', true);
}else{
    
    $("#subfa").click(function(){
        
        var current = $(this);
        
        $.ajax({
            url: '<?php echo $this->request->webroot ?>trips/edit/<?php echo base64_encode($trip_id) ?>',
            data: {tab: 'submit_for_approval'},
            method: 'post',
            dataType: 'json',
            beforeSend: function(){
                $("._2G9Ry7uLWE8xGyg0Ueyndc").show();
            },
            success: function(json){
                $("._2G9Ry7uLWE8xGyg0Ueyndc").hide();
                
                if(json.isSuccess == 'true'){
                    $("#Newyork").prepend("<div class='alert alert-success'>"+json.msg+"</div>");
                    current.remove();
                }else{
                    alert(json.msg);
                }
            }
        });
    });
    
}

/******   For (Submit for Approval) button (END)   *****/
    

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

    
function DropDown(el) {
    this.dd = el;
    this.placeholder = this.dd.children('span');
    this.opts = this.dd.find('.dropdown a');
    this.val = '';
    this.index = -1;
    this.initEvents();
}
DropDown.prototype = {
    initEvents : function() {
        var obj = this;

        obj.dd.on('click', function(event){
            $(this).toggleClass('active');
            return false;
        });

        obj.opts.on('click',function(){
            var opt = $(this);
            obj.val = opt.text();
            obj.index = opt.index();
            obj.placeholder.text(obj.val);
        });
    },
    getValue : function() {
        return this.val;
    },
    getIndex : function() {
        return this.index;
    }
}

$(function() {
    var dd = new DropDown( $('#dd') );
});

/* Slik Slider Js Include Here */

 $('.responsive').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

/*tab script*/
function openCity(evt, cityName, step = null) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
//$("._2G9Ry7uLWE8xGyg0Ueyndc").show();
//window.location.href = '<?php echo $this->request->webroot ?>trips/edit/<?php echo base64_encode($trip_id) ?>?step='+step;
    
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();

/*radio accordion*/
$('#r11').on('click', function(){
  $(this).parent().find('a').trigger('click')
})

$('#r12').on('click', function(){
  $(this).parent().find('a').trigger('click')
})

$('#r13').on('click', function(){
  $(this).parent().find('a').trigger('click')
})

/******   Multiple select   *****/

$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
/******   Multiple select (END)  *****/

/****** Basic Tab trnasportation ACCORDIAN *******/

$(document).ready(function(){
 $('.transportv-acc').slideUp();
    if($('.transportv-acc input[name="transportation_id"]').is(':checked')){
        $(this).slideDown();
    }
  $('input[name="transportation_id"]').click(function(){
    $('.transportv-acc').slideUp();

    if($(this).parent().parent().parent().parent().find('.transportv-acc').is(":visible")){
      $('.transportv-acc').slideUp();
    }else{
      $(this).parent().parent().parent().parent().find('.transportv-acc').slideDown();
    }
  });
});

/****** Basic Tab trnasportation ACCORDIAN (END) *******/

/**** Multiple image Preview ***/

var selDiv = "";
var storedFiles = [];

$(document).ready(function() {
    $("#files").on("change", handleFileSelect);

    selDiv = $(".gallery"); 
    $("#myForm").on("submit", handleForm);

    $("body").on("click", ".selFile", removeFile);
});

function handleFileSelect(e) {
    var files = e.target.files;

    var filesArr = Array.prototype.slice.call(files);

    filesArr.forEach(function(f) {          

        if(!f.type.match("image.*")) {
            return;
        }
        storedFiles.push(f);

        var reader = new FileReader();
        reader.onload = function (e) {
            var html = "<div class='gal_child'><img src=\"" + e.target.result + "\"><span data-file='"+f.name+"' class='selFile' title='Click to remove'  style='cursor:pointer;'><i class='fa fa-trash-o' aria-hidden='true'></i></span><br clear=\"left\"/></div>";
            selDiv.append(html);

        }
        reader.readAsDataURL(f); 
    });

}

function handleForm(e) {
    e.preventDefault();
    var data = new FormData();
    var title = $("#trip_title").val();
    var summary = $("#trip_summary").val();

    if(title == ''){
        $("#trip_title").after('<label class="error">Please Enter title</label>');
        return false;
    }else{
        $("#trip_title").next('label').hide();
    }

    if(summary == ''){
        $("#trip_summary").after('<label class="error">Please Enter Summary</label>');
        return false;
    }else{
        $("#trip_summary").next('label').hide();
    }

    data.append('title_<?php echo $config_language; ?>', title);
    data.append('summary_<?php echo $config_language; ?>', summary);

    data.append('trip_id', <?php echo $trip_id ?>);

    data.append('tab', 'overview');

    for(var i=0, len=storedFiles.length; i<len; i++) {
        data.append('images[]', storedFiles[i]); 
    }

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo $this->request->webroot ?>trips/edit/<?php echo base64_encode($trip_id) ?>', true);

    $("._2G9Ry7uLWE8xGyg0Ueyndc").show();

    xhr.onload = function(e) {
        if(this.status == 200) {
            $("._2G9Ry7uLWE8xGyg0Ueyndc").hide();
//                console.log(e.currentTarget.responseText);  
//                alert(e.currentTarget.responseText + ' items uploaded.');

            window.location.href = '<?php echo $this->request->webroot ?>trips/edit/<?php echo base64_encode($trip_id) ?>?step=3';
        }
    }
    xhr.send(data);
}

function removeFile(e) {
    var file = $(this).data("file");
    for(var i=0;i<storedFiles.length;i++) {
        if(storedFiles[i].name === file) {
            storedFiles.splice(i,1);

            console.log(storedFiles);
            //break;
        }
    }
    $(this).parent().remove();
}

/**** Multiple image Preview (END) ***/

/***** Remove Image ******/

$(".remove_img").click(function(){
   var id = $(this).attr('data-id');
   var tab = 'remove_gallery_image';
   
   var div = $(this);
   
   $.ajax({
      url: '<?php echo $this->request->webroot ?>trips/edit/<?php echo base64_encode($trip_id) ?>',
      data: {id: id, tab: tab},
      method: 'post',
      dataType: 'html',
      success: function(response){
        if(response == 'success'){
            div.parent().remove();
        }else{
            alert('Error in image deletion');
        }
      }
   });
   
});

/***** Remove Image (END) ******/

/***** Tab (DETAIL) Get meeting points types from location ****/

$(document).delegate('#slmp li', 'click', function(){

    var id = $(this).attr('data-id');
    
    var tab = 'get_meeting_points_types';
    
    $.session.set('location_name', $(this).find('a').text());
    
    $.ajax({
        url: '<?php echo $this->request->webroot ?>trips/edit/<?php echo base64_encode($trip_id) ?>',
        data: {location_id: id, tab: tab},
        method: 'post',
        dataType: 'json',
        success: function(json){
            var html = '';
            if(json){
                for(var i=0; i<json.length; i++){
                    html+='<li data-id="'+json[i]['id']+'"><a>'+json[i]['title_<?php echo $config_language ?>']+' <i class="fa fa-caret-right" aria-hidden="true"></i></a></li>';
                }
            }
            $("#allmpt").html(html);
            $("#allmp").html('');
        }
    });
});

/***** Tab (DETAIL) Get meeting points types from location (END) ****/

/***** Tab (DETAIL) Get meeting points from meeting points type ****/

$(document).delegate('#allmpt li', 'click', function(){
    var meetingpointtype_id = $(this).attr('data-id');
    var tab = 'get_meeting_points';
    
    $.session.set('mt_name', $(this).find('a').text());
    
    $.ajax({
        url: '<?php echo $this->request->webroot ?>trips/edit/<?php echo base64_encode($trip_id) ?>',
        data: {meetingpointtype_id: meetingpointtype_id, tab: tab},
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
                        html += '<li>';
                        html += '<div class="checkbox-btn no-margin">';
                        html += '<input type="checkbox" data-id="'+ json[i]['id'] +'" value="'+ json[i]['id'] +'" name="meetingpointtypes" checked="checked">';
                        html += '<label for="rc3" onclick class="no-margin">'+ json[i]['title_<?php echo $config_language ?>'] +'</label>';
                        html += '</div>';
                        html += '</li>';                             
                    }else{
                        html += '<li>';
                        html += '<div class="checkbox-btn no-margin">';
                        html += '<input type="checkbox" data-id="'+ json[i]['id'] +'" value="'+ json[i]['id'] +'" name="meetingpointtypes">';
                        html += '<label for="rc3" onclick class="no-margin">'+ json[i]['title_<?php echo $config_language ?>'] +'</label>';
                        html += '</div>';
                        html += '</li>'; 
                    }
                }    
            }
            $("#allmp").html(html);
        }
    });
    
});

/***** Tab (DETAIL) Get meeting points from meeting points type  ****/


/********** Store and remove Meeting Points *************/
$(document).delegate('#allmp li div input', 'click', function(){
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
}

$(document).delegate('.rtmp i', 'click', function(){
    var id = $(this).parent().attr('data-id');
    
    remove_meetingpoint('', id);
    
});

/********** Store and remove Meeting Points (END) *************/

var schedule_row = '<?php echo $schedule_row ?>';

function addOptionValue(){
   
    var html = '';
    html += '<div class="minutes" id="schedule_row-'+schedule_row+'">';
    html += '<div class="row">';
    html += '<div class="col-sm-6">';
    html += '<div class="tme">';
    html += '<div class="hour">';
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
    html += '</div>';
    html += '<div class="colon">:</div>';
    html += '<div class="hour">';
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
    html += '</div>';
    html += '</div>';
    html += '</div>';
    html += '<div class="col-sm-6">';
    html += '<div class="form-group">';
    html += '<textarea class="form-control" rows="3" name="schedule['+schedule_row+'][content]" required></textarea>';
    //html += '<p class="help-block right">255 Characters left</p>';
    html += '</div>';
    html += '<button type="button" onclick="$(\'#schedule_row-' + schedule_row + '\').remove();" data-toggle="tooltip" rel="tooltip" title="Remove" class="btn btn-danger pull-right"><i class="fa fa-minus-circle"></i></button>';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    
    $('.schedule_part').append(html)
    
    schedule_row++;

}

/***** Basic TAB (form submit) AJAX  *****/
var bastictabform = $("#basic_tab").validate();
$(".basic_submit").click(function(){
    if(bastictabform.form()){
        $.ajax({
            url: '<?php echo $this->request->webroot ?>trips/edit/<?php echo base64_encode($trip_id) ?>',
            data: $('#basic_tab').serialize() + "&tab=basic",
            method: 'post',
            dataType: 'json',
            beforeSend: function(){
                $("._2G9Ry7uLWE8xGyg0Ueyndc").show();
            },
            success: function(json){
                window.location.href = '<?php echo $this->request->webroot ?>trips/edit/<?php echo base64_encode($trip_id) ?>?step=2';
            }
        });
    }else{
        //alert("not submitted");
    }
});

/***** Basic TAB (form submit) AJAX (End)  *****/

/***** DETAIL TAB (form submit) AJAX  ****/

var detailtabform = $("#detail_tab").validate();

$(".detail_submit").click(function(){
    if(detailtabform.form()){
        $.ajax({
            url: '<?php echo $this->request->webroot ?>trips/edit/<?php echo base64_encode($trip_id) ?>',
            data: $('#detail_tab').serialize() + "&tab=detail&meetingpoints="+$.session.get('mp_array'),
            method: 'post',
            dataType: 'json',
            beforeSend: function(){
                $("._2G9Ry7uLWE8xGyg0Ueyndc").show();
            },
            success: function(json){
                window.location.href = '<?php echo $this->request->webroot ?>trips/edit/<?php echo base64_encode($trip_id) ?>?step=4';
            }
        });
    }else{
        //alert("not submitted");
    }
});

/***** DETAIL TAB (form submit) AJAX (end) ****/


/******** Price TAB (Accordian) *********/

//$(document).ready(function(){
//    $('.price_accordian_body').slideUp();
//    $('.price_accordian_body:first').slideDown();
//    
//    $('.price_accordian_head:first input').prop('checked', true);
//    
//    $('.price_accordian_head').click(function(){
//        $('.price_accordian_body').slideUp();
//
//        if($(this).next('.price_accordian_body').is(":visible")){
//            $('.price_accordian_body').slideUp();
//        }else{
//            $(this).next('.price_accordian_body').slideDown();
//        }
//    });
//});

/******** Price TAB (Accordian) (End) *********/

$("#price_per_person").bind('keyup mouseup', function(){
    change_basic_price();    
});

$("#max_travelers").change(function(){
    change_basic_price();   
    add_advance_price_tabs();
});

//$("#max_travelers").trigger('change');

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

/******** Price TAB (Accordian) *********/

$('#ab').on('click', function(){
  $(this).parent().find('a').trigger('click');
  $("#collapseE").removeClass('in');
})

$('#bc').on('click', function(){
  $(this).parent().find('a').trigger('click');
  $("#collapseD").removeClass('in');
})

/******** Price TAB (Accordian) (End) *********/

/****** Enable Child price (checkbox) ********/

$("input[name='child_price_enabled']").change(function(){
   if(this.checked) {
       $(".child_price").show();
   }else{
       $(".child_price").hide();
   }
});

/****** Enable Child price (checkbox) (End) ********/

/***** PRICE TAB (form submit) AJAX  ****/

var pricetabform = $("#price_tab").validate();

$(".price_submit").click(function(){
    if(pricetabform.form()){
        $.ajax({
            url: '<?php echo $this->request->webroot ?>trips/edit/<?php echo base64_encode($trip_id) ?>',
            data: $('#price_tab').serialize() + "&tab=price",
            method: 'post',
            dataType: 'json',
            beforeSend: function(){
                $("._2G9Ry7uLWE8xGyg0Ueyndc").show();
            },
            success: function(json){
                window.location.href = '<?php echo $this->request->webroot ?>trips/edit/<?php echo base64_encode($trip_id) ?>?step=5';
            }
        });
    }else{
        //alert("not submitted");
    }
});

/***** PRICE TAB (form submit) AJAX (end) ****/

/***** CONDITION TAB (form submit) AJAX  ****/

$(document).delegate("#condition_tab button", "click", function(){
    $.ajax({
        url: '<?php echo $this->request->webroot ?>trips/edit/<?php echo base64_encode($trip_id) ?>',
        data: $('#condition_tab').serialize() + "&tab=condition",
        method: 'post',
        dataType: 'json',
        beforeSend: function(){
            $("._2G9Ry7uLWE8xGyg0Ueyndc").show();
        },
        success: function(json){
            window.location.href = '<?php echo $this->request->webroot ?>trips/edit/<?php echo base64_encode($trip_id) ?>?step=6';
        }
    });
});

/***** CONDITION TAB (form submit) AJAX (end) ****/

$(document).delegate("#request-photo", "click", function(){

    var current = $(this);

    $.ajax({
        url: '<?php echo $this->request->webroot ?>trips/edit/<?php echo base64_encode($trip_id) ?>',
        data: {value: '1', tab: 'submit'},
        method: 'post',
        dataType: 'html',
        beforeSend: function(){
            //$("._2G9Ry7uLWE8xGyg0Ueyndc").show();
        },
        success: function(response){
            if(response == 'success'){
                current.next('p').fadeIn();
                current.hide();
            }else{
                alert('Sorry, please try again later');
            }
        }
    });
});


</script>