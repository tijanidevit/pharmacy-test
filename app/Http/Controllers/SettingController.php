<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Contracts\View\View;
use App\Services\SettingService;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\AddSettingRequest;

class SettingController extends Controller
{
    public function __construct(protected SettingService $settingService) {}

    public function index() : View
    {
        $settings = $this->settingService->getAllSettings();
        return view('admin.settings.index', compact('settings'));
    }

    public function create() : View
    {
        $products = $this->settingService->getAllSettings();
        return view('admin.settings.create', compact('products'));
    }

    public function store(AddSettingRequest $request): RedirectResponse
    {
        $this->settingService->addSetting($request->validated());
        return to_route('setting.index')->with('success', 'Contact added successfully!');
    }

    public function destroy(Setting $setting)
    {
        $setting = $this->settingService->deleteSetting($setting);
        return redirect()->back()->with('success', 'Contact deleted successfully!');
    }
}
