@extends ('layouts.master')
@section('content')

    <div class="forum-container">
        <div class="form-container forum">
            <h2>Information of group</h2>
            <p>You are now a member of {{ auth()->user()->student->group->group_name }}</p>
        </div>
    </div>

@endsection
@include('side-bars.student_side_bar')
