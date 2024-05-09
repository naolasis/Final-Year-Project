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
        <form action="{{ route('student.addStudent' {{--$groupId--}}) }}" method="POST" class="add-committee-form" style="display: block;">
            @csrf
            <div class="manage-status">Add Students</div>
            <div class="input-container">
                <div class="form-input"><input class="form-input-field" type="text" name="student_username" placeholder="Student Username"></div>
                <div class="submit-btn"><input class="submit" type="submit" value="Add Student"></div>
            </div>
        </form>
      </div>
</div>

@endsection
@include('side-bars.student_side_bar')