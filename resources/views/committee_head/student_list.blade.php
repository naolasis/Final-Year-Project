@extends('layouts.master')
@include('side-bars.committee_head_side_bar')
@section('content')

<div class="group-container" style="margin-bottom: 3rem;">
    <div class="table-container">
        <h2>List Of Students</h2>
        <div style="text-align: right;">
            <button class="evaluate-button" onclick="printTable()">Print</button>
        </div>
        <table id="groupsTable" class="table mt-1">
            <thead>
                <tr>
                    <td>NO</td>
                    <td>Full Name</td>
                    <td>Email</td>
                    <td>Username</td>
                    <td>Password</td>
                </tr>
            </thead>
            <tbody>
                @php
                    $count = 1;
                @endphp
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $count++ }}</td>
                        <td>{{ $student->user->full_name }}</td>
                        <td>{{ $student->user->email }}</td>
                        <td>{{ $student->user->username }}</td>
                        <td>{{ $student->temp_password}}</td>
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
