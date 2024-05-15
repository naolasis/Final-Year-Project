@extends('layouts.master')
@section('content')
<style>
    th{
        vertical-align: top;
        width: 20%;
        padding-left:0px;
        margin-left:0px;
    }
    .edit-button{
        border: none;
        padding: .31rem .8rem;
    }
    
    .group-modal-content {
        display: none; /* Hide modal content by default */
        position: fixed;
        top: 20%; 
        left: 50%; 
        transform: translateX(-50%); /* Center it horizontally */
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
    <div class="form-container forum">
        @if ($requestedGroups->isNotEmpty())
            <h2>Requested Groups</h2>
            @foreach ($requestedGroups as $group)
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
                        <tr>
                            <th>Request</th>
                            <td class="action-col">
                                <form action="{{-- route('advisors.edit', $advisor->id) --}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="advisor_id" value="{{-- $advisor->id --}}">
                                    <button type="submit" class="edit-button">Accept</button>
                                </form>
                                <button type="button" class="delete-button group-modal-display" data-target="#modal-{{ $group->id }}">Reject</button>                                   
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="group-modal-content" id="modal-{{ $group->id }}">
                    <div>Add a reason for your rejection</div>
                    <textarea></textarea>
                    <form action="{{-- route('advisors.destroy', $advisor->id) --}}" method="POST">
                        @csrf
                        <button type="submit" class="delete-button">Reject</button>
                    </form>
                </div>
              
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
    </div>
</div>

@endsection

@include('side-bars.advisor_side_bar')
