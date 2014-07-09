<form enctype="multipart/form-data"  method="post">
    <?php
    $this->widget('CMultiFileUpload', array(
        'name' => 'Upload',
        'accept' => 'pdf,doc,docx,zip,rar', // ชนิดไฟล์ที่อนุญาต
        'duplicate' => 'ชื่อไฟล์ซ้ำ!', // แจ้งเตือน ไฟล์ซ้ำ
        'denied' => 'ไม่อนุญาตชนิดไฟล์', // แจ้งเตือน ชนิดไฟล?
        'max' => 10, // จำนวนไฟล์ที่เพิ่มได้สูงสุด
        'htmlOptions' => array('multiple' => 'multiple', 'size' => 255),
    ));
    ?>
    <br>

    <input type="submit" value="ตกลง">
</form>