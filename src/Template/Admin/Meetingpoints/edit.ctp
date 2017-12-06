<?php
/**
  * @var \App\View\AppView $this
  */
?>

<section class="content-header">
    <h1>
    Meeting Points
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Meeting Point</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Meeting Point</h3>
                <?= $this->Form->create($meetingpoint, ['id' => 'meetingpoint-form', 'enctype' => 'multipart/form-data']) ?>
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Location</label>
                        <?php echo $this->Form->control('location_id', ['id' => 'loc', 'options' => $locations, 'empty' => true, 'class' => 'form-control', 'label' => false]); ?>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Meeting Point Type</label>
                        <?php echo $this->Form->control('meetingpointtype_id', ['id' => 'mpt', 'options' => $meetingpointtypes, 'empty' => true, 'class' => 'form-control', 'label' => false]); ?>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Meeting Point (EN)</label>
                        <?php echo $this->Form->control('title_en', ['class' => 'form-control', 'label' => false]); ?>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Meeting Point (AR)</label>
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
    $('#loc').change(function(){
        var value = $(this).val();

        $.ajax({
            url: '<?php echo $this->request->webroot ?>admin/meetingpoints/getMeetingpointtypesByLocation',
            data: {location_id: value},
            method: 'post',
            dataType: 'json',
            success: function(json){
                console.log(json);

                if(json){

                    var options = '<option></option>';
                    
                    var selected = '<?php echo $meetingpoint->meetingpointtype_id ?>';

                    for(var i=0; i<json.length; i++){

                        if(selected == json[i].id){   
                            options += '<option value="'+ json[i].id +'" selected="selected">'+json[i].title_en+'</option>';
                        }else{
                            options += '<option value="'+ json[i].id +'">'+json[i].title_en+'</option>';
                        }

                    }

                    $('#mpt').html(options);
                }
            }
        });
    });

    $('#loc').trigger('change');

    $().ready(function() {
        $("#meetingpoint-form").validate({
            rules: {
                location_id: {required: true},
                meetingpointtype_id: {required: true},
                title_en: "required",
                title_ar: "required",
            },
            messages: {
                title_en: "This Field is required",
                title_ar: "This Field is required",
                location_id: {required: "Location is Required"},
                meetingpointtype_id: {required: "Meeting Point Type is Required"},
            }
        });
    });
</script>