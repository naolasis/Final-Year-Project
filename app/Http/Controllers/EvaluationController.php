<?php

namespace App\Http\Controllers;

use App\Models\Advisor;
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
        // If the user is committee_head
        if (auth()->user()->role == 'committee_head') {
            foreach ($request->final_result as $studentId => $finalResult) {
                $evaluation = Evaluation::firstOrCreate(['student_id' => $studentId]);
                $evaluation->update(['final_mark' => $finalResult]);
                
            }
            return redirect()->route('committee_head.evaluation_result')->with('success', 'Evaluations submitted successfully!');
            // If the user is advisor
        } elseif (auth()->user()->role == 'advisor') {
            // $advisor_id = auth()->user()->advisor->id;
            // $group = Group::where('advisor_id', $advisor_id)->first();
            // if ($group) {
            //     $evaluations = Evaluation::where('group_id', $group->id)->get();
            //     if ($evaluations->isEmpty()) {
            //         $students = Student::where('group_id', $group->id)->get();
            //         foreach ($students as $student) {
            //             $evaluation = Evaluation::firstOrCreate(['student_id' => $student->id], ['group_id' => $group->id]);
            //             $evaluation->update(['advisor_evaluation' => $request->advisor_evaluation]);
            //         }
            //         return redirect()->back()->with('success', 'Evaluations submitted successfully!');
            //     } else {
            //         foreach ($evaluations as $evaluation) {
            //             $evaluation->update(['advisor_evaluation' => $request->advisor_evaluation]);
            //         }
            //     }
            //     return redirect()->back()->with('success', 'Evaluations submitted successfully!');

            // } else {
            //     return redirect()->back()->with('error', 'no group found for this advisor');
            // }

            $user = auth()->user();
            $advisor = Advisor::where('user_id', $user->id)->first();

            if (!$advisor) {
                // Handle the case where the advisor is not found
                return redirect()->back()->with('error', 'Advisor not found');
            }

            $group = Group::where('advisor_id', $advisor->id)->first();

            if (!$group) {
                // Handle the case where the group is not found
                return redirect()->back()->with('error', 'Group not found');
            }

            $students = Student::where('group_id', $group->id)->get();

            foreach ($students as $student) {
                $mark = $request->input("individual_assessment.{$student->id}");

                if ($mark !== null) {
                    Evaluation::updateOrCreate(
                        ['student_id' => $student->id, 'group_id' => $group->id],
                        ['advisor_evaluation' => $mark]
                    );
                }
            }

            return redirect()->route('advisor.evaluation')->with('success', 'Marks saved successfully');


        } else {
            $committeeMember = auth()->user()->username;
            foreach ($request->total_marks_all as $studentId => $totalMarksAll) {

                $student = Student::where('id', $studentId)->first();
                $group_id = $student->group_id;
                $evaluation = Evaluation::firstOrCreate(['student_id' => $studentId], ['group_id' => $group_id]);

                if ($committeeMember == 'member1') {
                    $evaluation->update([
                        'committee1_evaluation' => $totalMarksAll,
                        'group_id' => $group_id,
                    ]);
                } elseif ($committeeMember == 'member2') {
                    $evaluation->update([
                        'committee2_evaluation' => $totalMarksAll,
                        'group_id' => $group_id,
                    ]);
                }
            }

            return redirect()->route('committee_member.evaluation')->with('success', 'Evaluations submitted successfully!');
        }
    }



// public function storeMark(Request $request)
// {
//     $user = auth()->user();
//     $advisor = Advisor::where('user_id', $user->id)->first();

//     if (!$advisor) {
//         // Handle the case where the advisor is not found
//         return redirect()->back()->with('error', 'Advisor not found');
//     }

//     $group = Group::where('advisor_id', $advisor->id)->first();

//     if (!$group) {
//         // Handle the case where the group is not found
//         return redirect()->back()->with('error', 'Group not found');
//     }

//     $students = Student::where('group_id', $group->id)->get();

//     foreach ($students as $student) {
//         $mark = $request->input("Individual asessment[{$student->id}]");

//         if ($mark !== null) {
//             $evaluation = Evaluation::updateOrCreate(
//                 ['student_id' => $student->id, 'group_id' => $group->id],
//                 ['advisor_evaluation' => $mark]
//             );
//         }
//     }

//     return redirect()->route('advisor.evaluation')->with('success', 'Marks saved successfully');
// }




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
