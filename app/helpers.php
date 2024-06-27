<?php

use App\Helpers\SettingsHelper;
use App\Models\Status;

if (!function_exists('setting')) {
    function setting($key, $default = null)
    {
        $settingsHelper = new SettingsHelper();
        return $settingsHelper->get($key, $default);
    }
}

if (!function_exists('getStatusDetails')) {
    function getStatusDetails($id)
    {
        return Status::find($id);
    }
}

if (!function_exists('foramtTime')) {
    function foramtTime($time)
    {
        return date('h:i A', strtotime($time));
    }
}

if (!function_exists('formatDate')) {
    function formatDate($date)
    {
        return date('d-m-Y', strtotime($date));
    }
}
