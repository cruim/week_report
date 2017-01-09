<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\OrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'order_id') ?>

    <?= $form->field($model, 'order_number') ?>

    <?= $form->field($model, 'order_externalId') ?>

    <?= $form->field($model, 'order_orderType') ?>

    <?= $form->field($model, 'order_orderMethod') ?>

    <?php // echo $form->field($model, 'order_createdAt') ?>

    <?php // echo $form->field($model, 'order_statusUpdatedAt') ?>

    <?php // echo $form->field($model, 'order_summ') ?>

    <?php // echo $form->field($model, 'order_totalSumm') ?>

    <?php // echo $form->field($model, 'order_prepaySum') ?>

    <?php // echo $form->field($model, 'order_purchaseSumm') ?>

    <?php // echo $form->field($model, 'order_discount') ?>

    <?php // echo $form->field($model, 'order_discountPercent') ?>

    <?php // echo $form->field($model, 'order_mark') ?>

    <?php // echo $form->field($model, 'order_markDatetime') ?>

    <?php // echo $form->field($model, 'order_lastName') ?>

    <?php // echo $form->field($model, 'order_firstName') ?>

    <?php // echo $form->field($model, 'order_patronymic') ?>

    <?php // echo $form->field($model, 'order_phone') ?>

    <?php // echo $form->field($model, 'order_additionalPhone') ?>

    <?php // echo $form->field($model, 'order_email') ?>

    <?php // echo $form->field($model, 'order_call') ?>

    <?php // echo $form->field($model, 'order_expired') ?>

    <?php // echo $form->field($model, 'order_customerComment') ?>

    <?php // echo $form->field($model, 'order_managerComment') ?>

    <?php // echo $form->field($model, 'order_paymentDetail') ?>

    <?php // echo $form->field($model, 'order_managerId') ?>

    <?php // echo $form->field($model, 'order_paymentType') ?>

    <?php // echo $form->field($model, 'order_paymentStatus') ?>

    <?php // echo $form->field($model, 'order_site') ?>

    <?php // echo $form->field($model, 'order_status') ?>

    <?php // echo $form->field($model, 'order_statusComment') ?>

    <?php // echo $form->field($model, 'order_sourceId') ?>

    <?php // echo $form->field($model, 'order_fromApi') ?>

    <?php // echo $form->field($model, 'order_shipmentDate') ?>

    <?php // echo $form->field($model, 'order_shipped') ?>

    <?php // echo $form->field($model, 'order_contragentType') ?>

    <?php // echo $form->field($model, 'order_legalName') ?>

    <?php // echo $form->field($model, 'order_legalAddress') ?>

    <?php // echo $form->field($model, 'order_INN') ?>

    <?php // echo $form->field($model, 'order_OKPO') ?>

    <?php // echo $form->field($model, 'order_KPP') ?>

    <?php // echo $form->field($model, 'order_OGRN') ?>

    <?php // echo $form->field($model, 'order_OGRNIP') ?>

    <?php // echo $form->field($model, 'order_certificateNumber') ?>

    <?php // echo $form->field($model, 'order_certificateDate') ?>

    <?php // echo $form->field($model, 'order_BIK') ?>

    <?php // echo $form->field($model, 'order_bank') ?>

    <?php // echo $form->field($model, 'order_bankAddress') ?>

    <?php // echo $form->field($model, 'order_corrAccount') ?>

    <?php // echo $form->field($model, 'order_bankAccount') ?>

    <?php // echo $form->field($model, 'order_shipmentStore') ?>

    <?php // echo $form->field($model, 'order_slug') ?>

    <?php // echo $form->field($model, 'order_deleted') ?>

    <?php // echo $form->field($model, 'order_countryIso') ?>

    <?php // echo $form->field($model, 'order_uploadedToExternalStoreSystem') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
