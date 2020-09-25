<?php

namespace owners\models;

use Yii;
use owners\models\Protocolos;
use common\models\User;
/**
 * This is the model class for table "protocolos_laudos_solicitados".
 *
 * @property int $id
 * @property int $user_id
 * @property int $protocolo_id
 * @property string $exames
 * @property string $exames_titulos
 * @property string $isento Laudos Isentos
 * @property string $desconto Laudo sem Desconto
 * @property float $valores
 * @property string $data_cadastro
 *
 * @property User $user
 * @property Protocolos $protocolo
 */
class ProtocolosLaudosSolicitados extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'protocolos_laudos_solicitados';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'protocolo_id'], 'integer'],
            [['protocolo_id', 'exames', 'data_cadastro'], 'required'],
            [['isento', 'desconto'], 'string'],
            [['valores'], 'number'],
            [['data_cadastro'], 'safe'],
            [['exames'], 'string', 'max' => 150],
            [['exames_titulos'], 'string', 'max' => 250],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['protocolo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Protocolos::className(), 'targetAttribute' => ['protocolo_id' => 'id']],
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
            'protocolo_id' => 'Protocolo ID',
            'exames' => 'Exames',
            'exames_titulos' => 'Exames Titulos',
            'isento' => 'Isento',
            'desconto' => 'Desconto',
            'valores' => 'Valores',
            'data_cadastro' => 'Data Cadastro',
        ];
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

    /**
     * Gets query for [[Protocolo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProtocolo()
    {
        return $this->hasOne(Protocolos::className(), ['id' => 'protocolo_id']);
    }
}
