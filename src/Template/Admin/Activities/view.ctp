<section class="content-header">
    <h1>
    Activities
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
    <h3 class="box-title"><?= h($activity->title) ?></h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <table class="table table-condensed">
      <tbody>
        <tr>
          
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($activity->id) ?></td>
        </tr>
        <tr>
          <th><?= __('Category') ?></th>
          <td><?= $activity->has('activitycategory') ? $this->Html->link($activity->activitycategory->title, ['controller' => 'Activitycategories', 'action' => 'view', $activity->activitycategory->id]) : '' ?></td>
        </tr>
        <tr>
          <th><?= __('Title (English)') ?></th>
          <td><?= h($activity->title_en) ?></td>
        </tr>
        <tr>
          <th><?= __('Title (Arabic)') ?></th>
          <td><?= h($activity->title_ar) ?></td>
        </tr>
        <tr>
          <th><?= __('Created') ?></th>
          <td><?= h($activity->created) ?></td>
        </tr>
        <tr>
          <th><?= __('Modified') ?></th>
          <td><?= h($activity->modified) ?></td>
        </tr>
        
        </tr>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>

        
        
        
        </div>
    </div>
</section>       