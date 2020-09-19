<?php

namespace agreements\models;

use Yii;
use common\models\User;
use agreements\models\Protocolos;
//
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\behaviors\AttributesBehavior;
use yii\behaviors\BlameableBehavior;
/**
 * This is the model class for table "laudos_ap_necropsia".
 *
 * @property int $id
 * @property int $protocolos_id
 * @property string|null $amostra
 * @property string|null $exame
 * @property string|null $conclusao
 * @property string $concluido
 * @property int $created_by
 *
 * @property User $createdBy
 */
class LaudosApNecropsia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'laudos_ap_necropsia';
    }
    /**
     * {@inheritdoc}
     */
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
            [['protocolos_id', 'concluido'], 'required'],
            [['protocolos_id', 'created_by'], 'integer'],
            [['amostra', 'exame', 'conclusao'], 'string'],
            [['concluido'], 'safe'],
            [['protocolos_id'], 'unique'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'protocolos_id' => 'Protocolos ID',
            'amostra' => 'Amostra',
            'exame' => 'Exame',
            'conclusao' => 'Descrição',
            'concluido' => 'Concluido',
            'created_by' => 'Usuário',
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
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
}
