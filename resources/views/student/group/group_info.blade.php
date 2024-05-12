@extends ('layouts.master')
@section('content')

    <div class="forum-container">
        <div class="form-container forum">
            <h2>Information of group</h2>
            <table class="table">
                    <thead>
                        <tr>
                            
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <th>Group Name</th>
                                <td>{{ $group->group_name }}</td>
                            </tr>
                            <tr>
                                <th>Project Title</th>
                                <td>{{ $group->project_title }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{ $group->description }}</td>
                            </tr>
                            <tr>
                                <th>Advisor</th>
                                <td>button</td>
                            </tr>
                            <tr>
                                <th>Member Students</th>
                                @foreach ($students as $student)
                                <td>
                                    <td>{{ $student->user->fullname }}</td>
                                </td>
                                @endforeach
                            </tr>
                    </tbody>
                </table>
            <!-- <p>You are now a member of {{-- auth()->user()->student->group->group_name --}}</p> -->
        </div>
    </div>

@endsection
@include('side-bars.student_side_bar')
