<?php
/* @var $this yii\web\View */

use app\models\CarModel;
use app\models\Order;
use miloschuman\highcharts\Highcharts;
use yii\bootstrap\Dropdown;
use yii\helpers\Html;

?>
<h1 class="text-center">Statistics</h1>
<?php
    $mounth = array("1"=>"JANUARY", "2"=>"FEBRUARY", "3"=>"MARCH", "4"=>"APRIL", "5"=>"MAY", "6"=>"JUNE", "7"=>"JULY", "8"=>"AUGUST", "9"=>"SEPTEMBER", "10"=>"OCTOBER", "11"=>"NOVEMBER", "12"=>"DECEMBER");
    $orders_all = Order::find()->all();
    $cars = CarModel::find()->all();
    $orders_count = array();
    $orders_totalprice = array();
    $car_all = array();
    $mo = date('m', strtotime($orders_all[8]->date));
    foreach ($orders_all as $order)
    {
        if(strcasecmp(date('y', strtotime($order->date)),substr($year, 2))==0)
        {
            $mo = date('m', strtotime($order->date));
            if($mo[0]=='0')
                $mo = substr($mo, 1);
            $orders_count[$mo]++;
            $car_all[$order->car_id]=$car_all[$order->car_id]+$order->price;
            $orders_totalprice[$mo]=$orders_totalprice[$mo]+$order->price;
        }
    }
    function get_car_name($id, $cars)
    {
        foreach ($cars as $car)
        {
            if($car->id==$id)
                return $car->name;
        }
        return null;
    }
?>
<p>
<div class="dropdown">
    <a href="#" data-toggle="dropdown" class="dropdown-toggle">Year <b class="caret"></b></a>
    <?php
    echo Dropdown::widget([
        'items' => [
            ['label' => '2018', 'url' => '/admin/stat?y=2018'],
            ['label' => '2019', 'url' => '/admin/stat?y=2019'],
        ],
    ]);
    ?>
</div>
    <?php
    if(!$orders_count==null)
        $text1 = "General booking statistics for ".$year;
    else
        $text1 = "General booking statistics for ".$year." (missing)";
    if(!$orders_totalprice==null)
        $text2 = "Revenue Statistics for ".$year;
    else
        $text2 = "Revenue Statistics for ".$year." (missing)";
    if(!$car_all==null)
        $text3 = "The most profitable cars for ".$year;
    else
        $text3 = "The most profitable cars for ".$year." (missing)";
    $options = ['class' => 'dropdown-menu'];
    echo Highcharts::widget([
        'options' => [
            'title' => ['text' => $text1],
            'xAxis' => [
                'categories' => [$mounth[1], $mounth[2], $mounth[3], $mounth[4], $mounth[5], $mounth[6], $mounth[7], $mounth[8], $mounth[9], $mounth[10], $mounth[11], $mounth[12]]
            ],
            'yAxis' => [
                'title' => ['text' => 'Orders']
            ],
            'series' => [
                ['name' => 'Total orders', 'data' => [$orders_count[1],$orders_count[2],$orders_count[3],$orders_count[4],$orders_count[5],$orders_count[6],$orders_count[7],$orders_count[8],$orders_count[9],$orders_count[10],$orders_count[11],$orders_count[12]]],
            ]      ]
    ]);
    echo Highcharts::widget([
        'options' => [
                'chart'=> ['type' => 'column'],
            'title' => ['text' => $text2],
            'xAxis' => [
                'categories' => [$mounth[1], $mounth[2], $mounth[3], $mounth[4], $mounth[5], $mounth[6], $mounth[7], $mounth[8], $mounth[9], $mounth[10], $mounth[11], $mounth[12]]
            ],
            'yAxis' => [
                'title' => ['text' => 'Orders']
            ],
            'series' => [
                ['name' => 'Total revenue (UAH)', 'data' => [$orders_totalprice[1],$orders_totalprice[2],$orders_totalprice[3],$orders_totalprice[4],$orders_totalprice[5],$orders_totalprice[6],$orders_totalprice[7],$orders_totalprice[8],$orders_totalprice[9],$orders_totalprice[10],$orders_totalprice[11],$orders_totalprice[12]]],
            ]      ]
    ]);
    $chart_car_data = array();
    foreach ($car_all as $car)
    {
        $index = array_search($car, $car_all);
        array_push($chart_car_data, array(get_car_name($index,$cars),$car));
    }
    echo Highcharts::widget([
        'options' => [
            'chart'=> ['type' => 'pie'],
            'title' => ['text' => $text3],
            'series' => array(
                array(
                    'data' => $chart_car_data
                ))
        ]
    ]);
    ?>
</p>
