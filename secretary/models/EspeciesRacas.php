<?php

namespace secretary\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "especies_racas".
 *
 * @property int $id
 * @property int $especie_id
 * @property string $titulo
 *
 * @property Especies $especie
 * @property User $user
 */
class EspeciesRacas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'especies_racas';
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['especie_id', 'titulo'], 'required'],
            [['titulo'], 'string', 'max' => 100],
            [['especie_id'], 'exist', 'skipOnError' => true, 'targetClass' => Especies::className(), 'targetAttribute' => ['especie_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'especie_id' => 'Especie',
            'titulo' => 'Titulo',
        ];
    }

    /**
     * Gets query for [[Especie]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEspecie()
    {
        return $this->hasOne(Especies::className(), ['id' => 'especie_id']);
    }
}
