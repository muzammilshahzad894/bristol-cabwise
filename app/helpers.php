<?php

use App\Helpers\SettingsHelper;

if (!function_exists('setting')) {
    function setting($key, $default = null)
    {
        $settingsHelper = new SettingsHelper();
        return $settingsHelper->get($key, $default);
    }
}
