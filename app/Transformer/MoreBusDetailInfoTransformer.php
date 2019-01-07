<?php
/**
 * Created by PhpStorm.
 * User: ios
 * Date: 2019/1/4
 * Time: 6:45 PM
 */

namespace App\Transformer;


use App\models\BusInfoDetail;
use App\models\Morebusinfo;
use League\Fractal\TransformerAbstract;

class MoreBusDetailInfoTransformer extends TransformerAbstract
{


    public function transform(BusInfoDetail $busInfoDetail)
    {
        return [
            'busId' => $busInfoDetail->busId
//            'busLineName' => $busInfoDetail->busLineName,
//            'busLineTypeName'=>$busInfoDetail->busLineTypeName
        ];
    }


}