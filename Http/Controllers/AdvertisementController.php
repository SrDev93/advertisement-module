<?php

namespace Modules\Advertisement\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Advertisement\Entities\Advertisement;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $items = Advertisement::latest()->get();

        return view('advertisement::index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('advertisement::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        return view('advertisement::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Advertisement $advertisement)
    {
        try {
            $advertisement->delete();

            return redirect()->back()->with('flash_message', 'آگهی با موفقیت تایید شد');
        }catch (\Exception $e){
            return redirect()->back()->with('err_message', 'خطایی رخ داده است، لطفا مجددا تلاش نمایید');
        }
    }

    /**
     * Confirm Advertisement
     * @param Advertisement $advertisement
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function confirm(Advertisement $advertisement)
    {
        try {
            $advertisement->status = 1;
            $advertisement->confirm_at = date('Y-m-d H:i:s');
            $advertisement->reason_reject = null;
            $advertisement->save();

            return redirect()->back()->with('flash_message', 'آگهی با موفقیت تایید شد');
        }catch (\Exception $e){
            return redirect()->back()->with('err_message', 'خطایی رخ داده است، لطفا مجددا تلاش نمایید');
        }
    }

    public function reject(Request $request)
    {
        $advertisement = Advertisement::findOrFail($request->adver_id);

        try {
            $advertisement->status = -1;
            $advertisement->reason_reject = $request->reason_reject;
            $advertisement->confirm_at = null;
            $advertisement->save();

            return redirect()->back()->with('flash_message', 'آگهی با موفقیت رد شد');
        }catch (\Exception $e){
            return redirect()->back()->with('err_message', 'خطایی رخ داده است، لطفا مجددا تلاش نمایید');
        }
    }
}
