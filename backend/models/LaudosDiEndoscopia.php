<?php

namespace backend\models;

use Yii;
use common\models\User;
use backend\models\Protocolos;

use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\behaviors\AttributesBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "laudos_di_endoscopia".
 *
 * @property int $id
 * @property int $created_by
 * @property int $protocolos_id
 * @property string $local
 * @property string $comentario
 * @property string $interpretacao
 * @property string $conclusao
 * @property string $concluido
 *
 * @property Protocolos $protocolos
 * @property User $user
 */
class LaudosDiEndoscopia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'laudos_di_endoscopia';
    }

    public function behaviors()
    {
        return [
            [
                'class' => AttributesBehavior::className(),
                'attributes' => [
                    'concluido' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => new Expression('NOW()'),
                    ],
                ],
            ],
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
            [['created_by', 'protocolos_id'], 'integer'],
            [['protocolos_id', 'local', 'comentario', 'interpretacao', 'conclusao'], 'required'],
            [['comentario', 'interpretacao', 'conclusao'], 'string'],
            [['concluido'], 'safe'],
            [['local'], 'string', 'max' => 50],
            [['protocolos_id'], 'unique'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['protocolos_id'], 'exist', 'skipOnError' => true, 'targetClass' => Protocolos::className(), 'targetAttribute' => ['protocolos_id' => 'id']],
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
            'protocolos_id' => 'Protocolos ID',
            'local' => 'Local',
            'comentario' => 'Comentario',
            'interpretacao' => 'Interpretacao',
            'conclusao' => 'Conclusao',
            'concluido' => 'Concluido',
        ];
    }

    /**
     * Gets query for [[Protocolos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProtocolos()
    {
        return $this->hasOne(Protocolos::className(), ['id' => 'protocolos_id']);
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
