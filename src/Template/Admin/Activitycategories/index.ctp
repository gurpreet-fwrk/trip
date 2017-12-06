<section class="content-header">
    <h1>
    <?= __('Activity Categories') ?>  <?php echo $this->Html->link(__('Add Activity Category'), ['action' => 'add'], ['class' => 'btn btn-warning']); ?>
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i><?= __('Dashboard') ?></a></li>
        <li class="active"><?= __('Activity Categories') ?></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
        
        <?= $this->Flash->render() ?>
        
        <div class="box">
            <div class="box-body">
    <table id="example2" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('title', 'Title (English)') ?></th>
                <th><?= $this->Paginator->sort('title', 'Title (Arabic)') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($activitycategories as $activitycategory): ?>
            <tr>
                <td><?= $this->Number->format($activitycategory->id) ?></td>
                <td><?= h($activitycategory->title_en) ?></td>
                <td><?= h($activitycategory->title_ar) ?></td>
                <td><?= h($activitycategory->created) ?></td>
                <td><?= h($activitycategory->modified) ?></td>
                <td>
                    <?php echo $this->Html->link(
                        '<span class="fa fa-eye"></span><span class="sr-only">' . __('View') . '</span>',
                        ['action' => 'view', $activitycategory->id],
                        ['escape' => false, 'title' => __('View'), 'class' => 'btn btn-info']
                    )
                    ?>
                    <?php echo $this->Html->link(
                        '<span class="fa fa-pencil"></span><span class="sr-only">' . __('Edit') . '</span>',
                        ['action' => 'edit', $activitycategory->id],
                        ['escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-success']
                        )
                    ?>
                    <?php echo $this->Form->postLink(
                    '<span class="fa fa-trash"></span><span class="sr-only">' . __('Delete') . '</span>',
                     ['action' => 'delete', $activitycategory->id],
                     ['confirm' => __('Are you sure you want to delete # {0}?', $activitycategory->id), 'class' => 'btn btn-danger', 'escape' => false, 'title' => 'Delete']) ?>
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