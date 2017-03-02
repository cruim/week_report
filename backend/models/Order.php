<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Connection;
use yii\grid\DataColumn;


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
 *
 */

class NumberColumn extends DataColumn
{
    private $_total = 0;

    public function getDataCellValue($model, $key, $index)
    {

        $value = parent::getDataCellValue($model, $key, $index);
        if($index != 0 and $index != 10 and $index != 19 and $index != 28 and $index != 31 and $index != 32 and $index != 33 and  $index != 35
            and $index != 37 and $index != 38 or $index != 40 and $index != 44){
            $this->_total += $value;}
        return $value;
    }

    protected function renderFooterCellContent()
    {

        return $this->grid->formatter->format($this->_total, $this->format);;
    }
}
class Order extends \yii\db\ActiveRecord
{


public $name = 'Здоров Групп КЗ'; //переменная для заполнения всея ячеек колонки 'Менеджер'

    public $euro_rate = 64;
    public $a = 1;
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
    
    public function getOrderDeliveryData(){
        return $this->hasOne(OrderDeliveryData::className(), ['order_id' => 'order_id']);
    }

    public function getCustomFields(){
        return $this->hasOne(OrderCustomFields::className(), ['order_id' => 'order_id']);
    }

    public static function getCheck(){
        return   Yii::$app->getDb()->createCommand(
            "SELECT order_customFields.order_customFields_delivery_method,
    
    sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_first_week_repo.from_sale) as top
FROM order_customFields 
LEFT JOIN deliverability.delivery_first_week_repo
on order_customFields.order_customFields_delivery_method = delivery_first_week_repo.type
  INNER JOIN `order` ON order_customFields.order_id = `order`.order_id

where delivery_first_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_customFields.order_customFields_delivery_method is not null
and order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
AND order_customFields.order_customFields_delivery_method in('eu-multi','eu_acs','eu_dhl_int','eu_dpd','eu_venipak')
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY    
   order_customFields.order_customFields_delivery_method
   
   UNION
   SELECT CONCAT(order_customFields.order_customFields_delivery_method,' нац.'),
    
    sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

	sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_first_week_repo.from_sale) as top
FROM order_customFields 
LEFT JOIN deliverability.delivery_first_week_repo
on order_customFields.order_customFields_delivery_method = delivery_first_week_repo.type
  INNER JOIN `order` ON order_customFields.order_id = `order`.order_id
where delivery_first_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_managerId in(35,68,344)
and order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_customFields_delivery_method = 'eu_dhl'
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream',
'cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
UNION
SELECT order_customFields.order_customFields_delivery_method,
    
    sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

  sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_first_week_repo.from_sale) as top
FROM order_customFields 
LEFT JOIN deliverability.delivery_first_week_repo
on order_customFields.order_customFields_delivery_method = delivery_first_week_repo.type
  INNER JOIN `order` ON order_customFields.order_id = `order`.order_id
where delivery_first_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_managerId not in(35,68,344)
and order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_customFields_delivery_method = 'eu_dhl'
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
UNION
SELECT CONCAT(order_customFields.order_customFields_delivery_method,' нац.'),
    
    sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

	sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_first_week_repo.from_sale) as top
FROM order_customFields 
LEFT JOIN deliverability.delivery_first_week_repo
on order_customFields.order_customFields_delivery_method = delivery_first_week_repo.type
  INNER JOIN `order` ON order_customFields.order_id = `order`.order_id
where delivery_first_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_managerId in(35,68,344)
and order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_customFields_delivery_method = 'eu_ups'
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
UNION
SELECT order_customFields.order_customFields_delivery_method,
    
    sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

	sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_first_week_repo.from_sale) as top
FROM order_customFields 
LEFT JOIN deliverability.delivery_first_week_repo
on order_customFields.order_customFields_delivery_method = delivery_first_week_repo.type
  INNER JOIN `order` ON order_customFields.order_id = `order`.order_id
where delivery_first_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_managerId not in(35,68,344)
and order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_customFields_delivery_method = 'eu_ups'
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
UNION
 select `delivery-types`.`delivery-types_name`,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_first_week_repo.from_sale) as top
FROM `delivery-types`
LEFT JOIN deliverability.delivery_first_week_repo
on `delivery-types`.`delivery-types_name` = delivery_first_week_repo.type
INNER JOIN order_delivery ON `delivery-types`.`delivery-types_code` = order_delivery.order_delivery_code
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
where delivery_first_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_delivery_code in('courier','cream-ec')
and order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY `delivery-types_name`

UNION 
select ifnull(null,'Россия'),sum(paid) as paid, sum(later) as later,sum(deliveryapproved) as deliveryapproved,
sum(problem) as problem,sum(refusetosend) as refusetosend,sum(refusetoreceive) as refusetoreceive,sum(sent) as sent,
sum(send) as send,sum(parcelreturned) as parcelreturned,sum(stop) as 'stop',sum(parcelonaplace) as parcelonaplace,
sum(delivered) as delivered,sum(injob) as injob,sum(fake) as fake,  sum(paid2) as paid2, sum(later2) as later2,sum(deliveryapproved2) as deliveryapproved2,
sum(problem2) as problem2,sum(refusetosend2) as refusetosend2,sum(refusetoreceive2) as refusetoreceive2,sum(sent2) as sent2,
sum(send2) as send2,sum(parcelreturned2) as parcelreturned2,sum(stop2) as 'stop2',sum(parcelonaplace2) as parcelonaplace2,
sum(delivered2) as delivered2,sum(injob2) as injob2,sum(fake2) as fake2,top from (
SELECT order_delivery_data.order_delivery_data_name,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_first_week_repo.from_sale) as top
FROM order_delivery_data
LEFT JOIN deliverability.delivery_first_week_repo
on ifnull(null,'Россия') = delivery_first_week_repo.type
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
where delivery_first_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_delivery_data.order_delivery_data_name in ('BetaPost','Pony Express Россия','Доставка Почтой России',
'КСЭ','Москва BetaPro','СДЭК','СПСР')
and order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')

UNION 
   select`delivery-types`.`delivery-types_name`,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_first_week_repo.from_sale) as top
FROM `delivery-types`
LEFT JOIN deliverability.delivery_first_week_repo
on `delivery-types`.`delivery-types_name` = delivery_first_week_repo.type
INNER JOIN order_delivery ON `delivery-types`.`delivery-types_code` = order_delivery.order_delivery_code
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
where delivery_first_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
AND order_delivery.order_delivery_code = 'courier'
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')

 )X
 
 UNION
 
  SELECT order_delivery_data.order_delivery_data_name,
  sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
  sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

  sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_first_week_repo.from_sale) as top
FROM order_delivery_data
LEFT JOIN deliverability.delivery_first_week_repo
on order_delivery_data.order_delivery_data_name = delivery_first_week_repo.type
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
where delivery_first_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_delivery_data.order_delivery_data_name in ('BetaPost','Pony Express Россия','КСЭ',
'Доставка Почтой России','Москва BetaPro','СДЭК')
and order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY order_delivery_data.order_delivery_data_name

UNION
SELECT order_customFields.order_customFields_delivery_method,
    
    sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_first_week_repo.from_sale) as top
FROM order_customFields 
  INNER JOIN `order` ON order_customFields.order_id = `order`.order_id
LEFT JOIN deliverability.delivery_first_week_repo
on order_customFields.order_customFields_delivery_method = delivery_first_week_repo.type
where delivery_first_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_customFields.order_customFields_delivery_method in('md_couriers','md_memo','md_novaposhta','md_post','uz_mega','kz_kotransit')
and order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY    
   order_customFields.order_customFields_delivery_method
   
   UNION
   
   select `delivery-types`.`delivery-types_name`,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_first_week_repo.from_sale) as top
FROM `delivery-types`
LEFT JOIN deliverability.delivery_first_week_repo
on `delivery-types`.`delivery-types_name` = delivery_first_week_repo.type
INNER JOIN order_delivery ON `delivery-types`.`delivery-types_code` = order_delivery.order_delivery_code
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
INNER JOIN order_customFields ON `order`.order_id = order_customFields.order_id
where delivery_first_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
AND order_delivery.order_delivery_code not in('cream','md_kishinev','kaz-post','ems-mir','european-union','cream-ec','courier')
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY `delivery-types`.`delivery-types_name`

UNION

SELECT order_delivery_data.order_delivery_data_name,
  sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
  sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_first_week_repo.from_sale) as top
FROM order_delivery_data
LEFT JOIN deliverability.delivery_first_week_repo
on order_delivery_data.order_delivery_data_name = delivery_first_week_repo.type
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
INNER JOIN order_customFields ON `order`.order_id = order_customFields.order_id 
where delivery_first_week_repo.week_day = DAYNAME(CURRENT_DATE())
AND order_delivery_data.order_delivery_data_name is not null
AND order_delivery_data.order_delivery_data_name not in ('BetaPost','Pony Express Россия','Доставка Почтой России',
'КСЭ','Москва BetaPro','СДЭК','Pony Express Азербайджан')
and order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY order_delivery_data.order_delivery_data_name

UNION 
select concat(order_delivery_data.order_delivery_data_name,' uz_svoy_kur'),
 sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_first_week_repo.from_sale) as top
FROM order_delivery_data
LEFT JOIN deliverability.delivery_first_week_repo
on order_delivery_data.order_delivery_data_name = delivery_first_week_repo.type
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
INNER JOIN order_customFields ON order_delivery_data.order_id = order_customFields.order_id
where delivery_first_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_customFields.order_customFields_delivery_method  = 'uz_svoy_kur'
and order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY order_delivery_data.order_delivery_data_name

Union
select CONCAT(`delivery-types`.`delivery-types_name`,' md_kishinev'),
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_first_week_repo.from_sale) as top
  FROM `delivery-types`
LEFT JOIN deliverability.delivery_first_week_repo
on `delivery-types`.`delivery-types_name` = delivery_first_week_repo.type
INNER JOIN order_delivery ON `delivery-types`.`delivery-types_code` = order_delivery.order_delivery_code
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
INNER JOIN order_customFields ON order_delivery.order_id = order_customFields.order_id
where delivery_first_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_customFields_delivery_method  = 'md_kishinev'
and order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY `delivery-types`.`delivery-types_name`


 
 UNION
 
 select ifnull(null,'ВСЯ МОЛДАВИЯ'),sum(paid) as paid, sum(later) as later,sum(deliveryapproved) as deliveryapproved,
sum(problem) as problem,sum(refusetosend) as refusetosend,sum(refusetoreceive) as refusetoreceive,sum(sent) as sent,
sum(send) as send,sum(parcelreturned) as parcelreturned,sum(stop) as 'stop',sum(parcelonaplace) as parcelonaplace,
sum(delivered) as delivered,sum(injob) as injob,sum(fake) as fake, sum(paid2) as paid2, sum(later2) as later2,sum(deliveryapproved2) as deliveryapproved2,
sum(problem2) as problem2,sum(refusetosend2) as refusetosend2,sum(refusetoreceive2) as refusetoreceive2,sum(sent2) as sent2,
sum(send2) as send2,sum(parcelreturned2) as parcelreturned2,sum(stop2) as 'stop2',sum(parcelonaplace2) as parcelonaplace2,
sum(delivered2) as delivered2,sum(injob2) as injob2,sum(fake2) as fake2,top  from (
SELECT order_delivery.order_delivery_code,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_first_week_repo.from_sale) as top
FROM order_delivery
LEFT JOIN deliverability.delivery_first_week_repo
on ifnull(null,'ВСЯ МОЛДАВИЯ')= delivery_first_week_repo.type
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
INNER JOIN order_customFields ON order_delivery.order_id = order_customFields.order_id
where delivery_first_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_delivery.order_delivery_code in ('moldaviya-memo-express','moldaviya')
and order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
 )X
 
 UNION
 
 
select ifnull(null,'ВЕСЬ АЗЕРБАЙДЖАН'),sum(paid) as paid, sum(later) as later,sum(deliveryapproved) as deliveryapproved,
sum(problem) as problem,sum(refusetosend) as refusetosend,sum(refusetoreceive) as refusetoreceive,sum(sent) as sent,
sum(send) as send,sum(parcelreturned) as parcelreturned,sum(stop) as 'stop',sum(parcelonaplace) as parcelonaplace,
sum(delivered) as delivered,sum(injob) as injob,sum(fake) as fake, sum(paid2) as paid2, sum(later2) as later2,sum(deliveryapproved2) as deliveryapproved2,
sum(problem2) as problem2,sum(refusetosend2) as refusetosend2,sum(refusetoreceive2) as refusetoreceive2,sum(sent2) as sent2,
sum(send2) as send2,sum(parcelreturned2) as parcelreturned2,sum(stop2) as 'stop2',sum(parcelonaplace2) as parcelonaplace2,
sum(delivered2) as delivered2,sum(injob2) as injob2,sum(fake2) as fake2,top  from (
SELECT order_delivery_data.order_delivery_data_name,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_first_week_repo.from_sale) as top
FROM order_delivery_data
LEFT JOIN deliverability.delivery_first_week_repo
on ifnull(null,'ВЕСЬ АЗЕРБАЙДЖАН') = delivery_first_week_repo.type
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
INNER JOIN order_customFields ON order_delivery_data.order_id = order_customFields.order_id 
where delivery_first_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_delivery_data.order_delivery_data_name in ('Pony Express Азербайджан')
and order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
UNION 
    select`delivery-types`.`delivery-types_name`,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_first_week_repo.from_sale) as top
