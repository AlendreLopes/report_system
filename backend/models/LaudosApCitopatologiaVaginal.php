<?php

namespace backend\models;

use Yii;
use common\models\User;
use backend\models\Protocolos;
//
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\behaviors\AttributesBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "laudos_ap_citopatologia_vaginal".
 *
 * @property int $id
 * @property int $created_by
 * @property int $protocolos_id
 * @property string|null $amostra
 * @property string|null $epiteliais_queratinizadas
 * @property string|null $epiteliais_queratinizadas_n
 * @property string|null $eritrocitos
 * @property string|null $bacterias
 * @property string|null $leucocitos
 * @property string|null $em_branco
 * @property string|null $em_branco_
 * @property string|null $diagnostico
 * @property string $concluido
 *
 * @property Protocolos $protocolos
 * @property User $user
 */
class LaudosApCitopatologiaVaginal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'laudos_ap_citopatologia_vaginal';
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
            [['created_by', 'protocolos_id', 'concluido'], 'required'],
            [['created_by', 'protocolos_id'], 'integer'],
            [['diagnostico'], 'string'],
            [['concluido'], 'safe'],
            [['amostra', 'epiteliais_queratinizadas', 'epiteliais_queratinizadas_n', 'eritrocitos', 'bacterias', 'leucocitos', 'em_branco', 'em_branco_'], 'string', 'max' => 150],
            [['protocolos_id'], 'unique'],
            [['protocolos_id'], 'exist', 'skipOnError' => true, 'targetClass' => Protocolos::className(), 'targetAttribute' => ['protocolos_id' => 'id']],
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
            'created_by' => 'User ID',
            'protocolos_id' => 'Protocolos ID',
            'amostra' => 'Amostra',
            'epiteliais_queratinizadas' => 'Epiteliais Queratinizadas',
            'epiteliais_queratinizadas_n' => 'Epiteliais Queratinizadas N',
            'eritrocitos' => 'Eritrocitos',
            'bacterias' => 'Bacterias',
            'leucocitos' => 'Leucocitos',
            'em_branco' => 'Em Branco',
            'em_branco_' => 'Em Branco',
            'diagnostico' => 'Diagnostico',
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
