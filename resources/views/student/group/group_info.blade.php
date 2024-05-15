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
                                @if (!$advisorRequest)
                                    @if ($senderJoinRequest)
                                        <td> <a href="{{ route('student.selectAdvisor') }}" class="submit" style="display: inline-block; padding: 10px; text-decoration: none;">Request Advisor</a> </td>   
                                    @else
                                        <td>Wait until all students accepted!</td>
                                    @endif
                                @elseif($advisorRequest->advisor_status == 'pending')    
                                    <td>{{ $advisorRequest->advisor_status }}</td>
                                @elseif($advisorRequest->advisor_status == 'accepted')    
                                    <td>{{ $advisorRequest->advisor_status }} but not approved yet</td>
                                @endif
                            </tr>
                            <tr>
                                <th style="vertical-align: top">Member Students</th>
                                <td>
                                    @foreach ($students as $student)
                                        <p>{{ $student->user->fullname }}</p>
                                    @endforeach
                                </td>
                            </tr>
                    </tbody>
                </table>
        </div>
    </div>

@endsection
@include('side-bars.student_side_bar')
