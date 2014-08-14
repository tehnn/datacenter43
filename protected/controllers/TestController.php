<?php

class TestController extends Controller {

    public function actionCreatepdf() {


        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        spl_autoload_register(array('YiiBase', 'autoload'));

        // set document information
        $pdf->SetCreator(PDF_CREATOR);


        $pdf->SetTitle("อุเทน - 2014");
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "อุเทน - 2014", "selling report for Jun- 2013");
        $pdf->setHeaderFont(Array('freeserif', '', '16'));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->SetFont('freeserif', '', 12);
        $pdf->SetTextColor(80, 80, 80);
        $pdf->AddPage();

        //Write the html
        $html = "<div style='margin-bottom:15px;'>This is testing HTML.</div><br>";
        //Convert the Html to a pdf document
        $pdf->writeHTML($html, true, false, true, false, '');

        $header = array('Country', 'Capital', 'Area (sq km)', 'Pop. (thousands)'); 
        // data loading
        $data = $pdf->LoadData(Yii::getPathOfAlias('ext.tcpdf') . DIRECTORY_SEPARATOR . 'table_data_demo.txt');
        // print colored table
        $pdf->ColoredTable($header, $data);
        // reset pointer to the last page
        $pdf->lastPage();

        //Close and output PDF document
        $pdf->Output('filename.pdf', 'I'); // I= Preview , D=Download
        Yii::app()->end();
    }

    function actionPaginat() {
        $criteria = new CDbCriteria();
        $count = Hospital::model()->count($criteria);
        $pages = new CPagination($count);

        // results per page
        $pages->pageSize = 10;
        $pages->applyLimit($criteria);
        $model = Hospital::model()->findAll($criteria);

        $this->render('paginat', array(
            'model' => $model,
            'pages' => $pages
        ));
    }

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

}

