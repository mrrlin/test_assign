<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Transaction".
 *
 * @property int $id
 * @property string $data
 * @property int $amount
 */
class Transaction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Transaction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'amount'], 'required'],
            [['date'], 'safe'],
            [['amount'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'amount' => 'Amount',
        ];
    }
}
