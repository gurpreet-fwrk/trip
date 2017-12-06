<?php
/**
  * @var \App\View\AppView $this
  */
?>

<section class="content-header">
    <h1>
    Activity Category
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Activity Category</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Activity Category</h3>
                <?= $this->Form->create($activitycategory, ['id' => 'activitycategory-form', 'enctype' => 'multipart/form-data']) ?>
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title (English)</label>
                        <?php echo $this->Form->control('title_en', ['class' => 'form-control', 'label' => false]); ?>
                    </div>
                </div> 
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title (Arabic)</label>
                        <?php echo $this->Form->control('title_ar', ['class' => 'form-control', 'label' => false, 'dir'=> "rtl"]); ?>
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
        $("#activitycategory-form").validate({
            rules: {
                title_en: "required",
                title_ar: "required"
            },
            messages: {
                title_en: "This Field is required",
                title_ar: "This Field is required"
            }
        });
    });
</script>