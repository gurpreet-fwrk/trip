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
    Add Trip
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Trip</li>
    </ol>
</section>

<section class="content">
    <div class="row">
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
                        <?php echo $this->Form->select('stopped_locations', $locations, ['class' => 'form-control js-example-basic-multiple','multiple' => 'multiple', 'required']); ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Main Activities</label>
                        <?php echo $this->Form->select('activities', $activities, ['class' => 'form-control js-example-basic-multiple','multiple' => 'multiple', 'required']); ?>
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
                                                        <input type='radio' name='transportation_id' value='<?php echo $transportation->id; ?>' required /><?php echo $transportation['title_en']; ?>
                                                    </div>
                                                </div>    
                                                <!--</a>-->
                                            </h4>
                                        </div>
                                        <div id="collapse<?php echo $i; ?>" class="trans_acc panel-collapse collapse">
                                            <div class="box-body">
                                                <?php if(!empty($transportation->transportationvehicles)){ ?>
                                                <?php foreach ($transportation->transportationvehicles as $vehicle) { ?>
                                                <div class="form-group">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="transportationvehicle_id" value="<?php echo $vehicle['id'] ?>" <?php echo ($i == '1') ? 'checked': ''; ?> required><?php echo $vehicle['title_en'] ?>
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
                                <ul id="slmp" class="list-group"></ul>
                            </div>
                            <div class="col-md-4">
                                <ul id="allmpt" class="list-group"></ul>
                            </div>
                            <div class="col-md-4">
                                <ul id="allmp" class="list-group"></ul>
                            </div>
                        </div>
                    </div>    
                    
                    <div class="box-footer">
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
                    </div>  
                </div>
            </div>
        </div>
        <!-- Detail Tab (End) -->
            
    <?= $this->Form->end() ?> 
</section>   
<script>
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

$("#trip-form").validate();

$(".js-example-basic-multiple").select2();

});

/***** Basic TAB (Transportation accordion) ******/

$("input[name='transportation_id']:first").trigger('click');
$("input[name='transportation_id']:first").parent().parent().parent().parent().next('div').addClass('in'); 

$("input[name='transportation_id']").change(function(){
    
    $("input[name='transportationvehicle_id']").prop('checked', false);
    
    $(".trans_acc").removeClass('in');
    $(this).parent().parent().parent().parent().next('div').addClass('in'); 
});

/***** Basic TAB (Transportation accordion) (END) ******/

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
});



</script>           