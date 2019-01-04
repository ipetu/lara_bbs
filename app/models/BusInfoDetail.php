<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\models\BusInfoDetail
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $busId
 * @property int $bound
 * @property string $lineTitle
 * @property string $lineSiteCount
 * @property string|null $lastUpTime
 * @property string|null $cityEngName
 * @property string|null $cityName
 * @property string|null $lineName
 * @property string|null $company
 * @property string|null $lineTypeName
 * @property string|null $proName
 * @property string|null $siteTitleName
 * @property string|null $runTime
 * @property string|null $price
 * @property string $lineSiteName
 * @property string $lineSiteId
 * @property string $lineSiteNum
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\BusInfoDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\BusInfoDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\BusInfoDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\BusInfoDetail whereBound($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\BusInfoDetail whereBusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\BusInfoDetail whereCityEngName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\BusInfoDetail whereCityName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\BusInfoDetail whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\BusInfoDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\BusInfoDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\BusInfoDetail whereLastUpTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\BusInfoDetail whereLineName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\BusInfoDetail whereLineSiteCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\BusInfoDetail whereLineSiteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\BusInfoDetail whereLineSiteName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\BusInfoDetail whereLineSiteNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\BusInfoDetail whereLineTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\BusInfoDetail whereLineTypeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\BusInfoDetail wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\BusInfoDetail whereProName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\BusInfoDetail whereRunTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\BusInfoDetail whereSiteTitleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\BusInfoDetail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BusInfoDetail extends Model
{
    //
    protected $table = 'businfodetails';

    public function moreBusInfo(){
        return $this->belongsTo(BusInfoDetail::class,'busId','busId');
    }

    /**
     * @return string
     */
    public function getBusId(): string
    {
        return $this->busId;
    }

    /**
     * @param string $busId
     */
    public function setBusId(string $busId): void
    {
        $this->busId = $busId;
    }

    /**
     * @return int
     */
    public function getBound(): int
    {
        return $this->bound;
    }

    /**
     * @param int $bound
     */
    public function setBound(int $bound): void
    {
        $this->bound = $bound;
    }

    /**
     * @return string
     */
    public function getLineTitle(): string
    {
        return $this->lineTitle;
    }

    /**
     * @param string $lineTitle
     */
    public function setLineTitle(string $lineTitle): void
    {
        $this->lineTitle = $lineTitle;
    }

    /**
     * @return string
     */
    public function getLineSiteCount(): string
    {
        return $this->lineSiteCount;
    }

    /**
     * @param string $lineSiteCount
     */
    public function setLineSiteCount(string $lineSiteCount): void
    {
        $this->lineSiteCount = $lineSiteCount;
    }

    /**
     * @return null|string
     */
    public function getLastUpTime(): ?string
    {
        return $this->lastUpTime;
    }

    /**
     * @param null|string $lastUpTime
     */
    public function setLastUpTime(?string $lastUpTime): void
    {
        $this->lastUpTime = $lastUpTime;
    }

    /**
     * @return null|string
     */
    public function getCityEngName(): ?string
    {
        return $this->cityEngName;
    }

    /**
     * @param null|string $cityEngName
     */
    public function setCityEngName(?string $cityEngName): void
    {
        $this->cityEngName = $cityEngName;
    }

    /**
     * @return null|string
     */
    public function getCityName(): ?string
    {
        return $this->cityName;
    }

    /**
     * @param null|string $cityName
     */
    public function setCityName(?string $cityName): void
    {
        $this->cityName = $cityName;
    }

    /**
     * @return null|string
     */
    public function getLineName(): ?string
    {
        return $this->lineName;
    }

    /**
     * @param null|string $lineName
     */
    public function setLineName(?string $lineName): void
    {
        $this->lineName = $lineName;
    }

    /**
     * @return null|string
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }

    /**
     * @param null|string $company
     */
    public function setCompany(?string $company): void
    {
        $this->company = $company;
    }

    /**
     * @return null|string
     */
    public function getLineTypeName(): ?string
    {
        return $this->lineTypeName;
    }

    /**
     * @param null|string $lineTypeName
     */
    public function setLineTypeName(?string $lineTypeName): void
    {
        $this->lineTypeName = $lineTypeName;
    }

    /**
     * @return null|string
     */
    public function getProName(): ?string
    {
        return $this->proName;
    }

    /**
     * @param null|string $proName
     */
    public function setProName(?string $proName): void
    {
        $this->proName = $proName;
    }

    /**
     * @return null|string
     */
    public function getSiteTitleName(): ?string
    {
        return $this->siteTitleName;
    }

    /**
     * @param null|string $siteTitleName
     */
    public function setSiteTitleName(?string $siteTitleName): void
    {
        $this->siteTitleName = $siteTitleName;
    }

    /**
     * @return null|string
     */
    public function getRunTime(): ?string
    {
        return $this->runTime;
    }

    /**
     * @param null|string $runTime
     */
    public function setRunTime(?string $runTime): void
    {
        $this->runTime = $runTime;
    }

    /**
     * @return null|string
     */
    public function getPrice(): ?string
    {
        return $this->price;
    }

    /**
     * @param null|string $price
     */
    public function setPrice(?string $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getLineSiteName(): string
    {
        return $this->lineSiteName;
    }

    /**
     * @param string $lineSiteName
     */
    public function setLineSiteName(string $lineSiteName): void
    {
        $this->lineSiteName = $lineSiteName;
    }

    /**
     * @return string
     */
    public function getLineSiteId(): string
    {
        return $this->lineSiteId;
    }

    /**
     * @param string $lineSiteId
     */
    public function setLineSiteId(string $lineSiteId): void
    {
        $this->lineSiteId = $lineSiteId;
    }

    /**
     * @return string
     */
    public function getLineSiteNum(): string
    {
        return $this->lineSiteNum;
    }

    /**
     * @param string $lineSiteNum
     */
    public function setLineSiteNum(string $lineSiteNum): void
    {
        $this->lineSiteNum = $lineSiteNum;
    }


}
