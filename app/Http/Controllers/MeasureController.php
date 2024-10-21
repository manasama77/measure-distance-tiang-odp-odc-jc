<?php

namespace App\Http\Controllers;

use App\Models\Odp;
use App\Models\OdpToTiang;
use App\Models\Tiang;
use Illuminate\Http\Request;

class MeasureController extends Controller
{
    public function index()
    {
        $tiangs = Tiang::get();
        $count = 0;
        foreach ($tiangs as $tiang) {
            $id_tiang = $tiang->id;
            $lat_tiang = $tiang->lat;
            $lng_tiang = $tiang->lng;

            $odps = Odp::all();
            foreach ($odps as $odp) {
                $id_odp = $odp->id;
                $lat_odp = $odp->lat;
                $lng_odp = $odp->lng;
                $distance = $this->measure($lat_tiang, $lng_tiang, $lat_odp, $lng_odp);
                if ($distance < 3) {
                    // update or create
                    OdpToTiang::updateOrCreate([
                        'tiang_id' => $id_tiang,
                        'odp_id'   => $id_odp,
                        'distance' => $distance,
                    ]);
                }
            }

            $count++;
        }

        return $count;
    }

    public function measure($lat1, $lng1, $lat2, $lng2)
    {
        $theta = $lng1 - $lng2;
        $dist  = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist  = acos($dist);
        $dist  = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $meter = $miles * 1609.344;
        return $meter;
    }

    public function result()
    {
        $tiangs = Tiang::with([
            'odp_to_tiang',
            'odp_to_tiang.odp',
        ])->get();

        $data = [
            'tiangs' => $tiangs,
        ];

        return view('result', $data);
    }
}
