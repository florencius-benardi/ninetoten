<?php

namespace App\Http\Controllers;

use App\Models\Clocking;
use App\Models\DeviceClocking;
use App\Models\Employee;
use App\Models\FailSendClocking;
use App\Models\SettingSendClocking;
use Illuminate\Http\Request;

class ClockingController extends Controller
{
    public function index()
    {
        $setupClocking = SettingSendClocking::where(SettingSendClocking::ATTR_CHAR_KEY, 'last_clocking_id')->first();

        $lastId = intval($setupClocking->{SettingSendClocking::ATTR_CHAR_VALUE});

        $clockingList = Clocking::with([
            Clocking::ATTR_RELATION_COMPANY,
            Clocking::ATTR_RELATION_LOCATION,
            Clocking::ATTR_RELATION_EMPLOYEE,
            Clocking::ATTR_RELATION_DEVICE,
        ])->where(Clocking::ATTR_INT_ID, '>', $lastId)
            ->orderBy(Clocking::ATTR_INT_ID, 'asc')
            ->limit(env('LIMIT_SEND_DATA', 100))
            ->get();

        $lastInserted = 0;
        foreach ($clockingList as $cl) {
            $lastInserted = $cl->{Clocking::ATTR_INT_ID};
            try {
                $parseData = [
                    'employee' => $cl->{Clocking::ATTR_RELATION_EMPLOYEE}->{Employee::ATTR_CHAR_CODE},
                    'location' => $cl->{Clocking::ATTR_RELATION_DEVICE}->{DeviceClocking::ATTR_CHAR_NAME},
                    'type' => $this->getClockingType($cl->{Clocking::ATTR_INT_CLOCKING_TYPE}),
                    'clocking' => $cl->{Clocking::ATTR_DATETIME_CLOCKING},
                ];
            } catch (\Throwable $th) {
                FailSendClocking::firstOrCreate([FailSendClocking::ATTR_INT_CLOCKING_ID => $cl->{Clocking::ATTR_INT_ID}], [FailSendClocking::ATTR_CHAR_MESSAGE => $th->getMessage()]);
                continue;
            }

            echo true;
        }

        $setupClocking->update([SettingSendClocking::ATTR_CHAR_VALUE => $lastInserted]);
    }

    private function getClockingType(string $val)
    {
        $clockingType = ['Clock IN', 'Clock OUT'];
        return $clockingType[intval($val)] ?? null;
    }
}
