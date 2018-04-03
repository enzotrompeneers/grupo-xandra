<?php
/**
 * Date availablity class
 *
 * @author Daniel Beard <daniel@creativos.be>
 *
 */

namespace Brunelencantado\Calendar;


class Timetable {


    public static function getTimeRange($start, $end, $step = '30 mins') { 

        $startTime = strtotime($start); 
        $endTime   = strtotime($end); 
    
        $current    = time(); 
        $addTime   = strtotime('+' . $step, $current); 
        $diff       = $addTime - $current; 
    
        $times = []; 
        while ($startTime < $endTime) { 
            $times[] = date('G:i', $startTime) . 'h'; 
            $startTime += $diff; 
        } 
        $times[] = date('G:i', $startTime) . 'h'; 
        
        return $times; 
    } 


}