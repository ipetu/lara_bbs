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

class MoreBusInfoTransformer extends TransformerAbstract
{
    public function transform(Morebusinfo $morebusinfo)
    {
        return [
            'title' => $morebusinfo->busno,
            'content' => $morebusinfo->busLineName,
            'is_free' => $morebusinfo->busId
        ];
    }
}