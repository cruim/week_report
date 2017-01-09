<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order_id')->textInput() ?>

    <?= $form->field($model, 'order_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_externalId')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_orderType')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_orderMethod')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_createdAt')->textInput() ?>

    <?= $form->field($model, 'order_statusUpdatedAt')->textInput() ?>

    <?= $form->field($model, 'order_summ')->textInput() ?>

    <?= $form->field($model, 'order_totalSumm')->textInput() ?>

    <?= $form->field($model, 'order_prepaySum')->textInput() ?>

    <?= $form->field($model, 'order_purchaseSumm')->textInput() ?>

    <?= $form->field($model, 'order_discount')->textInput() ?>

    <?= $form->field($model, 'order_discountPercent')->textInput() ?>

    <?= $form->field($model, 'order_mark')->textInput() ?>

    <?= $form->field($model, 'order_markDatetime')->textInput() ?>

    <?= $form->field($model, 'order_lastName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_firstName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_patronymic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_additionalPhone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_call')->textInput() ?>

    <?= $form->field($model, 'order_expired')->textInput() ?>

    <?= $form->field($model, 'order_customerComment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_managerComment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_paymentDetail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_managerId')->textInput() ?>

    <?= $form->field($model, 'order_paymentType')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_paymentStatus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_site')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_statusComment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_sourceId')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_fromApi')->textInput() ?>

    <?= $form->field($model, 'order_shipmentDate')->textInput() ?>

    <?= $form->field($model, 'order_shipped')->textInput() ?>

    <?= $form->field($model, 'order_contragentType')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_legalName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_legalAddress')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_INN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_OKPO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_KPP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_OGRN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_OGRNIP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_certificateNumber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_certificateDate')->textInput() ?>

    <?= $form->field($model, 'order_BIK')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_bank')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_bankAddress')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_corrAccount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_bankAccount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_shipmentStore')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_deleted')->textInput() ?>

    <?= $form->field($model, 'order_countryIso')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_uploadedToExternalStoreSystem')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
