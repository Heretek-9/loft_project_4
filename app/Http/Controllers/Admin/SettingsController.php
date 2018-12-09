<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->toArray();
        $data['settings'] = [];

        foreach ($settings as $setting) {
            $data['settings'][$setting['name']] = $setting['value'];
        }

        return view('admin.settings.index', $data);
    }

    public function store(Request $request)
    {
        foreach ($request->all() as $name => $value) {
            if ($name == '_token') {continue;}
            $saveArr = [
                'name' => $name,
                'value' => $value,
            ];
            $match = array('name'=>$name);
            Setting::updateOrCreate($match, $saveArr);
        }

        return redirect(route('settings.index'));
    }
}
