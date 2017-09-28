<?php

// v0.1
// $metric - what type of interval to use
//     - $metric = 'time' -> if you want the cache deleted on a time interval in hours (ie '24', '90')
//     - $metric = 'filesize' (DEFAULT) -> if you want the cache to be deleted based on the filesize of the cache in MB (ie '256', '1024')
//  $interval - the interval to be used with the chosen $metric. only integer or equivilant string.
function autoptimizeKillCache(){
    $metric = 'time';
    $interval = '24';

    if ($metric == 'time') {
        if (class_exists('autoptimizeCache')) {
            $statArr=autoptimizeCache::stats();
            $cacheSize=round($statArr[1]/1024);

            if ($cacheSize>$metric){
               autoptimizeCache::clearall();
               header("Refresh:0"); // Refresh the page so that autoptimize can create new cache files and it does break the page after clearall.
            }
        }

    } elseif ($metric == 'filesize') {
        if (class_exists('autoptimizeCache')) {
            $statArr=autoptimizeCache::stats();
            $cacheSize=round($statArr[1]/1024);

            if ($cacheSize>$metric){
               autoptimizeCache::clearall();
               header("Refresh:0"); // Refresh the page so that autoptimize can create new cache files and it does break the page after clearall.
            }
        }

    } else {
        // if its some other random value

    }
}
