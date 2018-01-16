<section class="content-header">
    <h1>
    Meeting Points
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
                    <h3 class="box-title"><?= h($meetingpoint->title) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tbody>
                            <tr>
                                <th><?= __('Location') ?></th>
                                <td><?= $meetingpoint->has('location') ? $this->Html->link($meetingpoint->location->name_en, ['controller' => 'Locations', 'action' => 'view', $meetingpoint->location->id]) : '' ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Meeting Point Type') ?></th>
                                <td><?= $meetingpoint->has('meetingpointtype') ? $this->Html->link($meetingpoint->meetingpointtype->title_en, ['controller' => 'Meetingpointtypes', 'action' => 'view', $meetingpoint->meetingpointtype->id]) : '' ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <td><?= $this->Number->format($meetingpoint->id) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Meeting Point (EN)') ?></th>
                                <td><?= h($meetingpoint->title_en) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Meeting Point (AR)') ?></th>
                                <td><?= h($meetingpoint->title_ar) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Created') ?></th>
                                <td><?= h($meetingpoint->created) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Modified') ?></th>
                                <td><?= h($meetingpoint->modified) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>       