FROM `delivery-types`
LEFT JOIN deliverability.delivery_first_week_repo
on `delivery-types`.`delivery-types_name` = delivery_first_week_repo.type
INNER JOIN order_delivery ON `delivery-types`.`delivery-types_code` = order_delivery.order_delivery_code
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
INNER JOIN order_customFields ON order_delivery.order_id = order_customFields.order_id
where delivery_first_week_repo.week_day = DAYNAME(CURRENT_DATE())
AND order_delivery.order_delivery_code is not null
AND order_delivery.order_delivery_code IN ('az','az-soltan')
and order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
 )X
 
 UNION
 
 
select ifnull(null,'ВСЯ КИРГИЗИЯ'),sum(paid) as paid, sum(later) as later,sum(deliveryapproved) as deliveryapproved,
sum(problem) as problem,sum(refusetosend) as refusetosend,sum(refusetoreceive) as refusetoreceive,sum(sent) as sent,
sum(send) as send,sum(parcelreturned) as parcelreturned,sum(stop) as 'stop',sum(parcelonaplace) as parcelonaplace,
sum(delivered) as delivered,sum(injob) as injob,sum(fake) as fake, sum(paid2) as paid2, sum(later2) as later2,sum(deliveryapproved2) as deliveryapproved2,
sum(problem2) as problem2,sum(refusetosend2) as refusetosend2,sum(refusetoreceive2) as refusetoreceive2,sum(sent2) as sent2,
sum(send2) as send2,sum(parcelreturned2) as parcelreturned2,sum(stop2) as 'stop2',sum(parcelonaplace2) as parcelonaplace2,
sum(delivered2) as delivered2,sum(injob2) as injob2,sum(fake2) as fake2,top  from (
SELECT order_delivery_data.order_delivery_data_name,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_first_week_repo.from_sale) as top
FROM order_delivery_data
LEFT JOIN deliverability.delivery_first_week_repo
on order_delivery_data.order_delivery_data_name = delivery_first_week_repo.type
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
INNER JOIN order_customFields ON order_delivery_data.order_id = order_customFields.order_id
where delivery_first_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_delivery_data.order_delivery_data_name in ('Киргизия СПСР')
and order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')

UNION 
    select`delivery-types`.`delivery-types_name`,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_first_week_repo.from_sale) as top
FROM `delivery-types`
LEFT JOIN deliverability.delivery_first_week_repo
on `delivery-types`.`delivery-types_name` = delivery_first_week_repo.type
INNER JOIN order_delivery ON `delivery-types`.`delivery-types_code` = order_delivery.order_delivery_code
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
INNER JOIN order_customFields ON order_delivery.order_id = order_customFields.order_id 
where delivery_first_week_repo.week_day = DAYNAME(CURRENT_DATE())
AND order_delivery.order_delivery_code is not null
AND order_delivery.order_delivery_code IN ('kg')
and order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream'))X 

UNION
select ifnull(null,'Итого'),sum(paid) as paid, sum(later) as later,sum(deliveryapproved) as deliveryapproved,
sum(problem) as problem,sum(refusetosend) as refusetosend,sum(refusetoreceive) as refusetoreceive,sum(sent) as sent,
sum(send) as send,sum(parcelreturned) as parcelreturned,sum(stop) as 'stop',sum(parcelonaplace) as parcelonaplace,
sum(delivered) as delivered,sum(injob) as injob,sum(fake) as fake,  sum(paid2) as paid2, sum(later2) as later2,sum(deliveryapproved2) as deliveryapproved2,
sum(problem2) as problem2,sum(refusetosend2) as refusetosend2,sum(refusetoreceive2) as refusetoreceive2,sum(sent2) as sent2,
sum(send2) as send2,sum(parcelreturned2) as parcelreturned2,sum(stop2) as 'stop2',sum(parcelonaplace2) as parcelonaplace2,
sum(delivered2) as delivered2,sum(injob2) as injob2,sum(fake2) as fake2,top from (
SELECT order_delivery_data.order_delivery_data_name,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) 'stop',
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_first_week_repo.from_sale) as top
FROM order_delivery_data
LEFT JOIN deliverability.delivery_first_week_repo
on ifnull(null,'Итого') = delivery_first_week_repo.type
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
where delivery_first_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_delivery_data.order_delivery_data_name in ('BetaPost','Pony Express Россия','Доставка Почтой России',
'КСЭ','Москва BetaPro','СДЭК','СПСР')
and order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
UNION 
   select order_delivery.order_delivery_code,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) 'stop',
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_first_week_repo.from_sale) as top
FROM order_delivery
LEFT JOIN deliverability.delivery_first_week_repo
on order_delivery.order_delivery_code = delivery_first_week_repo.type

INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
where delivery_first_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_delivery.order_delivery_code is not null
and order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
AND order_delivery_code = 'courier'
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')

UNION

select `delivery-types`.`delivery-types_name`,

sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) 'stop',
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_first_week_repo.from_sale) as top
FROM `delivery-types`
LEFT JOIN deliverability.delivery_first_week_repo
on `delivery-types`.`delivery-types_name` = delivery_first_week_repo.type
INNER JOIN order_delivery ON `delivery-types`.`delivery-types_code` = order_delivery.order_delivery_code
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
where delivery_first_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY

AND order_delivery.order_delivery_code in('cream-ec') 
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
UNION
select order_delivery.order_delivery_code,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) 'stop',
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_first_week_repo.from_sale) as top
FROM order_delivery
LEFT JOIN deliverability.delivery_first_week_repo
on order_delivery.order_delivery_code = delivery_first_week_repo.type

INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
INNER JOIN order_customFields ON `order`.order_id = order_customFields.order_id
where delivery_first_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_delivery_code in ('moldaviya','moldaviya-memo-express','kz-nds','uz',
'az','az-soltan','kg','ukr','delivery-ge')
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY order_delivery.order_delivery_code
UNION
SELECT order_delivery_data.order_delivery_data_name,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) 'stop',
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_first_week_repo.from_sale) as top
FROM order_delivery_data
LEFT JOIN deliverability.delivery_first_week_repo
on order_delivery_data.order_delivery_data_name = delivery_first_week_repo.type
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
INNER JOIN order_customFields ON `order`.order_id = order_customFields.order_id
where delivery_first_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
AND order_delivery_data.order_delivery_data_name in ('Киргизия СПСР')
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
UNION

   SELECT order_delivery_data.order_delivery_data_name,
 sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) 'stop',
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_first_week_repo.from_sale) as top
FROM order_delivery_data
LEFT JOIN deliverability.delivery_first_week_repo
on order_delivery_data.order_delivery_data_name = delivery_first_week_repo.type
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
INNER JOIN order_customFields ON `order`.order_id = order_customFields.order_id
where delivery_first_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY 
AND order_delivery_data.order_delivery_data_name in ('Армения BPro')
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY order_delivery_data.order_delivery_data_name
)X
UNION
 select replace(order_delivery.order_delivery_code,'az-region','АЗЕРБАЙДЖАН РЕГИОНЫ'),
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_first_week_repo.from_sale) as top
FROM order_delivery
LEFT JOIN deliverability.delivery_first_week_repo
on 'АЗЕРБАЙДЖАН РЕГИОНЫ' = delivery_first_week_repo.type
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
INNER JOIN order_customFields ON `order`.order_id = order_customFields.order_id
and order_delivery_code in('az-region')
and order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY 
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY order_delivery_code

UNION

 select replace(order_delivery.order_delivery_code,'arm','АРМЕНИЯ'),
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_first_week_repo.from_sale) as top
FROM order_delivery
LEFT JOIN deliverability.delivery_first_week_repo
on 'АРМЕНИЯ' = delivery_first_week_repo.type
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
INNER JOIN order_customFields ON `order`.order_id = order_customFields.order_id
and order_delivery_code in('arm')
and order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY 
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY order_delivery_code

order BY field(order_customFields_delivery_method,'Евросоюз Cream','eu-multi','eu_acs','eu_dhl','eu_dhl_int','eu_dpd','eu_ups',
'eu_venipak','eu_ups нац.','eu_dhl нац.','Россия','МОСКВА','BetaPost','Pony Express Россия','Доставка Почтой России','EMS Почта России','КСЭ','Москва BetaPro','СДЭК',
'СПСР','ВСЯ МОЛДАВИЯ','МОЛДАВИЯ МeEx','МОЛДАВИЯ МeEx md_kishinev','md_memo','МОЛДАВИЯ','md_couriers','МОЛДАВИЯ md_kishinev','md_novaposhta','md_post','КАЗАХСТАН','Казахстан КАЗПОЧТА','Казахстан Курьеры','kz_kotransit','kz_pony','kz_post','УЗБЕКИСТАН','Узбекистан Регионы','Узбекистан Регионы uz_svoy_kur','Узбекистан Ташкент','Узбекистан Ташкент uz_svoy_kur','uz_svoy_kur','uz_mega','uz_btc','ВЕСЬ АЗЕРБАЙДЖАН',
'АЗЕРБАЙДЖАН РЕГИОНЫ','АЗЕРБАЙДЖАН','АЗЕРБАЙДЖАН КРЕМ','Pony Express Азербайджан','ВСЯ КИРГИЗИЯ','Киргизия KZ','Киргизия СПСР','УКРАИНА','Белоруссия BPro','АРМЕНИЯ','Армения BPro','Грузия','Итого')
   ")->queryAll();
    }

    public static function getCheckTwoWeeks(){
        return   Yii::$app->getDb()->createCommand(
            "SELECT order_customFields.order_customFields_delivery_method,
    
    sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_second_week_repo.from_sale) as top
FROM order_customFields 
LEFT JOIN deliverability.delivery_second_week_repo
on order_customFields.order_customFields_delivery_method = delivery_second_week_repo.type
  INNER JOIN `order` ON order_customFields.order_id = `order`.order_id

where delivery_second_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_customFields.order_customFields_delivery_method is not null
and order_createdAt >= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
AND order_customFields.order_customFields_delivery_method in('eu-multi','eu_acs','eu_dhl_int','eu_dpd','eu_venipak')
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY    
   order_customFields.order_customFields_delivery_method
   
   UNION
   SELECT CONCAT(order_customFields.order_customFields_delivery_method,' нац.'),
    
    sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

	sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_second_week_repo.from_sale) as top
FROM order_customFields 
LEFT JOIN deliverability.delivery_second_week_repo
on order_customFields.order_customFields_delivery_method = delivery_second_week_repo.type
  INNER JOIN `order` ON order_customFields.order_id = `order`.order_id
where delivery_second_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_managerId in(35,68,344)
and order_createdAt >= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_customFields_delivery_method = 'eu_dhl'
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream',
'cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
UNION
SELECT order_customFields.order_customFields_delivery_method,
    
    sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

  sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_second_week_repo.from_sale) as top
FROM order_customFields 
LEFT JOIN deliverability.delivery_second_week_repo
on order_customFields.order_customFields_delivery_method = delivery_second_week_repo.type
  INNER JOIN `order` ON order_customFields.order_id = `order`.order_id
where delivery_second_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_managerId not in(35,68,344)
and order_createdAt >= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_customFields_delivery_method = 'eu_dhl'
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
UNION
SELECT CONCAT(order_customFields.order_customFields_delivery_method,' нац.'),
    
    sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

	sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_second_week_repo.from_sale) as top
FROM order_customFields 
LEFT JOIN deliverability.delivery_second_week_repo
on order_customFields.order_customFields_delivery_method = delivery_second_week_repo.type
  INNER JOIN `order` ON order_customFields.order_id = `order`.order_id
where delivery_second_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_managerId in(35,68,344)
and order_createdAt >= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_customFields_delivery_method = 'eu_ups'
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
UNION
SELECT order_customFields.order_customFields_delivery_method,
    
    sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

	sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_second_week_repo.from_sale) as top
FROM order_customFields 
LEFT JOIN deliverability.delivery_second_week_repo
on order_customFields.order_customFields_delivery_method = delivery_second_week_repo.type
  INNER JOIN `order` ON order_customFields.order_id = `order`.order_id
where delivery_second_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_managerId not in(35,68,344)
and order_createdAt >= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_customFields_delivery_method = 'eu_ups'
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
UNION
 select `delivery-types`.`delivery-types_name`,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_second_week_repo.from_sale) as top
FROM `delivery-types`
LEFT JOIN deliverability.delivery_second_week_repo
on `delivery-types`.`delivery-types_name` = delivery_second_week_repo.type
INNER JOIN order_delivery ON `delivery-types`.`delivery-types_code` = order_delivery.order_delivery_code
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
where delivery_second_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_delivery_code in('courier','cream-ec')
and order_createdAt >= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY `delivery-types_name`

