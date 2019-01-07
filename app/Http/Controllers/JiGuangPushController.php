<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JPush\Client;
use JPush\Exceptions\APIConnectionException;
use JPush\Exceptions\APIRequestException;

class JiGuangPushController extends Controller
{
    private $client;
    private $appKey = '880e2da8be98ead070f2baa1';
    private $secret = '2a0082d1afd20a44f9e28de0';
    private $response = '';
    public function __construct()
    {
        $this->client = new Client($this->appKey,$this->secret,storage_path('logs/jpush'));
    }

    //
    public function index(){
        try{
            $push = $this->client->push();
            $cid = $push->getCid();
            $response = $push->setCid($cid['body']['cidlist'][0])
            ->setPlatform(array('ios','android'))
            ->addAlias(array('6375'))
            ->iosNotification('Hello ios',array(
                'sound'=>'sound',
                'badge'=>'+1',
                'extras'=>array(
                    'key'=>'value',
                    'jiguang'
                )
            )) ->androidNotification('6375 Hello Android', array(
                    'title' => 'hello jpush',
                    // 'builder_id' => 2,
                    'extras' => array(
                        'key' => 'value',
                        'jiguang'
                    ),
                ))
            ->message('message content',array(
                'title'=>'hello push',
                'extras'=>array(
                    'key'=>'value',
                    'jiguang'
                )
            ))
            ->options(array(
                'time_to_live' => 10,
                'apns_production' => true
            ))->send();

        }catch (APIConnectionException $e){
            return response($e);
        }catch (APIRequestException $exception){
            return response($exception);
        }
        return response($response);
    }
}
