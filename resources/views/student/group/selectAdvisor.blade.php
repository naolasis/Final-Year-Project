@extends ('layouts.master')
@section('content')
    <!-- Select Group Advisor Form -->

    <div class="forum-container">
        <div class="form-container forum">
            @if (session('error'))
                <div class="invalid-credential mt-1">{{ session('error') }}</div>
            @endif

            @if (session('success'))
                <div class="success-credential mt-1">{{ session('success') }}</div>
            @endif
            <form action="{{ route('student.selectAdvisor') }}" method="POST" class="add-committee-form"
                style="display: block;">
                @csrf
                <div class="manage-status">Select Advisor</div>
                <div class="input-container">
                <div class="form-input">
                    <select class="form-input-field" name="advisor_id">
                        <option value="" disabled selected>Select Advisor</option>
                        @foreach ($advisors as $advisor)
                            <option value="{{ $advisor->id }}">{{ $advisor->user->fullname }}</option>
                        @endforeach
                    </select>
                </div>
                    <div class="submit-btn"><input class="submit" type="submit" value="Select Advisor"></div>
            </form>
        </div>
    </div>
@endsection
@include('side-bars.student_side_bar')
