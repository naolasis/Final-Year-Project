<?php

namespace App\Http\Controllers;

use App\Models\ProjectReport;
use Illuminate\Http\Request;

class ProjectReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'report' => 'required|mimes:pdf,doc,docx|max:2048',
            'report_type' => 'required|in:initial,final',
        ]);

        $file = $request->file('report');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->store('reports');

        // Retrieve the logged-in student
        $student = auth()->user()->student;

        // Check if the student exists and has a group
        if ($student && $student->group_id) {
            ProjectReport::create([
                'file_name' => $fileName,
                'file_path' => $filePath,
                'group_id' => $student->group_id,
                'report_type' => $request->report_type,
            ]);

            return redirect()->back()->with('success', 'Report uploaded successfully.');
        }

        // If the student or their group is not found, handle accordingly
        return redirect()->back()->with('error', 'Student group information not found.');
    }

    


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
