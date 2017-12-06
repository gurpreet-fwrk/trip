<section class="basic">
  <div class="second">
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <div class="base">
            <div class="tab">
              <h2><?php echo $this->Text->lang('list_trip'); ?></h2>
              <button class="tablinks active" onclick="openCity(event, 'London')" id="defaultOpen"><span>1</span><?php echo $this->Text->lang('text_basic'); ?></button>
              <button class="tablinks" onclick="openCity(event, 'Paris')"><span>2</span><?php echo $this->Text->lang('text_overview'); ?></button>
              <button class="tablinks" onclick="openCity(event, 'Tokyo')"><span>3</span><?php echo $this->Text->lang('text_detail'); ?></button>
              <button class="tablinks" onclick="openCity(event, 'Usa')"><span>4</span><?php echo $this->Text->lang('text_price'); ?></button>
              <button class="tablinks" onclick="openCity(event, 'Miami')"><span>5</span><?php echo $this->Text->lang('text_condition'); ?></button>
              <button class="tablinks" onclick="openCity(event, 'Newyork')"><span>6</span><?php echo $this->Text->lang('text_submit'); ?></button>
              <button class="tablinks" onclick="openCity(event, 'Delete')">Delete this trip</button>
            </div>
          </div>
        </div>
        <div class="col-sm-9">
            
            <?php //echo "<pre>"; print_r($trip); echo "</pre>"; ?>
            
            <div id="London" class="tabcontent">
               <?= $this->Form->create($trip) ?>
              <h3 class="subhead"><?php echo $this->Text->lang('text_basic'); ?></h3>
              <div class="basetrip">
                <div class="form-group">
                  <div class="col-sm-3">
                    <label class="control-label"> <img src="<?php echo $this->request->webroot  ?>images/website/a.png" /> <?php echo $this->Text->lang('text_destination'); ?></label>
                  </div>
                  <div class="col-sm-9">
                    <?php echo $this->Form->control('location_id', ['options' => $locations, 'class' => 'form-control', 'label' => false]); ?>
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
                    <?php echo $this->Form->select('stopped_locations', $locations, ['class' => 'form-control js-example-basic-multiple','multiple' => 'multiple', 'value' => $selected_stopped]); ?>
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
                    <?php echo $this->Form->select('activities', $activities, ['class' => 'form-control js-example-basic-multiple','multiple' => 'multiple', 'value' => $selected_act]); ?>
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
                  <button type="submit" class="btn btn-primary blue"><?php echo $this->Text->lang('text_save'); ?></button>
                  <button type="submit" class="btn btn-default blue grey"><?php echo $this->Text->lang('text_next'); ?></button>
                </div>
              </div>
          <?= $this->Form->end() ?>
            </div>
            
            
            <div id="Paris" class="tabcontent">
                <?= $this->Form->create($trip, array('enctype' => 'multipart/form-data')) ?>
              <h3 class="subheadb"><?php echo $this->Text->lang('text_overview'); ?></h3>
              <div class="overview">
                <div class="form-group">
                  <label for="exampleInputEmail1"><?php echo $this->Text->lang('text_name_your_trip'); ?></label>
                  <?php echo $this->Form->control('title_'.$config_language, array('class' => 'form-control', 'label' => false)); ?>
<!--                  <p class="help-block right">150 Characters left</p>-->
                </div>
                <div class="form-group">
                  <label for="exampleInputSummary"><?php echo $this->Text->lang('text_summary_your_trip'); ?></label>
                  <?php echo $this->Form->control('summary_'.$config_language, array('class' => 'form-control', 'label' => false)); ?>
