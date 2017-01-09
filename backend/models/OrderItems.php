<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "order_items".
 *
 * @property integer $order_id
 * @property integer $order_items_id
 * @property double $order_items_initialPrice
 * @property double $order_items_discount
 * @property double $order_items_discountPercent
 * @property string $order_items_createdAt
 * @property integer $order_items_quantity
 * @property integer $order_items_isCanceled
 * @property string $order_items_status
 * @property double $order_items_purchasePrice
 * @property string $order_items_comment
 */
class OrderItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'order_items_id'], 'required'],
            [['order_id', 'order_items_id', 'order_items_quantity', 'order_items_isCanceled'], 'integer'],
            [['order_items_initialPrice', 'order_items_discount', 'order_items_discountPercent', 'order_items_purchasePrice'], 'number'],
            [['order_items_createdAt'], 'safe'],
            [['order_items_status', 'order_items_comment'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'order_items_id' => 'Order Items ID',
            'order_items_initialPrice' => 'Order Items Initial Price',
            'order_items_discount' => 'Order Items Discount',
            'order_items_discountPercent' => 'Order Items Discount Percent',
            'order_items_createdAt' => 'Order Items Created At',
            'order_items_quantity' => 'Order Items Quantity',
            'order_items_isCanceled' => 'Order Items Is Canceled',
            'order_items_status' => 'Order Items Status',
            'order_items_purchasePrice' => 'Order Items Purchase Price',
            'order_items_comment' => 'Order Items Comment',
        ];
    }

    public function getOrderInfo(){
        return $this->hasOne(OrderItemsOffer::className(), ['order_items_id' => 'order_items_id']);
    }
}
