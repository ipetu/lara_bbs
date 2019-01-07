<?php

namespace App\Http\Controllers;

use App\JsonModel\BusInfoWithJSONModel;
use App\models\BusInfo;
use App\models\BusInfoDetail;
use App\models\Morebusinfo;
use DavidHoeck\LaravelJsonMapper\JsonMapper;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

date_default_timezone_set("PRC");

class YiYuanApiController extends Controller
{
    //
    protected $headers = ['Content-Type:text/html' => 'charset=UTF-8'];
    protected $showapi_appid = '84840';  //替换此值,在官网的"我的应用"中找到相关值
    protected $showapi_secret = '957808e33c2343989e30b15b4c520ee3';  //替换此值,在官网的"我的应用"中找到相关值
    protected $paramArr = ['showapi_appid' => '84840', 'cityName' => "香港"];
    protected $client;
    protected $curPage = 1;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function index()
    {
        $busInfo = Morebusinfo::paginate(10);
        foreach ($busInfo as $item) {
            $item->busInfoDetail;
        }
        return response($busInfo);
    }

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \JsonMapper_Exception
     */
    public function saveApi()
    {
        $this->serverToYiYuanRoute();
        return response('ok');
    }

    public function saveDetailApi()
    {
        $moreBusInfoItems = Morebusinfo::paginate(20)->items();
        $content = '';
//        return response($moreBusInfoItems);
        foreach ($moreBusInfoItems as $item) {
            $bound = 0;
            $busId = $item->busId;
            $res = $this->feachYIYuanRouteDetailApi($busId);
            $content = $res->getBody()->getContents();
            Log::info($content);
//            return response($content);
            $busDetailInfoJSONModel = json_decode($content);
            $resCode = $busDetailInfoJSONModel->showapi_res_code;
            $showApiResBody = $busDetailInfoJSONModel->showapi_res_body;
            if (isset($resCode) && $resCode == 0) {
                $busSite = $showApiResBody->busSite;
                $busLineList = $busSite->sitesLineList;
                $lastUpTime = $busSite->lastUpTime;
                $cityEngName = $busSite->cityEngName;
                $cityName = $busSite->cityName;
                $lineName = $busSite->lineName;
                $company = $busSite->company;
                $lineTypeName = $busSite->lineTypeName;
                $proName = $busSite->proName;
                $siteTitleName = $busSite->siteTitleName;
                $runTime = $busSite->runtime;
                $price = $busSite->price;
                if (is_array($busLineList)) {
                    foreach ($busLineList as $item) {
                        $bound = $bound+1;
                        $lineTitle = $item->lineTitle;
                        $lineSiteCount = $item->lineSiteCount;
                        $lineSiteList = $item->lineSiteList;
                        if (is_array($lineSiteList)) {
                            foreach ($lineSiteList as $item) {
                                $lineSiteName = $item->lineSiteName;
                                $lineSiteId = $item->lineSiteId;
                                $lineSiteNum = $item->lineSiteNum;
                                $businfoDetails = new BusInfoDetail();
                                $businfoDetails->setBusId($busId);
                                $businfoDetails->setBound($bound);
                                $businfoDetails->setCityEngName($cityEngName);
                                $businfoDetails->setCityName($cityName);
                                $businfoDetails->setCompany($company);
                                $businfoDetails->setLastUpTime($lastUpTime);
                                $businfoDetails->setLineName($lineName);
                                $businfoDetails->setLineSiteCount($lineSiteCount);
                                $businfoDetails->setLineTitle($lineTitle);
                                $businfoDetails->setPrice($price);
                                $businfoDetails->setRunTime($runTime);
                                $businfoDetails->setSiteTitleName($siteTitleName);
                                $businfoDetails->setLineTitle($lineTitle);
                                $businfoDetails->setLineTypeName($lineTypeName);
                                $businfoDetails->setProName($proName);
                                $businfoDetails->setLineSiteName($lineSiteName);
                                $businfoDetails->setLineSiteId($lineSiteId);
                                $businfoDetails->setLineSiteNum($lineSiteNum);
                                $businfoDetails->save();
                            }
                        }
                    }
                }
            }
        }
        return response($moreBusInfoItems);
    }

    private function serverToYiYuanRoute()
    {
        $singleBus = BusInfo::paginate(10);
        foreach ($singleBus as $value) {
            $busNo = $value->busno;
            $res = $this->feachYIYuanRouteApi($busNo);
            $content = $res->getBody()->getContents();
            Log::info($content);
            $busInfoJSONModel = json_decode($content);
            $soulistbody = $busInfoJSONModel->showapi_res_body;
            if (isset($soulistbody->ret_code)) {
                if ($soulistbody->ret_code != '-1') {
                    $soulistArr = $soulistbody->soulist;
                    if (empty($soulistArr)) {
                        continue;
                    }
                    foreach ($soulistArr as $soulist) {
                        $lineName = $soulist->lineName;
                        $moreBusInfo = Morebusinfo::where('busLineName', $lineName)->first();
                        if (!$moreBusInfo) {
                            $moreBusInfo = new Morebusinfo();
                        }
                        $moreBusInfo->busno = $busNo;
                        $moreBusInfo->busId = $soulist->_id;
                        $moreBusInfo->busLineName = $lineName;
                        $moreBusInfo->busLineTypeName = $soulist->lineTypeName;
                        $moreBusInfo->save();
                    }
                }
            }
        }
    }

    private function feachYIYuanRouteApi($lineName)
    {
        $this->paramArr['lineName'] = $lineName;
        $this->paramArr['curPage'] = $this->curPage;
        $param = $this->createParam($this->paramArr, $this->showapi_secret);
        $url = 'http://route.showapi.com/1463-3?' . $param;
        $res = $this->client->request('get', $url, $this->headers);
        return $res;
    }

    private function feachYIYuanRouteDetailApi($lineId)
    {
        $this->paramArr['lineId'] = $lineId;
        $param = $this->createParam($this->paramArr, $this->showapi_secret);
        $url = 'http://route.showapi.com/1463-4?' . $param;
        $res = $this->client->request('get', $url, $this->headers);
        return $res;
    }

    //创建参数(包括签名的处理)
    private function createParam($paramArr, $showapi_secret)
    {
        $paraStr = "";
        $signStr = "";
        ksort($paramArr);
        foreach ($paramArr as $key => $val) {
            if ($key != '' && $val != '') {
                $signStr .= $key . $val;
                $paraStr .= $key . '=' . urlencode($val) . '&';
            }
        }
        $signStr .= $showapi_secret;//排好序的参数加上secret,进行md5
        $sign = strtolower(md5($signStr));
        $paraStr .= 'showapi_sign=' . $sign;//将md5后的值作为参数,便于服务器的效验
        return $paraStr;
    }
}
