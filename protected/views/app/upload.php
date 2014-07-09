<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="glyphicon glyphicon-folder-open" style="padding-right: 3px"></i>
            อัพโหลด 43 แฟ้ม
        </h3>
    </div>
    <div class="panel-body" >
        <form enctype="multipart/form-data"  method="post">


            <?php
            $this->widget('CMultiFileUpload', array(
                'name' => 'Upload',
                'accept' => 'zip,rar', // useful for verifying files
                'duplicate' => 'ชื่อไฟล์ซ้ำ!', // useful, i think
                'denied' => 'ไม่อนุญาตชนิดไฟล์', // useful, i think
                'max' => 1,
                'htmlOptions' => array('multiple' => 'multiple', 'size' => 255, 'class' => ''),
                
            ));
            ?>
            <br>

            <button type="submit" class="btn btn-success">
                <i class="glyphicon glyphicon-open" style="padding-right: 3px"></i> Upload
            </button>




        </form>

        <hr>

        <?php
        if (count($hos) > 0) {
            echo "สถานบริการ: $hos[hospcode] , ชื่อไฟล์: $hos[filename] , เวลาส่ง: $hos[up_time]";
        }
        ?>
        <?php if (count($rows) > 0): ?>
            <?php
            ksort($rows);
            $i = 0;
            ?>

            <table style="border: 1px #298dcd solid" width="100%">
                <tr><th>#</th><th>แฟ้ม</th><th>จำนวน(records)</th><tr>
                    <?php foreach ($rows as $key => $value): ?>
                    <tr>
                        <?php $i++; ?>
                        <td style="border: 1px #298dcd solid"><?php echo $i; ?></td>
                        <td style="border: 1px #298dcd solid"><?php echo $key; ?></td>
                        <td style="border: 1px #298dcd solid"><?php echo $value; ?></td>

                    </tr>
                <?php endforeach; ?>

            </table>
        <?php endif; ?>
    </div>
</div>


