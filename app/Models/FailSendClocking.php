<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FailSendClocking extends Model
{
    use HasFactory;

    const ATTR_TABLE = 'fail_send_clockings';

    const ATTR_INT_ID = 'id';
    const ATTR_INT_CLOCKING_ID = 'clocking_id';
    const ATTR_CHAR_MESSAGE = 'message';

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
        self::ATTR_INT_CLOCKING_ID,
        self::ATTR_CHAR_MESSAGE,
    ];
}
