<?php

namespace backend\models;

use Yii;
use common\models\User;
/**
 * This is the model class for table "laudos_menu_secundario".
 *
 * @property int $id
 * @property int $user_id
 * @property int $laudos_menu_primario_id
 * @property string $pagina
 * @property string $acao
 * @property string $titulo
 * @property string $valor
 * @property string|null $exibir
 *
 * @property User $user
 * @property LaudosMenuPrimario $laudosMenuPrimario
 */
class LaudosMenuSecundario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'laudos_menu_secundario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'laudos_menu_primario_id'], 'integer'],
            [['laudos_menu_primario_id', 'titulo'], 'required'],
            [['pagina'], 'string', 'max' => 100],
            [['acao'], 'string', 'max' => 45],
            [['titulo'], 'string', 'max' => 50],
            [['valor'], 'string', 'max' => 10],
            [['exibir'], 'string', 'max' => 1],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['laudos_menu_primario_id'], 'exist', 'skipOnError' => true, 'targetClass' => LaudosMenuPrimario::className(), 'targetAttribute' => ['laudos_menu_primario_id' => 'id']],
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
            'laudos_menu_primario_id' => 'Laudos Menu Primario ID',
            'pagina' => 'Pagina',
            'acao' => 'Acao',
            'titulo' => 'Titulo',
            'valor' => 'Valor',
            'exibir' => 'Exibir',
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
     * Gets query for [[LaudosMenuPrimario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLaudosMenuPrimario()
    {
        return $this->hasOne(LaudosMenuPrimario::className(), ['id' => 'laudos_menu_primario_id']);
    }
}
