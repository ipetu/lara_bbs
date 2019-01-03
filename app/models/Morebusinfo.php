<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\models\Morebusinfo
 *
 * @property int $id
 * @property int $busno
 * @property string $busId
 * @property string $busLineName
 * @property string $busLineTypeName
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\models\BusInfo $busInfo
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Morebusinfo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Morebusinfo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Morebusinfo query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Morebusinfo whereBusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Morebusinfo whereBusLineName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Morebusinfo whereBusLineTypeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Morebusinfo whereBusno($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Morebusinfo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Morebusinfo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Morebusinfo whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Morebusinfo extends Model
{
    //
    protected $table = 'morebusinfos';
    protected $fillable = ['busLineName'];
    public function busInfo(){
        return $this->belongsTo(BusInfo::class,'busno','busno');
    }
}
