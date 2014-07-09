<?php
$this->breadcrumbs = array(
    'รายการประวัติ'=>array('StatUpload'),
    'ประวัติการส่ง',
);
?>
<h3> รายละเอียด </h3>
<?php $data = $model->getData(); ?>
<div class="well well-small">
    <?php
    echo "รหัสสถานบริการ : ";
    echo $data[0]->hospcode;
    echo " ,เวลาส่งข้อมูล : ";
    echo $data[0]->up_time;
    echo " ,เลขไอพี : ";
    echo $data[0]->ip;
    ?>
</div>


<table class="table table-bordered table-striped table-hover table-responsive">
    <thead>
    <th>#</th>
    <th>แฟ้ม (<?php $fname=$data[0]->filename; echo $fname;?>)</th>
    <th>จำนวนข้อมูล(เรคอร์ด)</th>
</thead>
<tbody>


    <?php
    //CVarDumper::dump($data[0],100,true);
    $i = 0;
    ?>

    <?php foreach ($data[0] as $key => $value): ?>

        <?php if ($key !== 'id' and $key !== 'ip' and $key !== 'user' and $key !== 'amp' and $key !== 'hospcode' and $key !== 'up_time' and $key !== 'filename'): ?>
            <tr>
                <td><?php
                    $i++;
                    echo $i;
                    ?></td>
                <td><?php echo $key; ?></td>
                <td><?php echo CHtml::link($value,array('Report/OnlyFile','fname'=>$fname,'f'=>$key)); ?></td>
            </tr>
        <?php endif; ?>
    <?php endforeach; ?>
</tbody>
</table>

