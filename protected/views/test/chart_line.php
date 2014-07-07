<?php
$this->widget('booster.widgets.TbHighCharts', array(
    'options' => array(
        'credits' => array('enabled' => false),
        'chart' => array(
            'type' => 'line'
        ),
        'xAxis' => array(
            'categories' => array('01', '02', '03', '04', '05'),
        ),
        'yAxis' => array(
            'title' => array('text' => 'ผู้ป่วย(ราย)'),
            'min' => 0
        ),
        'series' => array(
            array(
                'name' => 'เดือน',
                'data' => $data
            )
        )
    )));
?>