<!--                  <p class="help-block right">250 Characters left</p>-->
                </div>
                <div class="form-group photos">
                  <label for="exampleInputPassword1"><?php echo $this->Text->lang('text_photos'); ?></label>
                  <p class="help-block"><?php echo $this->Text->lang('text_upload_only_photos'); ?></p>
                  <div class="gallery"></div>
                  <span class="document">
                      <input type="file" name="images[]" id="gallery-photo-add" class="form-control" multiple>
            
                  <a>+ <?php echo $this->Text->lang('text_add_photos'); ?></a> </span> </div>
                  
                  <input type="hidden" name="tab" value="overview">
                  
                <div class="right">
                  <button type="submit" class="btn btn-primary blue"><?php echo $this->Text->lang('text_save'); ?></button>
                  <button type="submit" class="btn btn-default blue grey"><?php echo $this->Text->lang('text_next'); ?></button>
                </div>
              </div>
              <?= $this->Form->end() ?>
            </div>
            
            <div id="Tokyo" class="tabcontent">
              <h3 class="subheadb">Trip Detail</h3>
              <div class="meeting">
                <h3>Meeting Point</h3>
                <div class="row">
                  <div class="col-sm-4">
                    <ul>
                      <li><a>Bangkok <i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
                      <li><a>Bangkok <i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
                      <li><a>Bangkok <i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
                      <li><a>Bangkok <i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
                      <li><a>Bangkok <i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
                    </ul>
                  </div>
                  <div class="col-sm-4">
                    <ul>
                      <li><a>Bangkok <i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
                      <li><a>Bangkok <i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
                      <li><a>Bangkok <i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
                      <li><a>Bangkok <i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
                      <li><a>Bangkok <i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
                    </ul>
                  </div>
                  <div class="col-sm-4">
                    <ul>
                      <li>
                        <div class="checkbox-btn no-margin">
                          <input type="checkbox" value="value-1" id="rc3" name="rc3">
                          <label for="rc3" onclick class="no-margin">Checkbox</label>
                        </div>
                      </li>
                      <li>
                        <div class="checkbox-btn no-margin">
                          <input type="checkbox" value="value-1" id="rc4" name="rc4">
                          <label for="rc4" onclick class="no-margin">Checkbox</label>
                        </div>
                      </li>
                      <li>
                        <div class="checkbox-btn no-margin">
                          <input type="checkbox" value="value-1" id="rc5" name="rc5">
                          <label for="rc5" onclick class="no-margin">Checkbox</label>
                        </div>
                      </li>
                      <li>
                        <div class="checkbox-btn no-margin">
                          <input type="checkbox" value="value-1" id="rc6" name="rc6">
                          <label for="rc6" onclick class="no-margin">Checkbox</label>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
                <!--row--> 
                
              </div>
              <!--meeting-->
              
              <h3 class="sch">Schedule</h3>
              <div class="minutes mnt">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="tme">
                      <div class="hour">
                        <select class="form-control">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                      <div class="colon">:</div>
                      <div class="hour">
                        <select class="form-control">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <h4>Meet up at our meeting point</h4>
                  </div>
                </div>
              </div>
              <!--minutes-->
              
              <div class="minutes">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="tme">
                      <div class="hour">
                        <select class="form-control">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                      <div class="colon">:</div>
                      <div class="hour">
                        <select class="form-control">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <textarea class="form-control" rows="3"></textarea>
                      <p class="help-block right">250 Characters left</p>
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
                        <select class="form-control">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                      <div class="colon">:</div>
                      <div class="hour">
                        <select class="form-control">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <textarea class="form-control" rows="3"></textarea>
                      <p class="help-block right">255 Characters left</p>
                    </div>
                  </div>
                </div>
              </div>
              <!--minutes-->
              
              <button type="submit" class="btn btn-primary blue right">+ Add more</button>
              <h3 class="sch" style="margin-bottom:15px;">FAQ</h3>
              <div class="form-group">
                <label for="exampleInputSummary">Why this Trip?</label>
                <p class="help-block">Briefly explain your travelers why they should book your trip to quickly graps their attentions.</p>
                <textarea class="form-control" rows="3"></textarea>
                <p class="help-block right">250 Characters left</p>
              </div>
              <div class="form-group">
                <label for="exampleInputSummary">Things to prepare fot the Trip?</label>
                <p class="help-block">Is there anything travelers should prepare for this trip?</p>
                <textarea class="form-control" rows="3"></textarea>
                <p class="help-block right">250 Characters left</p>
              </div>
              <div class="right">
                <button type="submit" class="btn btn-primary blue">Save</button>
                <button type="submit" class="btn btn-default blue grey">Next</button>
              </div>
            </div>
            
            <div id="Usa" class="tabcontent">
              <h3 class="subheadb">Price</h3>
              <p style="color: #9b9b9b;"> Please, use these price conditions as guides to calculate your trip fee and always make sure to inform your travelers about any additional expenses before the trip day. </p>
              <div class="panel-group accord" id="accordion">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <label for='r11' style='width: auto;'>
                        <input type='radio' id='r11' name='occupation' value='Working' required />
                        All inclusive <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"></a> </label>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body sub subs">
                    
                    <ul class="icons">
                        <li><i class="fa fa-cutlery" aria-hidden="true"></i></li>
                        <li><i class="fa fa-bus" aria-hidden="true"></i></li>
                    </ul>
                    
                      <ul>
                        <li>Expenses, occur during a trip, are mainly included</li>
                        <li>- Public or private transportation fares : taxi, bts, mrt, etc.(Please estimate the cost of gasoline or vehicle rental fee, in case of using a private car)</li>
                        <li>- Foods; Meal(s) during the trip. (Please note that alcohol is always excluded)</li>
                        <li>- Admission fee: Amusement park, gallery, shows, and etc.</li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class=panel-title>
                      <label for='r12' style='width: auto;'>
                        <input type='radio' id='r12' name='occupation' value='Not-Working' required />
                        Food excluded <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"></a> </label>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="panel-body sub subs">
                      <ul>
                        <li>Expenses, occur during a trip, are mainly included</li>
                        <li>- Public or private transportation fares : taxi, bts, mrt, etc.(Please estimate the cost of gasoline or vehicle rental fee, in case of using a private car)</li>
                        <li>- Foods; Meal(s) during the trip. (Please note that alcohol is always excluded)</li>
                        <li>- Admission fee: Amusement park, gallery, shows, and etc.</li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class=panel-title>
                      <label for='r13' style='width: auto;'>
                        <input type='radio' id='r13' name='occupation' value='progress' required />
                        Food, Transportation, Admission fee excluded <a data-toggle="collapse" data-parent="#accordion"
                         href="#collapseThree"></a> </label>
                    </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse">
                    <div class="panel-body sub subs">
                      <ul>
                        <li>Expenses, occur during a trip, are mainly included</li>
                        <li>- Public or private transportation fares : taxi, bts, mrt, etc.(Please estimate the cost of gasoline or vehicle rental fee, in case of using a private car)</li>
                        <li>- Foods; Meal(s) during the trip. (Please note that alcohol is always excluded)</li>
                        <li>- Admission fee: Amusement park, gallery, shows, and etc.</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <!--accord end-->
              
              <div class="form-group">
                <label for="exampleInputSummary">Extra expense travelers should prepare</label>
                <p class="help-block">Are there any extra expenses that travelers have to pay during the trip? </p>
                <textarea class="form-control" rows="3" placeholder="e.g. your pocket money"></textarea>
                <p class="help-block">250 Characters left</p>
              </div>
              <div class="form-group">
                <div class="col-sm-4 no-padding">
                  <label for="inputEmail3" class="control-label" style="line-height: 40px;"><i class="fa fa-users" aria-hidden="true"></i> Maximun travelers </label>
                </div>
                <div class="col-sm-4 no-padding">
                  <select class="form-control travel">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
                <div class="col-sm-4 no-padding">&nbsp;</div>
              </div>
              <div class="row">
                <div class="pricing">
                  <div class="col-sm-6">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                      <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                          <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseA" aria-expanded="true" aria-controls="collapseA"><i class="fa fa-check-circle" aria-hidden="true"></i> Basic Pricing </a> </h4>
                        </div>
                        <div id="collapseA" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                          <div class="panel-body">
                            <div class="col-sm-6">
                                <div class="pric">
                                    <h4>Price (per person)</h4>
                                    <input type="text" placeholder="0">
                                </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="pric">
                                <h4 style="text-align:right;">Total (per trip)</h4>
                                <p style="color:#d0021b;text-align:right;margin:0px;">0.00 - 0.00 <span style="color:#000;">THB</span></p>
                               </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                          <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseB" aria-expanded="false" aria-controls="collapseB"><i class="fa fa-check-circle" aria-hidden="true"></i> Advance Pricing </a> </h4>
                        </div>
                        <div id="collapseB" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                          <div class="panel-body">
                          
                          <div class="col-sm-4">
                            <div class="pric">
                                    <h4>Travelers</h4>
                                    <ul>
                                        <li>1 <i class="fa fa-times" aria-hidden="true"></i> <i class="fa fa-user" aria-hidden="true"></i></li>
                                        <li>2 <i class="fa fa-times" aria-hidden="true"></i> <i class="fa fa-user" aria-hidden="true"></i></li>
                                        <li>3 <i class="fa fa-times" aria-hidden="true"></i> <i class="fa fa-user" aria-hidden="true"></i></li>
                                    </ul>
                                </div>
                          </div>
                          
                            <div class="col-sm-4">
                                <div class="pric">
                                    <h4>Price (per person)</h4>
                                    <ul>
                                        <li><input type="text" placeholder="0"></li>
                                        <li><input type="text" placeholder="1"></li>
                                        <li><input type="text" placeholder="2"></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="pric">
                                <h4 style="text-align:right;">Total (per trip)</h4>
                               
                                <ul>
                                        <li> <p style="color:#d0021b;margin:0px;font-size: 13px;">0.00 - 0.00 <span style="color:#000;">THB</span></p></li>
                                        <li> <p style="color:#d0021b;margin:0px;font-size: 13px;">0.00 - 0.00 <span style="color:#000;">THB</span></p></li>
                                        <li> <p style="color:#d0021b;margin:0px;font-size: 13px;">0.00 - 0.00 <span style="color:#000;">THB</span></p></li>
                                    </ul>
                               </div>
                            </div>
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
 
                    <div class="checkbox-btn no-margin addopt">
                     <h3>Additional Options</h3>
                          <input type="checkbox" value="value-1" id="rc3" name="rc3">
                          <label for="rc3" onclick class="no-margin">Enable Child Price (Age 2-12)</label>
                     </div>
                  
                </div>
              </div>
              <div class="right">
                  <button type="submit" class="btn btn-primary blue">Save</button>
                  <button type="submit" class="btn btn-default blue grey">Next</button>
                </div>
            </div>
            
            <div id="Miami" class="tabcontent">
              <h3 class="subheadb">Extra conditions <span>(Optional)</span></h3>
              <div class="conditions-top">
                <div class="col-md-4 padding-left-n">
                  <div class="form-group">
                    <input type="checkbox" name="" value="Smart Casual">
                    <label><img class="image-one" src="<?php echo $this->request->webroot  ?>images/website/shirt.png" alt=""> <img class="image-two" src="<?php echo $this->request->webroot  ?>images/website/shirtb.png" alt=""></label>
                    <p>Smart Casual</p>
                  </div>
                </div>
                <div class="col-md-4 padding-left-n">
                  <div class="form-group">
                    <input type="checkbox" name="" value="Smart Casual">
                    <label><img class="image-one" src="<?php echo $this->request->webroot  ?>images/website/heart.png" alt=""> <img class="image-two" src="<?php echo $this->request->webroot  ?>images/website/heartb.png" alt=""></label>
                    <p>Physical Strength Required</p>
                  </div>
                </div>
                <div class="col-md-4 padding-left-n">
                  <div class="form-group">
                    <input type="checkbox" name="" value="Smart Casual">
                    <label><img class="image-one" src="<?php echo $this->request->webroot  ?>images/website/carrot.png" alt=""> <img class="image-two" src="<?php echo $this->request->webroot  ?>images/website/carrotb.png" alt=""></label>
                    <p>Vegetarian Food Available</p>
                  </div>
                </div>
                <div class="col-md-4 padding-left-n">
                  <div class="form-group">
                    <input type="checkbox" name="" value="Smart Casual">
                    <label><img class="image-one" src="<?php echo $this->request->webroot  ?>images/website/face.png" alt=""> <img class="image-two" src="<?php echo $this->request->webroot  ?>images/website/faceb.png" alt=""></label>
                    <p>Children Friendly</p>
                  </div>
                </div>
                <div class="col-md-4 padding-left-n">
                  <div class="form-group">
                    <input type="checkbox" name="" value="Smart Casual">
                    <label><img class="image-one" src="<?php echo $this->request->webroot  ?>images/website/clock.png" alt=""> <img class="image-two" src="<?php echo $this->request->webroot  ?>images/website/clockb.png" alt=""></label>
                    <p>Flexible Plan</p>
                  </div>
                </div>
                <div class="col-md-4 padding-left-n">
                  <div class="form-group">
                    <input type="checkbox" name="" value="Smart Casual">
                    <label><img class="image-one" src="<?php echo $this->request->webroot  ?>images/website/cloud.png" alt=""> <img class="image-two" src="<?php echo $this->request->webroot  ?>images/website/cloudb.png" alt=""></label>
                    <p>Seasonal Activities</p>
                  </div>
                </div>
              </div>
              <!--condition-top-->
              <div class="conditions">
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
              </div>
              <!--conditions-->
              <div class="right">
                  <button type="submit" class="btn btn-primary blue">Save</button>
                  <button type="submit" class="btn btn-default blue grey">Next</button>
                </div> 
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
                <button type="submit" class="btn btn-primary blue">Request for photographer</button>
              </div>
              <div class="right">
                <button type="submit" class="btn btn-primary blue">Save</button>
                <button type="submit" class="btn btn-default blue grey">Submit for approval</button>
              </div>
            </div>
          </form>
        </div>
        <!--col-sm-9--> 
        
      </div>
    </div>
  </div>
</section>

<script>
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
function openCity(evt, cityName) {
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

//$('#r14').on('click', function(){
 // $(this).parent().find('a').trigger('click')
//})

//$('#r15').on('click', function(){
 // $(this).parent().find('a').trigger('click')
//})

/******   Multiple select   *****/

$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
/******   Multiple select (END)  *****/



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

/**** Multiple image Preview ***/
$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    //$($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview).css({"width":"100px","height":"100px"});     
                    //console.log(input.files);
                    
                    $(placeToInsertImagePreview).append('<img src="'+event.target.result+'"><span class="remove_img" data-id="'+input.files[i].name+'"></span>').css({"width":"100px","height":"100px"}); 
                    
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.gallery');
        //$(this).find('img').css({"width":"100px","height":"100px"});
    });
});
/**** Multiple image Preview (END) ***/
</script>