<section class="content-header">
    <h1>
    <?= h('Locations') ?>
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
        
        
        <div class="box">
  <div class="box-header">
    <h3 class="box-title"><?= h($location->id) ?></h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <table class="table table-condensed">
      <tbody>
        <tr>
          
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($location->id) ?></td>
        </tr>
        <tr>
          <th><?= __('Name') ?></th>
          <td><?= h($location->name) ?></td>
        </tr>
        <tr>
          <td>
          <?php echo $this->Html->link(__('Edit Location'), ['action' => 'edit', $location->id], ['class' => 'btn btn-info']); ?>
          </td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>

        
        
        
        </div>
    </div>
</section>       