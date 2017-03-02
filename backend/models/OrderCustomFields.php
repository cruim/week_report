<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "order_customFields".
 *
 * @property integer $order_id
 * @property string $order_customFields_ip
 * @property string $order_customFields_offer
 * @property string $order_customFields_country
 * @property string $order_customFields_utm_source
 * @property string $order_customFields_landing_url
 * @property string $order_customFields_utm_content
 * @property string $order_customFields_landing_type
 * @property string $order_customFields_utm_term
 * @property string $order_customFields_utm_medium
 * @property string $order_customFields_transaction_id
 * @property string $order_customFields_sum_taxes
 * @property string $order_customFields_status_ob
 * @property string $order_customFields_source
 * @property string $order_customFields_roistat
 * @property string $order_customFields_profession
 * @property string $order_customFields_pol
 * @property string $order_customFields_order_source
 * @property string $order_customFields_order_date
 * @property string $order_customFields_money_date
 * @property string $order_customFields_lead_domain
 * @property string $order_customFields_language
 * @property string $order_customFields_form_type
 * @property string $order_customFields_dop_telefone
 * @property string $order_customFields_date_warehouse
 * @property string $order_customFields_date_of_sending
 * @property string $order_customFields_date_of_delivery
 * @property string $order_customFields_cpa_order_id
 * @property double $order_customFields_cost_of_delivery
 * @property string $order_customFields_birth_date
 * @property string $order_customFields_any_currency
 * @property string $order_customFields_ad_order_id
 * @property string $order_customFields_a_bid
 * @property string $order_customFields_utm_campaign
 * @property string $order_customFields_a_aid
 * @property string $order_customFields_aa_transaction_id
 * @property string $order_customFields_aff_id
 * @property string $order_customFields_keyword
 * @property string $order_customFields_kurier
 * @property string $order_customFields_nomer_otpravleniya
 * @property string $order_customFields_shtrih
 * @property string $order_customFields_vidned
 * @property string $order_customFields_why_not
 * @property string $order_customFields_comment_kur
 * @property string $order_customFields_affiliate
 * @property string $order_customFields_kliet_teperature
 * @property string $order_customFields_treb
 * @property string $order_customFields_pap_order_id
 * @property string $order_customFields_everad
 * @property string $order_customFields_form_theme
 * @property string $order_customFields_sid
 * @property string $order_customFields_uid
 * @property integer $order_customFields_treb_sver
 * @property string $order_customFields_date_of_arrival
 * @property string $order_customFields_srok_nedozvona
 * @property string $order_customFields_posledniyi_data
 * @property string $order_customFields_manager
 * @property string $order_customFields_planiruemaya_data
 * @property integer $order_customFields_hochet_pochtoy
 * @property string $order_customFields_api_mark
 * @property string $order_customFields_ad_sid
 * @property string $order_customFields_country_kma
 * @property string $order_customFields_affiliate_id
 * @property double $order_customFields_price_for_lead
 * @property string $order_customFields_organization
 * @property double $order_customFields_cash_on_delivery
 * @property double $order_customFields_cost_of_return
 * @property integer $order_customFields_pereotpravka
 * @property string $order_customFields_second
 * @property string $order_customFields_currency
 * @property string $order_customFields_delivery_method
 * @property string $order_customFields_service_word
 * @property string $order_customFields_external_id
 * @property string $order_customFields_cpa_id
 * @property string $order_customFields_click_id
 * @property string $order_customFields_delivery_manager
 * @property string $order_customFields_numb_schet
 * @property string $order_customFields_numb_doc
 * @property string $order_customFields_time_zone
 * @property double $order_customFields_fact_pay
 * @property string $order_customFields_forwarded_id
 * @property string $order_customFields_numb_acc_transfer_money
 * @property string $order_customFields_payment_currency
 */
