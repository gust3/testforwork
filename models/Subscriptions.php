<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subscriptions".
 *
 * @property int $id
 * @property int $type_event
 * @property string $recipient
 * @property string $email
 * @property int $blocked
 * @property int $created
 * @property int $updated
 */
class Subscriptions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subscriptions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_event', 'recipient', 'email', 'blocked', 'created', 'updated'], 'required'],
            [['type_event', 'blocked', 'created', 'updated'], 'integer'],
            [['recipient', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_event' => 'Событие',
            'recipient' => 'Получатель',
            'email' => 'Email',
            'blocked' => 'Заблокирован',
            'created' => 'Дата создания',
            'updated' => 'Дата изменения',
        ];
    }
}
