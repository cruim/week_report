<?php


use yii\grid\GridView;
use kartik\export\ExportMenu;
use backend\models\OrderItems;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Доставляемость';

$this->params['breadcrumbs'][] = $this->title;


?>

<div class="order-index">
    <h1>Недельная доставляемость</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div style="width: 50%; margin: 0 auto; text-align: center;">
        <button class='btn btn-primary'  style="width:185px;height:60px;display:inline-block;" onclick="location.href = 'http://logista.zdorov.pro/money/backend/web/index.php?r=order%2Findex'"> Подробные данные в<br>деньгах(прошлый месяц)</button>
        <button class='btn btn-primary'  style="width:185px;height:60px;display:inline-block;" onclick="location.href = 'http://logista.zdorov.pro/odds/backend/web/index.php?r=order%2Findex'">Сравнение за<br>прошлый месяц</button>
        <button class='btn btn-primary'  style="width:185px;height:60px;display:inline-block;" onclick="location.href = 'http://logista.zdorov.pro/delivery/backend/web/index.php?r=order%2Findex'">Доставляемость за<br>прошлый месяц</button>
    </div>
    
    <div style="width: 50%; margin: 0 auto; text-align: center;"><br>
        <?php $form = ActiveForm::begin(['id' => 'one_week_ago', 'method' => 'GET',]) ?>
        <input type="hidden" value="1" name="one_week_ago">

        <div class="form-group" style="float:left;" >
            <?= Html::submitButton('1 неделя', ['class' => 'btn btn-primary', 'name' => 'last1']) ?>
        </div>

        <?php ActiveForm::end(); ?>
        <?php $form1 = ActiveForm::begin(['id' => 'two_week_ago', 'method' => 'GET']); ?>
        <input type="hidden" value="2" name="two_week_ago" >

        <div class="form-group" style="float:left; margin-left: 5px;">
            <?= Html::submitButton('2 неделя', ['class' => 'btn btn-primary', 'name' => 'last2']) ?>
        </div>

        <?php ActiveForm::end();?>

        <?php $form1 = ActiveForm::begin(['id' => 'three_week_ago', 'method' => 'GET']); ?>
        <input type="hidden" value="3" name="three_week_ago" >

        <div class="form-group" style="float:left;margin-left: 5px;">
            <?= Html::submitButton('3 неделя', ['class' => 'btn btn-primary', 'name' => 'last3']) ?>
        </div>

        <?php ActiveForm::end(); ?>

        <?php $form1 = ActiveForm::begin(['id' => 'four_week_ago', 'method' => 'GET']); ?>
        <input type="hidden" value="4" name="four_week_ago" >

        <div class="form-group" style="float:left;margin-left: 5px;">
            <?= Html::submitButton('4 неделя', ['class' => 'btn btn-primary', 'name' => 'last4']) ?>
        </div>
        <div style="clear:both;"></div>
        <?php ActiveForm::end(); ?>
    </div>
    </div>


    <?php
    $gridColumns = [

        [
            'header' => 'Тип',
            'value' => 'order_customFields_delivery_method',

        ],

        [
//                'class' => \backend\models\NumberColumn::className(),

            'header' => 'Оформленные',
            'value' => function ($data)
            {
                return $data['paid'] + $data['later'] + $data['deliveryapproved'] + $data['problem'] + $data['refusetosend']
                + $data['refusetoreceive'] + $data['sent'] + $data['send'] + $data['parcelreturned'] + $data['stop']
                + $data['parcelonaplace'] + $data['delivered'] + $data['injob'] + $data['fake'];

            }],
        [

            'header' => 'От продаж',
            'value' => function ($data)
            {
                try
                {
                    $otProdaz = ($data['paid'] + $data['delivered']) / ($data['paid'] + $data['later'] + $data['deliveryapproved'] +                                        $data['problem'] + $data['refusetosend']
                            + $data['refusetoreceive'] + $data['sent'] + $data['send'] + $data['parcelreturned'] + $data['stop']
                            + $data['parcelonaplace'] + $data['delivered'] + $data['injob'] + $data['fake']) * 100;
                    return round($otProdaz, 2);
                } catch (ErrorException $e)
                {
                    return 0;
                }
            }

        ],

        [
            'header' => 'Разница с топом',
            'value' => function ($data){
                try{
                    $top =  ($data['paid'] + $data['delivered']) / ($data['paid'] + $data['later'] + $data['deliveryapproved'] + $data['problem'] + $data['refusetosend']
                            + $data['refusetoreceive'] + $data['sent'] + $data['send'] + $data['parcelreturned'] + $data['stop']
                            + $data['parcelonaplace'] + $data['delivered'] + $data['injob'] + $data['fake']) * 100 - $data['top'];
                    return round($top, 2);
                }
                catch (ErrorException $e)
                {
                    return 0;
                }
            }
        ],

        [
            //                'class' => \backend\models\NumberColumn::className(),

            'header' => 'Отправленные',
            'value' => function ($data)
            {
                try
                {
                    return (($data['paid'] + $data['problem'] +
                        $data['refusetoreceive'] + $data['sent'] + $data['parcelreturned'] +
                        $data['parcelonaplace'] + $data['delivered'] + $data['injob'] + $data['fake']));
                } catch (ErrorException $e)
                {
                    return 0;
                }

            }
        ],

        [

            'header' => 'От отправки',
            'value' => function ($data)
            {
                try
                {
                    $otOtpravki = ($data['paid'] + $data['delivered']) / ($data['paid'] + $data['problem'] +
                            $data['refusetoreceive'] + $data['sent'] + $data['parcelreturned'] +
                            $data['parcelonaplace'] + $data['delivered'] + $data['injob'] + $data['fake'])
                        * 100;
                    return round($otOtpravki, 2);
                } catch (ErrorException $e)
                {
                    return 0;
                }
            }
        ],

        [

            'header' => 'Средний чек Продано',
            'value' => function ($data)
            {
                if ($data['order_customFields_delivery_method'] == 'eu-multi' or $data['order_customFields_delivery_method'] == 'eu_acs' or
                    $data['order_customFields_delivery_method'] == 'eu_dhl' or $data['order_customFields_delivery_method'] == 'eu_dhl_int' or
                    $data['order_customFields_delivery_method'] == 'eu_dpd' or $data['order_customFields_delivery_method'] == 'eu_ups' or
                    $data['order_customFields_delivery_method'] == 'eu_venipak' or $data['order_customFields_delivery_method'] == 'Евросоюз Cream' or $data['order_customFields_delivery_method'] == 'eu_ups нац.' or $data['order_customFields_delivery_method'] == 'eu_dhl нац.'
                )
                {
                    try
                    {
                        return round(($data['paid2'] + $data['later2'] + $data['deliveryapproved2'] + $data['problem2'] + $data['refusetosend2'] + $data['refusetoreceive2'] + $data['sent2'] + $data['send2'] + $data['parcelreturned2'] + $data['stop2']
                                + $data['parcelonaplace2'] + $data['delivered2'] + $data['injob2'] + $data['fake2']) / ($data['paid'] + $data['later'] + $data['deliveryapproved'] + $data['problem'] + $data['refusetosend']
                                + $data['refusetoreceive'] + $data['sent'] + $data['send'] + $data['parcelreturned'] + $data['stop']
                                + $data['parcelonaplace'] + $data['delivered'] + $data['injob'] + $data['fake']) * 64, 2);
                    } catch (ErrorException $e)
                    {
                        return 0;
                    }

                } elseif ($data['order_customFields_delivery_method'] == 'EMS Почта России' or $data['order_customFields_delivery_method'] == 'Pony Express Россия'
                    or $data['order_customFields_delivery_method'] == 'Доставка Почтой России' or $data['order_customFields_delivery_method'] == 'МОСКВА'
                    or $data['order_customFields_delivery_method'] == 'BetaPost' or $data['order_customFields_delivery_method'] == 'КСЭ'
                    or $data['order_customFields_delivery_method'] == 'Москва BetaPro' or $data['order_customFields_delivery_method'] == 'СДЭК' or $data['order_customFields_delivery_method'] == 'СПСР' or $data['order_customFields_delivery_method'] == 'Россия'
                )
                {
                    try
                    {
                        return round(($data['paid2'] + $data['later2'] + $data['deliveryapproved2'] + $data['problem2'] + $data['refusetosend2'] + $data['refusetoreceive2'] + $data['sent2'] + $data['send2'] + $data['parcelreturned2'] + $data['stop2']
                                + $data['parcelonaplace2'] + $data['delivered2'] + $data['injob2'] + $data['fake2']) / ($data['paid'] + $data['later'] + $data['deliveryapproved'] + $data['problem'] + $data['refusetosend']
                                + $data['refusetoreceive'] + $data['sent'] + $data['send'] + $data['parcelreturned'] + $data['stop']
                                + $data['parcelonaplace'] + $data['delivered'] + $data['injob'] + $data['fake']), 2);
                    } catch (ErrorException $e)
                    {
                        return 0;
                    }
                }

                elseif ($data['order_customFields_delivery_method'] == 'kz_kotransit' or $data['order_customFields_delivery_method'] == 'kz_pony'
                    or $data['order_customFields_delivery_method'] == 'kz_post' or $data['order_customFields_delivery_method'] == 'Казахстан КАЗПОЧТА'
                    or $data['order_customFields_delivery_method'] == 'Казахстан Курьеры' or $data['order_customFields_delivery_method'] == 'КАЗАХСТАН'
                    or $data['order_customFields_delivery_method'] == 'ПОЧТА'
                )
                {
                    try
                    {
                        return round(($data['paid2'] + $data['later2'] + $data['deliveryapproved2'] + $data['problem2'] + $data['refusetosend2'] + $data['refusetoreceive2'] + $data['sent2'] + $data['send2'] + $data['parcelreturned2'] + $data['stop2']
                                + $data['parcelonaplace2'] + $data['delivered2'] + $data['injob2'] + $data['fake2']) / ($data['paid'] + $data['later'] + $data['deliveryapproved'] + $data['problem'] + $data['refusetosend']
                                + $data['refusetoreceive'] + $data['sent'] + $data['send'] + $data['parcelreturned'] + $data['stop']
                                + $data['parcelonaplace'] + $data['delivered'] + $data['injob'] + $data['fake'])*0.18, 2);
                    } catch (ErrorException $e)
                    {
                        return 0;
                    }
                }

                elseif ($data['order_customFields_delivery_method'] == 'МОЛДАВИЯ' or $data['order_customFields_delivery_method'] == 'МОЛДАВИЯ МeEx'
                    or $data['order_customFields_delivery_method'] == 'md_couriers' or $data['order_customFields_delivery_method'] == 'МОЛДАВИЯ МeEx md_kishinev'
                    or $data['order_customFields_delivery_method'] == 'md_memo' or $data['order_customFields_delivery_method'] == 'md_novaposhta'
                    or $data['order_customFields_delivery_method'] == 'md_post' or $data['order_customFields_delivery_method'] == 'МОЛДАВИЯ md_kishinev' or $data['order_customFields_delivery_method'] == 'ВСЯ МОЛДАВИЯ'
                )
                {
                    try
                    {
                        return round(($data['paid2'] + $data['later2'] + $data['deliveryapproved2'] + $data['problem2'] + $data['refusetosend2'] + $data['refusetoreceive2'] + $data['sent2'] + $data['send2'] + $data['parcelreturned2'] + $data['stop2']
                                + $data['parcelonaplace2'] + $data['delivered2'] + $data['injob2'] + $data['fake2']) / ($data['paid'] + $data['later'] + $data['deliveryapproved'] + $data['problem'] + $data['refusetosend']
                                + $data['refusetoreceive'] + $data['sent'] + $data['send'] + $data['parcelreturned'] + $data['stop']
                                + $data['parcelonaplace'] + $data['delivered'] + $data['injob'] + $data['fake'])*3.05, 2);
                    } catch (ErrorException $e)
                    {
                        return 0;
                    }
                }

                elseif ($data['order_customFields_delivery_method'] == 'АЗЕРБАЙДЖАН' or $data['order_customFields_delivery_method'] == 'АЗЕРБАЙДЖАН КРЕМ'
                    or $data['order_customFields_delivery_method'] == 'Pony Express Азербайджан' or $data['order_customFields_delivery_method'] == 'ВЕСЬ АЗЕРБАЙДЖАН'
                )
                {
                    try
                    {
                        return round(($data['paid2'] + $data['later2'] + $data['deliveryapproved2'] + $data['problem2'] + $data['refusetosend2'] + $data['refusetoreceive2'] + $data['sent2'] + $data['send2'] + $data['parcelreturned2'] + $data['stop2']
                                + $data['parcelonaplace2'] + $data['delivered2'] + $data['injob2'] + $data['fake2']) / ($data['paid'] + $data['later'] + $data['deliveryapproved'] + $data['problem'] + $data['refusetosend']
                                + $data['refusetoreceive'] + $data['sent'] + $data['send'] + $data['parcelreturned'] + $data['stop']
                                + $data['parcelonaplace'] + $data['delivered'] + $data['injob'] + $data['fake'])*31.5, 2);
                    } catch (ErrorException $e)
                    {
                        return 0;
                    }
                }

                elseif ($data['order_customFields_delivery_method'] == 'Армения BPro'
                )
                {
                    try
                    {
                        return round(($data['paid2'] + $data['later2'] + $data['deliveryapproved2'] + $data['problem2'] + $data['refusetosend2'] + $data['refusetoreceive2'] + $data['sent2'] + $data['send2'] + $data['parcelreturned2'] + $data['stop2']
                                + $data['parcelonaplace2'] + $data['delivered2'] + $data['injob2'] + $data['fake2']) / ($data['paid'] + $data['later'] + $data['deliveryapproved'] + $data['problem'] + $data['refusetosend']
                                + $data['refusetoreceive'] + $data['sent'] + $data['send'] + $data['parcelreturned'] + $data['stop']
                                + $data['parcelonaplace'] + $data['delivered'] + $data['injob'] + $data['fake'])*0.12, 2);
                    } catch (ErrorException $e)
                    {
                        return 0;
                    }
                }

                elseif ($data['order_customFields_delivery_method'] == 'Киргизия KZ' or $data['order_customFields_delivery_method'] == 'Киргизия СПСР' or $data['order_customFields_delivery_method'] == 'ВСЯ КИРГИЗИЯ'
                )
                {
                    try
                    {
                        return round(($data['paid2'] + $data['later2'] + $data['deliveryapproved2'] + $data['problem2'] + $data['refusetosend2'] + $data['refusetoreceive2'] + $data['sent2'] + $data['send2'] + $data['parcelreturned2'] + $data['stop2']
                                + $data['parcelonaplace2'] + $data['delivered2'] + $data['injob2'] + $data['fake2']) / ($data['paid'] + $data['later'] + $data['deliveryapproved'] + $data['problem'] + $data['refusetosend']
                                + $data['refusetoreceive'] + $data['sent'] + $data['send'] + $data['parcelreturned'] + $data['stop']
                                + $data['parcelonaplace'] + $data['delivered'] + $data['injob'] + $data['fake'])*0.87, 2);
                    } catch (ErrorException $e)
                    {
                        return 0;
                    }
                }

                elseif ($data['order_customFields_delivery_method'] == 'Киргизия KZ' or $data['order_customFields_delivery_method'] == 'Киргизия СПСР' or $data['order_customFields_delivery_method'] == 'ВСЯ КИРГИЗИЯ'
                )
                {
                    try
                    {
                        return round(($data['paid2'] + $data['later2'] + $data['deliveryapproved2'] + $data['problem2'] + $data['refusetosend2'] + $data['refusetoreceive2'] + $data['sent2'] + $data['send2'] + $data['parcelreturned2'] + $data['stop2']
                                + $data['parcelonaplace2'] + $data['delivered2'] + $data['injob2'] + $data['fake2']) / ($data['paid'] + $data['later'] + $data['deliveryapproved'] + $data['problem'] + $data['refusetosend']
                                + $data['refusetoreceive'] + $data['sent'] + $data['send'] + $data['parcelreturned'] + $data['stop']
                                + $data['parcelonaplace'] + $data['delivered'] + $data['injob'] + $data['fake'])*0.87, 2);
                    } catch (ErrorException $e)
                    {
                        return 0;
                    }
                }

                elseif ($data['order_customFields_delivery_method'] == 'УКРАИНА'
                )
                {
                    try
                    {
                        return round(($data['paid2'] + $data['later2'] + $data['deliveryapproved2'] + $data['problem2'] + $data['refusetosend2'] + $data['refusetoreceive2'] + $data['sent2'] + $data['send2'] + $data['parcelreturned2'] + $data['stop2']
                                + $data['parcelonaplace2'] + $data['delivered2'] + $data['injob2'] + $data['fake2']) / ($data['paid'] + $data['later'] + $data['deliveryapproved'] + $data['problem'] + $data['refusetosend']
                                + $data['refusetoreceive'] + $data['sent'] + $data['send'] + $data['parcelreturned'] + $data['stop']
                                + $data['parcelonaplace'] + $data['delivered'] + $data['injob'] + $data['fake'])*2.22, 2);
                    } catch (ErrorException $e)
                    {
                        return 0;
                    }
                }

                elseif ($data['order_customFields_delivery_method'] == 'uz_btc' or $data['order_customFields_delivery_method'] == 'uz_mega'
                    or $data['order_customFields_delivery_method'] == '	Узбекистан Регионы uz_svoy_kur' or $data['order_customFields_delivery_method'] == 'УЗБЕКИСТАН' or $data['order_customFields_delivery_method'] == 'Узбекистан Ташкент uz_svoy_kur'
                    or $data['order_customFields_delivery_method'] == 'Узбекистан Регионы' or $data['order_customFields_delivery_method'] == 'Узбекистан Ташкент' or $data['order_customFields_delivery_method'] == 'Узбекистан Ташкент uz_svoy_kur' or $data['order_customFields_delivery_method'] == 'Узбекистан Регионы uz_svoy_kur'
                )
                {
                    try
                    {
                        return round(($data['paid2'] + $data['later2'] + $data['deliveryapproved2'] + $data['problem2'] + $data['refusetosend2'] + $data['refusetoreceive2'] + $data['sent2'] + $data['send2'] + $data['parcelreturned2'] + $data['stop2']
                                + $data['parcelonaplace2'] + $data['delivered2'] + $data['injob2'] + $data['fake2']) / ($data['paid'] + $data['later'] + $data['deliveryapproved'] + $data['problem'] + $data['refusetosend']
                                + $data['refusetoreceive'] + $data['sent'] + $data['send'] + $data['parcelreturned'] + $data['stop']
                                + $data['parcelonaplace'] + $data['delivered'] + $data['injob'] + $data['fake'])*(60.65/6800), 2);
                    } catch (ErrorException $e)
                    {
                        return 0;
                    }
                }

                elseif ($data['order_customFields_delivery_method'] == 'Грузия'
                )
                {
                    try
                    {
                        return round(($data['paid2'] + $data['later2'] + $data['deliveryapproved2'] + $data['problem2'] + $data['refusetosend2'] + $data['refusetoreceive2'] + $data['sent2'] + $data['send2'] + $data['parcelreturned2'] + $data['stop2']
                                + $data['parcelonaplace2'] + $data['delivered2'] + $data['injob2'] + $data['fake2']) / ($data['paid'] + $data['later'] + $data['deliveryapproved'] + $data['problem'] + $data['refusetosend']
                                + $data['refusetoreceive'] + $data['sent'] + $data['send'] + $data['parcelreturned'] + $data['stop']
                                + $data['parcelonaplace'] + $data['delivered'] + $data['injob'] + $data['fake'])*22.2, 2);
                    } catch (ErrorException $e)
                    {
                        return 0;
                    }
                }



            }
        ],

        [

            'header' => 'Средний чек Выкуплено',
            'value' => function ($data)
            {
                if ($data['order_customFields_delivery_method'] == 'eu-multi' or $data['order_customFields_delivery_method'] == 'eu_acs' or
                    $data['order_customFields_delivery_method'] == 'eu_dhl' or $data['order_customFields_delivery_method'] == 'eu_dhl_int' or
                    $data['order_customFields_delivery_method'] == 'eu_dpd' or $data['order_customFields_delivery_method'] == 'eu_ups' or
                    $data['order_customFields_delivery_method'] == 'eu_venipak' or $data['order_customFields_delivery_method'] == 'Евросоюз Cream' or $data['order_customFields_delivery_method'] == 'eu_ups нац.' or $data['order_customFields_delivery_method'] == 'eu_dhl нац.')

                {
                    try
                    {
                        return round(($data['paid2'] + $data['delivered2']) / ($data['paid'] + $data['delivered']) * 64, 2);

                    } catch (ErrorException $e)
                    {
                        return 0;
                    }
                }
                elseif ($data['order_customFields_delivery_method'] == 'EMS Почта России' or $data['order_customFields_delivery_method'] == 'Pony Express Россия'
                    or $data['order_customFields_delivery_method'] == 'Доставка Почтой России' or $data['order_customFields_delivery_method'] == 'МОСКВА'
                    or $data['order_customFields_delivery_method'] == 'BetaPost' or $data['order_customFields_delivery_method'] == 'КСЭ'
                    or $data['order_customFields_delivery_method'] == 'Москва BetaPro' or $data['order_customFields_delivery_method'] == 'СДЭК' or $data['order_customFields_delivery_method'] == 'СПСР' or $data['order_customFields_delivery_method'] == 'Россия')

                {
                    try
                    {
                        return round(($data['paid2'] + $data['delivered2']) / ($data['paid'] + $data['delivered']), 2);
                    } catch (ErrorException $e)
                    {
                        return 0;
                    }
                }

                elseif ($data['order_customFields_delivery_method'] == 'kz_kotransit' or $data['order_customFields_delivery_method'] == 'kz_pony'
                    or $data['order_customFields_delivery_method'] == 'kz_post' or $data['order_customFields_delivery_method'] == 'Казахстан КАЗПОЧТА'
                    or $data['order_customFields_delivery_method'] == 'Казахстан Курьеры' or $data['order_customFields_delivery_method'] == 'КАЗАХСТАН'
                    or $data['order_customFields_delivery_method'] == 'ПОЧТА')

                {
                    try
                    {
                        return round(($data['paid2'] + $data['delivered2']) / ($data['paid'] + $data['delivered'])*0.18, 2);
                    } catch (ErrorException $e)
                    {
                        return 0;
                    }
                }

                elseif ($data['order_customFields_delivery_method'] == 'МОЛДАВИЯ' or $data['order_customFields_delivery_method'] == 'МОЛДАВИЯ МeEx'
                    or $data['order_customFields_delivery_method'] == 'md_couriers' or $data['order_customFields_delivery_method'] == 'МОЛДАВИЯ МeEx md_kishinev'
                    or $data['order_customFields_delivery_method'] == 'md_memo' or $data['order_customFields_delivery_method'] == 'md_novaposhta'
                    or $data['order_customFields_delivery_method'] == 'md_post' or $data['order_customFields_delivery_method'] == 'МОЛДАВИЯ md_kishinev' or $data['order_customFields_delivery_method'] == 'ВСЯ МОЛДАВИЯ')

                {
                    try
                    {
                        return round(($data['paid2'] + $data['delivered2']) / ($data['paid'] + $data['delivered'])*3.05, 2);
                    } catch (ErrorException $e)
                    {
                        return 0;
                    }
                }

                elseif ($data['order_customFields_delivery_method'] == 'АЗЕРБАЙДЖАН' or $data['order_customFields_delivery_method'] == 'АЗЕРБАЙДЖАН КРЕМ'
                    or $data['order_customFields_delivery_method'] == 'Pony Express Азербайджан' or $data['order_customFields_delivery_method'] == 'ВЕСЬ АЗЕРБАЙДЖАН')

                {
                    try
                    {
                        return round(($data['paid2'] + $data['delivered2']) / ($data['paid'] + $data['delivered'])*31.5, 2);
                    } catch (ErrorException $e)
                    {
                        return 0;
                    }
                }

                elseif ($data['order_customFields_delivery_method'] == 'Армения BPro')

                {
                    try
                    {
                        return round(($data['paid2'] + $data['delivered2']) / ($data['paid'] + $data['delivered'])*0.12, 2);
                    } catch (ErrorException $e)
                    {
                        return 0;
                    }
                }

                elseif ($data['order_customFields_delivery_method'] == 'Киргизия KZ' or $data['order_customFields_delivery_method'] == 'Киргизия СПСР' or $data['order_customFields_delivery_method'] == 'ВСЯ КИРГИЗИЯ')

                {
                    try
                    {
                        return round(($data['paid2'] + $data['delivered2']) / ($data['paid'] + $data['delivered'])*0.87, 2);
                    } catch (ErrorException $e)
                    {
                        return 0;
                    }
                }

                elseif ($data['order_customFields_delivery_method'] == 'УКРАИНА')

                {
                    try
                    {
                        return round(($data['paid2'] + $data['delivered2']) / ($data['paid'] + $data['delivered'])*2.22, 2);
                    } catch (ErrorException $e)
                    {
                        return 0;
                    }
                }

                elseif ($data['order_customFields_delivery_method'] == 'uz_btc' or $data['order_customFields_delivery_method'] == 'uz_mega'
                    or $data['order_customFields_delivery_method'] == '	Узбекистан Регионы uz_svoy_kur' or $data['order_customFields_delivery_method'] == 'УЗБЕКИСТАН' or $data['order_customFields_delivery_method'] == 'Узбекистан Ташкент uz_svoy_kur'
                    or $data['order_customFields_delivery_method'] == 'Узбекистан Регионы' or $data['order_customFields_delivery_method'] == 'Узбекистан Ташкент' or $data['order_customFields_delivery_method'] == 'Узбекистан Ташкент uz_svoy_kur' or $data['order_customFields_delivery_method'] == 'Узбекистан Регионы uz_svoy_kur')

                {
                    try
                    {
                        return round(($data['paid2'] + $data['delivered2']) / ($data['paid'] + $data['delivered'])*(60.65/6800), 2);
                    } catch (ErrorException $e)
                    {
                        return 0;
                    }
                }

                elseif ($data['order_customFields_delivery_method'] == 'Грузия')

                {
                    try
                    {
                        return round(($data['paid2'] + $data['delivered2']) / ($data['paid'] + $data['delivered'])*22.2, 2);
                    } catch (ErrorException $e)
                    {
                        return 0;
                    }
                }



            }
        ],
//        [
//            'header' => 'На доставке',
//            'value' => function($data)
//            {
//                try
//                {
//
//                    $naDostavke = ($data['send'] + $data['deliveryapproved'] + $data['sent']
//                            + $data['parcelonaplace']) / ($data['paid'] + $data['later'] + $data['deliveryapproved'] + $data['problem'] + $data['refusetosend']
//                            + $data['refusetoreceive'] + $data['sent'] + $data['send'] + $data['parcelreturned'] + $data['stop']
//                            + $data['parcelonaplace'] + $data['delivered'] + $data['injob'] + $data['fake'])
//                        * 100;
//                    return round($naDostavke, 2);
//                } catch (ErrorException $e)
//                {
//                    return 0;
//
//
//                }
//
//            }
//
//        ],
//
//        [
//            'class' => \backend\models\NumberColumn::className(),
//            'header' => 'Деньги получены',
//            'attribute' => 'paid',
//        ],
//        [
//            'class' => \backend\models\NumberColumn::className(),
//            'header' => 'Доставить позже',
//            'value' => 'later'
//        ],
//        [
//            'class' => \backend\models\NumberColumn::className(),
//            'header' => 'Доставка согласована',
//            'value' => 'deliveryapproved'
//        ],
//        [
//            'class' => \backend\models\NumberColumn::className(),
//            'header' => 'Доставлять',
//            'value' => 'problem'
//        ],
//        [
//            'class' => \backend\models\NumberColumn::className(),
//            'header' => 'Отказ от отправки',
//            'value' => 'refusetosend'
//        ],
//        [
//            'class' => \backend\models\NumberColumn::className(),
//            'header' => 'Отказ от отправки',
//            'value' => 'refusetosend'
//        ],
//        [
//            'class' => \backend\models\NumberColumn::className(),
//            'header' => 'Отказ от получения',
//            'value' => 'refusetoreceive'
//        ],
//        [
//            'class' => \backend\models\NumberColumn::className(),
//            'header' => 'Отправлен',
//            'value' => 'sent'
//        ],
//        [
//            'class' => \backend\models\NumberColumn::className(),
//            'header' => 'Отправлять',
//            'value' => 'send'
//        ],
//        [
//            'class' => \backend\models\NumberColumn::className(),
//            'header' => 'Посылка вернулась',
//            'value' => 'parcelreturned'
//        ],
//        [
//            'class' => \backend\models\NumberColumn::className(),
//            'header' => 'Приостановлен',
//            'value' => 'stop'
//        ],
//        [
//            'class' => \backend\models\NumberColumn::className(),
//            'header' => 'Товар в точке получения',
//            'value' => 'parcelonaplace'
//        ],
//        [
//            'class' => \backend\models\NumberColumn::className(),
//            'header' => 'Товар получен',
//            'value' => 'delivered'
//        ],
//        [
//            'class' => \backend\models\NumberColumn::className(),
//            'header' => 'Требует доработки оператора',
//            'value' => 'injob'
//        ],
//        [
//            'class' => \backend\models\NumberColumn::className(),
//            'header' => 'Фейк',
//            'value' => 'fake'
//        ],


    ];

    echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns
    ]);
    ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ''],
