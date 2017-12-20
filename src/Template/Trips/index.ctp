<section class="basic">
    <div class="second">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="base base_b"> 

                        <!--small_slider-->
                        <div class="small_slider slider_manage">
                            <a class="btn btn-primary blue" href="#">Manage availability</a>
                            <h3>Trip</h3>
                            <div class="carousel slide" id="carousel-example-generic" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2" class="active"></li>
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    <div class="item">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's 
                                    </div>
                                    <div class="item">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's 
                                    </div>
                                    <div class="item active">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's 
                                    </div>
                                </div>

                            </div>
                        </div><!--small_slider-->

                    </div>
                </div>
                <div class="col-sm-9">
                    <?php if (!empty($trips)) { ?>
                    <div class="row">
                        <a href="<?php echo $this->request->webroot ?>trips/add" class="btn btn-primary blue create_trip right">Create New Trip</a>
                    </div>
                        
                    <form>
                        <div class="row">
                            <?php //echo $this->Flash->render(); ?>
                            <?php //echo "<pre>"; print_r($trips); echo "</pre>"; ?>
                            
                                <?php foreach ($trips as $trip) { ?>
                                    <a href="<?php echo $this->request->webroot ?>trips/edit/<?php echo base64_encode($trip['id']); ?>?step=1">
                                        <div class="yourlist">
                                            <div class="col-sm-6 no-padding">
                                                <div class="trippic">

                                                    <?php if (!empty($trip['tripgallery'])) { ?>
                                                        <img src="<?php echo $this->request->webroot ?>images/trips/<?php echo $trip['tripgallery'][0]->file; ?>" />
                                                    <?php } ?>

                                                    <div class="location_trip">
                                                        <?php if ($trip['location'] != '') { ?>
                                                            <span><i class="fa fa-map-marker" aria-hidden="true"></i>
                                                                <?php echo $trip['location']['name_' . $config_language]; ?></span>
                                                        <?php } ?>
                                                    </div>
                                                </div>



                                            </div>
                                            <div class="col-sm-6">
                                                <div class="tripdetail">
                                                    <div class="camera_caption draft">
                                                        <span>
                                                            <?php
                                                            if ($trip['status'] == '1') {
                                                                echo 'Published';
                                                            } elseif ($trip['status'] == '0') {
                                                                echo 'Declined';
                                                            } elseif ($trip['status'] == '2') {
                                                                echo 'Draft';
                                                            } elseif ($trip['status'] == '3') {
                                                                echo 'Pending';
                                                            }
                                                            ?>
                                                        </span></div>
                                                    <h4><?php echo ($trip['title_' . $config_language] != '') ? $trip['title_' . $config_language] : 'No Trip Title..'; ?></h4>
                                                    <p><?php echo ($trip['summary_' . $config_language] != '') ? $trip['summary_' . $config_language] : 'No Trip Introduction'; ?></p>
                                                    <!--                         <button type="submit" class="btn btn-primary blue right">Save</button>-->
                                                </div>
                                            </div>
                                        </div>
                                    </a>
    <?php } ?>
                            </div> 




                        </form>
                        <div>
                            <div class="paginator">
                                <ul class="pagination">
                                    <?= $this->Paginator->first('<< ' . __('first')) ?>
                                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                    <?= $this->Paginator->numbers() ?>
                                    <?= $this->Paginator->next(__('next') . ' >') ?>
    <?= $this->Paginator->last(__('last') . ' >>') ?>
                                </ul>
                                <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
                            </div>
                        </div>
                        <?php } else { ?>
                            <div class="row">
                                <div class="listing">
                                 <div class="col-sm-6 col-sm-offset-3">
                                         <div class="your_trip">
                                         <h2>Your Listings</h2>
                                         <div class="yourtrip_pic"><img src="<?php echo $this->request->webroot ?>images/website/f09d584f8a49ef2cd790bd47022770c8.png" /></div>
                                         <p>Let's start your free trip</p>
                                         <a href="<?php echo $this->request->webroot ?>trips/add" class="btn btn-primary blue"><i class="fa fa-plus" aria-hidden="true"></i> Create new trip</a>
                                      </div>
                                 </div>
                                </div>
                            </div> 
                        <?php } ?>
                    
                </div>
                <!--col-sm-9--> 

            </div>
        </div>
    </div>
</section>

