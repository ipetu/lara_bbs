<?php

namespace App\Http\Controllers\Api;

use App\models\Morebusinfo;
use App\Http\Controllers\Controller;
use App\Transformer\MoreBusInfoTransformer;
use Dingo\Api\Routing\Helpers;

class HKBusRouteController extends Controller
{
    //
    use Helpers;
    public function index(){
        $moreBusInfo = Morebusinfo::paginate(15)->getCollection();
        return $this->response->collection($moreBusInfo,new MoreBusInfoTransformer());
    }
}
