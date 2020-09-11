<?php

namespace secretary\models;

use Yii;
use app\models\User;
use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "especies_racas".
 *
 * @property int $id
 * @property int $user_id
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
            [['especie_id', 'titulo'], 'required'],
            [['created_by', 'especie_id'], 'integer'],
            [['titulo'], 'string', 'max' => 100],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
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
            'created_by' => 'User ID',
            'especie_id' => 'Especie ID',
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

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
}
