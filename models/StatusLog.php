<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status_log".
 *
 * @property int $id
 * @property int $status_id
 * @property int $updated_by
 * @property int $created_at
 *
 * @property Status $status
 * @property User_ $updatedBy
 */
class StatusLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'status_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status_id', 'updated_by', 'created_at'], 'required'],
            [['status_id', 'updated_by', 'created_at'], 'integer'],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User_::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'status_id' => Yii::t('app', 'Status ID'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User_::className(), ['id' => 'updated_by']);
    }
}
