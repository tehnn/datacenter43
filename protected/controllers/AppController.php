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
                        $uptime = $hos['up_time'];

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

                        if (isset($rows['accident'])) {
                            $model->accident = $rows['accident'];
                        }

                        if (isset($rows['address'])) {
                            $model->address = $rows['address'];
                        }

                        if (isset($rows['admission'])) {
                            $model->admission = $rows['admission'];
                        }

                        if (isset($rows['anc'])) {
                            $model->anc = $rows['anc'];
                        }

                        if (isset($rows['appointment'])) {
                            $model->appointment = $rows['appointment'];
                        }

                        if (isset($rows['card'])) {
                            $model->card = $rows['card'];
                        }

                        if (isset($rows['charge_ipd'])) {
                            $model->charge_ipd = $rows['charge_ipd'];
                        }


                        if (isset($rows['charge_opd'])) {
                            $model->charge_opd = $rows['charge_opd'];
                        }

                        if (isset($rows['chronic'])) {
                            $model->chronic = $rows['chronic'];
                        }

                        if (isset($rows['chronicfu'])) {
                            $model->chronicfu = $rows['chronicfu'];
                        }

                        if (isset($rows['community_activity'])) {
                            $model->community_activity = $rows['community_activity'];
                        }

                        if (isset($rows['community_service'])) {
                            $model->community_service = $rows['community_service'];
                        }

                        if (isset($rows['death'])) {
                            $model->death = $rows['death'];
                        }

                        if (isset($rows['dental'])) {
                            $model->dental = $rows['dental'];
                        }

                        if (isset($rows['diagnosis_ipd'])) {
                            $model->diagnosis_ipd = $rows['diagnosis_ipd'];
                        }

                        if (isset($rows['diagnosis_opd'])) {
                            $model->diagnosis_opd = $rows['diagnosis_opd'];
                        }

                        if (isset($rows['disability'])) {
                            $model->disability = $rows['disability'];
                        }

                        if (isset($rows['drug_ipd'])) {
                            $model->drug_ipd = $rows['drug_ipd'];
                        }

                        if (isset($rows['drug_opd'])) {
                            $model->drug_opd = $rows['drug_opd'];
                        }

                        if (isset($rows['drugallergy'])) {
                            $model->drugallergy = $rows['drugallergy'];
                        }

                        if (isset($rows['epi'])) {
                            $model->epi = $rows['epi'];
                        }

                        if (isset($rows['fp'])) {
                            $model->fp = $rows['fp'];
                        }

                        if (isset($rows['functional'])) {
                            $model->functional = $rows['functional'];
                        }

                        if (isset($rows['home'])) {
                            $model->home = $rows['home'];
                        }

                        if (isset($rows['icf'])) {
                            $model->icf = $rows['icf'];
                        }

                        if (isset($rows['labfu'])) {
                            $model->labfu = $rows['labfu'];
                        }

                        if (isset($rows['labor'])) {
                            $model->labor = $rows['labor'];
                        }

                        if (isset($rows['ncdscreen'])) {
                            $model->ncdscreen = $rows['ncdscreen'];
                        }

                        if (isset($rows['newborn'])) {
                            $model->newborn = $rows['newborn'];
                        }

                        if (isset($rows['newborncare'])) {
                            $model->newborncare = $rows['newborncare'];
                        }

                        if (isset($rows['nutrition'])) {
                            $model->nutrition = $rows['nutrition'];
                        }


                        if (isset($rows['person'])) {
                            $model->person = $rows['person'];
                        }

                        if (isset($rows['postnatal'])) {
                            $model->postnatal = $rows['postnatal'];
                        }

                        if (isset($rows['prenatal'])) {
                            $model->prenatal = $rows['prenatal'];
                        }

                        if (isset($rows['procedure_ipd'])) {
                            $model->procedure_ipd = $rows['procedure_ipd'];
                        }

                        if (isset($rows['procedure_opd'])) {
                            $model->procedure_opd = $rows['procedure_opd'];
                        }

                        if (isset($rows['provider'])) {
                            $model->provider = $rows['provider'];
                        }

                        if (isset($rows['rehabilitation'])) {
                            $model->rehabilitation = $rows['rehabilitation'];
                        }

                        if (isset($rows['service'])) {
                            $model->service = $rows['service'];
                        }

                        if (isset($rows['specialpp'])) {
                            $model->specialpp = $rows['specialpp'];
                        }

                        if (isset($rows['surveillance'])) {
                            $model->surveillance = $rows['surveillance'];
                        }

                        if (isset($rows['village'])) {
                            $model->village = $rows['village'];
                        }

                        if (isset($rows['women'])) {
                            $model->women = $rows['women'];
                        }


                        //end จำนวนที่ insert แจ๊ค

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
