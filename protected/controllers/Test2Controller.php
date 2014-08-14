<?php

class Test2Controller extends Controller {
    
    public function actionUpload() {
        
        if (count($_FILES) > 0) {
            $file = CUploadedFile::getInstancesByName('Upload');
            foreach ($file as $f) {
                // iconv แก้ปัญหาเรื่องไฟล์ที่มีชื่อภาษาไทย 
                $filename = iconv('UTF-8', 'TIS-620', $f->getName());
                //สร้าง folder ชื่อ upload (chmod 777) ไว้ที่ระดับเดียวกับ protected
                $newfile = "upload/" . $filename;
                // save file ลง folder
                if ($f->saveAs($newfile)) {  // เมื่อ upload สำเร็จ                     
                    // $model = new Model;   
                    // $model->filname = filename; 
                    // $model->date_upload = date_upload;
                    // $model->save;
                }
            }
        }
        $this->render('v_upload');
    }
    
    
    public function actionConfirmForm(){
        if(!empty($_POST[email])){
            $data=$_POST[email];
            
        }
        $this->render('v_cform');
    }
    
    

}
