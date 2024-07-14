@extends('layouts.master')
@include('side-bars.advisor_side_bar')
@section('content')

<div class="group-container">
    @if ($errors->any())
    <div class="invalid-credential mt-1">{{ $errors->first() }}</div>
    @endif

    @if (session('success'))
        <div class="success-credential mt-1">{{ session('success') }}</div>
    @endif
    <div class="table-container">
        <h2>Evaluation By Advisor (30%)</h2>
        <form action="{{ route('evaluation.store') }}" method="POST">
            @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th>Evaluation</th>
                        <th>Weight</th>
                        @foreach ($students as $student)
                            <th>{{ $student->user->username }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Individual Plus Document Assessment</th>
                        <th>30%</th>
                        @foreach ($students as $student)
                            <td>
                                <input type="number" name="individual_assessment[{{ $student->id }}]" min="0" max="30" class="criteria-input" data-student="{{ $student->id }}" data-weight="30" value="0" required>
                            </td>
                        @endforeach
                    </tr>
                    <tr class="totals">
                        <th>Total Marks</th>
                        <th>30%</th>
                        @foreach ($students as $student)
                            <td>
                                <input type="number" name="total_marks_criteria[{{ $student->id }}]" id="total-criteria-{{ $student->id }}" readonly>
                            </td>
                        @endforeach
                    </tr>
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
    const criteriaInputs = document.querySelectorAll('.criteria-input');

    function updateTotals() {
        const students = [...new Set([...criteriaInputs].map(input => input.dataset.student))];

        students.forEach(studentId => {
            let totalCriteria = 0;

            criteriaInputs.forEach(input => {
                if (input.dataset.student === studentId) {
                    totalCriteria += parseFloat(input.value) || 0;
                }
            });

            document.getElementById(`total-criteria-${studentId}`).value = totalCriteria;
        });
    }

    criteriaInputs.forEach(input => {
        input.addEventListener('input', updateTotals);
    });
});
</script>

@endsection
