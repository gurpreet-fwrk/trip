<?php
/**
  * @var \App\View\AppView $this
  */
?>

<section class="content-header">
    <h1>
    Activity
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Activity</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add Activity</h3>
                <?= $this->Form->create($activity, ['id' => 'activity-form', 'enctype' => 'multipart/form-data']) ?>
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category</label>
                        <?php echo $this->Form->control('activitycategory_id', ['options' => $activitycategories, 'class' => 'form-control', 'label' => false]); ?>
                    </div>
                </div> 
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title (English)</label>
                        <?php echo $this->Form->control('title_en', ['class' => 'form-control', 'label' => false]); ?>
                    </div>
                </div> 

                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title (Arabic)</label>
                        <?php echo $this->Form->control('title_ar', ['class' => 'form-control', 'label' => false, 'dir' => 'rtl']); ?>
                    </div>
                </div> 
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Icon</label>
                        <?php echo $this->Form->control('icon', ['id' => 'profilePic', 'class' => 'form-control', 'type' => 'file', 'label' => false]); ?>
                        <img src="<?php echo $this->request->webroot.'images/website/no-image.png' ?>" style="width: 140px; margin-top: 20px;" class="previewHolder">
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
$(document).ready(function() {
    $("#activity-form").validate({
        rules: {
            activitycategory_id:{
                required: true
            },
            title_en:{
                required: true
            },
            title_ar:{
                required: true
            },
            icon: { extension: "jpg|jpeg|png"}
        },
        messages: {
            activitycategory_id:{
                required: "Please Select Activity Category."
            },
            title_en:{
                required: "This Field is required."
            },
            title_en:{
                required: "This Field is required."
            },
            icon: { extension: "Only jpg, jpeg and png formats are accepted"}
        }
    });
});

function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $("#profilePic").parent().next('.previewHolder').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#profilePic").change(function() {
      readURL(this);
    });
</script>             