//        'filterModel' => $searchModel,
        'rowOptions' => function ($data)
        {
            if ($data['order_customFields_delivery_method'] == 'eu-multi' or $data['order_customFields_delivery_method'] == 'eu_acs' or
                $data['order_customFields_delivery_method'] == 'eu_dhl' or $data['order_customFields_delivery_method'] == 'eu_dhl_int' or
                $data['order_customFields_delivery_method'] == 'eu_dpd' or $data['order_customFields_delivery_method'] == 'eu_ups' or
                $data['order_customFields_delivery_method'] == 'eu_venipak' or $data['order_customFields_delivery_method'] == 'Евросоюз Cream'
                or $data['order_customFields_delivery_method'] == 'eu_dhl нац.' or $data['order_customFields_delivery_method'] == 'eu_ups нац.'
            )
            {
                return ['style' => 'background-color:#FBEEEA;'];
            }
            if ($data['order_customFields_delivery_method'] == 'АЗЕРБАЙДЖАН' or $data['order_customFields_delivery_method'] == 'АЗЕРБАЙДЖАН КРЕМ'
                or $data['order_customFields_delivery_method'] == 'Pony Express Азербайджан' or $data['order_customFields_delivery_method'] == 'ВЕСЬ АЗЕРБАЙДЖАН' or $data['order_customFields_delivery_method'] == 'АЗЕРБАЙДЖАН РЕГИОНЫ'
            )
            {
                return ['style' => 'background-color:#F2D048;'];
            }
            if ($data['order_customFields_delivery_method'] == 'УКРАИНА')
            {
                return ['style' => 'background-color:#F1EC88;'];
            }
            if ($data['order_customFields_delivery_method'] == 'kz_kotransit' or $data['order_customFields_delivery_method'] == 'kz_pony'
                or $data['order_customFields_delivery_method'] == 'kz_post' or $data['order_customFields_delivery_method'] == 'Казахстан КАЗПОЧТА'
                or $data['order_customFields_delivery_method'] == 'Казахстан Курьеры' or $data['order_customFields_delivery_method'] == 'КАЗАХСТАН'
                or $data['order_customFields_delivery_method'] == 'ПОЧТА')

            {
                return ['style' => 'background-color:#B3FFFF;'];
            }
            if ($data['order_customFields_delivery_method'] == 'Киргизия KZ' or $data['order_customFields_delivery_method'] == 'Киргизия СПСР' or $data['order_customFields_delivery_method'] == 'ВСЯ КИРГИЗИЯ')
            {
                return ['style' => 'background-color:#E8CFA6;'];
            }
            if ($data['order_customFields_delivery_method'] == 'МОЛДАВИЯ' or $data['order_customFields_delivery_method'] == 'МОЛДАВИЯ МeEx'
                or $data['order_customFields_delivery_method'] == 'md_couriers' or $data['order_customFields_delivery_method'] == 'МОЛДАВИЯ МeEx md_kishinev'
                or $data['order_customFields_delivery_method'] == 'md_memo' or $data['order_customFields_delivery_method'] == 'md_novaposhta'
                or $data['order_customFields_delivery_method'] == 'md_post' or $data['order_customFields_delivery_method'] == 'МОЛДАВИЯ md_kishinev' or $data['order_customFields_delivery_method'] == 'ВСЯ МОЛДАВИЯ'
            )
            {
                return ['style' => 'background-color:#C0C0C0;'];
            }
            if ($data['order_customFields_delivery_method'] == 'uz_btc' or $data['order_customFields_delivery_method'] == 'uz_mega'
                or $data['order_customFields_delivery_method'] == '	Узбекистан Регионы uz_svoy_kur' or $data['order_customFields_delivery_method'] == 'УЗБЕКИСТАН' or $data['order_customFields_delivery_method'] == 'Узбекистан Ташкент uz_svoy_kur'
                or $data['order_customFields_delivery_method'] == 'Узбекистан Регионы' or $data['order_customFields_delivery_method'] == 'Узбекистан Ташкент' or $data['order_customFields_delivery_method'] == 'Узбекистан Ташкент uz_svoy_kur' or $data['order_customFields_delivery_method'] == 'Узбекистан Регионы uz_svoy_kur'
            )
            {
                return ['style' => 'background-color:#A6B0E8;'];
            }
            if ($data['order_customFields_delivery_method'] == 'EMS Почта России' or $data['order_customFields_delivery_method'] == 'Pony Express Россия'
                or $data['order_customFields_delivery_method'] == 'Доставка Почтой России' or $data['order_customFields_delivery_method'] == 'МОСКВА'
                or $data['order_customFields_delivery_method'] == 'BetaPost' or $data['order_customFields_delivery_method'] == 'КСЭ'
                or $data['order_customFields_delivery_method'] == 'Москва BetaPro' or $data['order_customFields_delivery_method'] == 'СДЭК' or $data['order_customFields_delivery_method'] == 'СПСР' or $data['order_customFields_delivery_method'] == 'Россия'
            )
            {
                return ['style' => 'background-color:#DFFBD5;'];
            }
            if ($data['order_customFields_delivery_method'] == 'Армения BPro' or $data['order_customFields_delivery_method'] == 'АРМЕНИЯ')
            {
                return ['style' => 'background-color:#C4AF6E;'];
            }
            if ($data['order_customFields_delivery_method'] == 'Белоруссия BPro')
            {
                return ['style' => 'background-color:#BCC6F0;'];
            }
            if ($data['order_customFields_delivery_method'] == 'Грузия')
            {
                return ['style' => 'background-color:#8EC46E;'];
            }


        },
        'columns' => [
            //['class' => 'yii\grid\SerialColumn','contentOptions' => ['style' => 'width:100px;']],
            [
                'headerOptions' => ['class' => 'text-center'],
                'header' => 'Тип',
                'value' => 'order_customFields_delivery_method',
                'contentOptions' => function ($data)
                {
                    if ($data['order_customFields_delivery_method'] == 'АЗЕРБАЙДЖАН'
                        or $data['order_customFields_delivery_method'] == 'АЗЕРБАЙДЖАН КРЕМ'
                        or $data['order_customFields_delivery_method'] == 'Евросоюз Cream'
                        or $data['order_customFields_delivery_method'] == 'Казахстан КАЗПОЧТА'
                        or $data['order_customFields_delivery_method'] == 'Казахстан Курьеры'
                        or $data['order_customFields_delivery_method'] == 'Киргизия СПСР'
                        or $data['order_customFields_delivery_method'] == 'Киргизия KZ'
                        or $data['order_customFields_delivery_method'] == 'МОЛДАВИЯ'
                        or $data['order_customFields_delivery_method'] == 'МОЛДАВИЯ МeEx'
                        or $data['order_customFields_delivery_method'] == 'BetaPost'
                        or $data['order_customFields_delivery_method'] == 'Pony Express Россия'
                        or $data['order_customFields_delivery_method'] == 'Доставка Почтой России'
                        or $data['order_customFields_delivery_method'] == 'КСЭ'
                        or $data['order_customFields_delivery_method'] == 'Москва BetaPro'
                        or $data['order_customFields_delivery_method'] == 'СДЭК'
                        or $data['order_customFields_delivery_method'] == 'МОСКВА'
                        or $data['order_customFields_delivery_method'] == 'Узбекистан Регионы'
                        or $data['order_customFields_delivery_method'] == 'Узбекистан Ташкент')


                    {$class = 'style';


                        {return  ['class' => 'text-center','style' => 'width: 235px; max-width: 65px; font-weight: bold;'];}}

                    else{$class = 'style';
                        return  ['class' => 'text-center','style' => 'width: 235px; max-width: 65px; font-weight: normal;'];}}
            
            ],

            [
//                'class' => \backend\models\NumberColumn::className(),
                'contentOptions' => ['class' => 'text-center', 'style' => 'width: 65px; max-width: 65px;'],
                'headerOptions' => ['class' => 'text-center'],
                'header' => 'Оформленные',
                'value' => function ($data)
                {
                    return $data['paid'] + $data['later'] + $data['deliveryapproved'] + $data['problem'] + $data['refusetosend']
                    + $data['refusetoreceive'] + $data['sent'] + $data['send'] + $data['parcelreturned'] + $data['stop']
                    + $data['parcelonaplace'] + $data['delivered'] + $data['injob'] + $data['fake'];

                }],
            [
                'contentOptions' => ['class' => 'text-center', 'style' => 'width: 65px; max-width: 65px;'],
                'headerOptions' => ['class' => 'text-center'],
                'header' => 'От продаж',
                'value' => function ($data)
                {
                    try
                    {
                        $otProdaz = ($data['paid'] + $data['delivered']) / ($data['paid'] + $data['later'] + $data['deliveryapproved'] +                                        $data['problem'] + $data['refusetosend']
                                + $data['refusetoreceive'] + $data['sent'] + $data['send'] + $data['parcelreturned'] + $data['stop']
                                + $data['parcelonaplace'] + $data['delivered'] + $data['injob'] + $data['fake']) * 100;
                        return round($otProdaz, 2) . '%';
                    } catch (ErrorException $e)
                    {
                        return 0;
                    }
                }

            ],

            [
                'contentOptions' => ['class' => 'text-center', 'style' => 'width: 65px; max-width: 65px;'],
                'headerOptions' => ['class' => 'text-center'],
                'header' => 'Разница с топом',
                'value' => function ($data){
                    try{
                        $top =  ($data['paid'] + $data['delivered']) / ($data['paid'] + $data['later'] + $data['deliveryapproved'] + $data['problem'] + $data['refusetosend']
                                + $data['refusetoreceive'] + $data['sent'] + $data['send'] + $data['parcelreturned'] + $data['stop']
                                + $data['parcelonaplace'] + $data['delivered'] + $data['injob'] + $data['fake']) * 100 - $data['top'];
                        return round($top, 2);
                    }
                    catch (ErrorException $e)
                    {
                        return 0;
                    }
                }
            ],

            [
                //                'class' => \backend\models\NumberColumn::className(),
                'contentOptions' => ['class' => 'text-center', 'style' => 'width: 65px; max-width: 65px;'],
                'headerOptions' => ['class' => 'text-center'],
                'header' => 'Отправленные',
                'value' => function ($data)
                {
                    try
                    {
                        return (($data['paid'] + $data['problem'] +
                            $data['refusetoreceive'] + $data['sent'] + $data['parcelreturned'] +
                            $data['parcelonaplace'] + $data['delivered'] + $data['injob'] + $data['fake'])) . ' / ' . round(($data['paid'] +                            $data['problem'] +
                                $data['refusetoreceive'] + $data['sent'] + $data['parcelreturned'] +
                                $data['parcelonaplace'] + $data['delivered'] + $data['injob'] + $data['fake']) / ($data['paid'] +                                           $data['later'] + $data['deliveryapproved'] + $data['problem'] + $data['refusetosend']
                                + $data['refusetoreceive'] + $data['sent'] + $data['send'] + $data['parcelreturned'] + $data['stop']
                                + $data['parcelonaplace'] + $data['delivered'] + $data['injob'] + $data['fake']) * 100, 2) . '%';
                    } catch (ErrorException $e)
                    {
                        return 0;
                    }

                }
            ],

            [
                'contentOptions' => ['class' => 'text-center', 'style' => 'width: 65px; max-width: 65px;'],
                'headerOptions' => ['class' => 'text-center'],
                'header' => 'От отправки',
                'value' => function ($data)
                {
                    try
                    {
                        $otOtpravki = ($data['paid'] + $data['delivered']) / ($data['paid'] + $data['problem'] +
                                $data['refusetoreceive'] + $data['sent'] + $data['parcelreturned'] +
                                $data['parcelonaplace'] + $data['delivered'] + $data['injob'] + $data['fake'])
                            * 100;
                        return round($otOtpravki, 2) . '%';
                    } catch (ErrorException $e)
                    {
                        return 0;
                    }
                }
            ],

            [
                'contentOptions' => ['class' => 'text-center','style' => 'width: 65px; max-width: 65px;'],
                'headerOptions' => ['class' => 'text-center'],
                'header' => 'Средний чек Продано',
                'value' => function ($data)
                {
                    if ($data['order_customFields_delivery_method'] == 'eu-multi' or $data['order_customFields_delivery_method'] == 'eu_acs' or
                        $data['order_customFields_delivery_method'] == 'eu_dhl' or $data['order_customFields_delivery_method'] == 'eu_dhl_int' or
                        $data['order_customFields_delivery_method'] == 'eu_dpd' or $data['order_customFields_delivery_method'] == 'eu_ups' or
                        $data['order_customFields_delivery_method'] == 'eu_venipak' or $data['order_customFields_delivery_method'] == 'Евросоюз Cream' or $data['order_customFields_delivery_method'] == 'eu_ups нац.' or $data['order_customFields_delivery_method'] == 'eu_dhl нац.'
                    )
                    {
                        try
                        {
                            return round(($data['paid2'] + $data['later2'] + $data['deliveryapproved2'] + $data['problem2'] + $data['refusetosend2'] + $data['refusetoreceive2'] + $data['sent2'] + $data['send2'] + $data['parcelreturned2'] + $data['stop2']
                                    + $data['parcelonaplace2'] + $data['delivered2'] + $data['injob2'] + $data['fake2']) / ($data['paid'] + $data['later'] + $data['deliveryapproved'] + $data['problem'] + $data['refusetosend']
                                    + $data['refusetoreceive'] + $data['sent'] + $data['send'] + $data['parcelreturned'] + $data['stop']
                                    + $data['parcelonaplace'] + $data['delivered'] + $data['injob'] + $data['fake']) * 64, 2);
                        } catch (ErrorException $e)
                        {
                            return 0;
                        }

                    } elseif ($data['order_customFields_delivery_method'] == 'EMS Почта России' or $data['order_customFields_delivery_method'] == 'Pony Express Россия'
                        or $data['order_customFields_delivery_method'] == 'Доставка Почтой России' or $data['order_customFields_delivery_method'] == 'МОСКВА'
                        or $data['order_customFields_delivery_method'] == 'BetaPost' or $data['order_customFields_delivery_method'] == 'КСЭ'
                        or $data['order_customFields_delivery_method'] == 'Москва BetaPro' or $data['order_customFields_delivery_method'] == 'СДЭК' or $data['order_customFields_delivery_method'] == 'СПСР' or $data['order_customFields_delivery_method'] == 'Россия'
                    )
                    {
                        try
                        {
                            return round(($data['paid2'] + $data['later2'] + $data['deliveryapproved2'] + $data['problem2'] + $data['refusetosend2'] + $data['refusetoreceive2'] + $data['sent2'] + $data['send2'] + $data['parcelreturned2'] + $data['stop2']
                                    + $data['parcelonaplace2'] + $data['delivered2'] + $data['injob2'] + $data['fake2']) / ($data['paid'] + $data['later'] + $data['deliveryapproved'] + $data['problem'] + $data['refusetosend']
                                    + $data['refusetoreceive'] + $data['sent'] + $data['send'] + $data['parcelreturned'] + $data['stop']
                                    + $data['parcelonaplace'] + $data['delivered'] + $data['injob'] + $data['fake']), 2);
                        } catch (ErrorException $e)
                        {
                            return 0;
                        }
                    }

                    elseif ($data['order_customFields_delivery_method'] == 'kz_kotransit' or $data['order_customFields_delivery_method'] == 'kz_pony'
                        or $data['order_customFields_delivery_method'] == 'kz_post' or $data['order_customFields_delivery_method'] == 'Казахстан КАЗПОЧТА'
                        or $data['order_customFields_delivery_method'] == 'Казахстан Курьеры' or $data['order_customFields_delivery_method'] == 'КАЗАХСТАН'
                        or $data['order_customFields_delivery_method'] == 'ПОЧТА'
                    )
                    {
                        try
                        {
                            return round(($data['paid2'] + $data['later2'] + $data['deliveryapproved2'] + $data['problem2'] + $data['refusetosend2'] + $data['refusetoreceive2'] + $data['sent2'] + $data['send2'] + $data['parcelreturned2'] + $data['stop2']
                                    + $data['parcelonaplace2'] + $data['delivered2'] + $data['injob2'] + $data['fake2']) / ($data['paid'] + $data['later'] + $data['deliveryapproved'] + $data['problem'] + $data['refusetosend']
                                    + $data['refusetoreceive'] + $data['sent'] + $data['send'] + $data['parcelreturned'] + $data['stop']
                                    + $data['parcelonaplace'] + $data['delivered'] + $data['injob'] + $data['fake'])*0.18, 2);
                        } catch (ErrorException $e)
                        {
                            return 0;
                        }
                    }

                    elseif ($data['order_customFields_delivery_method'] == 'МОЛДАВИЯ' or $data['order_customFields_delivery_method'] == 'МОЛДАВИЯ МeEx'
                        or $data['order_customFields_delivery_method'] == 'md_couriers' or $data['order_customFields_delivery_method'] == 'МОЛДАВИЯ МeEx md_kishinev'
                        or $data['order_customFields_delivery_method'] == 'md_memo' or $data['order_customFields_delivery_method'] == 'md_novaposhta'
                        or $data['order_customFields_delivery_method'] == 'md_post' or $data['order_customFields_delivery_method'] == 'МОЛДАВИЯ md_kishinev' or $data['order_customFields_delivery_method'] == 'ВСЯ МОЛДАВИЯ'
                    )
                    {
                        try
                        {
                            return round(($data['paid2'] + $data['later2'] + $data['deliveryapproved2'] + $data['problem2'] + $data['refusetosend2'] + $data['refusetoreceive2'] + $data['sent2'] + $data['send2'] + $data['parcelreturned2'] + $data['stop2']
                                    + $data['parcelonaplace2'] + $data['delivered2'] + $data['injob2'] + $data['fake2']) / ($data['paid'] + $data['later'] + $data['deliveryapproved'] + $data['problem'] + $data['refusetosend']
                                    + $data['refusetoreceive'] + $data['sent'] + $data['send'] + $data['parcelreturned'] + $data['stop']
                                    + $data['parcelonaplace'] + $data['delivered'] + $data['injob'] + $data['fake'])*3.05, 2);
                        } catch (ErrorException $e)
                        {
                            return 0;
                        }
                    }

                    elseif ($data['order_customFields_delivery_method'] == 'АЗЕРБАЙДЖАН' or $data['order_customFields_delivery_method'] == 'АЗЕРБАЙДЖАН КРЕМ'
                        or $data['order_customFields_delivery_method'] == 'Pony Express Азербайджан' or $data['order_customFields_delivery_method'] == 'ВЕСЬ АЗЕРБАЙДЖАН' or $data['order_customFields_delivery_method'] == 'АЗЕРБАЙДЖАН РЕГИОНЫ'
                    )
                    {
                        try
                        {
                            return round(($data['paid2'] + $data['later2'] + $data['deliveryapproved2'] + $data['problem2'] + $data['refusetosend2'] + $data['refusetoreceive2'] + $data['sent2'] + $data['send2'] + $data['parcelreturned2'] + $data['stop2']
                                    + $data['parcelonaplace2'] + $data['delivered2'] + $data['injob2'] + $data['fake2']) / ($data['paid'] + $data['later'] + $data['deliveryapproved'] + $data['problem'] + $data['refusetosend']
                                    + $data['refusetoreceive'] + $data['sent'] + $data['send'] + $data['parcelreturned'] + $data['stop']
                                    + $data['parcelonaplace'] + $data['delivered'] + $data['injob'] + $data['fake'])*31.5, 2);
                        } catch (ErrorException $e)
                        {
                            return 0;
                        }
                    }

                    elseif ($data['order_customFields_delivery_method'] == 'Армения BPro' or $data['order_customFields_delivery_method'] == 'АРМЕНИЯ'
                    )
                    {
                        try
                        {
                            return round(($data['paid2'] + $data['later2'] + $data['deliveryapproved2'] + $data['problem2'] + $data['refusetosend2'] + $data['refusetoreceive2'] + $data['sent2'] + $data['send2'] + $data['parcelreturned2'] + $data['stop2']
                                    + $data['parcelonaplace2'] + $data['delivered2'] + $data['injob2'] + $data['fake2']) / ($data['paid'] + $data['later'] + $data['deliveryapproved'] + $data['problem'] + $data['refusetosend']
                                    + $data['refusetoreceive'] + $data['sent'] + $data['send'] + $data['parcelreturned'] + $data['stop']
                                    + $data['parcelonaplace'] + $data['delivered'] + $data['injob'] + $data['fake'])*0.12, 2);
                        } catch (ErrorException $e)
                        {
                            return 0;
                        }
                    }

                    elseif ($data['order_customFields_delivery_method'] == 'Киргизия KZ' or $data['order_customFields_delivery_method'] == 'Киргизия СПСР' or $data['order_customFields_delivery_method'] == 'ВСЯ КИРГИЗИЯ'
                    )
                    {
                        try
                        {
                            return round(($data['paid2'] + $data['later2'] + $data['deliveryapproved2'] + $data['problem2'] + $data['refusetosend2'] + $data['refusetoreceive2'] + $data['sent2'] + $data['send2'] + $data['parcelreturned2'] + $data['stop2']
                                    + $data['parcelonaplace2'] + $data['delivered2'] + $data['injob2'] + $data['fake2']) / ($data['paid'] + $data['later'] + $data['deliveryapproved'] + $data['problem'] + $data['refusetosend']
                                    + $data['refusetoreceive'] + $data['sent'] + $data['send'] + $data['parcelreturned'] + $data['stop']
                                    + $data['parcelonaplace'] + $data['delivered'] + $data['injob'] + $data['fake'])*0.87, 2);
                        } catch (ErrorException $e)
                        {
                            return 0;
                        }
                    }

                    elseif ($data['order_customFields_delivery_method'] == 'Киргизия KZ' or $data['order_customFields_delivery_method'] == 'Киргизия СПСР' or $data['order_customFields_delivery_method'] == 'ВСЯ КИРГИЗИЯ'
                    )
                    {
                        try
                        {
                            return round(($data['paid2'] + $data['later2'] + $data['deliveryapproved2'] + $data['problem2'] + $data['refusetosend2'] + $data['refusetoreceive2'] + $data['sent2'] + $data['send2'] + $data['parcelreturned2'] + $data['stop2']
                                    + $data['parcelonaplace2'] + $data['delivered2'] + $data['injob2'] + $data['fake2']) / ($data['paid'] + $data['later'] + $data['deliveryapproved'] + $data['problem'] + $data['refusetosend']
                                    + $data['refusetoreceive'] + $data['sent'] + $data['send'] + $data['parcelreturned'] + $data['stop']
                                    + $data['parcelonaplace'] + $data['delivered'] + $data['injob'] + $data['fake'])*0.87, 2);
                        } catch (ErrorException $e)
                        {
                            return 0;
                        }
                    }

                    elseif ($data['order_customFields_delivery_method'] == 'УКРАИНА'
                    )
                    {
                        try
                        {
                            return round(($data['paid2'] + $data['later2'] + $data['deliveryapproved2'] + $data['problem2'] + $data['refusetosend2'] + $data['refusetoreceive2'] + $data['sent2'] + $data['send2'] + $data['parcelreturned2'] + $data['stop2']
                                    + $data['parcelonaplace2'] + $data['delivered2'] + $data['injob2'] + $data['fake2']) / ($data['paid'] + $data['later'] + $data['deliveryapproved'] + $data['problem'] + $data['refusetosend']
                                    + $data['refusetoreceive'] + $data['sent'] + $data['send'] + $data['parcelreturned'] + $data['stop']
                                    + $data['parcelonaplace'] + $data['delivered'] + $data['injob'] + $data['fake'])*2.22, 2);
                        } catch (ErrorException $e)
                        {
                            return 0;
                        }
                    }

                    elseif ($data['order_customFields_delivery_method'] == 'uz_btc' or $data['order_customFields_delivery_method'] == 'uz_mega'
                        or $data['order_customFields_delivery_method'] == '	Узбекистан Регионы uz_svoy_kur' or $data['order_customFields_delivery_method'] == 'УЗБЕКИСТАН' or $data['order_customFields_delivery_method'] == 'Узбекистан Ташкент uz_svoy_kur'
                        or $data['order_customFields_delivery_method'] == 'Узбекистан Регионы' or $data['order_customFields_delivery_method'] == 'Узбекистан Ташкент' or $data['order_customFields_delivery_method'] == 'Узбекистан Ташкент uz_svoy_kur' or $data['order_customFields_delivery_method'] == 'Узбекистан Регионы uz_svoy_kur'
                    )
                    {
                        try
                        {
                            return round(($data['paid2'] + $data['later2'] + $data['deliveryapproved2'] + $data['problem2'] + $data['refusetosend2'] + $data['refusetoreceive2'] + $data['sent2'] + $data['send2'] + $data['parcelreturned2'] + $data['stop2']
                                    + $data['parcelonaplace2'] + $data['delivered2'] + $data['injob2'] + $data['fake2']) / ($data['paid'] + $data['later'] + $data['deliveryapproved'] + $data['problem'] + $data['refusetosend']
                                    + $data['refusetoreceive'] + $data['sent'] + $data['send'] + $data['parcelreturned'] + $data['stop']
                                    + $data['parcelonaplace'] + $data['delivered'] + $data['injob'] + $data['fake'])*(60.65/6800), 2);
                        } catch (ErrorException $e)
                        {
                            return 0;
                        }
                    }

                    elseif ($data['order_customFields_delivery_method'] == 'Грузия'
                    )
                    {
                        try
                        {
                            return round(($data['paid2'] + $data['later2'] + $data['deliveryapproved2'] + $data['problem2'] + $data['refusetosend2'] + $data['refusetoreceive2'] + $data['sent2'] + $data['send2'] + $data['parcelreturned2'] + $data['stop2']
                                    + $data['parcelonaplace2'] + $data['delivered2'] + $data['injob2'] + $data['fake2']) / ($data['paid'] + $data['later'] + $data['deliveryapproved'] + $data['problem'] + $data['refusetosend']
                                    + $data['refusetoreceive'] + $data['sent'] + $data['send'] + $data['parcelreturned'] + $data['stop']
                                    + $data['parcelonaplace'] + $data['delivered'] + $data['injob'] + $data['fake'])*22.2, 2);
                        } catch (ErrorException $e)
                        {
                            return 0;
                        }
                    }



                }
            ],

            [
                'contentOptions' => ['class' => 'text-center','style' => 'width: 65px; max-width: 65px;'],
                'headerOptions' => ['class' => 'text-center'],
                'header' => 'Средний чек Выкуплено',
                'value' => function ($data)
                {
                    if ($data['order_customFields_delivery_method'] == 'eu-multi' or $data['order_customFields_delivery_method'] == 'eu_acs' or
                        $data['order_customFields_delivery_method'] == 'eu_dhl' or $data['order_customFields_delivery_method'] == 'eu_dhl_int' or
                        $data['order_customFields_delivery_method'] == 'eu_dpd' or $data['order_customFields_delivery_method'] == 'eu_ups' or
                        $data['order_customFields_delivery_method'] == 'eu_venipak' or $data['order_customFields_delivery_method'] == 'Евросоюз Cream' or $data['order_customFields_delivery_method'] == 'eu_ups нац.' or $data['order_customFields_delivery_method'] == 'eu_dhl нац.')

                    {
                        try
                        {
                            return round(($data['paid2'] + $data['delivered2']) / ($data['paid'] + $data['delivered']) * 64, 2);

                        } catch (ErrorException $e)
                        {
                            return 0;
                        }
                    }
                    elseif ($data['order_customFields_delivery_method'] == 'EMS Почта России' or $data['order_customFields_delivery_method'] == 'Pony Express Россия'
                        or $data['order_customFields_delivery_method'] == 'Доставка Почтой России' or $data['order_customFields_delivery_method'] == 'МОСКВА'
                        or $data['order_customFields_delivery_method'] == 'BetaPost' or $data['order_customFields_delivery_method'] == 'КСЭ'
                        or $data['order_customFields_delivery_method'] == 'Москва BetaPro' or $data['order_customFields_delivery_method'] == 'СДЭК' or $data['order_customFields_delivery_method'] == 'СПСР' or $data['order_customFields_delivery_method'] == 'Россия')

                    {
                        try
                        {
                            return round(($data['paid2'] + $data['delivered2']) / ($data['paid'] + $data['delivered']), 2);
                        } catch (ErrorException $e)
                        {
                            return 0;
                        }
                    }

                    elseif ($data['order_customFields_delivery_method'] == 'kz_kotransit' or $data['order_customFields_delivery_method'] == 'kz_pony'
                        or $data['order_customFields_delivery_method'] == 'kz_post' or $data['order_customFields_delivery_method'] == 'Казахстан КАЗПОЧТА'
                        or $data['order_customFields_delivery_method'] == 'Казахстан Курьеры' or $data['order_customFields_delivery_method'] == 'КАЗАХСТАН'
                        or $data['order_customFields_delivery_method'] == 'ПОЧТА')

                    {
                        try
                        {
                            return round(($data['paid2'] + $data['delivered2']) / ($data['paid'] + $data['delivered'])*0.18, 2);
                        } catch (ErrorException $e)
                        {
                            return 0;
                        }
                    }

                    elseif ($data['order_customFields_delivery_method'] == 'МОЛДАВИЯ' or $data['order_customFields_delivery_method'] == 'МОЛДАВИЯ МeEx'
                        or $data['order_customFields_delivery_method'] == 'md_couriers' or $data['order_customFields_delivery_method'] == 'МОЛДАВИЯ МeEx md_kishinev'
                        or $data['order_customFields_delivery_method'] == 'md_memo' or $data['order_customFields_delivery_method'] == 'md_novaposhta'
                        or $data['order_customFields_delivery_method'] == 'md_post' or $data['order_customFields_delivery_method'] == 'МОЛДАВИЯ md_kishinev' or $data['order_customFields_delivery_method'] == 'ВСЯ МОЛДАВИЯ')

                    {
                        try
                        {
                            return round(($data['paid2'] + $data['delivered2']) / ($data['paid'] + $data['delivered'])*3.05, 2);
                        } catch (ErrorException $e)
                        {
                            return 0;
                        }
                    }

                    elseif ($data['order_customFields_delivery_method'] == 'АЗЕРБАЙДЖАН' or $data['order_customFields_delivery_method'] == 'АЗЕРБАЙДЖАН КРЕМ'
                        or $data['order_customFields_delivery_method'] == 'Pony Express Азербайджан' or $data['order_customFields_delivery_method'] == 'ВЕСЬ АЗЕРБАЙДЖАН' or $data['order_customFields_delivery_method'] == 'АЗЕРБАЙДЖАН РЕГИОНЫ')

                    {
                        try
                        {
                            return round(($data['paid2'] + $data['delivered2']) / ($data['paid'] + $data['delivered'])*31.5, 2);
                        } catch (ErrorException $e)
                        {
                            return 0;
                        }
                    }

                    elseif ($data['order_customFields_delivery_method'] == 'Армения BPro' or $data['order_customFields_delivery_method'] == 'АРМЕНИЯ')

                    {
                        try
                        {
                            return round(($data['paid2'] + $data['delivered2']) / ($data['paid'] + $data['delivered'])*0.12, 2);
                        } catch (ErrorException $e)
                        {
                            return 0;
                        }
                    }

                    elseif ($data['order_customFields_delivery_method'] == 'Киргизия KZ' or $data['order_customFields_delivery_method'] == 'Киргизия СПСР' or $data['order_customFields_delivery_method'] == 'ВСЯ КИРГИЗИЯ')

                    {
                        try
                        {
                            return round(($data['paid2'] + $data['delivered2']) / ($data['paid'] + $data['delivered'])*0.87, 2);
                        } catch (ErrorException $e)
                        {
                            return 0;
                        }
                    }

                    elseif ($data['order_customFields_delivery_method'] == 'УКРАИНА')

                    {
                        try
                        {
                            return round(($data['paid2'] + $data['delivered2']) / ($data['paid'] + $data['delivered'])*2.22, 2);
                        } catch (ErrorException $e)
                        {
                            return 0;
                        }
                    }

                    elseif ($data['order_customFields_delivery_method'] == 'uz_btc' or $data['order_customFields_delivery_method'] == 'uz_mega'
                        or $data['order_customFields_delivery_method'] == '	Узбекистан Регионы uz_svoy_kur' or $data['order_customFields_delivery_method'] == 'УЗБЕКИСТАН' or $data['order_customFields_delivery_method'] == 'Узбекистан Ташкент uz_svoy_kur'
                        or $data['order_customFields_delivery_method'] == 'Узбекистан Регионы' or $data['order_customFields_delivery_method'] == 'Узбекистан Ташкент' or $data['order_customFields_delivery_method'] == 'Узбекистан Ташкент uz_svoy_kur' or $data['order_customFields_delivery_method'] == 'Узбекистан Регионы uz_svoy_kur')

                    {
                        try
                        {
                            return round(($data['paid2'] + $data['delivered2']) / ($data['paid'] + $data['delivered'])*(60.65/6800), 2);
                        } catch (ErrorException $e)
                        {
                            return 0;
                        }
                    }

                    elseif ($data['order_customFields_delivery_method'] == 'Грузия')

                    {
                        try
                        {
                            return round(($data['paid2'] + $data['delivered2']) / ($data['paid'] + $data['delivered'])*22.2, 2);
                        } catch (ErrorException $e)
                        {
                            return 0;
                        }
                    }



                }
            ],
//            [
//                'header' => 'На доставке',
//                'value' => function($data)
//                {
//                    try
//                    {
//
//                        $naDostavke = ($data['send'] + $data['deliveryapproved'] + $data['sent']
//                                + $data['parcelonaplace']) / ($data['paid'] + $data['later'] + $data['deliveryapproved'] + $data['problem'] + $data['refusetosend']
//                                + $data['refusetoreceive'] + $data['sent'] + $data['send'] + $data['parcelreturned'] + $data['stop']
//                                + $data['parcelonaplace'] + $data['delivered'] + $data['injob'] + $data['fake'])
//                            * 100;
//                        return round($naDostavke, 2);
//                    } catch (ErrorException $e)
//                    {
//                        return 0;
//
//
//                    }
//
//                }
//
//            ],
//            [
//                'class' => \backend\models\NumberColumn::className(),
//                'header' => 'Деньги получены',
//                'attribute' => 'paid',
//            ],
//            [
//                'class' => \backend\models\NumberColumn::className(),
//                'header' => 'Доставить позже',
//                'value' => 'later'
//            ],
//            [
//                'class' => \backend\models\NumberColumn::className(),
//                'header' => 'Доставка согласована',
//                'value' => 'deliveryapproved'
//            ],
//            [
//                'class' => \backend\models\NumberColumn::className(),
//                'header' => 'Доставлять',
//                'value' => 'problem'
//            ],
//            [
//                'class' => \backend\models\NumberColumn::className(),
//                'header' => 'Отказ от отправки',
//                'value' => 'refusetosend'
//            ],
//            [
//                'class' => \backend\models\NumberColumn::className(),
//                'header' => 'Отказ от отправки',
//                'value' => 'refusetosend'
//            ],
//            [
//                'class' => \backend\models\NumberColumn::className(),
//                'header' => 'Отказ от получения',
//                'value' => 'refusetoreceive'
//            ],
//            [
//                'class' => \backend\models\NumberColumn::className(),
//                'header' => 'Отправлен',
//                'value' => 'sent'
//            ],
//            [
//                'class' => \backend\models\NumberColumn::className(),
//                'header' => 'Отправлять',
//                'value' => 'send'
//            ],
//            [
//                'class' => \backend\models\NumberColumn::className(),
//                'header' => 'Посылка вернулась',
//                'value' => 'parcelreturned'
//            ],
//            [
//                'class' => \backend\models\NumberColumn::className(),
//                'header' => 'Приостановлен',
//                'value' => 'stop'
//            ],
//            [
//                'class' => \backend\models\NumberColumn::className(),
//                'header' => 'Товар в точке получения',
//                'value' => 'parcelonaplace'
//            ],
//            [
//                'class' => \backend\models\NumberColumn::className(),
//                'header' => 'Товар получен',
//                'value' => 'delivered'
//            ],
//            [
//                'class' => \backend\models\NumberColumn::className(),
//                'header' => 'Требует доработки оператора',
//                'value' => 'injob'
//            ],
//            [
//                'class' => \backend\models\NumberColumn::className(),
//                'header' => 'Фейк',
//                'value' => 'fake'
//            ],
        ],
        'showFooter' => true,
    ]); ?>
</div>
