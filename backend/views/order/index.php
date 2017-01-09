<?php


use yii\grid\GridView;
use kartik\export\ExportMenu;
use backend\models\OrderItems;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'KZ Integration';

$this->params['breadcrumbs'][] = $this->title;


?>

<div class="order-index">
    <h1>KZ Integration</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?php
    $gridColumns = [
        'order_number',
        [
            'header' => 'Имя',
            'value' => function ($model)
            {
                return $model->order_firstName . ' ' . $model->order_lastName . ' ' . $model->order_patronymic;
            }
        ],


        [
            'header' => 'Адрес',
            'value' => function($model){
                $result = '';
                if (isset($model->address->order_delivery_address_street)){
                    $result .= $model->address->order_delivery_address_street . ', ';
                }
                if (isset($model->address->order_delivery_address_building)){
                    $result .= $model->address->order_delivery_address_building . ', ';
                }
                if (isset($model->address->order_delivery_address_flat)){
                    $result .= $model->address->order_delivery_address_flat;
                }
                return $result;
            }],

        'order_phone',


        [
            'header' => 'Сумма заказа',

            'value' => function ($data) {
                $summ = 1900;
                foreach($data->itemsOrder as $request) {
                    if($request->order_items_initialPrice != 0 and $request->order_items_initialPrice != 330)
                        $summ +=$request->order_items_quantity * 6490;
                    else {$summ +=$request->order_items_quantity * 0;}
                }

                return $summ;
            },

        ],

        [
            'header' => 'Товар',
            'value' => function ($data) {
                $delvery = 'Доставка';
                $gemor = 'Гемор';
                $sust = 'Сустав';
                $psor = 'псори';
                $prost = 'Простат';
                $grib = 'гриб';
                $morsh = 'Морщ';
                $masto = 'Мастоп';
                $cellul = 'Целлю';
                $osteo = 'Остео';
                $varik = 'Варикоз';
                $erect = 'Эректил';
                $summ = 0;
                $str = '';
                $strt = '';
                $strtr = '';
                foreach($data->itemsOrder as $request) {
                    $summ = $request->order_items_quantity;
                    $str .=  (strlen($str))?', ': '';
                    $strt = $request->orderInfo->order_items_offer_name;
                    if($request->order_items_initialPrice == 0){
                        $strt .= ' '.'в подарок';
                    }
                    if(!strstr($strt, $delvery)and strstr($strt, $gemor)){
                        $str .=  $strt . '(ГМ)'.' '.$summ.'шт.';
                    }
                    elseif(!strstr($strt, $delvery)and strstr($strt, $sust)){
                        $str .=  $strt . '(С)'.' '.$summ.'шт.';
                    }
                    elseif(!strstr($strt, $delvery)and strstr($strt, $prost)){
                        $str .=  $strt . '(ПР)'.' '.$summ.'шт.';
                    }
                    elseif(!strstr($strt, $delvery)and strstr($strt, $grib)){
                        $str .=  $strt . '(ГР)'.' '.$summ.'шт.';
                    }
                    elseif(!strstr($strt, $delvery)and strstr($strt, $morsh)){
                        $str .=  $strt . '(МР)'.' '.$summ.'шт.';
                    }
                    elseif(!strstr($strt, $delvery)and strstr($strt, $masto)){
                        $str .=  $strt . '(МС)'.' '.$summ.'шт.';
                    }
                    elseif(!strstr($strt, $delvery)and strstr($strt, $cellul)){
                        $str .=  $strt . '(Ц)'.' '.$summ.'шт.';
                    }
                    elseif(!strstr($strt, $delvery)and strstr($strt, $osteo)){
                        $str .=  $strt . '(ОС)'.' '.$summ.'шт.';
                    }
                    elseif(!strstr($strt, $delvery)and strstr($strt, $varik)){
                        $str .=  $strt . '(В)'.' '.$summ.'шт.';
                    }
                    elseif(!strstr($strt, $delvery)and strstr($strt, $erect)){
                        $str .=  $strt . '(ЭД)'.' '.$summ.'шт.';
                    }
                    elseif(!strstr($strt, $delvery)and strstr($strt, $psor)){
                        $str .=  $strt . '(ПС)'.' '.$summ.'шт.';
                    }

                    elseif(!strstr($strt, $delvery)){
                        $str .=  $strt;
                    }

//                        if($request->order_items_initialPrice == 0){
//
//                        }
                }

                return $str;
            },
        ],

        ['header' =>  'Дата доставки курьером'],
        ['header' =>  'Индекс'],
        ['header' =>  'Город',
            'value' => 'address.order_delivery_address_city'],
        ['header' =>  'Штрих-код'],
        ['header' =>  'Дата статуса подтвержден'],
        [
            'header' => 'Менеджер',
            'value' => function ($data) {
                return $data->name; // $data['name'] for array data, e.g. using SqlDataProvider.
            },
        ],
        [
           'header' => 'Название курьерской службы',

            'value' => function($model){
                if($model->address->order_delivery_address_city == 'Алматы' or $model->address->order_delivery_address_city == 'Алмата'){
                    return 'ALMATA';
                }
                elseif ($model->address->order_delivery_address_city == 'Актау'){
                    return 'AKTAU';
                }
                elseif ($model->address->order_delivery_address_city == 'Атырау'){
                    return 'ATYRAU';
                }
                elseif ($model->address->order_delivery_address_city == 'Петропавловск'){
                    return 'PETROPAVLOVSK';
                }
                elseif ($model->address->order_delivery_address_city == 'Кызылорда'){
                    return 'KYZYLORDA';
                }
                elseif ($model->address->order_delivery_address_city == 'Костанай'){
                    return 'KOSTANAI';
                }
                elseif ($model->address->order_delivery_address_city == 'Семей'){
                    return 'SEMEI';
                }
                elseif ($model->address->order_delivery_address_city == 'Темиртау'){
                    return 'TEMIRTAU';
                }
                elseif ($model->address->order_delivery_address_city == 'Уральск'){
                    return 'URALSK';
                }
                elseif ($model->address->order_delivery_address_city == 'Кокшетау'){
                    return 'KOKSHETAU';
                }
                elseif ($model->address->order_delivery_address_city == 'Усть-Каменогорск'){
                    return 'UST-KAMENOGORSK';
                }
                elseif ($model->address->order_delivery_address_city == 'Тараз'){
                    return 'TARAZ';
                }
                elseif ($model->address->order_delivery_address_city == 'Шымкент'){
                    return 'SHIMKENT';
                }
                elseif ($model->address->order_delivery_address_city == 'Павлодар'){
                    return 'PAVLODAR';
                }
                elseif ($model->address->order_delivery_address_city == 'Кульсары'){
                    return 'KYLSARY';
                }
                elseif ($model->address->order_delivery_address_city == 'Актобе'){
                    return 'AKTOBE';
                }
                elseif ($model->address->order_delivery_address_city == 'Жезказган'){
                    return 'ZHEZKAZGAN';
                }
                elseif ($model->address->order_delivery_address_city == 'Туркестан'){
                    return 'TURKESTAN';
                }
                elseif ($model->address->order_delivery_address_city == 'Экибастуз'){
                    return 'EKIBASTUZ';
                }
                elseif ($model->address->order_delivery_address_city == 'Темиртау'){
                    return 'TEMIRTAU';
                }
                elseif ($model->address->order_delivery_address_city == 'Жанаозен'){
                    return 'ZHANAOZEN';
                }
                elseif ($model->address->order_delivery_address_city == 'Талдыкорган'){
                    return 'TALDYKORGAN';
                }
                elseif ($model->address->order_delivery_address_city == 'Караганда'){
                    return 'KARAGANDA';
                }
                elseif ($model->address->order_delivery_address_city == 'Астана'){
                    return 'ASTANA-KURER';
                }
            }
        ],

        ['header' =>  'Комментарий'],
        ['header' =>  'Дата статуса оплачен'],
    ];

    echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns
    ]);
    ?>



    <?= GridView::widget([
      //  'options' => ['text-align' => 'center'],
        'dataProvider' => $dataProvider,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ''],
        'filterModel' => $searchModel,
        'rowOptions' => function ($model)
        {
            return ['style' => 'background-color:#E0FFFF;'];
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],





            'order_number',
            [
                'header' => 'Имя',
                'value' => function ($model)
                {
                    return $model->order_firstName . ' ' . $model->order_lastName . ' ' . $model->order_patronymic;
                }
            ],


            [
                'header' => 'Адрес',
                'value' => function($model){
                    $result = '';
                    if (isset($model->address->order_delivery_address_street)){
                        $result .= $model->address->order_delivery_address_street . ', ';
                    }
                    if (isset($model->address->order_delivery_address_building)){
                        $result .= $model->address->order_delivery_address_building . ', ';
                    }
                    if (isset($model->address->order_delivery_address_flat)){
                        $result .= $model->address->order_delivery_address_flat;
                    }
                    return $result;
                }],

            'order_phone',


            [
                'header' => 'Сумма заказа',

                    'value' => function ($data) {
                        $summ = 1900;
                        foreach($data->itemsOrder as $request) {
                            if($request->order_items_initialPrice != 0 and $request->order_items_initialPrice != 330)
                            $summ +=$request->order_items_quantity * 6490;
                            else {$summ +=$request->order_items_quantity * 0;}
                        }

                        return $summ;
                    },

                ],

            [
                'header' => 'Товар',
                'value' => function ($data) {
                    $delvery = 'Доставка';
                    $gemor = 'Гемор';
                    $sust = 'Сустав';
                    $psor = 'псори';
                    $prost = 'Простат';
                    $grib = 'гриб';
                    $morsh = 'Морщ';
                    $masto = 'Мастоп';
                    $cellul = 'Целлю';
                    $osteo = 'Остео';
                    $varik = 'Варикоз';
                    $erect = 'Эректил';
                    $summ = 0;
                    $str = '';
                    $strt = '';
                    $strtr = '';
                    foreach($data->itemsOrder as $request) {
                        $summ = $request->order_items_quantity;
                        $str .=  (strlen($str))?', ': '';
                        $strt = $request->orderInfo->order_items_offer_name;
                        if($request->order_items_initialPrice == 0){
                            $strt .= ' '.'в подарок';
                        }
                        if(!strstr($strt, $delvery)and strstr($strt, $gemor)){
                            $str .=  $strt . '(ГМ)'.' '.$summ.'шт.';
                        }
                        elseif(!strstr($strt, $delvery)and strstr($strt, $sust)){
                            $str .=  $strt . '(С)'.' '.$summ.'шт.';
                        }
                        elseif(!strstr($strt, $delvery)and strstr($strt, $prost)){
                            $str .=  $strt . '(ПР)'.' '.$summ.'шт.';
                        }
                        elseif(!strstr($strt, $delvery)and strstr($strt, $grib)){
                            $str .=  $strt . '(ГР)'.' '.$summ.'шт.';
                        }
                        elseif(!strstr($strt, $delvery)and strstr($strt, $morsh)){
                            $str .=  $strt . '(МР)'.' '.$summ.'шт.';
                        }
                        elseif(!strstr($strt, $delvery)and strstr($strt, $masto)){
                            $str .=  $strt . '(МС)'.' '.$summ.'шт.';
                        }
                        elseif(!strstr($strt, $delvery)and strstr($strt, $cellul)){
                            $str .=  $strt . '(Ц)'.' '.$summ.'шт.';
                        }
                        elseif(!strstr($strt, $delvery)and strstr($strt, $osteo)){
                            $str .=  $strt . '(ОС)'.' '.$summ.'шт.';
                        }
                        elseif(!strstr($strt, $delvery)and strstr($strt, $varik)){
                            $str .=  $strt . '(В)'.' '.$summ.'шт.';
                        }
                        elseif(!strstr($strt, $delvery)and strstr($strt, $erect)){
                            $str .=  $strt . '(ЭД)'.' '.$summ.'шт.';
                        }
                        elseif(!strstr($strt, $delvery)and strstr($strt, $psor)){
                            $str .=  $strt . '(ПС)'.' '.$summ.'шт.';
                        }

                        elseif(!strstr($strt, $delvery)){
                            $str .=  $strt;
                        }

//                        if($request->order_items_initialPrice == 0){
//
//                        }
                    }

                 return $str;
                },
            ],

            ['header' =>  'Дата доставки курьером'],
            ['header' =>  'Индекс'],
            ['header' =>  'Город',
            'value' => 'address.order_delivery_address_city'],
            ['header' =>  'Штрих-код'],
            ['header' =>  'Дата статуса подтвержден'],
            [
                'header' => 'Менеджер',
                'value' => function ($data) {
                    return $data->name; // $data['name'] for array data, e.g. using SqlDataProvider.
                },
            ],
            [
                'header' => 'Название курьерской службы',
                'attribute' => 'order_delivery_address_city',
                'value' => function($model){
                    if($model->address->order_delivery_address_city == 'Алматы' or $model->address->order_delivery_address_city == 'Алмата'){
                        return 'ALMATA';
                    }
                    elseif ($model->address->order_delivery_address_city == 'Актау'){
                        return 'AKTAU';
                    }
                    elseif ($model->address->order_delivery_address_city == 'Атырау'){
                        return 'ATYRAU';
                    }
                    elseif ($model->address->order_delivery_address_city == 'Петропавловск'){
                        return 'PETROPAVLOVSK';
                    }
                    elseif ($model->address->order_delivery_address_city == 'Кызылорда'){
                        return 'KYZYLORDA';
                    }
                    elseif ($model->address->order_delivery_address_city == 'Костанай'){
                        return 'KOSTANAI';
                    }
                    elseif ($model->address->order_delivery_address_city == 'Семей'){
                        return 'SEMEI';
                    }
                    elseif ($model->address->order_delivery_address_city == 'Темиртау'){
                        return 'TEMIRTAU';
                    }
                    elseif ($model->address->order_delivery_address_city == 'Уральск'){
                        return 'URALSK';
                    }
                    elseif ($model->address->order_delivery_address_city == 'Кокшетау'){
                        return 'KOKSHETAU';
                    }
                    elseif ($model->address->order_delivery_address_city == 'Усть-Каменогорск'){
                        return 'UST-KAMENOGORSK';
                    }
                    elseif ($model->address->order_delivery_address_city == 'Тараз'){
                        return 'TARAZ';
                    }
                    elseif ($model->address->order_delivery_address_city == 'Шымкент'){
                        return 'SHIMKENT';
                    }
                    elseif ($model->address->order_delivery_address_city == 'Павлодар'){
                        return 'PAVLODAR';
                    }
                    elseif ($model->address->order_delivery_address_city == 'Кульсары'){
                        return 'KYLSARY';
                    }
                    elseif ($model->address->order_delivery_address_city == 'Актобе'){
                        return 'AKTOBE';
                    }
                    elseif ($model->address->order_delivery_address_city == 'Жезказган'){
                        return 'ZHEZKAZGAN';
                    }
                    elseif ($model->address->order_delivery_address_city == 'Туркестан'){
                        return 'TURKESTAN';
                    }
                    elseif ($model->address->order_delivery_address_city == 'Экибастуз'){
                        return 'EKIBASTUZ';
                    }
                    elseif ($model->address->order_delivery_address_city == 'Темиртау'){
                        return 'TEMIRTAU';
                    }
                    elseif ($model->address->order_delivery_address_city == 'Жанаозен'){
                        return 'ZHANAOZEN';
                    }
                    elseif ($model->address->order_delivery_address_city == 'Талдыкорган'){
                        return 'TALDYKORGAN';
                    }
                    elseif ($model->address->order_delivery_address_city == 'Караганда'){
                        return 'KARAGANDA';
                    }
                    elseif ($model->address->order_delivery_address_city == 'Астана'){
                        return 'ASTANA-KURER';
                    }
                }
            ],

            ['header' =>  'Комментарий'],
            ['header' =>  'Дата статуса оплачен'],

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}', 'header' => 'Подробно'],
        ],
    ]); ?>
</div>
