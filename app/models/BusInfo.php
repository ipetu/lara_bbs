<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\models\BusInfo
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\BusInfo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\BusInfo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\BusInfo query()
 * @mixin \Eloquent
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $bid
 * @property string|null $busno
 * @property int $wheelchair
 * @property int $night
 * @property int $special
 * @property int $racing
 * @property int $airport
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\models\Morebusinfo[] $moreBusInfo
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\BusInfo whereAirport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\BusInfo whereBid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\BusInfo whereBusno($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\BusInfo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\BusInfo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\BusInfo whereNight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\BusInfo whereRacing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\BusInfo whereSpecial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\BusInfo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\BusInfo whereWheelchair($value)
 */
class BusInfo extends Model
{
    protected $table = 'businfos';
    public function moreBusInfo(){
        return $this->hasMany(Morebusinfo::class,'busno','busno');
    }
}
