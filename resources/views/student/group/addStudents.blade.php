@extends ('layouts.master')
@section('content')
    <div class="forum-container">
        <div class="form-container forum">
            @if (session('error'))
                <div class="invalid-credential mt-1">{{ session('error') }}</div>
            @endif

            @if (session('success'))
                <div class="success-credential mt-1">{{ session('success') }}</div>
            @endif
            <form action="{{ route('groups.addStudents') }}" method="POST" class="add-committee-form" style="display: block;">
                @csrf
                <div class="manage-status">Add Students</div>
                <div class="input-container">
                    <div class="form-input"><input class="form-input-field" type="text" name="student_username"
                            placeholder="Student Username" required></div>
                    <div class="submit-btn"><input class="submit" type="submit" value="Add Student"></div>
                </div>
            </form>

            <table class="table mt-1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>username</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $pendingCounter = 0;
                ?>
                    @foreach ($requestStatuses as $requestStatus)
                        <tr>
                            <td>{{ ++$counter }}</td>
                            <td>{{ $requestStatus->receiver->user->username }}</td>
                            <td>{{ $requestStatus->status }}</td>
                            <?php if ($requestStatus->status == 'pending') {
                                $pendingCounter++;
                            } ?>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if($counter >= 1 )
            <h6 style="color: #721c24;">*Before clicking this button, please make sure you added all group members.</h6>
            <div class="mt-1" style="text-align: center;">
                <button class="submit modal-display">Add All</button>
            </div>
            @endif
            <div class="modal-content">
                @if ($pendingCounter >= 1)
                    <div>Wait until all members accepted the request!</div>
                @else
                    <div>Are you sure you want to add {{ $counter}} student's to your group ?</div>
                    <form action="{{ route('groups.addCreator') }}" method="POST" style="display: inline-block;">
                        @csrf
                        <button type="submit" class="submit mt-1">Continue</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
@include('side-bars.student_side_bar')
