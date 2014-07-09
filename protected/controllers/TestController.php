<?php

class TestController extends Controller {

    public function actionTest() {
        $criteria = new CDbCriteria();
        $criteria->condition = 'provcode="65" and hostype in ("03","04","05","06","07","08","09")';
        $criteria->order = 'distcode ASC';


        $dataProvider = new CActiveDataProvider(new Hospital(), array(
            'pagination' => array('pageSize' => 7),
            'criteria' => $criteria,
        ));
        $this->render('test', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionChartLine() {
        $data = array(10, 2, 13, 4, 15);

        $this->render('chart_line', array(
            'data' => $data
        ));
    }

    public function actionTest2() {

        $criteria = new CDbCriteria();
        $criteria->condition = 'provcode="65" and hostype in ("03","04","05","06","07","08","09")';
        $criteria->order = 'distcode ASC';


        $dataProvider = new CActiveDataProvider(new Hospital(), array(
            'pagination' => array('pageSize' => 8),
            'criteria' => $criteria,
        ));
        $this->render('test2', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionTest3() {

        $this->render('test3', array(
        ));
    }

    public function actionUpload() {
        $up_result = '';
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

}

