<div style=" overflow-x: scroll ">
    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'summaryText' => 'แสดงผล {start}-{end} จาก {count} แถว',
        'template' => "{summary}\n{pager}\n{items}\n",
        'dataProvider' => $model,
    ));
    ?>
</div>

