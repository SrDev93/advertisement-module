<?php

namespace Modules\Advertisement\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Advertisement\Entities\AdverCategory;
use Modules\Advertisement\Entities\AdverProperty;

class AdvertisementPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $items = AdverProperty::all();

        return view('advertisement::property.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $categories = AdverCategory::all();

        return view('advertisement::property.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        try {
            $ac = AdverProperty::create([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'type' => $request->type
            ]);

            return redirect()->route('AdverProperty.index')->with('flash_message', 'با موفقیت ثبت شد');
        }catch (\Exception $e){
            return redirect()->back()->with('err_message', 'خطایی رخ داده است، لطفا مجددا تلاش نمایید');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('advertisement::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(AdverProperty $AdverProperty)
    {
        $categories = AdverCategory::all();

        return view('advertisement::property.edit', compact('AdverProperty', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, AdverProperty $AdverProperty)
    {
        try {
            $AdverProperty->category_id = $request->category_id;
            $AdverProperty->name = $request->name;
            $AdverProperty->type = $request->type;
            $AdverProperty->save();

            return redirect()->route('AdverProperty.index')->with('flash_message', 'بروزرسانی با موفقیت انجام شد');
        }catch (\Exception $e){
            return redirect()->back()->with('err_message', 'خطایی رخ داده است، لطفا مجددا تلاش نمایید');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(AdverProperty $AdverProperty)
    {
        try {
            $AdverProperty->delete();

            return redirect()->route('AdverProperty.index')->with('flash_message', 'با موفقیت حذف شد');
        }catch (\Exception $e){
            return redirect()->back()->with('err_message', 'خطایی رخ داده است، لطفا مجددا تلاش نمایید');
        }
    }
}
