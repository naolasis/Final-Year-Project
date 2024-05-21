<?php

namespace App\Http\Controllers;

use App\Models\ProjectReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $group_id = auth()->user()->student->group->id;
        $final_exist = ProjectReport::where('group_id', $group_id)->where('report_type', 'final')->first();
        if($final_exist && $request->report_type == 'final'){
            return redirect()->back()->with('error', 'Final Report already exists');
        }

        $request->validate([
            'report' => 'required|mimes:pdf,doc,docx|max:3072',
            'report_type' => 'required|in:initial,final',
        ],
        [
            'report.max' => 'The file size must be less than 3 mb.'   
        ]
    );

        if (!$request) {
            return redirect()->back()->with('error', 'File not found.');
        } else {
            # code...
        }
        

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

            return redirect()->route('student.upload_report')->with('success', 'Report uploaded successfully.');
        }

        // If the student or their group is not found, handle accordingly
        return redirect()->back()->with('error', 'Student group information not found.');
    }

    public function download($id)
    {
        $report = ProjectReport::findOrFail($id);

        $filePath = $report->file_path;
        $fileName = $report->file_name;

        if (Storage::disk('public')->exists($filePath)) {
            $fileContent = Storage::disk('public')->get($filePath);
            return response()->streamDownload(function() use ($fileContent) {
                echo $fileContent;
            }, $fileName);
        }

        return redirect()->back()->with('error', 'File not found.');
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
