<?php
/**
 * Created by PhpStorm.
 * User: ios
 * Date: 2019/1/3
 * Time: 2:05 PM
 */

namespace App\JsonModel;

class BusInfoWithJSONModel
{
    protected $showapi_res_error;
    protected $showapi_res_id;
    protected $showapi_res_code;
    /**
     * @var BusInfoWithBodyJSONModel
     */
    protected $showapi_res_body;
    /**
     * @return mixed
     */
    public function getShowapiResError()
    {
        return $this->showapi_res_error;
    }

    /**
     * @param mixed $showapi_res_error
     */
    public function setShowapiResError($showapi_res_error): void
    {
        $this->showapi_res_error = $showapi_res_error;
    }

    /**
     * @return mixed
     */
    public function getShowapiResId()
    {
        return $this->showapi_res_id;
    }

    /**
     * @param mixed $showapi_res_id
     */
    public function setShowapiResId($showapi_res_id): void
    {
        $this->showapi_res_id = $showapi_res_id;
    }

    /**
     * @return mixed
     */
    public function getShowapiResCode()
    {
        return $this->showapi_res_code;
    }

    /**
     * @param mixed $showapi_res_code
     */
    public function setShowapiResCode($showapi_res_code): void
    {
        $this->showapi_res_code = $showapi_res_code;
    }

    /**
     * @return BusInfoWithBodyJSONModel
     */
    public function getShowapiResBody(): BusInfoWithBodyJSONModel
    {
        return $this->showapi_res_body;
    }

    /**
     * @param BusInfoWithBodyJSONModel $showapi_res_body
     */
    public function setShowapiResBody(BusInfoWithBodyJSONModel $showapi_res_body): void
    {
        $this->showapi_res_body = $showapi_res_body;
    }



}

class BusInfoWithBodyJSONModel{
    protected $curCount;
    protected $curPage;
    protected $maxPage;
    /**
     * @var $ret_code
     */
    protected $retCode;
    /**
     * @var array
     */
    protected $soulist;

    /**
     * @return mixed
     */
    public function getCurCount()
    {
        return $this->curCount;
    }

    /**
     * @param mixed $curCount
     */
    public function setCurCount($curCount): void
    {
        $this->curCount = $curCount;
    }

    /**
     * @return mixed
     */
    public function getCurPage()
    {
        return $this->curPage;
    }

    /**
     * @param mixed $curPage
     */
    public function setCurPage($curPage): void
    {
        $this->curPage = $curPage;
    }

    /**
     * @return mixed
     */
    public function getMaxPage()
    {
        return $this->maxPage;
    }

    /**
     * @param mixed $maxPage
     */
    public function setMaxPage($maxPage): void
    {
        $this->maxPage = $maxPage;
    }

    /**
     * @return mixed
     */
    public function getRetCode()
    {
        return $this->retCode;
    }

    /**
     * @param mixed $retCode
     */
    public function setRetCode($retCode): void
    {
        $this->retCode = $retCode;
    }

    /**
     * @return array
     */
    public function getSoulist(): array
    {
        return $this->soulist;
    }

    /**
     * @param array $soulist
     */
    public function setSoulist(array $soulist): void
    {
        $this->soulist = $soulist;
    }


}

class BusInfoWithBodySoulistJSONModel
{
    public $_id;
    public $lineName;
    public $lineTypeName;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->_id = $id;
    }

    /**
     * @return mixed
     */
    public function getLineName()
    {
        return $this->lineName;
    }

    /**
     * @param mixed $lineName
     */
    public function setLineName($lineName): void
    {
        $this->lineName = $lineName;
    }

    /**
     * @return mixed
     */
    public function getLineTypeName()
    {
        return $this->lineTypeName;
    }

    /**
     * @param mixed $lineTypeName
     */
    public function setLineTypeName($lineTypeName): void
    {
        $this->lineTypeName = $lineTypeName;
    }


}