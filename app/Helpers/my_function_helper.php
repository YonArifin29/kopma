<?php
function level($level)
{
    return ($level == 1) ? "Admin" : "Penjual";
}

function status($status)
{
    return ($status == 1) ? "Aktif" : "Tidak Aktif";
}
