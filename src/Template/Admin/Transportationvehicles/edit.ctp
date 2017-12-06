<?php
/**
  * @var \App\View\AppView $this
  */
?>

<section class="content-header">
    <h1>
    Transportation Vehicle
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Transportation Vehicle</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Transportation Vehicle</h3>
                <?= $this->Form->create($transportationvehicle, ['id' => 'transportationvehicle-form', 'enctype' => 'multipart/form-data']) ?>
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Transportation</label>
                        <?php echo $this->Form->control('transportation_id', ['options' => $transportations, 'class' => 'form-control', 'label' => false]); ?>
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
                        <?php if($transportationvehicle->icon != ''){ ?>
                        <img src="<?php echo $this->request->webroot.'images/transport_vehicles/'.$transportationvehicle->icon ?>" style="width: 140px; margin-top: 20px;" class="previewHolder">
                        <?php }else{ ?>
                        <img src="<?php echo $this->request->webroot.'images/website/no-image.png' ?>" style="width: 140px; margin-top: 20px;" class="previewHolder">
                        <?php } ?>
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
        $("#transportationvehicle-form").validate({
            rules: {
                transportation_id: { required: true },
                title_en: "required",
                title_ar: "required",
                icon: { extension: "jpg|jpeg|png"}
            },
            messages: {
                transportation_id: { required: "Please enter a valid email address" },
                title_en: "This Field is required",
                title_ar: "This Field is required",
                icon: { extension: "Only jpg, jpeg and png formats are accepted"}
            }
        });
    });

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('.previewHolder').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#profilePic").change(function() {
      readURL(this);
    });

</script>