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

class SingleMoreBusInfoTransformer extends TransformerAbstract
{
    public function transform(Morebusinfo $morebusinfo)
    {
        return [
            'busId' => $morebusinfo->busId,
            'busLineName' => $morebusinfo->busLineName,
            'busLineTypeName'=>$morebusinfo->busLineTypeName
        ];
    }
}