UNION 
select ifnull(null,'Россия'),sum(paid) as paid, sum(later) as later,sum(deliveryapproved) as deliveryapproved,
sum(problem) as problem,sum(refusetosend) as refusetosend,sum(refusetoreceive) as refusetoreceive,sum(sent) as sent,
sum(send) as send,sum(parcelreturned) as parcelreturned,sum(stop) as 'stop',sum(parcelonaplace) as parcelonaplace,
sum(delivered) as delivered,sum(injob) as injob,sum(fake) as fake,  sum(paid2) as paid2, sum(later2) as later2,sum(deliveryapproved2) as deliveryapproved2,
sum(problem2) as problem2,sum(refusetosend2) as refusetosend2,sum(refusetoreceive2) as refusetoreceive2,sum(sent2) as sent2,
sum(send2) as send2,sum(parcelreturned2) as parcelreturned2,sum(stop2) as 'stop2',sum(parcelonaplace2) as parcelonaplace2,
sum(delivered2) as delivered2,sum(injob2) as injob2,sum(fake2) as fake2,top from (
SELECT order_delivery_data.order_delivery_data_name,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_second_week_repo.from_sale) as top
FROM order_delivery_data
LEFT JOIN deliverability.delivery_second_week_repo
on ifnull(null,'Россия') = delivery_second_week_repo.type
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
where delivery_second_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_delivery_data.order_delivery_data_name in ('BetaPost','Pony Express Россия','Доставка Почтой России',
'КСЭ','Москва BetaPro','СДЭК','СПСР')
and order_createdAt >= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')

UNION 
   select`delivery-types`.`delivery-types_name`,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_second_week_repo.from_sale) as top
FROM `delivery-types`
LEFT JOIN deliverability.delivery_second_week_repo
on `delivery-types`.`delivery-types_name` = delivery_second_week_repo.type
INNER JOIN order_delivery ON `delivery-types`.`delivery-types_code` = order_delivery.order_delivery_code
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
where delivery_second_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_createdAt >= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
AND order_delivery.order_delivery_code = 'courier'
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')

 )X
 
 UNION
 
  SELECT order_delivery_data.order_delivery_data_name,
  sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
  sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

  sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_second_week_repo.from_sale) as top
FROM order_delivery_data
LEFT JOIN deliverability.delivery_second_week_repo
on order_delivery_data.order_delivery_data_name = delivery_second_week_repo.type
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
where delivery_second_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_delivery_data.order_delivery_data_name in ('BetaPost','Pony Express Россия','КСЭ',
'Доставка Почтой России','Москва BetaPro','СДЭК')
and order_createdAt >= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY order_delivery_data.order_delivery_data_name

UNION
SELECT order_customFields.order_customFields_delivery_method,
    
    sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_second_week_repo.from_sale) as top
FROM order_customFields 
  INNER JOIN `order` ON order_customFields.order_id = `order`.order_id
LEFT JOIN deliverability.delivery_second_week_repo
on order_customFields.order_customFields_delivery_method = delivery_second_week_repo.type
where delivery_second_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_customFields.order_customFields_delivery_method in('md_couriers','md_memo','md_novaposhta','md_post','uz_mega','kz_kotransit')
and order_createdAt >= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY    
   order_customFields.order_customFields_delivery_method
   
   UNION
   
   select `delivery-types`.`delivery-types_name`,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_second_week_repo.from_sale) as top
FROM `delivery-types`
LEFT JOIN deliverability.delivery_second_week_repo
on `delivery-types`.`delivery-types_name` = delivery_second_week_repo.type
INNER JOIN order_delivery ON `delivery-types`.`delivery-types_code` = order_delivery.order_delivery_code
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
INNER JOIN order_customFields ON `order`.order_id = order_customFields.order_id
where delivery_second_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_createdAt >= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
AND order_delivery.order_delivery_code not in('cream','md_kishinev','kaz-post','ems-mir','european-union','cream-ec','courier')
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY `delivery-types`.`delivery-types_name`

UNION

SELECT order_delivery_data.order_delivery_data_name,
  sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
  sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_second_week_repo.from_sale) as top
FROM order_delivery_data
LEFT JOIN deliverability.delivery_second_week_repo
on order_delivery_data.order_delivery_data_name = delivery_second_week_repo.type
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
INNER JOIN order_customFields ON `order`.order_id = order_customFields.order_id 
where delivery_second_week_repo.week_day = DAYNAME(CURRENT_DATE())
AND order_delivery_data.order_delivery_data_name is not null
AND order_delivery_data.order_delivery_data_name not in ('BetaPost','Pony Express Россия','Доставка Почтой России',
'КСЭ','Москва BetaPro','СДЭК','Pony Express Азербайджан')
and order_createdAt >= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY order_delivery_data.order_delivery_data_name

UNION 
select concat(order_delivery_data.order_delivery_data_name,' uz_svoy_kur'),
 sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_second_week_repo.from_sale) as top
FROM order_delivery_data
LEFT JOIN deliverability.delivery_second_week_repo
on order_delivery_data.order_delivery_data_name = delivery_second_week_repo.type
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
INNER JOIN order_customFields ON order_delivery_data.order_id = order_customFields.order_id
where delivery_second_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_customFields.order_customFields_delivery_method  = 'uz_svoy_kur'
and order_createdAt >= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY order_delivery_data.order_delivery_data_name

Union
select CONCAT(`delivery-types`.`delivery-types_name`,' md_kishinev'),
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_second_week_repo.from_sale) as top
  FROM `delivery-types`
LEFT JOIN deliverability.delivery_second_week_repo
on `delivery-types`.`delivery-types_name` = delivery_second_week_repo.type
INNER JOIN order_delivery ON `delivery-types`.`delivery-types_code` = order_delivery.order_delivery_code
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
INNER JOIN order_customFields ON order_delivery.order_id = order_customFields.order_id
where delivery_second_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_customFields_delivery_method  = 'md_kishinev'
and order_createdAt >= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY `delivery-types`.`delivery-types_name`


 
 UNION
 
 select ifnull(null,'ВСЯ МОЛДАВИЯ'),sum(paid) as paid, sum(later) as later,sum(deliveryapproved) as deliveryapproved,
sum(problem) as problem,sum(refusetosend) as refusetosend,sum(refusetoreceive) as refusetoreceive,sum(sent) as sent,
sum(send) as send,sum(parcelreturned) as parcelreturned,sum(stop) as 'stop',sum(parcelonaplace) as parcelonaplace,
sum(delivered) as delivered,sum(injob) as injob,sum(fake) as fake, sum(paid2) as paid2, sum(later2) as later2,sum(deliveryapproved2) as deliveryapproved2,
sum(problem2) as problem2,sum(refusetosend2) as refusetosend2,sum(refusetoreceive2) as refusetoreceive2,sum(sent2) as sent2,
sum(send2) as send2,sum(parcelreturned2) as parcelreturned2,sum(stop2) as 'stop2',sum(parcelonaplace2) as parcelonaplace2,
sum(delivered2) as delivered2,sum(injob2) as injob2,sum(fake2) as fake2,top  from (
SELECT order_delivery.order_delivery_code,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_second_week_repo.from_sale) as top
FROM order_delivery
LEFT JOIN deliverability.delivery_second_week_repo
on ifnull(null,'ВСЯ МОЛДАВИЯ')= delivery_second_week_repo.type
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
INNER JOIN order_customFields ON order_delivery.order_id = order_customFields.order_id
where delivery_second_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_delivery.order_delivery_code in ('moldaviya-memo-express','moldaviya')
and order_createdAt >= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
 )X
 
 UNION
 
 
select ifnull(null,'ВЕСЬ АЗЕРБАЙДЖАН'),sum(paid) as paid, sum(later) as later,sum(deliveryapproved) as deliveryapproved,
sum(problem) as problem,sum(refusetosend) as refusetosend,sum(refusetoreceive) as refusetoreceive,sum(sent) as sent,
sum(send) as send,sum(parcelreturned) as parcelreturned,sum(stop) as 'stop',sum(parcelonaplace) as parcelonaplace,
sum(delivered) as delivered,sum(injob) as injob,sum(fake) as fake, sum(paid2) as paid2, sum(later2) as later2,sum(deliveryapproved2) as deliveryapproved2,
sum(problem2) as problem2,sum(refusetosend2) as refusetosend2,sum(refusetoreceive2) as refusetoreceive2,sum(sent2) as sent2,
sum(send2) as send2,sum(parcelreturned2) as parcelreturned2,sum(stop2) as 'stop2',sum(parcelonaplace2) as parcelonaplace2,
sum(delivered2) as delivered2,sum(injob2) as injob2,sum(fake2) as fake2,top  from (
SELECT order_delivery_data.order_delivery_data_name,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_second_week_repo.from_sale) as top
FROM order_delivery_data
LEFT JOIN deliverability.delivery_second_week_repo
on ifnull(null,'ВЕСЬ АЗЕРБАЙДЖАН') = delivery_second_week_repo.type
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
INNER JOIN order_customFields ON order_delivery_data.order_id = order_customFields.order_id 
where delivery_second_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_delivery_data.order_delivery_data_name in ('Pony Express Азербайджан')
and order_createdAt >= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
UNION 
    select`delivery-types`.`delivery-types_name`,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_second_week_repo.from_sale) as top
FROM `delivery-types`
LEFT JOIN deliverability.delivery_second_week_repo
on `delivery-types`.`delivery-types_name` = delivery_second_week_repo.type
INNER JOIN order_delivery ON `delivery-types`.`delivery-types_code` = order_delivery.order_delivery_code
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
INNER JOIN order_customFields ON order_delivery.order_id = order_customFields.order_id
where delivery_second_week_repo.week_day = DAYNAME(CURRENT_DATE())
AND order_delivery.order_delivery_code is not null
AND order_delivery.order_delivery_code IN ('az','az-soltan')
and order_createdAt >= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
 )X
 
 UNION
 
 
select ifnull(null,'ВСЯ КИРГИЗИЯ'),sum(paid) as paid, sum(later) as later,sum(deliveryapproved) as deliveryapproved,
sum(problem) as problem,sum(refusetosend) as refusetosend,sum(refusetoreceive) as refusetoreceive,sum(sent) as sent,
sum(send) as send,sum(parcelreturned) as parcelreturned,sum(stop) as 'stop',sum(parcelonaplace) as parcelonaplace,
sum(delivered) as delivered,sum(injob) as injob,sum(fake) as fake, sum(paid2) as paid2, sum(later2) as later2,sum(deliveryapproved2) as deliveryapproved2,
sum(problem2) as problem2,sum(refusetosend2) as refusetosend2,sum(refusetoreceive2) as refusetoreceive2,sum(sent2) as sent2,
sum(send2) as send2,sum(parcelreturned2) as parcelreturned2,sum(stop2) as 'stop2',sum(parcelonaplace2) as parcelonaplace2,
sum(delivered2) as delivered2,sum(injob2) as injob2,sum(fake2) as fake2,top  from (
SELECT order_delivery_data.order_delivery_data_name,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_second_week_repo.from_sale) as top
FROM order_delivery_data
LEFT JOIN deliverability.delivery_second_week_repo
on order_delivery_data.order_delivery_data_name = delivery_second_week_repo.type
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
INNER JOIN order_customFields ON order_delivery_data.order_id = order_customFields.order_id
where delivery_second_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_delivery_data.order_delivery_data_name in ('Киргизия СПСР')
and order_createdAt >= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')

UNION 
    select`delivery-types`.`delivery-types_name`,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_second_week_repo.from_sale) as top
FROM `delivery-types`
LEFT JOIN deliverability.delivery_second_week_repo
on `delivery-types`.`delivery-types_name` = delivery_second_week_repo.type
INNER JOIN order_delivery ON `delivery-types`.`delivery-types_code` = order_delivery.order_delivery_code
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
INNER JOIN order_customFields ON order_delivery.order_id = order_customFields.order_id 
where delivery_second_week_repo.week_day = DAYNAME(CURRENT_DATE())
AND order_delivery.order_delivery_code is not null
AND order_delivery.order_delivery_code IN ('kg')
and order_createdAt >= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream'))X

UNION
select ifnull(null,'Итого'),sum(paid) as paid, sum(later) as later,sum(deliveryapproved) as deliveryapproved,
sum(problem) as problem,sum(refusetosend) as refusetosend,sum(refusetoreceive) as refusetoreceive,sum(sent) as sent,
sum(send) as send,sum(parcelreturned) as parcelreturned,sum(stop) as 'stop',sum(parcelonaplace) as parcelonaplace,
sum(delivered) as delivered,sum(injob) as injob,sum(fake) as fake,  sum(paid2) as paid2, sum(later2) as later2,sum(deliveryapproved2) as deliveryapproved2,
sum(problem2) as problem2,sum(refusetosend2) as refusetosend2,sum(refusetoreceive2) as refusetoreceive2,sum(sent2) as sent2,
sum(send2) as send2,sum(parcelreturned2) as parcelreturned2,sum(stop2) as 'stop2',sum(parcelonaplace2) as parcelonaplace2,
sum(delivered2) as delivered2,sum(injob2) as injob2,sum(fake2) as fake2,top from (
SELECT order_delivery_data.order_delivery_data_name,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) 'stop',
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_second_week_repo.from_sale) as top
FROM order_delivery_data
LEFT JOIN deliverability.delivery_second_week_repo
on ifnull(null,'Итого') = delivery_second_week_repo.type
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
where delivery_second_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_delivery_data.order_delivery_data_name in ('BetaPost','Pony Express Россия','Доставка Почтой России',
'КСЭ','Москва BetaPro','СДЭК','СПСР')
and order_createdAt >= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
UNION 
   select order_delivery.order_delivery_code,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) 'stop',
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_second_week_repo.from_sale) as top
FROM order_delivery
LEFT JOIN deliverability.delivery_second_week_repo
on order_delivery.order_delivery_code = delivery_second_week_repo.type

INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
where delivery_second_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_delivery.order_delivery_code is not null
and order_createdAt >= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
AND order_delivery_code = 'courier'
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')

UNION

select `delivery-types`.`delivery-types_name`,

sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) 'stop',
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_second_week_repo.from_sale) as top
FROM `delivery-types`
LEFT JOIN deliverability.delivery_second_week_repo
on `delivery-types`.`delivery-types_name` = delivery_second_week_repo.type
INNER JOIN order_delivery ON `delivery-types`.`delivery-types_code` = order_delivery.order_delivery_code
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
where delivery_second_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_createdAt >= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY

AND order_delivery.order_delivery_code in('cream-ec') 
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
UNION
select order_delivery.order_delivery_code,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) 'stop',
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_second_week_repo.from_sale) as top
FROM order_delivery
LEFT JOIN deliverability.delivery_second_week_repo
on order_delivery.order_delivery_code = delivery_second_week_repo.type

INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
INNER JOIN order_customFields ON `order`.order_id = order_customFields.order_id
where delivery_second_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_createdAt >= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_delivery_code in ('moldaviya','moldaviya-memo-express','kz-nds','uz',
'az','az-soltan','kg','ukr','delivery-ge')
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY order_delivery.order_delivery_code
UNION
SELECT order_delivery_data.order_delivery_data_name,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) 'stop',
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_second_week_repo.from_sale) as top
FROM order_delivery_data
LEFT JOIN deliverability.delivery_second_week_repo
on order_delivery_data.order_delivery_data_name = delivery_second_week_repo.type
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
INNER JOIN order_customFields ON `order`.order_id = order_customFields.order_id
where delivery_second_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_createdAt >= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
AND order_delivery_data.order_delivery_data_name in ('Киргизия СПСР')
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
UNION

   SELECT order_delivery_data.order_delivery_data_name,
 sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) 'stop',
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_second_week_repo.from_sale) as top
FROM order_delivery_data
LEFT JOIN deliverability.delivery_second_week_repo
on order_delivery_data.order_delivery_data_name = delivery_second_week_repo.type
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
INNER JOIN order_customFields ON `order`.order_id = order_customFields.order_id
where delivery_second_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_createdAt >= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY 
AND order_delivery_data.order_delivery_data_name in ('Армения BPro')
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY order_delivery_data.order_delivery_data_name
)X
UNION
 select replace(order_delivery.order_delivery_code,'az-region','АЗЕРБАЙДЖАН РЕГИОНЫ'),
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_first_week_repo.from_sale) as top
FROM order_delivery
LEFT JOIN deliverability.delivery_first_week_repo
on 'АЗЕРБАЙДЖАН РЕГИОНЫ' = delivery_first_week_repo.type
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
INNER JOIN order_customFields ON `order`.order_id = order_customFields.order_id
and order_delivery_code in('az-region')
and order_createdAt >= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY 
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY order_delivery_code

UNION

 select replace(order_delivery.order_delivery_code,'arm','АРМЕНИЯ'),
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_first_week_repo.from_sale) as top
FROM order_delivery
LEFT JOIN deliverability.delivery_first_week_repo
on 'АРМЕНИЯ' = delivery_first_week_repo.type
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
INNER JOIN order_customFields ON `order`.order_id = order_customFields.order_id
and order_delivery_code in('arm')
and order_createdAt >= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY 
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY order_delivery_code

order BY field(order_customFields_delivery_method,'Евросоюз Cream','eu-multi','eu_acs','eu_dhl','eu_dhl_int','eu_dpd','eu_ups',
'eu_venipak','eu_ups нац.','eu_dhl нац.','Россия','МОСКВА','BetaPost','Pony Express Россия','Доставка Почтой России','EMS Почта России','КСЭ','Москва BetaPro','СДЭК',
'СПСР','ВСЯ МОЛДАВИЯ','МОЛДАВИЯ МeEx','МОЛДАВИЯ МeEx md_kishinev','md_memo','МОЛДАВИЯ','md_couriers','МОЛДАВИЯ md_kishinev','md_novaposhta','md_post','КАЗАХСТАН','Казахстан КАЗПОЧТА','Казахстан Курьеры','kz_kotransit','kz_pony','kz_post','УЗБЕКИСТАН','Узбекистан Регионы','Узбекистан Регионы uz_svoy_kur','Узбекистан Ташкент','Узбекистан Ташкент uz_svoy_kur','uz_svoy_kur','uz_mega','uz_btc','ВЕСЬ АЗЕРБАЙДЖАН',
'АЗЕРБАЙДЖАН РЕГИОНЫ','АЗЕРБАЙДЖАН','АЗЕРБАЙДЖАН КРЕМ','Pony Express Азербайджан','ВСЯ КИРГИЗИЯ','Киргизия KZ','Киргизия СПСР','УКРАИНА','Белоруссия BPro','АРМЕНИЯ','Армения BPro','Грузия','Итого')
   ")->queryAll();
    }

    public static function getCheckThreeWeeks(){
        return   Yii::$app->getDb()->createCommand(
            "SELECT order_customFields.order_customFields_delivery_method,
    
    sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_third_week_repo.from_sale) as top
FROM order_customFields 
LEFT JOIN deliverability.delivery_third_week_repo
on order_customFields.order_customFields_delivery_method = delivery_third_week_repo.type
  INNER JOIN `order` ON order_customFields.order_id = `order`.order_id

where delivery_third_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_customFields.order_customFields_delivery_method is not null
and order_createdAt >= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
AND order_customFields.order_customFields_delivery_method in('eu-multi','eu_acs','eu_dhl_int','eu_dpd','eu_venipak')
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY    
   order_customFields.order_customFields_delivery_method
   
   UNION
   SELECT CONCAT(order_customFields.order_customFields_delivery_method,' нац.'),
    
    sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

	sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_third_week_repo.from_sale) as top
FROM order_customFields 
LEFT JOIN deliverability.delivery_third_week_repo
on order_customFields.order_customFields_delivery_method = delivery_third_week_repo.type
  INNER JOIN `order` ON order_customFields.order_id = `order`.order_id
where delivery_third_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_managerId in(35,68,344)
and order_createdAt >= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_customFields_delivery_method = 'eu_dhl'
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream',
'cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
UNION
SELECT order_customFields.order_customFields_delivery_method,
    
    sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

  sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_third_week_repo.from_sale) as top
FROM order_customFields 
LEFT JOIN deliverability.delivery_third_week_repo
on order_customFields.order_customFields_delivery_method = delivery_third_week_repo.type
  INNER JOIN `order` ON order_customFields.order_id = `order`.order_id
where delivery_third_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_managerId not in(35,68,344)
and order_createdAt >= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_customFields_delivery_method = 'eu_dhl'
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
UNION
SELECT CONCAT(order_customFields.order_customFields_delivery_method,' нац.'),
    
    sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

	sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_third_week_repo.from_sale) as top
FROM order_customFields 
LEFT JOIN deliverability.delivery_third_week_repo
on order_customFields.order_customFields_delivery_method = delivery_third_week_repo.type
  INNER JOIN `order` ON order_customFields.order_id = `order`.order_id
where delivery_third_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_managerId in(35,68,344)
and order_createdAt >= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_customFields_delivery_method = 'eu_ups'
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
UNION
SELECT order_customFields.order_customFields_delivery_method,
    
    sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

	sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_third_week_repo.from_sale) as top
FROM order_customFields 
LEFT JOIN deliverability.delivery_third_week_repo
on order_customFields.order_customFields_delivery_method = delivery_third_week_repo.type
  INNER JOIN `order` ON order_customFields.order_id = `order`.order_id
where delivery_third_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_managerId not in(35,68,344)
and order_createdAt >= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_customFields_delivery_method = 'eu_ups'
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
UNION
 select `delivery-types`.`delivery-types_name`,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_third_week_repo.from_sale) as top
FROM `delivery-types`
LEFT JOIN deliverability.delivery_third_week_repo
on `delivery-types`.`delivery-types_name` = delivery_third_week_repo.type
INNER JOIN order_delivery ON `delivery-types`.`delivery-types_code` = order_delivery.order_delivery_code
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
where delivery_third_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_delivery_code in('courier','cream-ec')
and order_createdAt >= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY `delivery-types_name`

UNION 
select ifnull(null,'Россия'),sum(paid) as paid, sum(later) as later,sum(deliveryapproved) as deliveryapproved,
sum(problem) as problem,sum(refusetosend) as refusetosend,sum(refusetoreceive) as refusetoreceive,sum(sent) as sent,
sum(send) as send,sum(parcelreturned) as parcelreturned,sum(stop) as 'stop',sum(parcelonaplace) as parcelonaplace,
sum(delivered) as delivered,sum(injob) as injob,sum(fake) as fake,  sum(paid2) as paid2, sum(later2) as later2,sum(deliveryapproved2) as deliveryapproved2,
sum(problem2) as problem2,sum(refusetosend2) as refusetosend2,sum(refusetoreceive2) as refusetoreceive2,sum(sent2) as sent2,
sum(send2) as send2,sum(parcelreturned2) as parcelreturned2,sum(stop2) as 'stop2',sum(parcelonaplace2) as parcelonaplace2,
sum(delivered2) as delivered2,sum(injob2) as injob2,sum(fake2) as fake2,top from (
SELECT order_delivery_data.order_delivery_data_name,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_third_week_repo.from_sale) as top
FROM order_delivery_data
LEFT JOIN deliverability.delivery_third_week_repo
on ifnull(null,'Россия') = delivery_third_week_repo.type
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
where delivery_third_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_delivery_data.order_delivery_data_name in ('BetaPost','Pony Express Россия','Доставка Почтой России',
'КСЭ','Москва BetaPro','СДЭК','СПСР')
and order_createdAt >= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')

UNION 
   select`delivery-types`.`delivery-types_name`,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_third_week_repo.from_sale) as top
FROM `delivery-types`
LEFT JOIN deliverability.delivery_third_week_repo
on `delivery-types`.`delivery-types_name` = delivery_third_week_repo.type
INNER JOIN order_delivery ON `delivery-types`.`delivery-types_code` = order_delivery.order_delivery_code
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
where delivery_third_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_createdAt >= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
AND order_delivery.order_delivery_code = 'courier'
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')

 )X
 
 UNION
 
  SELECT order_delivery_data.order_delivery_data_name,
  sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
  sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

  sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_third_week_repo.from_sale) as top
FROM order_delivery_data
LEFT JOIN deliverability.delivery_third_week_repo
on order_delivery_data.order_delivery_data_name = delivery_third_week_repo.type
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
where delivery_third_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_delivery_data.order_delivery_data_name in ('BetaPost','Pony Express Россия','КСЭ',
'Доставка Почтой России','Москва BetaPro','СДЭК')
and order_createdAt >= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY order_delivery_data.order_delivery_data_name

UNION
SELECT order_customFields.order_customFields_delivery_method,
    
    sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_third_week_repo.from_sale) as top
FROM order_customFields 
  INNER JOIN `order` ON order_customFields.order_id = `order`.order_id
LEFT JOIN deliverability.delivery_third_week_repo
on order_customFields.order_customFields_delivery_method = delivery_third_week_repo.type
where delivery_third_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_customFields.order_customFields_delivery_method in('md_couriers','md_memo','md_novaposhta','md_post','uz_mega','kz_kotransit')
and order_createdAt >= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY    
   order_customFields.order_customFields_delivery_method
   
   UNION
   
   select `delivery-types`.`delivery-types_name`,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_third_week_repo.from_sale) as top
FROM `delivery-types`
LEFT JOIN deliverability.delivery_third_week_repo
on `delivery-types`.`delivery-types_name` = delivery_third_week_repo.type
INNER JOIN order_delivery ON `delivery-types`.`delivery-types_code` = order_delivery.order_delivery_code
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
INNER JOIN order_customFields ON `order`.order_id = order_customFields.order_id
where delivery_third_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_createdAt >= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
AND order_delivery.order_delivery_code not in('cream','md_kishinev','kaz-post','ems-mir','european-union','cream-ec','courier')
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY `delivery-types`.`delivery-types_name`

UNION

SELECT order_delivery_data.order_delivery_data_name,
  sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
  sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_third_week_repo.from_sale) as top
