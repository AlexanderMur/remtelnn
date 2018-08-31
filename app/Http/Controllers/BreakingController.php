<?php

namespace App\Http\Controllers;

use App\Models\Breaking;
use Illuminate\Http\Request;

class BreakingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breakings = Breaking::all();
        return view('breakings.index', [
            'breakings' => $breakings
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

        if (!$request->get('name')) {
            return redirect()->back()->with('error', 'Имя не задано');
        }
        if (Breaking::create($request->all())) {

            return redirect()->back()->with('success', 'Поломка добавлена');
        } else {
            return redirect()->back()->with('error', 'Ошибка поломка не добавлена');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Breaking  $breaking
     * @return \Illuminate\Http\Response
     */
    public function show(Breaking $breaking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Breaking  $breaking
     * @return \Illuminate\Http\Response
     */
    public function edit(Breaking $breaking)
    {
        return view('breakings.edit', [
            'breaking' => $breaking
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Breaking  $breaking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Breaking::findOrFail($id)->update($request->all())) {
            return redirect()->back()->with('success', 'Запись изменена');
        } return redirect()->back()->with('error', 'Ошибка');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Breaking  $breaking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Breaking $breaking)
    {
        try {
            $breaking->delete();
            return redirect()->back()->with('success', 'Поломка удалена');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Поломка не удалена');
        }
    }
}
