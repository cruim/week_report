<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "order_delivery_address".
 *
 * @property integer $order_id
 * @property string $order_delivery_address_index
 * @property string $order_delivery_address_region
 * @property string $order_delivery_address_city
 * @property string $order_delivery_address_street
 * @property string $order_delivery_address_building
 * @property string $order_delivery_address_flat
 * @property string $order_delivery_address_floor
 * @property string $order_delivery_address_block
 * @property string $order_delivery_address_house
 * @property string $order_delivery_address_metro
 * @property string $order_delivery_address_notes
 * @property string $order_delivery_address_text
 * @property string $order_delivery_address_deliveryTime
 * @property string $order_delivery_address_country
 * @property integer $order_delivery_address_cityId
 * @property integer $order_delivery_address_regionId
 * @property string $order_delivery_address_countryIso
 */
class OrderDeliveryAddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_delivery_address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id'], 'required'],
            [['order_id', 'order_delivery_address_cityId', 'order_delivery_address_regionId'], 'integer'],
            [['order_delivery_address_index', 'order_delivery_address_region', 'order_delivery_address_city', 'order_delivery_address_street', 'order_delivery_address_building', 'order_delivery_address_flat', 'order_delivery_address_metro'], 'string', 'max' => 255],
            [['order_delivery_address_floor', 'order_delivery_address_block', 'order_delivery_address_house', 'order_delivery_address_deliveryTime', 'order_delivery_address_country', 'order_delivery_address_countryIso'], 'string', 'max' => 45],
            [['order_delivery_address_notes', 'order_delivery_address_text'], 'string', 'max' => 1024],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'order_delivery_address_index' => 'Order Delivery Address Index',
            'order_delivery_address_region' => 'Order Delivery Address Region',
            'order_delivery_address_city' => 'Order Delivery Address City',
            'order_delivery_address_street' => 'Order Delivery Address Street',
            'order_delivery_address_building' => 'Order Delivery Address Building',
            'order_delivery_address_flat' => 'Order Delivery Address Flat',
            'order_delivery_address_floor' => 'Order Delivery Address Floor',
            'order_delivery_address_block' => 'Order Delivery Address Block',
            'order_delivery_address_house' => 'Order Delivery Address House',
            'order_delivery_address_metro' => 'Order Delivery Address Metro',
            'order_delivery_address_notes' => 'Order Delivery Address Notes',
            'order_delivery_address_text' => 'Order Delivery Address Text',
            'order_delivery_address_deliveryTime' => 'Order Delivery Address Delivery Time',
            'order_delivery_address_country' => 'Order Delivery Address Country',
            'order_delivery_address_cityId' => 'Order Delivery Address City ID',
            'order_delivery_address_regionId' => 'Order Delivery Address Region ID',
            'order_delivery_address_countryIso' => 'Order Delivery Address Country Iso',
        ];
    }
}
