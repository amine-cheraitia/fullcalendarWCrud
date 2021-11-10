<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = Event::Latest()->get();
        return response()->json($event, 200);
        ///Request $request
        /*         if ($request->ajax()) {
            $data = Event::whereDate('start', '>=', $request->start)
                ->whereDate('end',   '<=', $request->end)
                ->get();
            return response()->json($data);
        }
        return view('new');
 */
    }
    public function t()
    {
        return view('new');
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

        try {
            $request->validate([
                "title" => "required",
                "start" => "required",
                "end" => "required",
                "allDay" => "required",
                "color" => "required",
                "textColor" => "required",
            ]);
            // $event = Event::Latest()->get();
            // dd($event);
            if (empty($request->id)) {
                Event::create($request->all());
                alert()->success('Success', 'Event ok');
            } else {
                Event::where('id', $request->id)->update([
                    "title" => $request->title,
                    "start" => $request->start,
                    "end" => $request->end,
                    "allDay" => $request->allDay,
                    "color" => $request->color,
                    "textColor" => $request->textColor,

                ]);
                alert()->success('Update', 'successfull update');
            }
        } catch (\Throwable $th) {
            alert()->error('error', $th->getMessage());
            return redirect()->back();
        }


        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::whereId($id)->delete();
        alert()->success('Success', 'Event a bien été supprimer');
        return redirect()->back();
    }
}