<?php
/**
  * @var \App\View\AppView $this
  */
?>

<section class="content-header">
    <h1>
    <?= __('Locations') ?>
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?= __('Edit Location') ?></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?= __('Edit Location') ?></h3>
                <?= $this->Form->create($location, ['id' => 'location-form', 'enctype' => 'multipart/form-data']) ?>
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?= __('Name') ?></label>
                        <?php echo $this->Form->control('name_en', ['class' => 'form-control', 'label' => false]); ?>
                    </div>
                </div>  
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name (Arabic)</label>
                        <?php echo $this->Form->control('name_ar', ['class' => 'form-control', 'label' => false, 'dir'=> "rtl"]); ?>
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
    $("#location-form").validate({
        rules: {
            name_en: "required",
            name_ar: "required"
        },
        messages: {
            name_en: "Please fill this field",
            name_ar: "Please fill this field"
        }
    });
});
</script>             