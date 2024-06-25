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
