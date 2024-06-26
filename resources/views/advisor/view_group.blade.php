@extends('layouts.master')
@section('content')
    <style>
        th {
            vertical-align: top;
            width: 20%;
            padding-left: 0px;
            margin-left: 0px;
        }

        .edit-button {
            border: none;
            padding: .31rem .8rem;
        }

        .group-modal-content {
            display: none;
            /* Hide modal content by default */
            position: fixed;
            top: 20%;
            left: 50%;
            transform: translateX(-50%);
            /* Center it horizontally */
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 5rem;
            color: var(--header-color);
            background: var(--gray-icon-color);
            border-radius: 10px;
            box-shadow: var(--box-shadow);
            transition: .3s;
            text-align: center;
        }
    </style>
    <div class="forum-container">
        @if ($errors->any())
        <div class="invalid-credential mt-1">{{ $errors->first() }}</div>
        @endif

        @if (session('success'))
            <div class="success-credential mt-1">{{ session('success') }}</div>
        @endif
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
                <table class="table mt-1">
                    <form action="{{ route('evaluation.store') }}" method="POST">
                        @csrf
                        <tr>
                            <td>Group Evaluation (30%)</td>
                            <td><input type="number" name="advisor_evaluation" min="0" max="30" required></td>
                            <td><button type="submit" class="evaluate-button" style="padding: 1em 1.75em;">Submit Evaluation</button></td>
                        </tr>
                    </form>
                </table>
            @else
                @if ($advisorRequests->isNotEmpty())
                    <h2>Requested Groups</h2>
                    @foreach ($advisorRequests as $advisorRequest)
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
                                        @elseif ($advisorRequest->advisor_status === 'rejected')
                                            <span>You rejected this group</span>
                                        @else
                                            <form action="{{ route('groups.accept', $advisorRequest->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                <button type="submit" class="edit-button">Accept</button>
                                            </form>
                                            <button type="button" class="delete-button group-modal-display"
                                                data-target="#modal-{{ $advisorRequest->id }}">Reject</button>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="group-modal-content" id="modal-{{ $advisorRequest->id }}">
                            <div>Add a reason for your rejection</div>
                            <textarea name="reject_reason" form="reject-form-{{ $advisorRequest->id }}"></textarea>
                            <form id="reject-form-{{ $advisorRequest->id }}"
                                action="{{ route('groups.reject', $advisorRequest->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="advisor_id" value="{{ $advisorRequest->id }}">
                                <button type="submit" class="delete-button">Reject</button>
                            </form>
                        </div>
                    @endforeach
                @endif

                <h2>Other Groups</h2>
                @foreach ($otherGroups as $otherGroup)
                    <table class="table mt-1">
                        <thead>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Group Name</th>
                                <td>{{ $otherGroup->group_name }}</td>
                            </tr>
                            <tr>
                                <th>Project Title</th>
                                <td>{{ $otherGroup->project_title }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{ $otherGroup->description }}</td>
                            </tr>
                            <tr>
                                <th>Members</th>
                                <td>
                                    @foreach ($students as $student)
                                        @if ($otherGroup->id == $student->group_id)
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
