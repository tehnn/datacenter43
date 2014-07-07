<?php

/**
 * This is the model class for table "gis_center_amp".
 *
 * The followings are the available columns in table 'gis_center_amp':
 * @property integer $id
 * @property string $X
 * @property string $Y
 * @property string $POLYTYPE
 * @property string $PROV_CODE
 * @property string $AMP_CODE
 * @property string $PROV_NAMT
 * @property string $PROV_NAME
 * @property string $AMP_NAMT
 * @property string $AMP_NAME
 * @property integer $KPI
 */
class GisCenterAmp extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gis_center_amp';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('KPI', 'numerical', 'integerOnly'=>true),
			array('X, Y, POLYTYPE, PROV_CODE, AMP_CODE, PROV_NAMT, PROV_NAME, AMP_NAMT, AMP_NAME', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, X, Y, POLYTYPE, PROV_CODE, AMP_CODE, PROV_NAMT, PROV_NAME, AMP_NAMT, AMP_NAME, KPI', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'X' => 'X',
			'Y' => 'Y',
			'POLYTYPE' => 'Polytype',
			'PROV_CODE' => 'Prov Code',
			'AMP_CODE' => 'Amp Code',
			'PROV_NAMT' => 'Prov Namt',
			'PROV_NAME' => 'Prov Name',
			'AMP_NAMT' => 'Amp Namt',
			'AMP_NAME' => 'Amp Name',
			'KPI' => 'Kpi',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('X',$this->X,true);
		$criteria->compare('Y',$this->Y,true);
		$criteria->compare('POLYTYPE',$this->POLYTYPE,true);
		$criteria->compare('PROV_CODE',$this->PROV_CODE,true);
		$criteria->compare('AMP_CODE',$this->AMP_CODE,true);
		$criteria->compare('PROV_NAMT',$this->PROV_NAMT,true);
		$criteria->compare('PROV_NAME',$this->PROV_NAME,true);
		$criteria->compare('AMP_NAMT',$this->AMP_NAMT,true);
		$criteria->compare('AMP_NAME',$this->AMP_NAME,true);
		$criteria->compare('KPI',$this->KPI);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GisCenterAmp the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
