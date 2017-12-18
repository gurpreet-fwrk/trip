<?php
/**
  * @var \App\View\AppView $this
  */
?>

<section class="content-header">
    <h1>
    Extra Conditions
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Extra Condition</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Extra Condition</h3>
                <?= $this->Form->create($extracondition, ['id' => 'extracondition-form', 'enctype' => 'multipart/form-data']) ?>
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title (EN)</label>
                        <?php echo $this->Form->control('title_en', ['class' => 'form-control', 'label' => false]); ?>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title (AR)</label>
                        <?php echo $this->Form->control('title_ar', ['class' => 'form-control', 'label' => false, 'dir' => 'rtl']); ?>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Icon</label>
                        <?php echo $this->Form->control('icon', ['id' => 'profilePic', 'class' => 'form-control', 'type' => 'file', 'label' => false]); ?>
                        <?php if($extracondition->icon != ''){ ?>
                        <img src="<?php echo $this->request->webroot.'images/uploads/'.$extracondition->icon ?>" style="width: 140px; margin-top: 20px;" class="previewHolder">
                        <?php }else{ ?>
                        <img src="<?php echo $this->request->webroot.'images/website/no-image.png' ?>" style="width: 140px; margin-top: 20px;" class="previewHolder">
                        <?php } ?>
                    </div>
                </div> 
                
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Selected Icon</label>
                        <?php echo $this->Form->control('selected_icon', ['id' => 'selected_icon', 'class' => 'form-control', 'type' => 'file', 'label' => false]); ?>
                       
                        <?php if($extracondition->selected_icon != ''){ ?>
                        <img src="<?php echo $this->request->webroot.'images/uploads/'.$extracondition->selected_icon ?>" style="width: 140px; margin-top: 20px;" class="previewHolder">
                        <?php }else{ ?>
                        <img src="<?php echo $this->request->webroot.'images/website/no-image.png' ?>" style="width: 140px; margin-top: 20px;" class="previewHolder">
                        <?php } ?>
                    </div>
                </div> 
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Content (EN)</label>
                        <?php echo $this->Form->control('content_en', ['class' => 'form-control', 'label' => false]); ?>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Content (AR)</label>
                        <?php echo $this->Form->control('content_ar', ['class' => 'form-control', 'label' => false, 'dir' => 'rtl']); ?>
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
        $("#extracondition-form").validate({
            rules: {
                title_en: "required",
                title_ar: "required",
                content_en: "required",
                content_ar: "required",
                icon: { extension: "jpg|jpeg|png"}
            },
            messages: {
                title_en: "This Field is required",
                title_ar: "This Field is required",
                content_en: "This Field is required",
                content_ar: "This Field is required",
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
    
    function readURL2(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $("#selected_icon").parent().next('.previewHolder').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#selected_icon").change(function() {
      readURL2(this);
    });
</script>