<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Order;

/**
 * OrderSearch represents the model behind the search form about `backend\models\Order`.
 */
class OrderSearch extends Order
{
   public $address;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'order_mark', 'order_call', 'order_expired', 'order_managerId', 'order_fromApi', 'order_shipped', 'order_deleted', 'order_uploadedToExternalStoreSystem'], 'integer'],
            [['order_number', 'order_externalId', 'order_orderType', 'order_orderMethod', 'order_createdAt', 'order_statusUpdatedAt', 'order_markDatetime', 'order_lastName', 'order_firstName', 'order_patronymic', 'order_phone', 'order_additionalPhone', 'order_email', 'order_customerComment', 'order_managerComment', 'order_paymentDetail', 'order_paymentType', 'order_paymentStatus', 'order_site', 'order_status', 'order_statusComment', 'order_sourceId', 'order_shipmentDate', 'order_contragentType', 'order_legalName', 'order_legalAddress', 'order_INN', 'order_OKPO', 'order_KPP', 'order_OGRN', 'order_OGRNIP', 'order_certificateNumber', 'order_certificateDate', 'order_BIK', 'order_bank', 'order_bankAddress', 'order_corrAccount', 'order_bankAccount', 'order_shipmentStore', 'order_slug', 'order_countryIso','order_id'], 'safe'],
            [['order_summ', 'order_totalSumm', 'order_prepaySum', 'order_purchaseSumm', 'order_discount', 'order_discountPercent'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Order::find()->andWhere(['order_countryIso' => ("KZ")])
            ->andWhere(['order_status' => ("send")]);

        $query->joinWith('address');
//        $query->joinWith('items');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('address');
//        $query->joinWith('items');

        // grid filtering conditions
        $query->andFilterWhere([
            'order_id' => $this->order_id,
            'order_createdAt' => $this->order_createdAt,
            'order_statusUpdatedAt' => $this->order_statusUpdatedAt,
            'order_summ' => $this->order_summ,
            'order_totalSumm' => $this->order_totalSumm,
            'order_prepaySum' => $this->order_prepaySum,
            'order_purchaseSumm' => $this->order_purchaseSumm,
            'order_discount' => $this->order_discount,
            'order_discountPercent' => $this->order_discountPercent,
            'order_mark' => $this->order_mark,
            'order_markDatetime' => $this->order_markDatetime,
            'order_call' => $this->order_call,
            'order_expired' => $this->order_expired,
            'order_managerId' => $this->order_managerId,
            'order_fromApi' => $this->order_fromApi,
            'order_shipmentDate' => $this->order_shipmentDate,
            'order_shipped' => $this->order_shipped,
            'order_certificateDate' => $this->order_certificateDate,
            'order_deleted' => $this->order_deleted,
            'order_uploadedToExternalStoreSystem' => $this->order_uploadedToExternalStoreSystem,
        ]);

        $query->andFilterWhere(['like', 'order_number', $this->order_number])
            ->andFilterWhere(['like', 'order_externalId', $this->order_externalId])
            ->andFilterWhere(['like', 'order_orderType', $this->order_orderType])
            ->andFilterWhere(['like', 'order_orderMethod', $this->order_orderMethod])
            ->andFilterWhere(['like', 'order_lastName', $this->order_lastName])
            ->andFilterWhere(['like', 'order_firstName', $this->order_firstName])
            ->andFilterWhere(['like', 'order_patronymic', $this->order_patronymic])
            ->andFilterWhere(['like', 'order_phone', $this->order_phone])
            ->andFilterWhere(['like', 'order_additionalPhone', $this->order_additionalPhone])
            ->andFilterWhere(['like', 'order_email', $this->order_email])
            ->andFilterWhere(['like', 'order_customerComment', $this->order_customerComment])
            ->andFilterWhere(['like', 'order_managerComment', $this->order_managerComment])
            ->andFilterWhere(['like', 'order_paymentDetail', $this->order_paymentDetail])
            ->andFilterWhere(['like', 'order_paymentType', $this->order_paymentType])
            ->andFilterWhere(['like', 'order_paymentStatus', $this->order_paymentStatus])
            ->andFilterWhere(['like', 'order_site', $this->order_site])
            ->andFilterWhere(['like', 'order_status', $this->order_status])
            ->andFilterWhere(['like', 'order_statusComment', $this->order_statusComment])
            ->andFilterWhere(['like', 'order_sourceId', $this->order_sourceId])
            ->andFilterWhere(['like', 'order_contragentType', $this->order_contragentType])
            ->andFilterWhere(['like', 'order_legalName', $this->order_legalName])
            ->andFilterWhere(['like', 'order_legalAddress', $this->order_legalAddress])
            ->andFilterWhere(['like', 'order_INN', $this->order_INN])
            ->andFilterWhere(['like', 'order_OKPO', $this->order_OKPO])
            ->andFilterWhere(['like', 'order_KPP', $this->order_KPP])
            ->andFilterWhere(['like', 'order_OGRN', $this->order_OGRN])
            ->andFilterWhere(['like', 'order_OGRNIP', $this->order_OGRNIP])
            ->andFilterWhere(['like', 'order_certificateNumber', $this->order_certificateNumber])
            ->andFilterWhere(['like', 'order_BIK', $this->order_BIK])
            ->andFilterWhere(['like', 'order_bank', $this->order_bank])
            ->andFilterWhere(['like', 'order_bankAddress', $this->order_bankAddress])
            ->andFilterWhere(['like', 'order_corrAccount', $this->order_corrAccount])
            ->andFilterWhere(['like', 'order_bankAccount', $this->order_bankAccount])
            ->andFilterWhere(['like', 'order_shipmentStore', $this->order_shipmentStore])
            ->andFilterWhere(['like', 'order_slug', $this->order_slug])
            ->andFilterWhere(['like', 'order_countryIso', $this->order_countryIso]);
//            ->andFilterWhere(['like', 'order_items.order_items_quantity', $this->order_id]);

        return $dataProvider;
    }
}
