<?php
$this->widget('CLinkPager', array(
    'pages' => $pages,
));
?>
<div style="margin: 10px"></div>
<table class='table table-bordered table-striped'>
    <thead><th>code</th><th>ชื่อ</th></thead>
<tbody>
    <?php foreach ($model as $m): ?>
    
        <tr><td><?php echo $m->hospcode; ?></td><td><?php echo $m->hospname; ?></td></tr>

    <?php endforeach; ?>
</tbody>
</table>

