<?php

class AppController extends Controller {

    public function actionUpload() {
        $info = '';
        $info2 = array();
        $rows = array();
        $hos = array();

        //$dir = '../../upload';
        $dir = 'upload'; //โฟร์เดอร์ upload อยู่ระดับเดียวกับ proteced  
        
        if (count($_FILES) > 0) { // ถ้ามีการ เลือกไฟล์  
            $file = CUploadedFile::getInstancesByName('Upload');
            foreach ($file as $f) {
                //$model_file = new CFile();
                $info = "อัพโหลด " . $f->name . " ขนาด " . intval($f->size / 1000000) . "MB สำเร็จ!!";   // ส่งชื่อไฟล์ไปที่ view   
                $new_name = iconv('UTF-8', 'TIS-620', $f->getName()); // iconv แก้ปัญหาเรื่องไฟล์มีชื่อภาษาไทย
                $newfile = $dir . "/" . $new_name;
                if ($f->saveAs($newfile)) {
                   
             
                    $zip = new ZipArchive;
                    if ($zip->open($newfile) === TRUE) {
                        $p = pathinfo($newfile);
                        $folder = $p['filename'];
                        //$ext = $pi['extension'];
                        $new_dir = "$dir/$folder/";
                        $zip->extractTo($new_dir);
                        if ($zip->close()) {
                            unlink($newfile);
                        }
                    }

                    if ($dh = opendir($new_dir)) {
                     
                        $model = new Cuploadstat;
                        $hospcode = explode("_", $folder);
                        $hos['hospcode'] = $hospcode[1];
                        $model->hospcode = $hos['hospcode'];
                        
                        $hos['up_time'] = date('Y-m-d H:i:s');
                        $model->up_time = $hos['up_time'];
                        $uptime=$hos['up_time'];
                        
                        $hos['filename'] = $new_name;
                        $model->filename = $new_name;
                        $model->ip = CHttpRequest::getUserHostAddress();
                        $model->user = Yii::app()->User->id;
                        $model->amp = Yii::app()->user->getState('amp');

                        while (($file = readdir($dh)) !== false) {
                            if ($file !== "." and $file !== "..") {
                                $info2[] = $file;
                                $p = pathinfo($file);
                                $f = $p['filename'];
                                $f = strtolower($f);
                                $sql = "LOAD DATA LOCAL INFILE '$new_dir$file'";
                                $sql.= " REPLACE INTO TABLE $f";
                                $sql.= " FIELDS TERMINATED BY '|'  LINES TERMINATED BY '\r\n' IGNORE 1 LINES";
                                $sql.=" SET FLAG1='$new_name',FLAG2='$uptime'";

                                $rows[$f] = Yii::app()->db->createCommand($sql)->execute();
                            }
                        }
                        
                        // จำนวนที่ insert ได้
                        

                        $model->accident = $rows['accident'];

                        $model->address = $rows['address'];

                        $model->admission = $rows['admission'];

                        $model->anc = $rows['anc'];

                        $model->appointment = $rows['appointment'];

                        $model->card = $rows['card'];

                        $model->charge_ipd = $rows['charge_ipd'];

                        if (isset($rows['charge_opd'])) {
                            $model->charge_opd = $rows['charge_opd'];
                        }

                        $model->chronic = $rows['chronic'];
                        $model->chronicfu = $rows['chronicfu'];
                        $model->community_activity = $rows['community_activity'];
                        $model->community_service = $rows['community_service'];
                        $model->death = $rows['death'];
                        $model->dental = $rows['dental'];
                        $model->diagnosis_ipd = $rows['diagnosis_ipd'];
                        $model->diagnosis_opd = $rows['diagnosis_opd'];
                        $model->disability = $rows['disability'];
                        $model->drug_ipd = $rows['drug_ipd'];
                        $model->drug_opd = $rows['drug_opd'];
                        $model->drugallergy = $rows['drugallergy'];
                        $model->epi = $rows['epi'];
                        $model->fp = $rows['fp'];
                        $model->functional = $rows['functional'];
                        $model->home = $rows['home'];
                        $model->icf = $rows['icf'];
                        $model->labfu = $rows['labfu'];
                        $model->labor = $rows['labor'];
                        $model->ncdscreen = $rows['ncdscreen'];
                        $model->newborn = $rows['newborn'];
                        $model->newborncare = $rows['newborncare'];
                        $model->nutrition = $rows['nutrition'];

                        if (isset($rows['person'])) {
                            $model->person = $rows['person'];
                        }
                        $model->postnatal = $rows['postnatal'];
                        $model->prenatal = $rows['prenatal'];
                        $model->procedure_ipd = $rows['procedure_ipd'];
                        $model->procedure_opd = $rows['procedure_opd'];
                        $model->provider = $rows['provider'];
                        $model->rehabilitation = $rows['rehabilitation'];
                        $model->service = $rows['service'];
                        $model->specialpp = $rows['specialpp'];
                        $model->surveillance = $rows['surveillance'];
                        $model->village = $rows['village'];
                        $model->women = $rows['women'];

                        //end จำนวนที่ insert
                        
                        $model->save();

                        closedir($dh);
                    }
                }
            }//..end foreach            
        }
        $this->render('upload', array(
            'info' => $info,
            //'info2' => $info2,
            'rows' => $rows,
            'hos' => $hos,
        ));
        
        
    }

    public function accessRules() {
        return array(
            
            array('allow', // allow authenticated user 
                'actions' => array('upload'),
                'users' => array('@'),
            ),
            array('allow', // allow only admin 
                'actions' => array('manage'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function filters() {
        return array(
            'accessControl',
        );
    }

}