class OrderCustomFields extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_customFields';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id'], 'required'],
            [['order_id', 'order_customFields_treb_sver', 'order_customFields_hochet_pochtoy', 'order_customFields_pereotpravka'], 'integer'],
            [['order_customFields_cost_of_delivery', 'order_customFields_price_for_lead', 'order_customFields_cash_on_delivery', 'order_customFields_cost_of_return', 'order_customFields_fact_pay'], 'number'],
            [['order_customFields_date_of_arrival', 'order_customFields_posledniyi_data', 'order_customFields_planiruemaya_data'], 'safe'],
            [['order_customFields_ip', 'order_customFields_offer', 'order_customFields_country', 'order_customFields_utm_source', 'order_customFields_utm_content', 'order_customFields_landing_type', 'order_customFields_utm_term', 'order_customFields_utm_medium', 'order_customFields_transaction_id', 'order_customFields_sum_taxes', 'order_customFields_status_ob', 'order_customFields_roistat', 'order_customFields_profession', 'order_customFields_pol', 'order_customFields_order_source', 'order_customFields_order_date', 'order_customFields_money_date', 'order_customFields_lead_domain', 'order_customFields_language', 'order_customFields_form_type', 'order_customFields_dop_telefone', 'order_customFields_date_warehouse', 'order_customFields_date_of_sending', 'order_customFields_date_of_delivery', 'order_customFields_cpa_order_id', 'order_customFields_birth_date', 'order_customFields_any_currency', 'order_customFields_ad_order_id', 'order_customFields_a_bid', 'order_customFields_utm_campaign', 'order_customFields_a_aid', 'order_customFields_aa_transaction_id', 'order_customFields_aff_id', 'order_customFields_keyword', 'order_customFields_kurier', 'order_customFields_shtrih', 'order_customFields_vidned', 'order_customFields_why_not', 'order_customFields_affiliate', 'order_customFields_kliet_teperature', 'order_customFields_treb', 'order_customFields_pap_order_id', 'order_customFields_everad', 'order_customFields_form_theme', 'order_customFields_sid', 'order_customFields_uid', 'order_customFields_api_mark', 'order_customFields_country_kma', 'order_customFields_click_id', 'order_customFields_numb_schet', 'order_customFields_numb_doc'], 'string', 'max' => 255],
            [['order_customFields_landing_url'], 'string', 'max' => 512],
            [['order_customFields_source', 'order_customFields_comment_kur'], 'string', 'max' => 2048],
            [['order_customFields_nomer_otpravleniya'], 'string', 'max' => 64],
            [['order_customFields_srok_nedozvona', 'order_customFields_manager', 'order_customFields_ad_sid', 'order_customFields_affiliate_id', 'order_customFields_organization', 'order_customFields_second', 'order_customFields_currency', 'order_customFields_delivery_method', 'order_customFields_service_word', 'order_customFields_external_id', 'order_customFields_cpa_id', 'order_customFields_delivery_manager', 'order_customFields_time_zone', 'order_customFields_forwarded_id', 'order_customFields_numb_acc_transfer_money', 'order_customFields_payment_currency'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'order_customFields_ip' => 'Order Custom Fields Ip',
            'order_customFields_offer' => 'Order Custom Fields Offer',
            'order_customFields_country' => 'Order Custom Fields Country',
            'order_customFields_utm_source' => 'Order Custom Fields Utm Source',
            'order_customFields_landing_url' => 'Order Custom Fields Landing Url',
            'order_customFields_utm_content' => 'Order Custom Fields Utm Content',
            'order_customFields_landing_type' => 'Order Custom Fields Landing Type',
            'order_customFields_utm_term' => 'Order Custom Fields Utm Term',
            'order_customFields_utm_medium' => 'Order Custom Fields Utm Medium',
            'order_customFields_transaction_id' => 'Order Custom Fields Transaction ID',
            'order_customFields_sum_taxes' => 'Order Custom Fields Sum Taxes',
            'order_customFields_status_ob' => 'Order Custom Fields Status Ob',
            'order_customFields_source' => 'Order Custom Fields Source',
            'order_customFields_roistat' => 'Order Custom Fields Roistat',
            'order_customFields_profession' => 'Order Custom Fields Profession',
            'order_customFields_pol' => 'Order Custom Fields Pol',
            'order_customFields_order_source' => 'Order Custom Fields Order Source',
            'order_customFields_order_date' => 'Order Custom Fields Order Date',
            'order_customFields_money_date' => 'Order Custom Fields Money Date',
            'order_customFields_lead_domain' => 'Order Custom Fields Lead Domain',
            'order_customFields_language' => 'Order Custom Fields Language',
            'order_customFields_form_type' => 'Order Custom Fields Form Type',
            'order_customFields_dop_telefone' => 'Order Custom Fields Dop Telefone',
            'order_customFields_date_warehouse' => 'Order Custom Fields Date Warehouse',
            'order_customFields_date_of_sending' => 'Order Custom Fields Date Of Sending',
            'order_customFields_date_of_delivery' => 'Order Custom Fields Date Of Delivery',
            'order_customFields_cpa_order_id' => 'Order Custom Fields Cpa Order ID',
            'order_customFields_cost_of_delivery' => 'Order Custom Fields Cost Of Delivery',
            'order_customFields_birth_date' => 'Order Custom Fields Birth Date',
            'order_customFields_any_currency' => 'Order Custom Fields Any Currency',
            'order_customFields_ad_order_id' => 'Order Custom Fields Ad Order ID',
            'order_customFields_a_bid' => 'Order Custom Fields A Bid',
            'order_customFields_utm_campaign' => 'Order Custom Fields Utm Campaign',
            'order_customFields_a_aid' => 'Order Custom Fields A Aid',
            'order_customFields_aa_transaction_id' => 'Order Custom Fields Aa Transaction ID',
            'order_customFields_aff_id' => 'Order Custom Fields Aff ID',
            'order_customFields_keyword' => 'Order Custom Fields Keyword',
            'order_customFields_kurier' => 'Order Custom Fields Kurier',
            'order_customFields_nomer_otpravleniya' => 'Order Custom Fields Nomer Otpravleniya',
            'order_customFields_shtrih' => 'Order Custom Fields Shtrih',
            'order_customFields_vidned' => 'Order Custom Fields Vidned',
            'order_customFields_why_not' => 'Order Custom Fields Why Not',
            'order_customFields_comment_kur' => 'Order Custom Fields Comment Kur',
            'order_customFields_affiliate' => 'Order Custom Fields Affiliate',
            'order_customFields_kliet_teperature' => 'Order Custom Fields Kliet Teperature',
            'order_customFields_treb' => 'Order Custom Fields Treb',
            'order_customFields_pap_order_id' => 'Order Custom Fields Pap Order ID',
            'order_customFields_everad' => 'Order Custom Fields Everad',
            'order_customFields_form_theme' => 'Order Custom Fields Form Theme',
            'order_customFields_sid' => 'Order Custom Fields Sid',
            'order_customFields_uid' => 'Order Custom Fields Uid',
            'order_customFields_treb_sver' => 'Order Custom Fields Treb Sver',
            'order_customFields_date_of_arrival' => 'Order Custom Fields Date Of Arrival',
            'order_customFields_srok_nedozvona' => 'Order Custom Fields Srok Nedozvona',
            'order_customFields_posledniyi_data' => 'Order Custom Fields Posledniyi Data',
            'order_customFields_manager' => 'Order Custom Fields Manager',
            'order_customFields_planiruemaya_data' => 'Order Custom Fields Planiruemaya Data',
            'order_customFields_hochet_pochtoy' => 'Order Custom Fields Hochet Pochtoy',
            'order_customFields_api_mark' => 'Order Custom Fields Api Mark',
            'order_customFields_ad_sid' => 'Order Custom Fields Ad Sid',
            'order_customFields_country_kma' => 'Order Custom Fields Country Kma',
            'order_customFields_affiliate_id' => 'Order Custom Fields Affiliate ID',
            'order_customFields_price_for_lead' => 'Order Custom Fields Price For Lead',
            'order_customFields_organization' => 'Order Custom Fields Organization',
            'order_customFields_cash_on_delivery' => 'Order Custom Fields Cash On Delivery',
            'order_customFields_cost_of_return' => 'Order Custom Fields Cost Of Return',
            'order_customFields_pereotpravka' => 'Order Custom Fields Pereotpravka',
            'order_customFields_second' => 'Order Custom Fields Second',
            'order_customFields_currency' => 'Order Custom Fields Currency',
            'order_customFields_delivery_method' => 'Order Custom Fields Delivery Method',
            'order_customFields_service_word' => 'Order Custom Fields Service Word',
            'order_customFields_external_id' => 'Order Custom Fields External ID',
            'order_customFields_cpa_id' => 'Order Custom Fields Cpa ID',
            'order_customFields_click_id' => 'Order Custom Fields Click ID',
            'order_customFields_delivery_manager' => 'Order Custom Fields Delivery Manager',
            'order_customFields_numb_schet' => 'Order Custom Fields Numb Schet',
            'order_customFields_numb_doc' => 'Order Custom Fields Numb Doc',
            'order_customFields_time_zone' => 'Order Custom Fields Time Zone',
            'order_customFields_fact_pay' => 'Order Custom Fields Fact Pay',
            'order_customFields_forwarded_id' => 'Order Custom Fields Forwarded ID',
            'order_customFields_numb_acc_transfer_money' => 'Order Custom Fields Numb Acc Transfer Money',
            'order_customFields_payment_currency' => 'Order Custom Fields Payment Currency',
        ];
    }
}
