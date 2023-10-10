<?php


namespace App\Services;
use App\Traits\FileTrait;
use App\Models\Setting;
use Illuminate\Database\Eloquent\Collection;

class SettingService {
    use FileTrait;
    public function __construct(protected Setting $setting) {}

    public function getAllSettings() : array|Collection {
        return $this->setting->latest('id')->get();
    }

    public function addSetting($data) : Setting {
        return $this->setting->create($data);
    }

    public function deleteSetting($setting) : bool {
        return $setting->delete();
    }
}
