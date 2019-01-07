<?php

namespace App\Http\Controllers\Api;

use App\models\Morebusinfo;
use App\Http\Controllers\Controller;
use App\Transformer\MoreBusInfoTransformer;
use App\Transformer\SingleMoreBusInfoTransformer;
use Dingo\Api\Routing\Helpers;
use App\Transformer\MoreBusDetailInfoTransformer;
class HKBusRouteController extends Controller
{
    //
    use Helpers;

    public function __construct()
    {
        $this->middleware(['serializer:array']);
    }

    public function index(){
        $moreBusInfo = Morebusinfo::paginate(20)->getCollection();
        return $this->response->collection($moreBusInfo,new SingleMoreBusInfoTransformer());
    }

    public function busDetail($BusId){
        $moreBusInfo = Morebusinfo::where('busId',$BusId)->first();
        return $this->response->item($moreBusInfo,new MoreBusInfoTransformer());
    }
}
