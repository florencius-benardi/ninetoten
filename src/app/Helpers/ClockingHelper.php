<?php

function getClockingType(string $val)
{
    $clockingType = ['Clock IN', 'Clock OUT'];
    return $clockingType[intval($val)];
}
