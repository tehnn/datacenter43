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
    public function actionTest3(){
        
        $this->render('test3',array(
            
        ));
    }

}

