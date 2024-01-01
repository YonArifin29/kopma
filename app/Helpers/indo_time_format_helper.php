<?php
function date_indo($times)
{
    $months = array(
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    //break between date and time
    $break = explode(' ', $times);
    $date = $break[0];
    $time = $break[1];
    $BreakDate = explode('-', $date);
    $BreakTime = explode(':', $time);
    $month = $months[(int)$BreakDate[1]];
    return "$BreakDate[2] $month $BreakDate[0] $BreakTime[0]<b>:</b>$BreakTime[1]<b>:</b>$BreakTime[2]";
}
