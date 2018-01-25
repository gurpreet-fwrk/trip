<section class="content-header">
    <h1>
    Subscribers   <?= $this->Html->link(__('Send Message'), ['action' => 'sendsubscription'], ['class' => 'btn btn-warning']) ?>
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
    </ol>
</section>

<section class="content">
	<div class="row">
        <div class="col-xs-12">
        
        <?php echo $this->Flash->render(); ?>
        
        <div class="box">
            <!--<div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
            </div>-->
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Email</th>
                  <th>Type</th>
                  <th>Created</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($subscribers as $sub): ?>
                <tr>
                  <td><?php echo $sub['id']; ?></td>
                  <td><?php echo $sub['email']; ?></td>
                  <td><?php echo $sub['type']; ?></td>
                  <td><?php echo $sub['created']; ?></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Email</th>
                  <th>Type</th>
                  <th>Created</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        
        
        
        </div>
    </div>
</section>       