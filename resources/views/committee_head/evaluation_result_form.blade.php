@extends ('layouts.master')
@include('side-bars.committee_head_side_bar')
@section('content')
<style>
    input[type=number] {
        width: 100%;
        max-width: 100px;
        font-size: 1rem;
        background: transparent;
        color: #495057;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        padding: .375rem .75rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }
    input[type=number]:focus {
        border-color: #81a9d4;
        outline: 0;
        box-shadow: 0 0 0 .2rem rgba(105, 144, 175, 0.25);
    }
</style>

<div class="group-container">
    <div class="table-container">
        <h2>Final Evaluation Mark</h2>
        <form action="{{ route('evaluation.store') }}" method="POST">
            @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Student Name</th>
                        <th>Member 1 Evaluation (70%)</th>
                        <th>Member 2 Evaluation (70%)</th>
                        <th>Committee Head Evaluation (30%)</th>
                        <th>Final Result (100%)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $index => $student)
                        @php
                            $evaluation = $evaluations->firstWhere('student_id', $student->id);
                        @endphp
                        @if ($evaluation)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student->user->username }}</td>
                                <td class="committee1-marks" data-student="{{ $student->id }}">{{ $evaluation->committee1_evaluation }}</td>
                                <td class="committee2-marks" data-student="{{ $student->id }}">{{ $evaluation->committee2_evaluation }}</td>
                                <td>
                                    <input type="number" name="total_marks_all[{{ $student->id }}]" min="0" max="30" class="committee-head-input" data-student="{{ $student->id }}" data-weight="30" value="0" required>
                                </td>
                                <td>
                                    <input type="number" name="final_result[{{ $student->id }}]" id="final-result-{{ $student->id }}" readonly value="{{ ($evaluation->committee1_evaluation + $evaluation->committee2_evaluation) / 2 }}" />
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>

            <div class="form-container" style="text-align: center; margin-bottom: 5rem;">
                <button type="submit" class="evaluate-button" style="padding: 1.25em 2em;">Submit Evaluation</button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const committeeHeadInputs = document.querySelectorAll('.committee-head-input');

    function updateFinalResults() {
        committeeHeadInputs.forEach(input => {
            const studentId = input.dataset.student;
            const committee1Marks = parseFloat(document.querySelector(`.committee1-marks[data-student="${studentId}"]`).innerText) || 0;
            const committee2Marks = parseFloat(document.querySelector(`.committee2-marks[data-student="${studentId}"]`).innerText) || 0;
            const committeeHeadMarks = parseFloat(input.value) || 0;

            const finalResult = (committee1Marks + committee2Marks)/2 + committeeHeadMarks;
            document.getElementById(`final-result-${studentId}`).value = finalResult.toFixed(2);
        });
    }

    committeeHeadInputs.forEach(input => {
        input.addEventListener('input', updateFinalResults);
    });
});
</script>

@endsection
