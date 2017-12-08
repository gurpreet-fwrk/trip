<?php
/**
  * @var \App\View\AppView $this
  */
?>

<section class="content-header">
    <h1>
    Meeting Point Types
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Meeting Point Type</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add Meeting Point Type</h3>
                <?= $this->Form->create($meetingpointtype, ['id' => 'meetingpointtype-form', 'enctype' => 'multipart/form-data']) ?>
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Location</label>
                        <?php echo $this->Form->control('location_id', ['id' => 'loc', 'options' => $locations, 'empty' => true, 'class' => 'form-control', 'label' => false]); ?>
                    </div>
                </div>     
                
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Meeting Point Type (EN)</label>
                        <?php echo $this->Form->control('title_en', ['class' => 'form-control', 'label' => false]); ?>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Meeting Point Type (AR)</label>
                        <?php echo $this->Form->control('title_ar', ['class' => 'form-control', 'label' => false, 'dir' => 'rtl']); ?>
                    </div>
                </div>
                <div class="box-footer">
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
                </div>  
                <?= $this->Form->end() ?> 
            </div>
        </div>
    </div>
</section>

<script>
    $().ready(function() {
        $("#meetingpointtype-form").validate({
            rules: {
                location_id: {required: true},
                title_en: "required",
                title_ar: "required",
            },
            messages: {
                title_en: "This Field is required",
                title_ar: "This Field is required",
                location_id: {required: "Location is Required"}
            }
        });
    });
    
   
    
</script>