<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "program".
 *
 * @property int $id
 * @property string $program
 * @property string $tgl_program
 * @property int $rawat_jalan_id
 *
 * @property RawatJalan $rawatJalan
 */
class Program extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'program';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['program', 'tgl_program'], 'required'],
            [['tgl_program'], 'safe'],
            [['rawat_jalan_id'], 'integer'],
            [['program'], 'string', 'max' => 250],
            [['rawat_jalan_id'], 'exist', 'skipOnError' => true, 'targetClass' => RawatJalan::class, 'targetAttribute' => ['rawat_jalan_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'program' => 'Program',
            'tgl_program' => 'Tgl Program',
            'rawat_jalan_id' => 'Rawat Jalan ID',
        ];
    }

    /**
     * Gets query for [[RawatJalan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRawatJalan()
    {
        return $this->hasOne(RawatJalan::class, ['id' => 'rawat_jalan_id']);
    }
}
