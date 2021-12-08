<?php

namespace App\Http\Controllers\Expends;

use App\Http\Controllers\Controller;
use App\Models\Expend;
use App\Models\Team\Team;
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
        $user = auth()->user();
        $teams = $user->teams;
        return view('expends.create', compact('teams'));
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'team' => 'required',
            'attachments' => 'max::50',
            'attachments.*' => 'mimes:jpg,jpeg,pdf,gif,png',
            'price' => 'numeric'
        ]);
        $team = Team::where('slug', $request->team)->firstOrFail();
        $carbon_spend_at = !empty($request->spend_at_date) ?
            Jalalian::fromFormat('Y/m/d', $request->spend_at_date)->toCarbon() :
            Carbon::today();
        $carbon_spend_at->setTimeFromTimeString($request->spend_at_time);

        $expend = Expend::create([
            'user_id' => auth()->user()->id,
            'team_id' => $team->id,
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
            'spend_at' => $carbon_spend_at ?? Carbon::now()
        ]);
        $insert = [];
        if ($request->hasfile('attachments')) {
            foreach ($request->file('attachments') as $key => $file) {
                $name = "expend-{$expend->id}-{$key}" . Jalalian::now()->format('Y-m-d_H-i-s') . "." . $file->clientExtension();
                $path = $file->storeAs('public/files', $name);
                $insert[$key]['file_name'] = $name;
                $insert[$key]['file_path'] = $path;
                $insert[$key]['file_size'] = $file->getSize();
                $insert[$key]['file_type'] = $file->getMimeType();
            }
        }
        $expend->attachments()->createMany($insert);
        return redirect()->route('expends.index')->with('action-result', [
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
            $expend->update([
                'user_id' => !empty($request->user_id) ? $request->user_id : auth()->user()->id,
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
            if (!empty($expend->attachments)) {
                foreach ($expend->attachments as $file) {
                    try {
                        unlink(public_path($file->file_path));
                    } catch (\Exception $exception) {

                    }
                }
            }
            $expend->attachments()->delete();
            $expend->delete();
            return redirect()->back()->with('action-result', [
                'success' => true,
                'message' => __('expends.Expend updated successfully')
            ]);
        }
    }
}