FROM order_delivery_data
LEFT JOIN deliverability.delivery_third_week_repo
on order_delivery_data.order_delivery_data_name = delivery_third_week_repo.type
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
INNER JOIN order_customFields ON `order`.order_id = order_customFields.order_id 
where delivery_third_week_repo.week_day = DAYNAME(CURRENT_DATE())
AND order_delivery_data.order_delivery_data_name is not null
AND order_delivery_data.order_delivery_data_name not in ('BetaPost','Pony Express Россия','Доставка Почтой России',
'КСЭ','Москва BetaPro','СДЭК','Pony Express Азербайджан')
and order_createdAt >= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY order_delivery_data.order_delivery_data_name

UNION 
select concat(order_delivery_data.order_delivery_data_name,' uz_svoy_kur'),
 sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_third_week_repo.from_sale) as top
FROM order_delivery_data
LEFT JOIN deliverability.delivery_third_week_repo
on order_delivery_data.order_delivery_data_name = delivery_third_week_repo.type
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
INNER JOIN order_customFields ON order_delivery_data.order_id = order_customFields.order_id
where delivery_third_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_customFields.order_customFields_delivery_method  = 'uz_svoy_kur'
and order_createdAt >= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY order_delivery_data.order_delivery_data_name

Union
select CONCAT(`delivery-types`.`delivery-types_name`,' md_kishinev'),
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_third_week_repo.from_sale) as top
  FROM `delivery-types`
LEFT JOIN deliverability.delivery_third_week_repo
on `delivery-types`.`delivery-types_name` = delivery_third_week_repo.type
INNER JOIN order_delivery ON `delivery-types`.`delivery-types_code` = order_delivery.order_delivery_code
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
INNER JOIN order_customFields ON order_delivery.order_id = order_customFields.order_id
where delivery_third_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_customFields_delivery_method  = 'md_kishinev'
and order_createdAt >= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY `delivery-types`.`delivery-types_name`


 
 UNION
 
 select ifnull(null,'ВСЯ МОЛДАВИЯ'),sum(paid) as paid, sum(later) as later,sum(deliveryapproved) as deliveryapproved,
sum(problem) as problem,sum(refusetosend) as refusetosend,sum(refusetoreceive) as refusetoreceive,sum(sent) as sent,
sum(send) as send,sum(parcelreturned) as parcelreturned,sum(stop) as 'stop',sum(parcelonaplace) as parcelonaplace,
sum(delivered) as delivered,sum(injob) as injob,sum(fake) as fake, sum(paid2) as paid2, sum(later2) as later2,sum(deliveryapproved2) as deliveryapproved2,
sum(problem2) as problem2,sum(refusetosend2) as refusetosend2,sum(refusetoreceive2) as refusetoreceive2,sum(sent2) as sent2,
sum(send2) as send2,sum(parcelreturned2) as parcelreturned2,sum(stop2) as 'stop2',sum(parcelonaplace2) as parcelonaplace2,
sum(delivered2) as delivered2,sum(injob2) as injob2,sum(fake2) as fake2,top  from (
SELECT order_delivery.order_delivery_code,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_third_week_repo.from_sale) as top
FROM order_delivery
LEFT JOIN deliverability.delivery_third_week_repo
on ifnull(null,'ВСЯ МОЛДАВИЯ')= delivery_third_week_repo.type
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
INNER JOIN order_customFields ON order_delivery.order_id = order_customFields.order_id
where delivery_third_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_delivery.order_delivery_code in ('moldaviya-memo-express','moldaviya')
and order_createdAt >= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
 )X
 
 UNION
 
 
select ifnull(null,'ВЕСЬ АЗЕРБАЙДЖАН'),sum(paid) as paid, sum(later) as later,sum(deliveryapproved) as deliveryapproved,
sum(problem) as problem,sum(refusetosend) as refusetosend,sum(refusetoreceive) as refusetoreceive,sum(sent) as sent,
sum(send) as send,sum(parcelreturned) as parcelreturned,sum(stop) as 'stop',sum(parcelonaplace) as parcelonaplace,
sum(delivered) as delivered,sum(injob) as injob,sum(fake) as fake, sum(paid2) as paid2, sum(later2) as later2,sum(deliveryapproved2) as deliveryapproved2,
sum(problem2) as problem2,sum(refusetosend2) as refusetosend2,sum(refusetoreceive2) as refusetoreceive2,sum(sent2) as sent2,
sum(send2) as send2,sum(parcelreturned2) as parcelreturned2,sum(stop2) as 'stop2',sum(parcelonaplace2) as parcelonaplace2,
sum(delivered2) as delivered2,sum(injob2) as injob2,sum(fake2) as fake2,top  from (
SELECT order_delivery_data.order_delivery_data_name,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_third_week_repo.from_sale) as top
FROM order_delivery_data
LEFT JOIN deliverability.delivery_third_week_repo
on ifnull(null,'ВЕСЬ АЗЕРБАЙДЖАН') = delivery_third_week_repo.type
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
INNER JOIN order_customFields ON order_delivery_data.order_id = order_customFields.order_id 
where delivery_third_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_delivery_data.order_delivery_data_name in ('Pony Express Азербайджан')
and order_createdAt >= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
UNION 
    select`delivery-types`.`delivery-types_name`,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_third_week_repo.from_sale) as top
FROM `delivery-types`
LEFT JOIN deliverability.delivery_third_week_repo
on `delivery-types`.`delivery-types_name` = delivery_third_week_repo.type
INNER JOIN order_delivery ON `delivery-types`.`delivery-types_code` = order_delivery.order_delivery_code
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
INNER JOIN order_customFields ON order_delivery.order_id = order_customFields.order_id
where delivery_third_week_repo.week_day = DAYNAME(CURRENT_DATE())
AND order_delivery.order_delivery_code is not null
AND order_delivery.order_delivery_code IN ('az','az-soltan')
and order_createdAt >= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
 )X
 
 UNION
 
 
select ifnull(null,'ВСЯ КИРГИЗИЯ'),sum(paid) as paid, sum(later) as later,sum(deliveryapproved) as deliveryapproved,
sum(problem) as problem,sum(refusetosend) as refusetosend,sum(refusetoreceive) as refusetoreceive,sum(sent) as sent,
sum(send) as send,sum(parcelreturned) as parcelreturned,sum(stop) as 'stop',sum(parcelonaplace) as parcelonaplace,
sum(delivered) as delivered,sum(injob) as injob,sum(fake) as fake, sum(paid2) as paid2, sum(later2) as later2,sum(deliveryapproved2) as deliveryapproved2,
sum(problem2) as problem2,sum(refusetosend2) as refusetosend2,sum(refusetoreceive2) as refusetoreceive2,sum(sent2) as sent2,
sum(send2) as send2,sum(parcelreturned2) as parcelreturned2,sum(stop2) as 'stop2',sum(parcelonaplace2) as parcelonaplace2,
sum(delivered2) as delivered2,sum(injob2) as injob2,sum(fake2) as fake2,top  from (
SELECT order_delivery_data.order_delivery_data_name,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_third_week_repo.from_sale) as top
FROM order_delivery_data
LEFT JOIN deliverability.delivery_third_week_repo
on order_delivery_data.order_delivery_data_name = delivery_third_week_repo.type
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
INNER JOIN order_customFields ON order_delivery_data.order_id = order_customFields.order_id
where delivery_third_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_delivery_data.order_delivery_data_name in ('Киргизия СПСР')
and order_createdAt >= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')

UNION 
    select`delivery-types`.`delivery-types_name`,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_third_week_repo.from_sale) as top
FROM `delivery-types`
LEFT JOIN deliverability.delivery_third_week_repo
on `delivery-types`.`delivery-types_name` = delivery_third_week_repo.type
INNER JOIN order_delivery ON `delivery-types`.`delivery-types_code` = order_delivery.order_delivery_code
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
INNER JOIN order_customFields ON order_delivery.order_id = order_customFields.order_id 
where delivery_third_week_repo.week_day = DAYNAME(CURRENT_DATE())
AND order_delivery.order_delivery_code is not null
AND order_delivery.order_delivery_code IN ('kg')
and order_createdAt >= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream'))X

UNION
select ifnull(null,'Итого'),sum(paid) as paid, sum(later) as later,sum(deliveryapproved) as deliveryapproved,
sum(problem) as problem,sum(refusetosend) as refusetosend,sum(refusetoreceive) as refusetoreceive,sum(sent) as sent,
sum(send) as send,sum(parcelreturned) as parcelreturned,sum(stop) as 'stop',sum(parcelonaplace) as parcelonaplace,
sum(delivered) as delivered,sum(injob) as injob,sum(fake) as fake,  sum(paid2) as paid2, sum(later2) as later2,sum(deliveryapproved2) as deliveryapproved2,
sum(problem2) as problem2,sum(refusetosend2) as refusetosend2,sum(refusetoreceive2) as refusetoreceive2,sum(sent2) as sent2,
sum(send2) as send2,sum(parcelreturned2) as parcelreturned2,sum(stop2) as 'stop2',sum(parcelonaplace2) as parcelonaplace2,
sum(delivered2) as delivered2,sum(injob2) as injob2,sum(fake2) as fake2,top from (
SELECT order_delivery_data.order_delivery_data_name,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) 'stop',
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_third_week_repo.from_sale) as top
FROM order_delivery_data
LEFT JOIN deliverability.delivery_third_week_repo
on ifnull(null,'Итого') = delivery_third_week_repo.type
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
where delivery_third_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_delivery_data.order_delivery_data_name in ('BetaPost','Pony Express Россия','Доставка Почтой России',
'КСЭ','Москва BetaPro','СДЭК','СПСР')
and order_createdAt >= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
UNION 
   select order_delivery.order_delivery_code,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) 'stop',
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_third_week_repo.from_sale) as top
FROM order_delivery
LEFT JOIN deliverability.delivery_third_week_repo
on order_delivery.order_delivery_code = delivery_third_week_repo.type

INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
where delivery_third_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_delivery.order_delivery_code is not null
and order_createdAt >= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
AND order_delivery_code = 'courier'
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')

UNION

select `delivery-types`.`delivery-types_name`,

sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) 'stop',
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_third_week_repo.from_sale) as top
FROM `delivery-types`
LEFT JOIN deliverability.delivery_third_week_repo
on `delivery-types`.`delivery-types_name` = delivery_third_week_repo.type
INNER JOIN order_delivery ON `delivery-types`.`delivery-types_code` = order_delivery.order_delivery_code
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
where delivery_third_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_createdAt >= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY

AND order_delivery.order_delivery_code in('cream-ec') 
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
UNION
select order_delivery.order_delivery_code,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) 'stop',
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_third_week_repo.from_sale) as top
FROM order_delivery
LEFT JOIN deliverability.delivery_third_week_repo
on order_delivery.order_delivery_code = delivery_third_week_repo.type

INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
INNER JOIN order_customFields ON `order`.order_id = order_customFields.order_id
where delivery_third_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_createdAt >= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_delivery_code in ('moldaviya','moldaviya-memo-express','kz-nds','uz',
'az','az-soltan','kg','ukr','delivery-ge')
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY order_delivery.order_delivery_code
UNION
SELECT order_delivery_data.order_delivery_data_name,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) 'stop',
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_third_week_repo.from_sale) as top
FROM order_delivery_data
LEFT JOIN deliverability.delivery_third_week_repo
on order_delivery_data.order_delivery_data_name = delivery_third_week_repo.type
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
INNER JOIN order_customFields ON `order`.order_id = order_customFields.order_id
where delivery_third_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_createdAt >= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
AND order_delivery_data.order_delivery_data_name in ('Киргизия СПСР')
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
UNION

   SELECT order_delivery_data.order_delivery_data_name,
 sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) 'stop',
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_third_week_repo.from_sale) as top
FROM order_delivery_data
LEFT JOIN deliverability.delivery_third_week_repo
on order_delivery_data.order_delivery_data_name = delivery_third_week_repo.type
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
INNER JOIN order_customFields ON `order`.order_id = order_customFields.order_id
where delivery_third_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_createdAt >= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY 
AND order_delivery_data.order_delivery_data_name in ('Армения BPro')
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY order_delivery_data.order_delivery_data_name
)X
UNION
 select replace(order_delivery.order_delivery_code,'az-region','АЗЕРБАЙДЖАН РЕГИОНЫ'),
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_first_week_repo.from_sale) as top
FROM order_delivery
LEFT JOIN deliverability.delivery_first_week_repo
on 'АЗЕРБАЙДЖАН РЕГИОНЫ' = delivery_first_week_repo.type
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
INNER JOIN order_customFields ON `order`.order_id = order_customFields.order_id
and order_delivery_code in('az-region')
and order_createdAt >= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY 
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY order_delivery_code

