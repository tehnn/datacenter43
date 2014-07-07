<?php

/**
 * This is the model class for table "cuploadstat".
 *
 * The followings are the available columns in table 'cuploadstat':
 * @property integer $id
 * @property string $ip
 * @property string $user
 * @property string $amp
 * @property string $hospcode
 * @property string $up_time
 * @property string $filename
 * @property string $accident
 * @property string $address
 * @property string $admission
 * @property string $anc
 * @property string $appointment
 * @property string $card
 * @property string $charge_ipd
 * @property string $charge_opd
 * @property string $chronic
 * @property string $chronicfu
 * @property string $community_activity
 * @property string $community_service
 * @property string $death
 * @property string $dental
 * @property string $diagnosis_ipd
 * @property string $diagnosis_opd
 * @property string $disability
 * @property string $drug_ipd
 * @property string $drug_opd
 * @property string $drugallergy
 * @property string $epi
 * @property string $fp
 * @property string $functional
 * @property string $home
 * @property string $icf
 * @property string $labfu
 * @property string $labor
 * @property string $ncdscreen
 * @property string $newborn
 * @property string $newborncare
 * @property string $nutrition
 * @property string $person
 * @property string $postnatal
 * @property string $prenatal
 * @property string $procedure_ipd
 * @property string $procedure_opd
 * @property string $provider
 * @property string $rehabilitation
 * @property string $service
 * @property string $specialpp
 * @property string $surveillance
 * @property string $village
 * @property string $women
 */
class Cuploadstat extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'cuploadstat';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('ip, user, amp, hospcode, up_time, filename, accident, address, admission, anc, appointment, card, charge_ipd, charge_opd, chronic, chronicfu, community_activity, community_service, death, dental, diagnosis_ipd, diagnosis_opd, disability, drug_ipd, drug_opd, drugallergy, epi, fp, functional, home, icf, labfu, labor, ncdscreen, newborn, newborncare, nutrition, person, postnatal, prenatal, procedure_ipd, procedure_opd, provider, rehabilitation, service, specialpp, surveillance, village, women', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, ip, user, amp, hospcode, up_time, filename, accident, address, admission, anc, appointment, card, charge_ipd, charge_opd, chronic, chronicfu, community_activity, community_service, death, dental, diagnosis_ipd, diagnosis_opd, disability, drug_ipd, drug_opd, drugallergy, epi, fp, functional, home, icf, labfu, labor, ncdscreen, newborn, newborncare, nutrition, person, postnatal, prenatal, procedure_ipd, procedure_opd, provider, rehabilitation, service, specialpp, surveillance, village, women', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'ip' => 'Ip',
            'user' => 'User',
            'amp' => 'Amp',
            'hospcode' => 'Hospcode',
            'up_time' => 'Up Time',
            'filename' => 'Filename',
            'accident' => 'Accident',
            'address' => 'Address',
            'admission' => 'Admission',
            'anc' => 'Anc',
            'appointment' => 'Appointment',
            'card' => 'Card',
            'charge_ipd' => 'Charge Ipd',
            'charge_opd' => 'Charge Opd',
            'chronic' => 'Chronic',
            'chronicfu' => 'Chronicfu',
            'community_activity' => 'Community Activity',
            'community_service' => 'Community Service',
            'death' => 'Death',
            'dental' => 'Dental',
            'diagnosis_ipd' => 'Diagnosis Ipd',
            'diagnosis_opd' => 'Diagnosis Opd',
            'disability' => 'Disability',
            'drug_ipd' => 'Drug Ipd',
            'drug_opd' => 'Drug Opd',
            'drugallergy' => 'Drugallergy',
            'epi' => 'Epi',
            'fp' => 'Fp',
            'functional' => 'Functional',
            'home' => 'Home',
            'icf' => 'Icf',
            'labfu' => 'Labfu',
            'labor' => 'Labor',
            'ncdscreen' => 'Ncdscreen',
            'newborn' => 'Newborn',
            'newborncare' => 'Newborncare',
            'nutrition' => 'Nutrition',
            'person' => 'Person',
            'postnatal' => 'Postnatal',
            'prenatal' => 'Prenatal',
            'procedure_ipd' => 'Procedure Ipd',
            'procedure_opd' => 'Procedure Opd',
            'provider' => 'Provider',
            'rehabilitation' => 'Rehabilitation',
            'service' => 'Service',
            'specialpp' => 'Specialpp',
            'surveillance' => 'Surveillance',
            'village' => 'Village',
            'women' => 'Women',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('ip', $this->ip, true);
        $criteria->compare('user', $this->user, true);
        $criteria->compare('amp', $this->amp, true);
        $criteria->compare('hospcode', $this->hospcode, true);
        $criteria->compare('up_time', $this->up_time, true);
        $criteria->compare('filename', $this->filename, true);
        $criteria->compare('accident', $this->accident, true);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('admission', $this->admission, true);
        $criteria->compare('anc', $this->anc, true);
        $criteria->compare('appointment', $this->appointment, true);
        $criteria->compare('card', $this->card, true);
        $criteria->compare('charge_ipd', $this->charge_ipd, true);
        $criteria->compare('charge_opd', $this->charge_opd, true);
        $criteria->compare('chronic', $this->chronic, true);
        $criteria->compare('chronicfu', $this->chronicfu, true);
        $criteria->compare('community_activity', $this->community_activity, true);
        $criteria->compare('community_service', $this->community_service, true);
        $criteria->compare('death', $this->death, true);
        $criteria->compare('dental', $this->dental, true);
        $criteria->compare('diagnosis_ipd', $this->diagnosis_ipd, true);
        $criteria->compare('diagnosis_opd', $this->diagnosis_opd, true);
        $criteria->compare('disability', $this->disability, true);
        $criteria->compare('drug_ipd', $this->drug_ipd, true);
        $criteria->compare('drug_opd', $this->drug_opd, true);
        $criteria->compare('drugallergy', $this->drugallergy, true);
        $criteria->compare('epi', $this->epi, true);
        $criteria->compare('fp', $this->fp, true);
        $criteria->compare('functional', $this->functional, true);
        $criteria->compare('home', $this->home, true);
        $criteria->compare('icf', $this->icf, true);
        $criteria->compare('labfu', $this->labfu, true);
        $criteria->compare('labor', $this->labor, true);
        $criteria->compare('ncdscreen', $this->ncdscreen, true);
        $criteria->compare('newborn', $this->newborn, true);
        $criteria->compare('newborncare', $this->newborncare, true);
        $criteria->compare('nutrition', $this->nutrition, true);
        $criteria->compare('person', $this->person, true);
        $criteria->compare('postnatal', $this->postnatal, true);
        $criteria->compare('prenatal', $this->prenatal, true);
        $criteria->compare('procedure_ipd', $this->procedure_ipd, true);
        $criteria->compare('procedure_opd', $this->procedure_opd, true);
        $criteria->compare('provider', $this->provider, true);
        $criteria->compare('rehabilitation', $this->rehabilitation, true);
        $criteria->compare('service', $this->service, true);
        $criteria->compare('specialpp', $this->specialpp, true);
        $criteria->compare('surveillance', $this->surveillance, true);
        $criteria->compare('village', $this->village, true);
        $criteria->compare('women', $this->women, true);
        //$criteria->order='id DESC';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array('pageSize' => 15,),
            'sort' => array(
                'defaultOrder' => 'id DESC'
            )
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Cuploadstat the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
