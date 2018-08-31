<?php

namespace App\Http\Controllers;

use App\Models\Breaking;
use App\Models\BreakingDevice;
use App\Models\Category;
use App\Models\Device;
use DebugBar\DebugBar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::all();
        $breakings = Breaking::all();
        return view('devices.index', [
            'cats' => $cats,
            'breakings' => $breakings,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $device = new Device();
        $device->fill($request->all());
        $device->save();

        return redirect()->back()->with('success', 'Модель добавлена!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function show(Device $device)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        $cats = Category::all();
        $breakings = Breaking::all();
        return view('devices.edit', [
            'device' => $device,
            'cats' => $cats,
            'breakings' => $breakings
        ]);
    }
    function setOrder(Request $request){
        foreach ($request->get('data') as $item) {
            Device::whereId($item[0])->update(['order'=>$item[1]]);
        }
        return 'success';
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Device $device)
    {
        $device->update($request->all());
        $input_breakings = $request->input('breakings');


        $keyed = [];
        if (isset($input_breakings)) {
        foreach ($input_breakings as $input_breaking) {
            $keyed[$input_breaking['breaking_id']] = $input_breaking;
        }}
        $breakings = $device->breakings();
        $breakings->detach();
        $breakings->sync($keyed);
        return redirect()->back()->with('success', 'Модель обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Device $device
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Device $device)
    {
        $device->breakings()->detach();
        $device->delete();
        return redirect()->back()->with('success', 'Устройство удалено');
    }

}
