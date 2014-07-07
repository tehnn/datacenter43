
<?php
$this->breadcrumbs = array(
    'รายการประวัติ',
);
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="glyphicon glyphicon-book" style="padding-right: 3px"></i>
            ประวัติการส่งข้อมูล
        </h3>
    </div>
    <div class="panel-body" align="center">

        <?php
        $this->widget(
              'booster.widgets.TbGridView', array(
               
            'dataProvider' => $model->search(),
            'filter' => $model,
            'type' => 'striped',
            'summaryText' => 'แสดงผล {start}-{end} จาก {count} แถว',
            'template' => "{summary}\n{pager}\n{items}\n",
            'columns' => array(
                'hospcode',
                'filename',
                'up_time',
                array(
                    'class' => 'booster.widgets.TbButtonColumn',
                    'template' => '{mBtn}',
                    'buttons' => array(
                        'mBtn' => array(
                            'url' => '$this->grid->controller->createUrl("/report/StatUploadHosp",array("id"=>$data->id))',
                            'label' => '<i class="glyphicon glyphicon-list-alt" style="padding-left:15px;padding-right:15px"></i>',
                            'options' => array(
                                'class' => 'btn btn-success',
                                'data-toggle' => '',
                                'title' => ''
                            )
                        )
                    )
                ),
            ),
        ));
        ?>

    </div>
</div>
