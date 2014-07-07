<?php
class Tehnupload extends CActiveRecord {
    

    public function tableName() {
        return 'tehnn_upload';
    }
  
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
}
?>
