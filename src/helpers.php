<?php

use Morilog\Jalali\Jalalian;

function newFeedback($title = "Operation Successful", $body = "The operation was completed successfully.", $type = "success")
{
    $session = session()->has('feedbacks') ? session()->get('feedbacks') : [];
    $session[] = ["title" => $title, "body" => $body, "type" => $type];
    session()->flash('feedbacks', $session);
}

function dateFromJalali($date, $format = "Y/m/d")
{
    return $date ? Jalalian::fromFormat($format, $date)->toCarbon() : null;
}

function getJalaliFromFormat($date, $format = "Y-m-d")
{
    return Jalalian::fromCarbon(\Carbon\Carbon::createFromFormat($format, $date))->format($format);
}

function createJalalianFromCarbon(Carbon\Carbon $carbon)
{
    return Jalalian::fromCarbon($carbon);
}
