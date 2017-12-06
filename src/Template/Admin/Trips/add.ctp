<?php
/**
  * @var \App\View\AppView $this
  */
?>

<section class="content-header">
    <h1>
    Trips
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
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add Trip</h3>
                <?= $this->Form->create($trip, ['id' => 'trip-form', 'enctype' => 'multipart/form-data']) ?>
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <?php echo $this->Form->control('title', ['class' => 'form-control', 'label' => false]); ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>    
                        <?php echo $this->Form->control('description', ['class' => 'form-control', 'label' => false]); ?>
                    </div>    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Price</label> 
                        <?php echo $this->Form->control('price', ['class' => 'form-control', 'label' => false]); ?>
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputEmail1">Trip Date</label> 
                        <?php echo $this->Form->control('date', ['id' => 'datepicker', 'class' => 'form-control', 'label' => false]); ?>
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputEmail1">Time Taken By Trip</label> 
                        <?php echo $this->Form->control('time', ['class' => 'form-control', 'label' => false]); ?>
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
    $("#user-form").validate({
        rules: {
            title: "required",
            description: "required",
            price: "required"
        },
        messages: {
            title: "Please enter title",
            description: "Please enter decsription",
            price: "Please enter price"
        }
    });
});
$('#datepicker').datepicker({
  autoclose: true
})
</script>      

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/tinymce/4.1.6/tinymce.min.js"></script>
<script>
tinymce.init({
selector: 'textarea',
plugins: [
"code", "charmap", "link"
],
toolbar: [
"undo redo | styleselect | bold italic | link | alignleft aligncenter alignright | charmap code" | "media"
]
});
</script>         