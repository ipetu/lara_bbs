<?php
/**
 * Created by PhpStorm.
 * User: ios
 * Date: 2019/1/4
 * Time: 6:45 PM
 */

namespace App\Transformer;


use App\models\Morebusinfo;
use League\Fractal\TransformerAbstract;

/**
 * Class MoreBusInfoTransformer
 * @package App\Transformer
 *
 * https://blog.csdn.net/u012946588/article/details/79205969
 */
class MoreBusInfoTransformer extends TransformerAbstract
{
//    protected $defaultIncludes = [
//        'busInfoDetail'
//    ];

    public function transform(Morebusinfo $morebusinfo)
    {
        $detailRouteArray = $this->busInfoDetailFuction($morebusinfo->busInfoDetail);
        $busInfoSingleDetail = $morebusinfo->busInfoDetail[0];

        return [
            'busId' => $morebusinfo->busId,
            'busLineName' => $morebusinfo->busLineName,
            'busLineTypeName'=>$morebusinfo->busLineTypeName,
            'lineTitle'=>$busInfoSingleDetail->lineTitle,
            'lineSiteCount'=>$busInfoSingleDetail->lineSiteCount,
            'cityEngName'=>$busInfoSingleDetail->cityEngName,
            'cityName'=>$busInfoSingleDetail->cityName,
            'lineName'=>$busInfoSingleDetail->lineName,
            'company'=>$busInfoSingleDetail->company,
            'lineTypeName'=>$busInfoSingleDetail->lineTypeName,
            'proName'=>$busInfoSingleDetail->proName,
            'siteTitleName'=>$busInfoSingleDetail->siteTitleName,
            'detail'=>$detailRouteArray,
        ];
    }


    public function busInfoDetailFuction($busInfoDetail){
        $array = [];
        foreach ($busInfoDetail as $item){
            $array[count($array)] = (new MoreBusDetailInfoTransformer)->transform($item);
        }
        return $array;
    }
}
