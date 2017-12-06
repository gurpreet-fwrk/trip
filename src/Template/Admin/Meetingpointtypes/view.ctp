<section class="content-header">
    <h1>
    Meeting Point Types
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
                    <h3 class="box-title"><?= h($meetingpointtype->title) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tbody>
                            <tr>
                                <th><?= __('Location') ?></th>
                                <td><?= $meetingpointtype->has('location') ? $this->Html->link($meetingpointtype->location->name_en, ['controller' => 'Locations', 'action' => 'view', $meetingpointtype->location->id]) : '' ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <td><?= $this->Number->format($meetingpointtype->id) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Meeting Point Type (EN)') ?></th>
                                <td><?= h($meetingpointtype->title_en) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Meeting Point Type (AR)') ?></th>
                                <td><?= h($meetingpointtype->title_ar) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Created') ?></th>
                                <td><?= h($meetingpointtype->created) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Modified') ?></th>
                                <td><?= h($meetingpointtype->modified) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>       