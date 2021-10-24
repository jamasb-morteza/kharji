<?php

namespace App\Http\Controllers\Expends;

use App\Http\Controllers\Controller;
use App\Models\Expend;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

class ExpendController extends Controller
{
    //
    public function index()
    {
        $expends = Expend::with('user')->paginate(20);
        return view('expends.index', compact('expends'));
    }

    public function show($expend_id)
    {
        $expend = Expend::findOrFail($expend_id);
        return view('expends.edit', compact('expend'));
    }

    public function create()
    {
        return view('expends.create');
    }

    public function store(Request $request)
    {
        $carbon_spend_at = !empty($request->spend_at_date) ?
            Jalalian::fromFormat('Y/m/d', $request->spend_at_date)->toCarbon() :
            Carbon::today();
        $carbon_spend_at->setTimeFromTimeString($request->spend_at_time);

        $expend = Expend::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
            'spend_at' => $carbon_spend_at ?? Carbon::now()
        ]);

        return redirect()->back()->with('action-result', [
            'success' => true,
            'message' => __('expends.expend created successfully')
        ]);
    }

    public function edit($expend_id)
    {
        $expend = Expend::findOrFail($expend_id);
        return view('expends.edit', compact('expend'));
    }

    public function update(Request $request, $expend_id)
    {
        $expend = Expend::find($expend_id);
        if ($expend) {
            $expend->create([
                'user_id' => auth()->user()->id,
                'title' => $request->title,
                'price' => $request->price,
                'description' => $request->description,
                'expend_at' => $request->expend_at
            ]);
            return redirect()->back()->with('action-result', [
                'success' => true,
                'message' => __('expends.Expend updated successfully')
            ]);
        }
        return redirect()->back()->with('action-result', [
            'success' => false,
            'message' => __('expends.Expend update failed')
        ]);
    }

    public function destroy($expend_id)
    {
        $expend = Expend::find($expend_id);
        if ($expend) {
            $expend->files()->delete();
            $expend->details()->delete();
            $expend->delete();
            return redirect()->back()->with('action-result', [
                'success' => true,
                'message' => __('expends.Expend updated successfully')
            ]);
        }
    }
}
