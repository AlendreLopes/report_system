<?php

namespace secretary\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "especies".
 *
 * @property int $id
 * @property int $user_id
 * @property string $titulo
 *
 * @property EspeciesRacas[] $especiesRacas
 * @property User $user
 */
class Especies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'especies';
    }
    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::className(), 
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'created_by'
                ],
            ]
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo'], 'required'],
            [['titulo'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
        ];
    }

    /**
     * Gets query for [[EspeciesRacas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEspeciesRacas()
    {
        return $this->hasMany(EspeciesRacas::className(), ['especie_id' => 'id']);
    }
}
