<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "order_delivery_data".
 *
 * @property integer $order_id
 * @property string $order_delivery_data_trackNumber
 * @property string $order_delivery_data_statusCode
 * @property string $order_delivery_data_statusDate
 * @property integer $order_delivery_data_courierId
 * @property string $order_delivery_data_name
 * @property string $order_delivery_data_externalId
 * @property string $order_delivery_data_packageNumber
 * @property string $order_delivery_data_deliveryName
 * @property string $order_delivery_data_days
 * @property string $order_delivery_data_price
 * @property string $order_delivery_data_insurancePrice
 * @property string $order_delivery_data_status
 * @property string $order_delivery_data_statusText
 */
class OrderDeliveryData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_delivery_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id'], 'required'],
            [['order_id', 'order_delivery_data_courierId'], 'integer'],
            [['order_delivery_data_statusDate'], 'safe'],
            [['order_delivery_data_trackNumber', 'order_delivery_data_name', 'order_delivery_data_externalId', 'order_delivery_data_packageNumber', 'order_delivery_data_deliveryName', 'order_delivery_data_days', 'order_delivery_data_price', 'order_delivery_data_insurancePrice'], 'string', 'max' => 45],
            [['order_delivery_data_statusCode', 'order_delivery_data_status', 'order_delivery_data_statusText'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'order_delivery_data_trackNumber' => 'Order Delivery Data Track Number',
            'order_delivery_data_statusCode' => 'Order Delivery Data Status Code',
            'order_delivery_data_statusDate' => 'Order Delivery Data Status Date',
            'order_delivery_data_courierId' => 'Order Delivery Data Courier ID',
            'order_delivery_data_name' => 'Order Delivery Data Name',
            'order_delivery_data_externalId' => 'Order Delivery Data External ID',
            'order_delivery_data_packageNumber' => 'Order Delivery Data Package Number',
            'order_delivery_data_deliveryName' => 'Order Delivery Data Delivery Name',
            'order_delivery_data_days' => 'Order Delivery Data Days',
            'order_delivery_data_price' => 'Order Delivery Data Price',
            'order_delivery_data_insurancePrice' => 'Order Delivery Data Insurance Price',
            'order_delivery_data_status' => 'Order Delivery Data Status',
            'order_delivery_data_statusText' => 'Order Delivery Data Status Text',
        ];
    }
}
