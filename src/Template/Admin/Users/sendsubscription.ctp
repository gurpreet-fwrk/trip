<section class="content-header">
    <h1>
    Users
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit User</li>
    </ol>
</section>

<section class="content">
	<div class="row">
        <div class="col-xs-8">
        
        <?php echo $this->Flash->render(); ?>
        
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" id="sub-form">
              <div class="box-body">

                <div class="form-group">
                  <label for="exampleInputEmail1">Type</label>
                  <?php echo $this->Form->select('type', [
                    'traveler' => 'Travelers',
                    'local expert' => 'Local Expert'
                ], ['class' => 'form-control']);
                ?>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Content</label>
                  <?php echo $this->Form->control('content', ['type' => 'textarea', 'class' => 'form-control', 'label' => false, 'required']); ?>
                </div>          
              </div>
              <!-- /.box-body -->

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
	$("#sub-form").validate({
		rules: {
			first_name: "required",
			last_name: "required",
			phone: {
				required: true,
				digits: true
			},
			country: {
				required: true
			},
			gender: {
				required: true
			}
		},
		messages: {
			first_name: "Please enter your first name",
			last_name: "Please enter your last name",
			phone: "Please enter valid phone number",	
			country: "Please select country",
			gender: "Please select gender"
		}
	});
});

</script>      