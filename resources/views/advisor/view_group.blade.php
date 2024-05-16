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
    .group-modal-content {
        display: none; /* Initially hide the modal */
        position: absolute;
        background-color: white;
        padding: 10px;
        border: 1px solid #ccc;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        z-index: 1000;
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
            @if ($requestedGroups->isNotEmpty())
                <h2>Requested Groups</h2>
                @foreach ($requestedGroups as $advisorRequest)
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
                                <td>{{ $advisorRequest->sender_group->project_title }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{ $advisorRequest->sender_group->description }}</td>
                            </tr>
                            <tr>
                                <th>Members</th>
                                <td>
                                    @foreach ($students as $student)
                                        @if ($advisorRequest->sender_group->id == $student->group_id)
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
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="group-modal-content" id="modal-{{ $advisorRequest->id }}">
                        <div>Add a reason for your rejection</div>
                        <textarea name="reject_reason" form="reject-form-{{ $advisorRequest->id }}"></textarea>
                        <form id="reject-form-{{ $advisorRequest->id }}" action="{{ route('groups.reject', $advisorRequest->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="delete-button">Reject</button>
                        </form>
                    </div>
                @endforeach
            @endif
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

<script>
// JavaScript to handle the modal display
document.addEventListener("DOMContentLoaded", function () {
    const modalButtons = document.querySelectorAll(".group-modal-display");
    const modals = document.querySelectorAll(".group-modal-content");

    modalButtons.forEach(button => {
        const targetId = button.getAttribute("data-target");
        const targetModal = document.querySelector(targetId);

        button.addEventListener("click", function (event) {
            event.stopPropagation(); // Prevents the click event from reaching the document

            // Hide other modals
            modals.forEach(modal => {
                if (modal !== targetModal) {
                    modal.style.display = "none";
                }
            });

            // Toggle the target modal
            if (targetModal.style.display === "none" || targetModal.style.display === "") {
                targetModal.style.display = "block";
            } else {
                targetModal.style.display = "none";
            }
        });
    });

    document.addEventListener("click", function () {
        // Hide all modals if clicked anywhere else on the document
        modals.forEach(modal => {
            modal.style.display = "none";
        });
    });

    modals.forEach(modal => {
        modal.addEventListener("click", function (event) {
            event.stopPropagation(); // Prevents the click event from reaching the document
        });
    });
});
</script>
