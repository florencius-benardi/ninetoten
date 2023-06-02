<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    const ATTR_TABLE = 'userinfo';

    const ATTR_INT_ID = 'userid';
    const ATTR_CHAR_CODE = 'SSN';
    const ATTR_CHAR_NAME = 'name';
    const ATTR_INT_COMPANY = 'company_id';
    const ATTR_CHAR_BADGE = 'badgenumber';

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
    public $incrementing = true;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    protected $fillable = [
        self::ATTR_CHAR_CODE,
        self::ATTR_CHAR_NAME,
        self::ATTR_INT_COMPANY,
        self::ATTR_CHAR_BADGE
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, self::ATTR_INT_COMPANY)->select(
            Company::ATTR_INT_ID,
            Company::ATTR_CHAR_NAME
        );
    }
}
