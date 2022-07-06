<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReportRequest;
use App\Models\Report;
use App\Models\User;
use App\Models\Event;
use App\Models\Tag;

use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  
        $reports = Report::all();
        
        return view('admin.reports.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('id');
        $events = Event::pluck('id');
        $tags = Tag::all();
        return view('admin.reports.create', compact('users', 'events', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReportRequest $request)
    {
        /*return Storage::put('public/reports', $request->file('file'));*/
        $report = Report::create($request->all());

        if ($request->file('file')) {
            $url = Storage::put('public/reports', $request->file('file'));

            $report->photo()->create([
                'url' => $url
            ]);
        }
        if ($request->tags) {
            $report->tags()->attach($request->tags);
        }
        return redirect()->route('admin.reports.edit', $report);
       }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = Report::find($id);
        return view('admin.reports.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        return view('admin.reports.edit', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //Estas son las reglas de validacion
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'event_id' => 'required', 
            
        ]);
        //end 

        $report->update($request->all());

        return redirect()->route('admin.reports.index', $report)->with('info', 'Exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        $report->delete();
        return redirect()->route('admin.reports.index')->with('info', 'Exito');
    }
}
