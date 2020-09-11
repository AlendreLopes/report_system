<?php

namespace backend\models;

use Yii;
use common\models\User;
/**
 * This is the model class for table "laudos_menu".
 *
 * @property int $id
 * @property int $user_id
 * @property string $titulo
 * @property string|null $exibir
 *
 * @property User $user
 * @property LaudosMenuPrimario[] $laudosMenuPrimarios
 */
class LaudosMenu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'laudos_menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['titulo'], 'string', 'max' => 50],
            [['exibir'], 'string', 'max' => 1],
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
            'titulo' => 'Titulo',
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
     * Gets query for [[LaudosMenuPrimarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLaudosMenuPrimarios()
    {
        return $this->hasMany(LaudosMenuPrimario::className(), ['laudos_menu_id' => 'id']);
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
