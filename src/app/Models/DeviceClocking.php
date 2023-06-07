<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceClocking extends Model
{
    use HasFactory;

    const ATTR_TABLE = 'iclock';

    const ATTR_INT_ID = 'SN';
    const ATTR_CHAR_NAME = 'Alias';
    const ATTR_INT_LOCATION = 'DeptID';

    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = self::ATTR_TABLE;
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = self::ATTR_INT_ID;

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = [
        self::ATTR_INT_LOCATION,
        self::ATTR_CHAR_NAME
    ];

    public function company()
    {
        return $this->belongsTo(Location::class, self::ATTR_INT_LOCATION)->select(
            Location::ATTR_INT_ID,
            Location::ATTR_CHAR_NAME
        );
    }
}
