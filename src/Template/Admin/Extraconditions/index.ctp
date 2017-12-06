<section class="content-header">
    <h1>
    <?= __('Extra Conditions') ?>  <?php echo $this->Html->link(__('Add Extra Condition'), ['action' => 'add'], ['class' => 'btn btn-warning']); ?>
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i><?= __('Dashboard') ?></a></li>
        <li class="active"><?= __('Extra Conditions') ?></li>
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
                <th><?= $this->Paginator->sort('title_en', 'Title (EN)') ?></th>
                <th><?= $this->Paginator->sort('title', 'Title (AR)') ?></th>
                <th><?= $this->Paginator->sort('icon') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($extraconditions as $extracondition): ?>
            <tr>
                <td><?= $this->Number->format($extracondition->id) ?></td>
                <td><?= h($extracondition->title_en) ?></td>
                <td><?= h($extracondition->title_ar) ?></td>
                <td>
                    <?php if($extracondition->icon != ''){ ?>
                    <img src="<?php echo $this->request->webroot.'images/uploads/'.$extracondition->icon ?>" style="width: 80px; margin-top: 20px;">
                    <?php }else{ ?>
                    <img src="<?php echo $this->request->webroot.'images/website/no-image.png' ?>" style="width: 80px; margin-top: 20px;">
                    <?php } ?>
                </td>
                <td><?= h($extracondition->created) ?></td>
                <td><?= h($extracondition->modified) ?></td>
                <td>
                    <?php echo $this->Html->link(
                        '<span class="fa fa-eye"></span><span class="sr-only">' . __('View') . '</span>',
                        ['action' => 'view', $extracondition->id],
                        ['escape' => false, 'title' => __('View'), 'class' => 'btn btn-info']
                    )
                    ?>
                    <?php echo $this->Html->link(
                        '<span class="fa fa-pencil"></span><span class="sr-only">' . __('Edit') . '</span>',
                        ['action' => 'edit', $extracondition->id],
                        ['escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-success']
                        )
                    ?>
                    <?php echo $this->Form->postLink(
                    '<span class="fa fa-trash"></span><span class="sr-only">' . __('Delete') . '</span>',
                     ['action' => 'delete', $extracondition->id],
                     ['confirm' => __('Are you sure you want to delete # {0}?', $extracondition->id), 'class' => 'btn btn-danger', 'escape' => false, 'title' => 'Delete']) ?>
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