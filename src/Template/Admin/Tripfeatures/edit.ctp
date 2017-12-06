<?php
/**
  * @var \App\View\AppView $this
  */
?>

<section class="content-header">
    <h1>
    Tripfeatures
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Tripfeatures</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Tripfeatures</h3>
                <?= $this->Form->create($tripfeature, ['id' => 'tripfeature-form', 'enctype' => 'multipart/form-data']) ?>
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <?php echo $this->Form->control('title', ['class' => 'form-control', 'label' => false]); ?>
                    </div>
                </div> 
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Added</label>
                        <?php echo $this->Form->control('date_added', ['class' => 'form-control', 'label' => false]); ?>
                    </div>
                </div> 
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Modified</label>
                        <?php echo $this->Form->control('date_modified', ['class' => 'form-control', 'label' => false]); ?>
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
    $("#tripfeature-form").validate({
        rules: {
            name: "required"
        },
        messages: {
            name: "Please enter name"
        }
    });
});
</script>             
