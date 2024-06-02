<?php

namespace App\Helpers;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingsHelper
{
    protected $cacheKey = 'app_settings';

    public function get($key, $default = null)
    {
        $settings = $this->getAllSettings();

        return $settings[$key] ?? $default;
    }

    protected function getAllSettings()
    {
        return Cache::remember($this->cacheKey, 60 * 60, function () {
            return Setting::pluck('value', 'key')->toArray();
        });
    }

    public function clearCache()
    {
        Cache::forget($this->cacheKey);
    }
}
