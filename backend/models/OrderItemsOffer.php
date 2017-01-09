<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "order_items_offer".
 *
 * @property integer $order_items_id
 * @property string $order_items_offer_externalId
 * @property string $order_items_offer_name
 * @property string $order_items_offer_xmlId
 */
class OrderItemsOffer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_items_offer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_items_id'], 'required'],
            [['order_items_id'], 'integer'],
            [['order_items_offer_externalId', 'order_items_offer_xmlId'], 'string', 'max' => 45],
            [['order_items_offer_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_items_id' => 'Order Items ID',
            'order_items_offer_externalId' => 'Order Items Offer External ID',
            'order_items_offer_name' => 'Order Items Offer Name',
            'order_items_offer_xmlId' => 'Order Items Offer Xml ID',
        ];
    }
    
    
}
