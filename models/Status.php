<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status".
 *
 * @property int $id
 * @property string $message
 * @property int $permissions
 * @property int $created_at
 * @property int $updated_at
 */
class Status extends \yii\db\ActiveRecord
{
  const PERMISSIONS_PRIVATE = 10;
  const PERMISSIONS_PUBLIC = 20;  
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
      return 'status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
      return [
        [['message', 'created_at', 'updated_at'], 'required'],
        [['message'], 'string'],
        [['permissions', 'created_at', 'updated_at'], 'integer'],
        
            //To default the permission to be PUBLIC if is not selected any choice.
        ['permissions','default','value'=>20],
      ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
      return [
        'id' => 'ID',
        'message' => 'Message',
        'permissions' => 'Permissions',
        'created_at' => 'Created At',
        'updated_at' => 'Updated At',
      ];
    }

    public function getPermissions() {
      return array (self::PERMISSIONS_PRIVATE=>'Private',self::PERMISSIONS_PUBLIC=>'Public');
    }
    
    public function getPermissionsLabel($permissions) {
      if ($permissions==self::PERMISSIONS_PUBLIC) {
        return 'Public';
      } else {
        return 'Private';        
      }
    }
    
      /**
     * @return \yii\db\ActiveQuery
     */
      public function getCreatedBy()
      {
        return $this->hasOne(User_::className(), ['id' => 'created_by']);
      }
    }
