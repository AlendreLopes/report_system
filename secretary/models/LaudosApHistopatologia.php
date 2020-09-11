<?php

namespace secretary\models;

use Yii;
use app\models\User;
use app\modules\secretaria\models\Protocolos;

use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\behaviors\AttributesBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "laudos_ap_histopatologia".
 *
 * @property int $id
 * @property int $user_id
 * @property int $protocolos_id
 * @property string|null $amostra
 * @property string|null $exame
 * @property string|null $conclusao
 * @property string $concluido
 */
class LaudosApHistopatologia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'laudos_ap_histopatologia';
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
                    ActiveRecord::EVENT_BEFORE_INSERT => 'user_id'
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
            [['amostra', 'exame', 'conclusao'], 'required'],
            [['user_id', 'protocolos_id'], 'integer'],
            [['amostra', 'exame', 'conclusao'], 'string'],
            [['concluido'], 'safe'],
            [['protocolos_id'], 'unique'],
            [['protocolos_id'], 'exist', 'skipOnError' => true, 'targetClass' => Protocolos::className(), 'targetAttribute' => ['protocolos_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'protocolos_id' => 'Protocolos',
            'amostra' => 'Amostra',
            'exame' => 'Descrição',
            'conclusao' => 'Resultado',
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
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
