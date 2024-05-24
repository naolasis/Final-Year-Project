<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Group;
use App\Models\Student;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->role == 'committee_head') {
            foreach ($request->final_result as $studentId => $finalResult) {
                $evaluation = Evaluation::firstOrCreate(['student_id' => $studentId]);
                $evaluation->update(['final_mark' => $finalResult]);
                
            }
            return redirect()->route('committee_head.evaluation_result')->with('success', 'Evaluations submitted successfully!');
        } else {
            $committeeMember = auth()->user()->username;
            foreach ($request->total_marks_all as $studentId => $totalMarksAll) {

                $student = Student::where('id', $studentId)->first();
                $group_id = $student->group_id;
                $evaluation = Evaluation::firstOrCreate(['student_id' => $studentId], ['group_id' => $group_id]);

                if ($committeeMember == 'member1') {
                    $evaluation->update([
                        'committee1_evaluation' => $totalMarksAll,
                    ]);
                } elseif ($committeeMember == 'member2') {
                    $evaluation->update([
                        'committee2_evaluation' => $totalMarksAll,
                    ]);
                }
            }

            return redirect()->route('committee_member.evaluation')->with('success', 'Evaluations submitted successfully!');
        }
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
