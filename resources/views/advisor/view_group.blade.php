@extends('layouts.master')
@section('content')
<style>
    th {
        vertical-align: top;
        width: 20%;
        padding-left: 0px;
        margin-left: 0px;
    }
    .edit-button, .delete-button {
        border: none;
        padding: .31rem .8rem;
    }
    
</style>
<div class="forum-container">
    <div class="form-container forum">
        @if ($acceptedGroup)
            <h2>Accepted Group</h2>
            <table class="table mt-1">
                <thead>
                    <tr></tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Group Name</th>
                        <td>{{ $acceptedGroup->sender_group->group_name }}</td>
                    </tr>
                    <tr>
                        <th>Project Title</th>
                        <td>{{ $acceptedGroup->sender_group->project_title }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{ $acceptedGroup->sender_group->description }}</td>
                    </tr>
                    <tr>
                        <th>Members</th>
                        <td>
                            @foreach ($students as $student)
                                @if ($acceptedGroup->sender_group->id == $student->group_id)
                                    <p style="margin: 0 0 4px 0;">{{ $student->user->fullname }}</p>
                                @endif
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>Approved by Committee</td>
                    </tr>
                </tbody>
            </table>
        @else
            @if ($advisorRequests->isNotEmpty())
                <h2>Requested Groups</h2>
                @foreach ($advisorRequests as $advisorRequest)
                    @if ($advisorRequest->group)
                        <table class="table mt-1">
                            <thead>
                                <tr></tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Group Name</th>
                                    <td>{{ $advisorRequest->group->group_name }}</td>
                                </tr>
                                <tr>
                                    <th>Project Title</th>
                                    <td>{{ $advisorRequest->group->project_title }}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $advisorRequest->group->description }}</td>
                                </tr>
                                <tr>
                                    <th>Members</th>
                                    <td>
                                        @foreach ($students as $student)
                                            @if ($advisorRequest->group->id == $student->group_id)
                                                <p style="margin: 0 0 4px 0;">{{ $student->user->fullname }}</p>
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>Request</th>
                                    <td class="action-col">
                                        @if ($advisorRequest->advisor_status === 'accepted')
                                            <span>Wait until approval</span>
                                        @else
                                            <form action="{{ route('groups.accept', $advisorRequest->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                <button type="submit" class="edit-button">Accept</button>
                                            </form>
                                            <button type="button" class="delete-button group-modal-display" data-target="#modal-{{ $advisorRequest->id }}">Reject</button>
                                            <div class="modal-content" id="modal-{{ $advisorRequest->id }}">
                                                <div>Add a reason for your rejection</div>
                                                <textarea name="reject_reason" form="reject-form-{{ $advisorRequest->id }}"></textarea>
                                                <form id="reject-form-{{ $advisorRequest->id }}" action="{{ route('groups.reject', $advisorRequest->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="delete-button">Reject</button>
                                                </form>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @else
                        <p>Group information is not available for this request.</p>
                    @endif
                @endforeach
            @endif

            <h2>Other Groups</h2>
            @foreach ($otherGroups as $group)
                <table class="table mt-1">
                    <thead>
                        <tr></tr>
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
                            <th>Members</th>
                            <td>
                                @foreach ($students as $student)
                                    @if ($group->id == $student->group_id)
                                        <p style="margin: 0 0 4px 0;">{{ $student->user->fullname }}</p>
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

@include('side-bars.advisor_side_bar')