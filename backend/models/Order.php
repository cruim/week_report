<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $order_id
 * @property string $order_number
 * @property string $order_externalId
 * @property string $order_orderType
 * @property string $order_orderMethod
 * @property string $order_createdAt
 * @property string $order_statusUpdatedAt
 * @property double $order_summ
 * @property double $order_totalSumm
 * @property double $order_prepaySum
 * @property double $order_purchaseSumm
 * @property double $order_discount
 * @property double $order_discountPercent
 * @property integer $order_mark
 * @property string $order_markDatetime
 * @property string $order_lastName
 * @property string $order_firstName
 * @property string $order_patronymic
 * @property string $order_phone
 * @property string $order_additionalPhone
 * @property string $order_email
 * @property integer $order_call
 * @property integer $order_expired
 * @property string $order_customerComment
 * @property string $order_managerComment
 * @property string $order_paymentDetail
 * @property integer $order_managerId
 * @property string $order_paymentType
 * @property string $order_paymentStatus
 * @property string $order_site
 * @property string $order_status
 * @property string $order_statusComment
 * @property string $order_sourceId
 * @property integer $order_fromApi
 * @property string $order_shipmentDate
 * @property integer $order_shipped
 * @property string $order_contragentType
 * @property string $order_legalName
 * @property string $order_legalAddress
 * @property string $order_INN
 * @property string $order_OKPO
 * @property string $order_KPP
 * @property string $order_OGRN
 * @property string $order_OGRNIP
 * @property string $order_certificateNumber
 * @property string $order_certificateDate
 * @property string $order_BIK
 * @property string $order_bank
 * @property string $order_bankAddress
 * @property string $order_corrAccount
 * @property string $order_bankAccount
 * @property string $order_shipmentStore
 * @property string $order_slug
 * @property integer $order_deleted
 * @property string $order_countryIso
 * @property integer $order_uploadedToExternalStoreSystem
 */
class Order extends \yii\db\ActiveRecord
{
public $name = 'Здоров Групп КЗ'; //переменная для заполнения всея ячеек колонки 'Менеджер'
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id'], 'required'],
            [['order_id', 'order_mark', 'order_call', 'order_expired', 'order_managerId', 'order_fromApi', 'order_shipped', 'order_deleted', 'order_uploadedToExternalStoreSystem'], 'integer'],
            [['order_createdAt', 'order_statusUpdatedAt', 'order_markDatetime', 'order_shipmentDate', 'order_certificateDate'], 'safe'],
            [['order_summ', 'order_totalSumm', 'order_prepaySum', 'order_purchaseSumm', 'order_discount', 'order_discountPercent'], 'number'],
            [['order_number', 'order_externalId', 'order_orderType', 'order_orderMethod', 'order_email', 'order_paymentType', 'order_paymentStatus', 'order_status', 'order_contragentType', 'order_legalName', 'order_INN', 'order_OKPO', 'order_KPP', 'order_OGRN', 'order_OGRNIP', 'order_certificateNumber', 'order_BIK', 'order_bank', 'order_bankAddress', 'order_corrAccount', 'order_bankAccount', 'order_shipmentStore', 'order_slug', 'order_countryIso'], 'string', 'max' => 45],
            [['order_lastName', 'order_firstName', 'order_patronymic', 'order_phone', 'order_additionalPhone', 'order_site', 'order_sourceId', 'order_legalAddress'], 'string', 'max' => 255],
            [['order_customerComment', 'order_paymentDetail', 'order_statusComment'], 'string', 'max' => 2048],
            [['order_managerComment'], 'string', 'max' => 4096],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'order_number' => 'Номер заказа',
            'order_externalId' => 'Order External ID',
            'order_orderType' => 'Order Order Type',
            'order_orderMethod' => 'Order Order Method',
            'order_createdAt' => 'Order Created At',
            'order_statusUpdatedAt' => 'Order Status Updated At',
            'order_summ' => 'Order Summ',
            'order_totalSumm' => 'Сумма заказа',
            'order_prepaySum' => 'Order Prepay Sum',
            'order_purchaseSumm' => 'Order Purchase Summ',
            'order_discount' => 'Order Discount',
            'order_discountPercent' => 'Order Discount Percent',
            'order_mark' => 'Order Mark',
            'order_markDatetime' => 'Order Mark Datetime',
            'order_lastName' => 'Order Last Name',
            'order_firstName' => 'Order First Name',
            'order_patronymic' => 'Order Patronymic',
            'order_phone' => 'Номер телефона',
            'order_additionalPhone' => 'Order Additional Phone',
            'order_email' => 'Order Email',
            'order_call' => 'Order Call',
            'order_expired' => 'Order Expired',
            'order_customerComment' => 'Order Customer Comment',
            'order_managerComment' => 'Order Manager Comment',
            'order_paymentDetail' => 'Order Payment Detail',
            'order_managerId' => 'Order Manager ID',
            'order_paymentType' => 'Order Payment Type',
            'order_paymentStatus' => 'Order Payment Status',
            'order_site' => 'Order Site',
            'order_status' => 'Order Status',
            'order_statusComment' => 'Order Status Comment',
            'order_sourceId' => 'Order Source ID',
            'order_fromApi' => 'Order From Api',
            'order_shipmentDate' => 'Order Shipment Date',
            'order_shipped' => 'Order Shipped',
            'order_contragentType' => 'Order Contragent Type',
            'order_legalName' => 'Order Legal Name',
            'order_legalAddress' => 'Order Legal Address',
            'order_INN' => 'Order  Inn',
            'order_OKPO' => 'Order  Okpo',
            'order_KPP' => 'Order  Kpp',
            'order_OGRN' => 'Order  Ogrn',
            'order_OGRNIP' => 'Order  Ogrnip',
            'order_certificateNumber' => 'Order Certificate Number',
            'order_certificateDate' => 'Order Certificate Date',
            'order_BIK' => 'Order  Bik',
            'order_bank' => 'Order Bank',
            'order_bankAddress' => 'Order Bank Address',
            'order_corrAccount' => 'Order Corr Account',
            'order_bankAccount' => 'Order Bank Account',
            'order_shipmentStore' => 'Order Shipment Store',
            'order_slug' => 'Order Slug',
            'order_deleted' => 'Order Deleted',
            'order_countryIso' => 'Order Country Iso',
            'order_uploadedToExternalStoreSystem' => 'Order Uploaded To External Store System',
        ];
    }

    public function getAddress(){
        return $this->hasOne(OrderDeliveryAddress::className(), ['order_id' => 'order_id']);
    }

    public function getItems(){
        return $this->hasOne(OrderItems::className(), ['order_id' => 'order_id']);
    }

    public function getItemsOrder(){
        return $this->hasMany(OrderItems::className(), ['order_id' => 'order_id']);
    }
//
//    public function getOrderInfo(){
//        return $this->hasMany(OrderItemsOffer::className(), ['order_items_id' => 'order_items_id'])
//            ->viaTable('order_items', ['order_id' => 'order_id']);
//    }
    
}
