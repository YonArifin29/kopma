<?php
function level($level)
{
    return ($level == 1) ? "Admin" : "Penjual";
}

function status($status)
{
    return ($status == 1) ? "Aktif" : "Tidak Aktif";
}

function sum($datas)
{
    $totalSum = 0;

    foreach ($datas as $data) {
        $totalSum += intval($data['Total']);
    }
    return $totalSum;
}
