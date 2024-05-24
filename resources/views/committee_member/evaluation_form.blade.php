@extends ('layouts.master')
@include('side-bars.committee_member_side_bar')
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
        <h2>Part I (50%) Individual Assessment</h2>
        <form action="{{ route('evaluation.store') }}" method="POST">
            @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th>Individual Student Evaluation Criteria</th>
                        <th>Weight</th>
                        @foreach ($students as $student)
                            <th>{{ $student->user->username }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                        $criteria = [
                            'Understanding on Background and chosen problem' => '10',
                            'Understanding the project objectives' => '5',
                            'Understanding on benefits and beneficiaries of the proposed system' => '5',
                            'Understanding on the existing system and its problem' => '5',
                            'Clarity on suitability of chosen environment and development tools' => '5',
                            'Clarity on critical feasibility factors and constraints' => '5',
                            'Celerity on use cases, sequence activity and system design' => '5',
                            'Overall creative ability and understanding of the implementation' => '10'
                        ];
                    @endphp

                    @foreach ($criteria as $criterion => $weight)
                        <tr>
                            <th>{{ $criterion }}</th>
                            <th>{{ $weight }}%</th>
                            @foreach ($students as $student)
                                <td>
                                    <input type="number" name="criteria[{{ $criterion }}][{{ $student->id }}]" min="0" max="{{ $weight }}" class="criteria-input" data-student="{{ $student->id }}" data-weight="{{ $weight }}" value="0" required>
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                    <tr class="totals">
                        <th>Total Marks</th>
                        <th>50%</th>
                        @foreach ($students as $student)
                            <td>
                                <input type="number" name="total_marks_criteria[{{ $student->id }}]" id="total-criteria-{{ $student->id }}" readonly>
                            </td>
                        @endforeach
                    </tr>
                </tbody>
            </table>

            <h2>Part II (20%) Documentation Assessment</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Documentation Evaluation Criteria</th>
                        <th>Weight</th>
                        @foreach ($students as $student)
                            <th>{{ $student->user->username }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                        $documentation_criteria = [
                            'Content coverage exhaustiveness as per the project topic and given guidelines' => '4',
                            'Quality of writing (spelling, grammatical correctness, and formatting neatness)' => '4',
                            'Adherence to report writing standard (proper use of citation and references)' => '4',
                            'Clear and appropriate use of case model and analysis model (sequence, activity, class diagram)' => '4',
                            'Overall standard and excellence of the documentation' => '4'
                        ];
                    @endphp

                    @foreach ($documentation_criteria as $criterion => $weight)
                        <tr>
                            <th>{{ $criterion }}</th>
                            <th>{{ $weight }}%</th>
                            @foreach ($students as $student)
                                <td>
                                    <input type="number" name="documentation[{{ $criterion }}][{{ $student->id }}]" min="0" max="{{ $weight }}" class="documentation-input" data-student="{{ $student->id }}" data-weight="{{ $weight }}" value="0" required>
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                    <tr class="totals">
                        <th>Total Marks</th>
                        <th>20%</th>
                        @foreach ($students as $student)
                            <td>
                                <input type="number" name="total_marks_documentation[{{ $student->id }}]" id="total-documentation-{{ $student->id }}" readonly>
                            </td>
                        @endforeach
                    </tr>
                    <tr class="totals">
                        <th>Part I and II Total</th>
                        <th>70%</th>
                        @foreach ($students as $student)
                            <td>
                                <input type="number" name="total_marks_all[{{ $student->id }}]" id="total-all-{{ $student->id }}" readonly>
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
    const documentationInputs = document.querySelectorAll('.documentation-input');

    function updateTotals() {
        const students = [...new Set([...criteriaInputs, ...documentationInputs].map(input => input.dataset.student))];

        students.forEach(studentId => {
            let totalCriteria = 0;
            let totalDocumentation = 0;

            criteriaInputs.forEach(input => {
                if (input.dataset.student === studentId) {
                    totalCriteria += parseFloat(input.value) || 0;
                }
            });

            documentationInputs.forEach(input => {
                if (input.dataset.student === studentId) {
                    totalDocumentation += parseFloat(input.value) || 0;
                }
            });

            document.getElementById(`total-criteria-${studentId}`).value = totalCriteria;
            document.getElementById(`total-documentation-${studentId}`).value = totalDocumentation;
            document.getElementById(`total-all-${studentId}`).value = totalCriteria + totalDocumentation;
        });
    }

    criteriaInputs.forEach(input => {
        input.addEventListener('input', updateTotals);
    });

    documentationInputs.forEach(input => {
        input.addEventListener('input', updateTotals);
    });
});
</script>

@endsection
