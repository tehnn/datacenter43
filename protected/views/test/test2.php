<?php
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/mycss.css');
?>

<?php
$this->widget('booster.widgets.TbGridView', array(
    'dataProvider' => $dataProvider,
    'type' => 'striped bordered condensed',
     'summaryText' => 'แสดงผล {start}-{end} จาก {count} แถว',
    // 'template' => "\n{summary}{pager}\n{items}",
    'template' => "{summary}{pager}{items}",
));