UNION

 select replace(order_delivery.order_delivery_code,'arm','АРМЕНИЯ'),
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_first_week_repo.from_sale) as top
FROM order_delivery
LEFT JOIN deliverability.delivery_first_week_repo
on 'АРМЕНИЯ' = delivery_first_week_repo.type
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
INNER JOIN order_customFields ON `order`.order_id = order_customFields.order_id
and order_delivery_code in('arm')
and order_createdAt >= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (14 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY order_delivery_code

order BY field(order_customFields_delivery_method,'Евросоюз Cream','eu-multi','eu_acs','eu_dhl','eu_dhl_int','eu_dpd','eu_ups',
'eu_venipak','eu_ups нац.','eu_dhl нац.','Россия','МОСКВА','BetaPost','Pony Express Россия','Доставка Почтой России','EMS Почта России','КСЭ','Москва BetaPro','СДЭК',
'СПСР','ВСЯ МОЛДАВИЯ','МОЛДАВИЯ МeEx','МОЛДАВИЯ МeEx md_kishinev','md_memo','МОЛДАВИЯ','md_couriers','МОЛДАВИЯ md_kishinev','md_novaposhta','md_post','КАЗАХСТАН','Казахстан КАЗПОЧТА','Казахстан Курьеры','kz_kotransit','kz_pony','kz_post','УЗБЕКИСТАН','Узбекистан Регионы','Узбекистан Регионы uz_svoy_kur','Узбекистан Ташкент','Узбекистан Ташкент uz_svoy_kur','uz_svoy_kur','uz_mega','uz_btc','ВЕСЬ АЗЕРБАЙДЖАН',
'АЗЕРБАЙДЖАН РЕГИОНЫ','АЗЕРБАЙДЖАН','АЗЕРБАЙДЖАН КРЕМ','Pony Express Азербайджан','ВСЯ КИРГИЗИЯ','Киргизия KZ','Киргизия СПСР','УКРАИНА','Белоруссия BPro','АРМЕНИЯ','Армения BPro','Грузия','Итого')
   ")->queryAll();
    }

    public static function getCheckFourWeeks(){
        return   Yii::$app->getDb()->createCommand(
            "SELECT order_customFields.order_customFields_delivery_method,
    
    sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_fourth_week_repo.from_sale) as top
FROM order_customFields 
LEFT JOIN deliverability.delivery_fourth_week_repo
on order_customFields.order_customFields_delivery_method = delivery_fourth_week_repo.type
  INNER JOIN `order` ON order_customFields.order_id = `order`.order_id

where delivery_fourth_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_customFields.order_customFields_delivery_method is not null
and order_createdAt >= CURRENT_DATE - INTERVAL (28 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
AND order_customFields.order_customFields_delivery_method in('eu-multi','eu_acs','eu_dhl_int','eu_dpd','eu_venipak')
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY    
   order_customFields.order_customFields_delivery_method
   
   UNION
   SELECT CONCAT(order_customFields.order_customFields_delivery_method,' нац.'),
    
    sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

	sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_fourth_week_repo.from_sale) as top
FROM order_customFields 
LEFT JOIN deliverability.delivery_fourth_week_repo
on order_customFields.order_customFields_delivery_method = delivery_fourth_week_repo.type
  INNER JOIN `order` ON order_customFields.order_id = `order`.order_id
where delivery_fourth_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_managerId in(35,68,344)
and order_createdAt >= CURRENT_DATE - INTERVAL (28 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_customFields_delivery_method = 'eu_dhl'
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream',
'cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
UNION
SELECT order_customFields.order_customFields_delivery_method,
    
    sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

  sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_fourth_week_repo.from_sale) as top
FROM order_customFields 
LEFT JOIN deliverability.delivery_fourth_week_repo
on order_customFields.order_customFields_delivery_method = delivery_fourth_week_repo.type
  INNER JOIN `order` ON order_customFields.order_id = `order`.order_id
where delivery_fourth_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_managerId not in(35,68,344)
and order_createdAt >= CURRENT_DATE - INTERVAL (28 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_customFields_delivery_method = 'eu_dhl'
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
UNION
SELECT CONCAT(order_customFields.order_customFields_delivery_method,' нац.'),
    
    sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

	sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_fourth_week_repo.from_sale) as top
FROM order_customFields 
LEFT JOIN deliverability.delivery_fourth_week_repo
on order_customFields.order_customFields_delivery_method = delivery_fourth_week_repo.type
  INNER JOIN `order` ON order_customFields.order_id = `order`.order_id
where delivery_fourth_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_managerId in(35,68,344)
and order_createdAt >= CURRENT_DATE - INTERVAL (28 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_customFields_delivery_method = 'eu_ups'
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
UNION
SELECT order_customFields.order_customFields_delivery_method,
    
    sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

	sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_fourth_week_repo.from_sale) as top
FROM order_customFields 
LEFT JOIN deliverability.delivery_fourth_week_repo
on order_customFields.order_customFields_delivery_method = delivery_fourth_week_repo.type
  INNER JOIN `order` ON order_customFields.order_id = `order`.order_id
where delivery_fourth_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_managerId not in(35,68,344)
and order_createdAt >= CURRENT_DATE - INTERVAL (28 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_customFields_delivery_method = 'eu_ups'
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
UNION
 select `delivery-types`.`delivery-types_name`,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_fourth_week_repo.from_sale) as top
FROM `delivery-types`
LEFT JOIN deliverability.delivery_fourth_week_repo
on `delivery-types`.`delivery-types_name` = delivery_fourth_week_repo.type
INNER JOIN order_delivery ON `delivery-types`.`delivery-types_code` = order_delivery.order_delivery_code
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
where delivery_fourth_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_delivery_code in('courier','cream-ec')
and order_createdAt >= CURRENT_DATE - INTERVAL (28 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY `delivery-types_name`

UNION 
select ifnull(null,'Россия'),sum(paid) as paid, sum(later) as later,sum(deliveryapproved) as deliveryapproved,
sum(problem) as problem,sum(refusetosend) as refusetosend,sum(refusetoreceive) as refusetoreceive,sum(sent) as sent,
sum(send) as send,sum(parcelreturned) as parcelreturned,sum(stop) as 'stop',sum(parcelonaplace) as parcelonaplace,
sum(delivered) as delivered,sum(injob) as injob,sum(fake) as fake,  sum(paid2) as paid2, sum(later2) as later2,sum(deliveryapproved2) as deliveryapproved2,
sum(problem2) as problem2,sum(refusetosend2) as refusetosend2,sum(refusetoreceive2) as refusetoreceive2,sum(sent2) as sent2,
sum(send2) as send2,sum(parcelreturned2) as parcelreturned2,sum(stop2) as 'stop2',sum(parcelonaplace2) as parcelonaplace2,
sum(delivered2) as delivered2,sum(injob2) as injob2,sum(fake2) as fake2,top from (
SELECT order_delivery_data.order_delivery_data_name,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_fourth_week_repo.from_sale) as top
FROM order_delivery_data
LEFT JOIN deliverability.delivery_fourth_week_repo
on ifnull(null,'Россия') = delivery_fourth_week_repo.type
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
where delivery_fourth_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_delivery_data.order_delivery_data_name in ('BetaPost','Pony Express Россия','Доставка Почтой России',
'КСЭ','Москва BetaPro','СДЭК','СПСР')
and order_createdAt >= CURRENT_DATE - INTERVAL (28 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')

UNION 
   select`delivery-types`.`delivery-types_name`,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_fourth_week_repo.from_sale) as top
FROM `delivery-types`
LEFT JOIN deliverability.delivery_fourth_week_repo
on `delivery-types`.`delivery-types_name` = delivery_fourth_week_repo.type
INNER JOIN order_delivery ON `delivery-types`.`delivery-types_code` = order_delivery.order_delivery_code
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
where delivery_fourth_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_createdAt >= CURRENT_DATE - INTERVAL (28 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
AND order_delivery.order_delivery_code = 'courier'
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')

 )X
 
 UNION
 
  SELECT order_delivery_data.order_delivery_data_name,
  sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
  sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

  sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_fourth_week_repo.from_sale) as top
FROM order_delivery_data
LEFT JOIN deliverability.delivery_fourth_week_repo
on order_delivery_data.order_delivery_data_name = delivery_fourth_week_repo.type
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
where delivery_fourth_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_delivery_data.order_delivery_data_name in ('BetaPost','Pony Express Россия','КСЭ',
'Доставка Почтой России','Москва BetaPro','СДЭК')
and order_createdAt >= CURRENT_DATE - INTERVAL (28 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY order_delivery_data.order_delivery_data_name

UNION
SELECT order_customFields.order_customFields_delivery_method,
    
    sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_fourth_week_repo.from_sale) as top
FROM order_customFields 
  INNER JOIN `order` ON order_customFields.order_id = `order`.order_id
LEFT JOIN deliverability.delivery_fourth_week_repo
on order_customFields.order_customFields_delivery_method = delivery_fourth_week_repo.type
where delivery_fourth_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_customFields.order_customFields_delivery_method in('md_couriers','md_memo','md_novaposhta','md_post','uz_mega','kz_kotransit')
and order_createdAt >= CURRENT_DATE - INTERVAL (28 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY    
   order_customFields.order_customFields_delivery_method
   
   UNION
   
   select `delivery-types`.`delivery-types_name`,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_fourth_week_repo.from_sale) as top
FROM `delivery-types`
LEFT JOIN deliverability.delivery_fourth_week_repo
on `delivery-types`.`delivery-types_name` = delivery_fourth_week_repo.type
INNER JOIN order_delivery ON `delivery-types`.`delivery-types_code` = order_delivery.order_delivery_code
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
INNER JOIN order_customFields ON `order`.order_id = order_customFields.order_id
where delivery_fourth_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_createdAt >= CURRENT_DATE - INTERVAL (28 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
AND order_delivery.order_delivery_code not in('cream','md_kishinev','kaz-post','ems-mir','european-union','cream-ec','courier')
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY `delivery-types`.`delivery-types_name`

UNION

SELECT order_delivery_data.order_delivery_data_name,
  sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
  sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_fourth_week_repo.from_sale) as top
FROM order_delivery_data
LEFT JOIN deliverability.delivery_fourth_week_repo
on order_delivery_data.order_delivery_data_name = delivery_fourth_week_repo.type
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
INNER JOIN order_customFields ON `order`.order_id = order_customFields.order_id 
where delivery_fourth_week_repo.week_day = DAYNAME(CURRENT_DATE())
AND order_delivery_data.order_delivery_data_name is not null
AND order_delivery_data.order_delivery_data_name not in ('BetaPost','Pony Express Россия','Доставка Почтой России',
'КСЭ','Москва BetaPro','СДЭК','Pony Express Азербайджан')
and order_createdAt >= CURRENT_DATE - INTERVAL (28 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY order_delivery_data.order_delivery_data_name

UNION 
select concat(order_delivery_data.order_delivery_data_name,' uz_svoy_kur'),
 sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_fourth_week_repo.from_sale) as top
FROM order_delivery_data
LEFT JOIN deliverability.delivery_fourth_week_repo
on order_delivery_data.order_delivery_data_name = delivery_fourth_week_repo.type
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
INNER JOIN order_customFields ON order_delivery_data.order_id = order_customFields.order_id
where delivery_fourth_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_customFields.order_customFields_delivery_method  = 'uz_svoy_kur'
and order_createdAt >= CURRENT_DATE - INTERVAL (28 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY order_delivery_data.order_delivery_data_name

Union
select CONCAT(`delivery-types`.`delivery-types_name`,' md_kishinev'),
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_fourth_week_repo.from_sale) as top
  FROM `delivery-types`
LEFT JOIN deliverability.delivery_fourth_week_repo
on `delivery-types`.`delivery-types_name` = delivery_fourth_week_repo.type
INNER JOIN order_delivery ON `delivery-types`.`delivery-types_code` = order_delivery.order_delivery_code
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
INNER JOIN order_customFields ON order_delivery.order_id = order_customFields.order_id
where delivery_fourth_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_customFields_delivery_method  = 'md_kishinev'
and order_createdAt >= CURRENT_DATE - INTERVAL (28 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY `delivery-types`.`delivery-types_name`


 
 UNION
 
 select ifnull(null,'ВСЯ МОЛДАВИЯ'),sum(paid) as paid, sum(later) as later,sum(deliveryapproved) as deliveryapproved,
sum(problem) as problem,sum(refusetosend) as refusetosend,sum(refusetoreceive) as refusetoreceive,sum(sent) as sent,
sum(send) as send,sum(parcelreturned) as parcelreturned,sum(stop) as 'stop',sum(parcelonaplace) as parcelonaplace,
sum(delivered) as delivered,sum(injob) as injob,sum(fake) as fake, sum(paid2) as paid2, sum(later2) as later2,sum(deliveryapproved2) as deliveryapproved2,
sum(problem2) as problem2,sum(refusetosend2) as refusetosend2,sum(refusetoreceive2) as refusetoreceive2,sum(sent2) as sent2,
sum(send2) as send2,sum(parcelreturned2) as parcelreturned2,sum(stop2) as 'stop2',sum(parcelonaplace2) as parcelonaplace2,
sum(delivered2) as delivered2,sum(injob2) as injob2,sum(fake2) as fake2,top  from (
SELECT order_delivery.order_delivery_code,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_fourth_week_repo.from_sale) as top
FROM order_delivery
LEFT JOIN deliverability.delivery_fourth_week_repo
on ifnull(null,'ВСЯ МОЛДАВИЯ')= delivery_fourth_week_repo.type
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
INNER JOIN order_customFields ON order_delivery.order_id = order_customFields.order_id
where delivery_fourth_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_delivery.order_delivery_code in ('moldaviya-memo-express','moldaviya')
and order_createdAt >= CURRENT_DATE - INTERVAL (28 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
 )X
 
 UNION
 
 
select ifnull(null,'ВЕСЬ АЗЕРБАЙДЖАН'),sum(paid) as paid, sum(later) as later,sum(deliveryapproved) as deliveryapproved,
sum(problem) as problem,sum(refusetosend) as refusetosend,sum(refusetoreceive) as refusetoreceive,sum(sent) as sent,
sum(send) as send,sum(parcelreturned) as parcelreturned,sum(stop) as 'stop',sum(parcelonaplace) as parcelonaplace,
sum(delivered) as delivered,sum(injob) as injob,sum(fake) as fake, sum(paid2) as paid2, sum(later2) as later2,sum(deliveryapproved2) as deliveryapproved2,
sum(problem2) as problem2,sum(refusetosend2) as refusetosend2,sum(refusetoreceive2) as refusetoreceive2,sum(sent2) as sent2,
sum(send2) as send2,sum(parcelreturned2) as parcelreturned2,sum(stop2) as 'stop2',sum(parcelonaplace2) as parcelonaplace2,
sum(delivered2) as delivered2,sum(injob2) as injob2,sum(fake2) as fake2,top  from (
SELECT order_delivery_data.order_delivery_data_name,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_fourth_week_repo.from_sale) as top
FROM order_delivery_data
LEFT JOIN deliverability.delivery_fourth_week_repo
on ifnull(null,'ВЕСЬ АЗЕРБАЙДЖАН') = delivery_fourth_week_repo.type
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
INNER JOIN order_customFields ON order_delivery_data.order_id = order_customFields.order_id 
where delivery_fourth_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_delivery_data.order_delivery_data_name in ('Pony Express Азербайджан')
and order_createdAt >= CURRENT_DATE - INTERVAL (28 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
UNION 
    select`delivery-types`.`delivery-types_name`,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_fourth_week_repo.from_sale) as top
FROM `delivery-types`
LEFT JOIN deliverability.delivery_fourth_week_repo
on `delivery-types`.`delivery-types_name` = delivery_fourth_week_repo.type
INNER JOIN order_delivery ON `delivery-types`.`delivery-types_code` = order_delivery.order_delivery_code
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
INNER JOIN order_customFields ON order_delivery.order_id = order_customFields.order_id
where delivery_fourth_week_repo.week_day = DAYNAME(CURRENT_DATE())
AND order_delivery.order_delivery_code is not null
AND order_delivery.order_delivery_code IN ('az','az-soltan')
and order_createdAt >= CURRENT_DATE - INTERVAL (28 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
 )X
 
 UNION
 
 
select ifnull(null,'ВСЯ КИРГИЗИЯ'),sum(paid) as paid, sum(later) as later,sum(deliveryapproved) as deliveryapproved,
sum(problem) as problem,sum(refusetosend) as refusetosend,sum(refusetoreceive) as refusetoreceive,sum(sent) as sent,
sum(send) as send,sum(parcelreturned) as parcelreturned,sum(stop) as 'stop',sum(parcelonaplace) as parcelonaplace,
sum(delivered) as delivered,sum(injob) as injob,sum(fake) as fake, sum(paid2) as paid2, sum(later2) as later2,sum(deliveryapproved2) as deliveryapproved2,
sum(problem2) as problem2,sum(refusetosend2) as refusetosend2,sum(refusetoreceive2) as refusetoreceive2,sum(sent2) as sent2,
sum(send2) as send2,sum(parcelreturned2) as parcelreturned2,sum(stop2) as 'stop2',sum(parcelonaplace2) as parcelonaplace2,
sum(delivered2) as delivered2,sum(injob2) as injob2,sum(fake2) as fake2,top  from (
SELECT order_delivery_data.order_delivery_data_name,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_fourth_week_repo.from_sale) as top
FROM order_delivery_data
LEFT JOIN deliverability.delivery_fourth_week_repo
on order_delivery_data.order_delivery_data_name = delivery_fourth_week_repo.type
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
INNER JOIN order_customFields ON order_delivery_data.order_id = order_customFields.order_id
where delivery_fourth_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_delivery_data.order_delivery_data_name in ('Киргизия СПСР')
and order_createdAt >= CURRENT_DATE - INTERVAL (28 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')

UNION 
    select`delivery-types`.`delivery-types_name`,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,

sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_fourth_week_repo.from_sale) as top
FROM `delivery-types`
LEFT JOIN deliverability.delivery_fourth_week_repo
on `delivery-types`.`delivery-types_name` = delivery_fourth_week_repo.type
INNER JOIN order_delivery ON `delivery-types`.`delivery-types_code` = order_delivery.order_delivery_code
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
INNER JOIN order_customFields ON order_delivery.order_id = order_customFields.order_id 
where delivery_fourth_week_repo.week_day = DAYNAME(CURRENT_DATE())
AND order_delivery.order_delivery_code is not null
AND order_delivery.order_delivery_code IN ('kg')
and order_createdAt >= CURRENT_DATE - INTERVAL (28 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream'))X

UNION
select ifnull(null,'Итого'),sum(paid) as paid, sum(later) as later,sum(deliveryapproved) as deliveryapproved,
sum(problem) as problem,sum(refusetosend) as refusetosend,sum(refusetoreceive) as refusetoreceive,sum(sent) as sent,
sum(send) as send,sum(parcelreturned) as parcelreturned,sum(stop) as 'stop',sum(parcelonaplace) as parcelonaplace,
sum(delivered) as delivered,sum(injob) as injob,sum(fake) as fake,  sum(paid2) as paid2, sum(later2) as later2,sum(deliveryapproved2) as deliveryapproved2,
sum(problem2) as problem2,sum(refusetosend2) as refusetosend2,sum(refusetoreceive2) as refusetoreceive2,sum(sent2) as sent2,
sum(send2) as send2,sum(parcelreturned2) as parcelreturned2,sum(stop2) as 'stop2',sum(parcelonaplace2) as parcelonaplace2,
sum(delivered2) as delivered2,sum(injob2) as injob2,sum(fake2) as fake2,top from (
SELECT order_delivery_data.order_delivery_data_name,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) 'stop',
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_fourth_week_repo.from_sale) as top
FROM order_delivery_data
LEFT JOIN deliverability.delivery_fourth_week_repo
on ifnull(null,'Итого') = delivery_fourth_week_repo.type
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
where delivery_fourth_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_delivery_data.order_delivery_data_name in ('BetaPost','Pony Express Россия','Доставка Почтой России',
'КСЭ','Москва BetaPro','СДЭК','СПСР')
and order_createdAt >= CURRENT_DATE - INTERVAL (28 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
UNION 
   select order_delivery.order_delivery_code,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) 'stop',
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_fourth_week_repo.from_sale) as top
FROM order_delivery
LEFT JOIN deliverability.delivery_fourth_week_repo
on order_delivery.order_delivery_code = delivery_fourth_week_repo.type

INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
where delivery_fourth_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_delivery.order_delivery_code is not null
and order_createdAt >= CURRENT_DATE - INTERVAL (28 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
AND order_delivery_code = 'courier'
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')

UNION

select `delivery-types`.`delivery-types_name`,

sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) 'stop',
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then `order`.order_totalSumm else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then `order`.order_totalSumm else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then `order`.order_totalSumm else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then `order`.order_totalSumm else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then `order`.order_totalSumm else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then `order`.order_totalSumm else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then `order`.order_totalSumm else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then `order`.order_totalSumm else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then `order`.order_totalSumm else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then `order`.order_totalSumm else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then `order`.order_totalSumm else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then `order`.order_totalSumm else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then `order`.order_totalSumm else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then `order`.order_totalSumm else 0 end)) fake2,
max(deliverability.delivery_fourth_week_repo.from_sale) as top
FROM `delivery-types`
LEFT JOIN deliverability.delivery_fourth_week_repo
on `delivery-types`.`delivery-types_name` = delivery_fourth_week_repo.type
INNER JOIN order_delivery ON `delivery-types`.`delivery-types_code` = order_delivery.order_delivery_code
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
where delivery_fourth_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_createdAt >= CURRENT_DATE - INTERVAL (28 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY

AND order_delivery.order_delivery_code in('cream-ec') 
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
UNION
select order_delivery.order_delivery_code,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) 'stop',
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_fourth_week_repo.from_sale) as top
FROM order_delivery
LEFT JOIN deliverability.delivery_fourth_week_repo
on order_delivery.order_delivery_code = delivery_fourth_week_repo.type

INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
INNER JOIN order_customFields ON `order`.order_id = order_customFields.order_id
where delivery_fourth_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_createdAt >= CURRENT_DATE - INTERVAL (28 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_delivery_code in ('moldaviya','moldaviya-memo-express','kz-nds','uz',
'az','az-soltan','kg','ukr','delivery-ge')
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY order_delivery.order_delivery_code
UNION
SELECT order_delivery_data.order_delivery_data_name,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) 'stop',
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_fourth_week_repo.from_sale) as top
FROM order_delivery_data
LEFT JOIN deliverability.delivery_fourth_week_repo
on order_delivery_data.order_delivery_data_name = delivery_fourth_week_repo.type
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
INNER JOIN order_customFields ON `order`.order_id = order_customFields.order_id
where delivery_fourth_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_createdAt >= CURRENT_DATE - INTERVAL (28 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
AND order_delivery_data.order_delivery_data_name in ('Киргизия СПСР')
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
UNION

   SELECT order_delivery_data.order_delivery_data_name,
 sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) 'stop',
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_fourth_week_repo.from_sale) as top
FROM order_delivery_data
LEFT JOIN deliverability.delivery_fourth_week_repo
on order_delivery_data.order_delivery_data_name = delivery_fourth_week_repo.type
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
INNER JOIN order_customFields ON `order`.order_id = order_customFields.order_id
where delivery_fourth_week_repo.week_day = DAYNAME(CURRENT_DATE())
and order_createdAt >= CURRENT_DATE - INTERVAL (28 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY 
AND order_delivery_data.order_delivery_data_name in ('Армения BPro')
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY order_delivery_data.order_delivery_data_name
)X
UNION
 select replace(order_delivery.order_delivery_code,'az-region','АЗЕРБАЙДЖАН РЕГИОНЫ'),
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_first_week_repo.from_sale) as top
FROM order_delivery
LEFT JOIN deliverability.delivery_first_week_repo
on 'АЗЕРБАЙДЖАН РЕГИОНЫ' = delivery_first_week_repo.type
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
INNER JOIN order_customFields ON `order`.order_id = order_customFields.order_id
and order_delivery_code in('az-region')
and order_createdAt >= CURRENT_DATE - INTERVAL (28 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY 
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY order_delivery_code

UNION

 select replace(order_delivery.order_delivery_code,'arm','АРМЕНИЯ'),
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake,
  
  sum(round(case `order`.order_status when 'paid' then order_customFields.order_customFields_any_currency else 0 end)) paid2,
  sum(round(case `order`.order_status when 'later' then order_customFields.order_customFields_any_currency else 0 end)) later2,
  sum(round(case `order`.order_status when 'delivery-approved' then order_customFields.order_customFields_any_currency else 0 end)) deliveryapproved2,
  sum(round(case `order`.order_status when 'problem' then order_customFields.order_customFields_any_currency else 0 end)) problem2,
  sum(round(case `order`.order_status when 'refuse-to-send' then order_customFields.order_customFields_any_currency else 0 end)) refusetosend2,
  sum(round(case `order`.order_status when 'refuse-to-receive' then order_customFields.order_customFields_any_currency else 0 end)) refusetoreceive2,
  sum(round(case `order`.order_status when 'sent' then order_customFields.order_customFields_any_currency else 0 end)) sent2,
  sum(round(case `order`.order_status when 'send' then order_customFields.order_customFields_any_currency else 0 end)) send2,
  sum(round(case `order`.order_status when 'parcel-returned' then order_customFields.order_customFields_any_currency else 0 end)) parcelreturned2,
  sum(round(case `order`.order_status when 'stop' then order_customFields.order_customFields_any_currency else 0 end)) stop2,
  sum(round(case `order`.order_status when 'parcel-on-a-place' then order_customFields.order_customFields_any_currency else 0 end)) parcelonaplace2,
  sum(round(case `order`.order_status when 'delivered' then order_customFields.order_customFields_any_currency else 0 end)) delivered2,
  sum(round(case `order`.order_status when 'injob' then order_customFields.order_customFields_any_currency else 0 end)) injob2,
  sum(round(case `order`.order_status when 'fake' then order_customFields.order_customFields_any_currency else 0 end)) fake2,
max(deliverability.delivery_first_week_repo.from_sale) as top
FROM order_delivery
LEFT JOIN deliverability.delivery_first_week_repo
on 'АРМЕНИЯ' = delivery_first_week_repo.type
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
INNER JOIN order_customFields ON `order`.order_id = order_customFields.order_id
and order_delivery_code in('arm')
and order_createdAt >= CURRENT_DATE - INTERVAL (28 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (21 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY 
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY order_delivery_code

order BY field(order_customFields_delivery_method,'Евросоюз Cream','eu-multi','eu_acs','eu_dhl','eu_dhl_int','eu_dpd','eu_ups',
'eu_venipak','eu_ups нац.','eu_dhl нац.','Россия','МОСКВА','BetaPost','Pony Express Россия','Доставка Почтой России','EMS Почта России','КСЭ','Москва BetaPro','СДЭК',
'СПСР','ВСЯ МОЛДАВИЯ','МОЛДАВИЯ МeEx','МОЛДАВИЯ МeEx md_kishinev','md_memo','МОЛДАВИЯ','md_couriers','МОЛДАВИЯ md_kishinev','md_novaposhta','md_post','КАЗАХСТАН','Казахстан КАЗПОЧТА','Казахстан Курьеры','kz_kotransit','kz_pony','kz_post','УЗБЕКИСТАН','Узбекистан Регионы','Узбекистан Регионы uz_svoy_kur','Узбекистан Ташкент','Узбекистан Ташкент uz_svoy_kur','uz_svoy_kur','uz_mega','uz_btc','ВЕСЬ АЗЕРБАЙДЖАН',
'АЗЕРБАЙДЖАН РЕГИОНЫ','АЗЕРБАЙДЖАН','АЗЕРБАЙДЖАН КРЕМ','Pony Express Азербайджан','ВСЯ КИРГИЗИЯ','Киргизия KZ','Киргизия СПСР','УКРАИНА','Белоруссия BPro','АРМЕНИЯ','Армения BPro','Грузия','Итого')
   ")->queryAll();
    }

    public static function getSome(){
     return   Yii::$app->getDb()->createCommand(
            "SELECT order_customFields.order_customFields_delivery_method,
    
    sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake
FROM order_customFields 
  INNER JOIN `order` ON order_customFields.order_id = `order`.order_id
WHERE order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY 
AND order_customFields.order_customFields_delivery_method is not null
AND order_customFields.order_customFields_delivery_method not in('ge_dott','uz_svoy_kur','md_kishinev','eu_ups','eu_dhl')
GROUP BY    
   order_customFields.order_customFields_delivery_method
   UNION 
   select `delivery-types`.`delivery-types_name`,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake
FROM `delivery-types`

INNER JOIN order_delivery ON `delivery-types`.`delivery-types_code` = order_delivery.order_delivery_code
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
WHERE order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
AND order_delivery.order_delivery_code is not null
AND order_delivery.order_delivery_code not in('cream','md_kishinev','kaz-post')
GROUP BY `delivery-types`.`delivery-types_name`
   UNION 
   SELECT order_delivery_data.order_delivery_data_name,
  sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
  sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake
FROM order_delivery_data
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
WHERE order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY 
AND order_delivery_data.order_delivery_data_name is not null
GROUP BY order_delivery_data.order_delivery_data_name


UNION 
select concat(order_delivery_data.order_delivery_data_name,' uz_svoy_kur'),
 sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake
FROM order_delivery_data

INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
INNER JOIN order_customFields ON order_delivery_data.order_id = order_customFields.order_id
WHERE order_customFields.order_customFields_delivery_method  = 'uz_svoy_kur'
and order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY 

GROUP BY order_delivery_data.order_delivery_data_name

Union
select CONCAT(`delivery-types`.`delivery-types_name`,' md_kishinev'),
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake
  FROM `delivery-types`

INNER JOIN order_delivery ON `delivery-types`.`delivery-types_code` = order_delivery.order_delivery_code
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
INNER JOIN order_customFields ON order_delivery.order_id = order_customFields.order_id
WHERE order_customFields_delivery_method  = 'md_kishinev'
AND order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY 

GROUP BY `delivery-types`.`delivery-types_name`
UNION
select ifnull(null,'Россия'),sum(paid) as paid, sum(later) as later,sum(deliveryapproved) as deliveryapproved,
sum(problem) as problem,sum(refusetosend) as refusetosend,sum(refusetoreceive) as refusetoreceive,sum(sent) as sent,
sum(send) as send,sum(parcelreturned) as parcelreturned,sum(stop) as 'stop',sum(parcelonaplace) as parcelonaplace,
sum(delivered) as delivered,sum(injob) as injob,sum(fake) as fake,  sum(paid2) as paid2, sum(later2) as later2,sum(deliveryapproved2) as deliveryapproved2,
sum(problem2) as problem2,sum(refusetosend2) as refusetosend2,sum(refusetoreceive2) as refusetoreceive2,sum(sent2) as sent2,
sum(send2) as send2,sum(parcelreturned2) as parcelreturned2,sum(stop2) as 'stop2',sum(parcelonaplace2) as parcelonaplace2,
sum(delivered2) as delivered2,sum(injob2) as injob2,sum(fake2) as fake2  from (
SELECT order_delivery_data.order_delivery_data_name,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake
FROM order_delivery_data
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
WHERE order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
AND order_delivery_data.order_delivery_data_name in ('BetaPost','Pony Express Россия','Доставка Почтой России',
'КСЭ','Москва BetaPro','СДЭК','СПСР')
UNION 
   select`delivery-types`.`delivery-types_name`,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake
FROM `delivery-types`

INNER JOIN order_delivery ON `delivery-types`.`delivery-types_code` = order_delivery.order_delivery_code
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
WHERE order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY 
AND order_delivery.order_delivery_code is not null
AND order_delivery.order_delivery_code = 'courier'
 )X
 UNION
 select ifnull(null,'ВСЯ МОЛДАВИЯ'),sum(paid) as paid, sum(later) as later,sum(deliveryapproved) as deliveryapproved,
sum(problem) as problem,sum(refusetosend) as refusetosend,sum(refusetoreceive) as refusetoreceive,sum(sent) as sent,
sum(send) as send,sum(parcelreturned) as parcelreturned,sum(stop) as 'stop',sum(parcelonaplace) as parcelonaplace,
sum(delivered) as delivered,sum(injob) as injob,sum(fake) as fake,  sum(paid) as paid2, sum(later) as later2,sum(deliveryapproved) as deliveryapproved2,
sum(problem) as problem2,sum(refusetosend) as refusetosend2,sum(refusetoreceive) as refusetoreceive2,sum(sent) as sent2,
sum(send) as send2,sum(parcelreturned) as parcelreturned2,sum(stop2) as 'stop2',sum(parcelonaplace) as parcelonaplace2,
sum(delivered) as delivered2,sum(injob) as injob2,sum(fake) as fake2  from (
SELECT order_delivery.order_delivery_code,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake
FROM order_delivery
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
WHERE order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY 
AND order_delivery.order_delivery_code in ('moldaviya-memo-express','moldaviya')
 )X
 UNION
select ifnull(null,'ВЕСЬ АЗЕРБАЙДЖАН'),sum(paid) as paid, sum(later) as later,sum(deliveryapproved) as deliveryapproved,
sum(problem) as problem,sum(refusetosend) as refusetosend,sum(refusetoreceive) as refusetoreceive,sum(sent) as sent,
sum(send) as send,sum(parcelreturned) as parcelreturned,sum(stop) as 'stop',sum(parcelonaplace) as parcelonaplace,
sum(delivered) as delivered,sum(injob) as injob,sum(fake) as fake,  sum(paid) as paid2, sum(later) as later2,sum(deliveryapproved) as deliveryapproved2,
sum(problem) as problem2,sum(refusetosend) as refusetosend2,sum(refusetoreceive) as refusetoreceive2,sum(sent) as sent2,
sum(send) as send2,sum(parcelreturned) as parcelreturned2,sum(stop2) as 'stop2',sum(parcelonaplace) as parcelonaplace2,
sum(delivered) as delivered2,sum(injob) as injob2,sum(fake) as fake2  from (
SELECT order_delivery_data.order_delivery_data_name,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake
FROM order_delivery_data
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
WHERE order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY 
AND order_delivery_data.order_delivery_data_name in ('Pony Express Азербайджан')
UNION 
   select order_delivery.order_delivery_code,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake
FROM order_delivery


INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
WHERE order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
AND order_delivery.order_delivery_code is not null
AND order_delivery.order_delivery_code IN ('az','az-soltan')
 )X
 UNION
 select ifnull(null,'ВСЯ КИРГИЗИЯ'),sum(paid) as paid, sum(later) as later,sum(deliveryapproved) as deliveryapproved,
sum(problem) as problem,sum(refusetosend) as refusetosend,sum(refusetoreceive) as refusetoreceive,sum(sent) as sent,
sum(send) as send,sum(parcelreturned) as parcelreturned,sum(stop) as 'stop',sum(parcelonaplace) as parcelonaplace,
sum(delivered) as delivered,sum(injob) as injob,sum(fake) as fake,  sum(paid) as paid2, sum(later) as later2,sum(deliveryapproved) as deliveryapproved2,
sum(problem) as problem2,sum(refusetosend) as refusetosend2,sum(refusetoreceive) as refusetoreceive2,sum(sent) as sent2,
sum(send) as send2,sum(parcelreturned) as parcelreturned2,sum(stop2) as 'stop2',sum(parcelonaplace) as parcelonaplace2,
sum(delivered) as delivered2,sum(injob) as injob2,sum(fake) as fake2  from (
SELECT order_delivery_data.order_delivery_data_name,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake
FROM order_delivery_data
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
WHERE order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY 
AND order_delivery_data.order_delivery_data_name in ('Киргизия СПСР')
UNION 
   select order_delivery.order_delivery_code,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake
FROM order_delivery
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
WHERE order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY 
AND order_delivery.order_delivery_code is not null
AND order_delivery.order_delivery_code IN ('kg'))X 
UNION
SELECT CONCAT(order_customFields.order_customFields_delivery_method,' нац.'),
    
    sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake
FROM order_customFields 
  INNER JOIN `order` ON order_customFields.order_id = `order`.order_id
where order_managerId in(35,68,344)
and order_customFields_delivery_method = 'eu_dhl'
and order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY 
UNION
SELECT order_customFields.order_customFields_delivery_method,
    
    sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake
FROM order_customFields 
  INNER JOIN `order` ON order_customFields.order_id = `order`.order_id
where order_managerId not in(35,68,344)
and order_customFields_delivery_method = 'eu_dhl'
and order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
UNION
SELECT CONCAT(order_customFields.order_customFields_delivery_method,' нац.'),
    
    sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake
FROM order_customFields 
  INNER JOIN `order` ON order_customFields.order_id = `order`.order_id
where order_managerId in(35,68,344)
and order_customFields_delivery_method = 'eu_ups'
and order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY 
UNION
SELECT order_customFields.order_customFields_delivery_method,
    
    sum(case `order`.order_status when 'paid' then 1 else 0 end) paid,
    sum(case `order`.order_status when 'later' then 1 else 0 end) later,
  sum(case `order`.order_status when 'delivery-approved' then 1 else 0 end) deliveryapproved,
  sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
  sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
  sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
  sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
  sum(case `order`.order_status when 'send' then 1 else 0 end) send,
  sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
  sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
  sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
  sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
  sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
  sum(case `order`.order_status when 'fake' then 1 else 0 end) fake
FROM order_customFields 
  INNER JOIN `order` ON order_customFields.order_id = `order`.order_id
where order_managerId not in(35,68,344)
and order_customFields_delivery_method = 'eu_ups'
and order_createdAt >= CURRENT_DATE - INTERVAL (7 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
and order_createdAt <= CURRENT_DATE - INTERVAL (0 + (5 + DAYOFWEEK(CURRENT_DATE)) % 7) DAY
order BY field(order_customFields_delivery_method,'Евросоюз Cream','eu-multi','eu_acs','eu_dhl','eu_dhl нац.','eu_dhl_int','eu_dpd','eu_ups','eu_ups нац.',
'eu_venipak','Россия','МОСКВА','BetaPost','Pony Express Россия','Доставка Почтой России','EMS Почта России','КСЭ','Москва BetaPro','СДЭК',
'СПСР','ВСЯ МОЛДАВИЯ','МОЛДАВИЯ МeEx','МОЛДАВИЯ МeEx md_kishinev','МОЛДАВИЯ','md_couriers','МОЛДАВИЯ md_kishinev','md_memo','md_novaposhta','md_post','КАЗАХСТАН','Казахстан КАЗПОЧТА','Казахстан Курьеры','ПОЧТА','kz_kotransit','kz_pony','kz_post','УЗБЕКИСТАН','Узбекистан Регионы','Узбекистан Регионы uz_svoy_kur','Узбекистан Ташкент','Узбекистан Ташкент uz_svoy_kur','uz_svoy_kur','uz_mega','uz_btc','ВЕСЬ АЗЕРБАЙДЖАН','АЗЕРБАЙДЖАН','АЗЕРБАЙДЖАН КРЕМ','Pony Express Азербайджан','ВСЯ КИРГИЗИЯ','Киргизия KZ','Киргизия СПСР','УКРАИНА','Белоруссия BPro','Армения BPro','Грузия')
"
        )->queryAll();
        
    }
    
}
