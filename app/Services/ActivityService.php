<?php

namespace App\Services;

class ActivityService
{

    public function validateDayHours($activities,$day,$totalDays)
    {

        if($day == 1 || $day == $totalDays){
            $limit = 4;
        }else{
            $limit = 8;
        }

        $totalHours = 0;

        foreach($activities as $activity){

            $totalHours += $activity['duration'];

        }

        if($totalHours > $limit){

            return [
                "status"=>false,
                "message"=>"Activity hours exceed limit"
            ];

        }

        return [
            "status"=>true
        ];

    }

}