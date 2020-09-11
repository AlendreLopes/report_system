<?php

namespace backend\models;

use Yii;
use common\models\User;
/**
 * This is the model class for table "laudos_menu_primario".
 *
 * @property int $id
 * @property int $user_id
 * @property int $laudos_menu_id
 * @property string $pagina
 * @property string $acao
 * @property string $titulo
 * @property string $valor
 * @property string|null $exibir
 *
 * @property User $user
 * @property LaudosMenu $laudosMenu
 * @property LaudosMenuSecundario[] $laudosMenuSecundarios
 */
class LaudosMenuPrimario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'laudos_menu_primario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'laudos_menu_id'], 'integer'],
            [['laudos_menu_id', 'titulo'], 'required'],
            [['pagina', 'titulo'], 'string', 'max' => 50],
            [['acao'], 'string', 'max' => 45],
            [['valor'], 'string', 'max' => 10],
            [['exibir'], 'string', 'max' => 1],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['laudos_menu_id'], 'exist', 'skipOnError' => true, 'targetClass' => LaudosMenu::className(), 'targetAttribute' => ['laudos_menu_id' => 'id']],
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
            'laudos_menu_id' => 'Laudos Menu ID',
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
     * Gets query for [[LaudosMenu]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLaudosMenu()
    {
        return $this->hasOne(LaudosMenu::className(), ['id' => 'laudos_menu_id']);
    }

    /**
     * Gets query for [[LaudosMenuSecundarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLaudosMenuSecundarios()
    {
        return $this->hasMany(LaudosMenuSecundario::className(), ['laudos_menu_primario_id' => 'id']);
    }
}
