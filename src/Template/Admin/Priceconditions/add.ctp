<?php
/**
  * @var \App\View\AppView $this
  */
?>

<section class="content-header">
    <h1>
    Price Conditions
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Price Condition</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add Price Condition</h3>
                <?= $this->Form->create($pricecondition, ['id' => 'pricecondition-form', 'enctype' => 'multipart/form-data']) ?>
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
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Price</label>
                        <?php echo $this->Form->control('price', ['class' => 'form-control', 'label' => false]); ?>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Price Content</label>
                        <?php echo $this->Form->control('price_content_en', ['class' => 'form-control', 'label' => false]); ?>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Price Content (AR)</label>
                        <?php echo $this->Form->control('price_content_ar', ['class' => 'form-control', 'label' => false, 'dir' => 'rtl']); ?>
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
        $("#pricecondition-form").validate({
            rules: {
                title_en: "required",
                title_ar: "required",
                content_en: "required",
                content_ar: "required",
                price: "required",
                price_content_en: "required",
                price_content_ar: "required"
            },
            messages: {
                title_en: "This field is required.",
                title_ar: "This field is required.",
                content_en: "This field is required",
                content_ar: "This field is required",
                price: "Price is required",
                price_content_en: "This field is required",
                price_content_ar: "This field is required"
            }
        });
    });
</script>