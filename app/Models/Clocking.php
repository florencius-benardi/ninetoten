<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clocking extends Model
{
    use HasFactory;

    const ATTR_TABLE = 'checkinout';

    const ATTR_INT_ID = 'id';
    const ATTR_INT_EMPLOYEE = 'userid';
    const ATTR_DATETIME_CLOCKING = 'checktime';
    const ATTR_CHAR_DEVICE = 'SN';
    const ATTR_CHAR_NAME = 'Alias';
    const ATTR_INT_LOCATION = 'DeptID';
    const ATTR_INT_COMPANY = 'company_id';

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
        self::ATTR_INT_EMPLOYEE,
        self::ATTR_DATETIME_CLOCKING,
        self::ATTR_CHAR_DEVICE,
        self::ATTR_CHAR_NAME,
        self::ATTR_INT_LOCATION,
        self::ATTR_INT_COMPANY,

    ];

    public function location()
    {
        return $this->belongsTo(Location::class, self::ATTR_INT_LOCATION)->select(
            Location::ATTR_INT_ID,
            Location::ATTR_CHAR_NAME
        );
    }

    public function company()
    {
        return $this->belongsTo(Company::class, self::ATTR_INT_COMPANY)->select(
            Company::ATTR_INT_ID,
            Company::ATTR_CHAR_NAME
        );
    }

    public function device()
    {
        return $this->belongsTo(DeviceClocking::class, self::ATTR_CHAR_DEVICE)->select(
            DeviceClocking::ATTR_INT_ID,
            DeviceClocking::ATTR_CHAR_NAME
        );
    }
}
