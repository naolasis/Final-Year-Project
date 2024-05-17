@extends ('layouts.master')
@include('side-bars.committee_member_side_bar')
@section('content')

<div class="forum-container">
    <div class="form-container forum">
        <!-- Accepted Groups -->
        @if ($acceptedRequests->isNotEmpty())
            <h2>Advisor Accepted Group Requests</h2>
            @foreach ($acceptedRequests as $acceptedRequest)
                <table class="table">
                    <thead>
                        <tr></tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Group Name</th>
                            <td>{{ $acceptedRequest->group->group_name }}</td>
                        </tr>
                        <tr>
                            <th>Project Title</th>
                            <td>{{ $acceptedRequest->group->project_title }}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{ $acceptedRequest->group->description }}</td>
                        </tr>
                        <tr>
                            <th style="vertical-align: top">Member Students</th>
                            <td>
                                @foreach ($students as $student)
                                    @if ($acceptedRequest->group->id == $student->group_id)
                                        <p>{{ $student->user->fullname }}</p>
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>Accepted Advisor</th>
                            <td>{{ $acceptedRequest->advisor->user->fullname }}</td>
                        </tr>
                        <tr>
                            <th>Action</th>
                            <td>Approve|||||||Reject</td>
                        </tr>
                    </tbody>
                </table>
            @endforeach
        @endif

        <!-- Rejected Groups -->
        @if ($rejectedRequests->isNotEmpty())
            <h2>Advisor Rejected Group Requests</h2>
            @foreach ($rejectedRequests as $rejectedRequest)
                <table class="table">
                    <thead>
                        <tr></tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Group Name</th>
                            <td>{{ $rejectedRequest->group->group_name }}</td>
                        </tr>
                        <tr>
                            <th>Project Title</th>
                            <td>{{$rejectedRequest->group->project_title }}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{ $rejectedRequest->group->description }}</td>
                        </tr>
                        <tr>
                            <th style="vertical-align: top">Member Students</th>
                            <td>
                                @foreach ($students as $student)
                                    @if ($rejectedRequest->group->id == $student->group_id)
                                        <p>{{ $student->user->fullname }}</p>
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>Rejected Advisor</th>
                            <td>{{ $rejectedRequest->advisor->user->fullname }}</td>
                        </tr>
                        <tr>
                            <th>Rejecte Reason</th>
                            <td>{{ $rejectedRequest->reject_reason }}</td>
                        </tr>
                        <tr>
                            <th>Action</th>
                            <td>Approve|||||||Reject</td>
                        </tr>
                    </tbody>
                </table>
            @endforeach
        @endif

        <!-- All Groups -->
        <h2>All Created Groups</h2>
        @foreach ($groups as $group)
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
                        @if ($group->advisor_id !== null)
                            <td>{{ $group->advisor->user->name }}</td>
                        @elseif ($group->advisorRequests !== null)
                            @if ($group->advisorRequests->advisor_status == 'pending')
                                <td>{{ $group->advisorRequests->advisor_status }}</td>
                            @elseif ($group->advisorRequests->advisor_status == 'accepted')
                                <td>{{ $group->advisorRequests->advisor_status }} but not approved yet</td>
                            @endif
                        @endif
                    </tr>
                    <tr>
                        <th style="vertical-align: top">Member Students</th>
                        <td>
                            @foreach ($students as $student)
                                @if ($group->id == $student->group_id)
                                    <p>{{ $student->user->fullname }}</p>
                                @endif
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
        @endforeach
        @endif
    </div>
</div>

@endsection
