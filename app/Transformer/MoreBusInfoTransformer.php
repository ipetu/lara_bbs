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
        return [
            'busId' => $morebusinfo->busId,
            'busLineName' => $morebusinfo->busLineName,
            'busLineTypeName'=>$morebusinfo->busLineTypeName,
            'detail'=>$morebusinfo->busInfoDetail
        ];
//        return $morebusinfo->attributesToArray();
    }

//    public function includeBusInfoDetail(Morebusinfo $morebusinfo){
//        $busInfoDetail = $morebusinfo->busInfoDetail;
//        return $this->collection($busInfoDetail,new MoreBusDetailInfoTransformer());
//    }
}
