@extends('layouts.master')
@include('side-bars.committee_member_side_bar')
@section('content')

<div class="group-container">
    <div class="table-container">
        <h2>All Created Groups</h2>
        <div style="text-align: right;">
            <button class="evaluate-button" onclick="printTable()">Print Result</button>
        </div>
        <table id="groupsTable" class="table mt-1">
            <thead>
                <tr>
                    <td>NO</td>
                    <td>Group Name</td>
                    <td>Project Title</td>
                    <td>Members</td>
                    <td>Mark</td>
                </tr>
            </thead>
            <tbody>
                @php
                    $count = 1;
                @endphp
                @foreach ($groups as $group)
                <tr>
                    <td>{{ $count++ }}</td>
                    <td>{{ $group->group_name }}</td>
                    <td>{{ $group->project_title }}</td>
                    <td>
                        @foreach ($students as $student)
                            @if ($group->id == $student->group_id)
                                <p>{{ $student->user->fullname }}</p>
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach ($students as $student)
                            @if ($group->id == $student->group_id)
                                @foreach ($evaluations as $evaluation)
                                    @if($student->id == $evaluation->student_id)           
                                        <p>{{ $evaluation->final_mark }}</p>   
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    function printTable() {
        var printContents = document.getElementById('groupsTable').outerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>

@endsection
