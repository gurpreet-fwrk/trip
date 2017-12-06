<section class="content-header">
    <h1>
    <?= __('Meeting Point Types') ?>  <?php echo $this->Html->link(__('Add Meeting Point Type'), ['action' => 'add'], ['class' => 'btn btn-warning']); ?>
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i><?= __('Dashboard') ?></a></li>
        <li class="active"><?= __('Meeting Point Types') ?></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
        
        <?= $this->Flash->render() ?>
        
        <div class="box">
            <!--<div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
            </div>-->
            <!-- /.box-header -->
            <div class="box-body">
    <table id="example2" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('location_id') ?></th>
                <th><?= $this->Paginator->sort('title', 'Meeting Point Type (EN)') ?></th>
                <th><?= $this->Paginator->sort('title', 'Meeting Point Type (AR)') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($meetingpointtypes as $meetingpointtype): ?>
            <tr>
                <td><?= $this->Number->format($meetingpointtype->id) ?></td>
                <td><?= $meetingpointtype->has('location') ? $this->Html->link($meetingpointtype->location->name_en, ['controller' => 'Locations', 'action' => 'view', $meetingpointtype->location->id]) : '' ?></td>
                <td><?= h($meetingpointtype->title_en) ?></td>
                <td><?= h($meetingpointtype->title_ar) ?></td>
                <td><?= h($meetingpointtype->created) ?></td>
                <td><?= h($meetingpointtype->modified) ?></td>
                <td>
                    <?php echo $this->Html->link(
                        '<span class="fa fa-eye"></span><span class="sr-only">' . __('View') . '</span>',
                        ['action' => 'view', $meetingpointtype->id],
                        ['escape' => false, 'title' => __('View'), 'class' => 'btn btn-info']
                    )
                    ?>
                    <?php echo $this->Html->link(
                        '<span class="fa fa-pencil"></span><span class="sr-only">' . __('Edit') . '</span>',
                        ['action' => 'edit', $meetingpointtype->id],
                        ['escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-success']
                        )
                    ?>
                    <?php echo $this->Form->postLink(
                    '<span class="fa fa-trash"></span><span class="sr-only">' . __('Delete') . '</span>',
                     ['action' => 'delete', $meetingpointtype->id],
                     ['confirm' => __('Are you sure you want to delete # {0}?', $meetingpointtype->id), 'class' => 'btn btn-danger', 'escape' => false, 'title' => 'Delete']) ?>
                </td>                
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
            <!-- /.box-body -->
          </div>
        
        
        
        </div>
    </div>
</section>  