<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Order */

$this->title = $model->order_id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->order_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->order_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'order_id',
            'order_number',
            'order_externalId',
            'order_orderType',
            'order_orderMethod',
            'order_createdAt',
            'order_statusUpdatedAt',
            'order_summ',
            'order_totalSumm',
            'order_prepaySum',
            'order_purchaseSumm',
            'order_discount',
            'order_discountPercent',
            'order_mark',
            'order_markDatetime',
            'order_lastName',
            'order_firstName',
            'order_patronymic',
            'order_phone',
            'order_additionalPhone',
            'order_email:email',
            'order_call',
            'order_expired',
            'order_customerComment',
            'order_managerComment',
            'order_paymentDetail',
            'order_managerId',
            'order_paymentType',
            'order_paymentStatus',
            'order_site',
            'order_status',
            'order_statusComment',
            'order_sourceId',
            'order_fromApi',
            'order_shipmentDate',
            'order_shipped',
            'order_contragentType',
            'order_legalName',
            'order_legalAddress',
            'order_INN',
            'order_OKPO',
            'order_KPP',
            'order_OGRN',
            'order_OGRNIP',
            'order_certificateNumber',
            'order_certificateDate',
            'order_BIK',
            'order_bank',
            'order_bankAddress',
            'order_corrAccount',
            'order_bankAccount',
            'order_shipmentStore',
            'order_slug',
            'order_deleted',
            'order_countryIso',
            'order_uploadedToExternalStoreSystem',
        ],
    ]) ?>

</div>
