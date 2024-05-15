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
            <div class="add-committee-form" style="display: block;">
                <div class="manage-status">Select Advisor</div>
                    <div class="input-container">
                            @foreach ($advisors as $advisor)
                            <form method="POST" action="{{ route('groups.selectAdvisor') }}">
                                    @csrf
                                    <div class="advisor-all">
                                        <div class="advisor-body">
                                            <div class="wrap-person-img">
                                                <img src="{{asset('storage/'.$advisor->user->image)}}" alt="advisor-img">
                                            </div>
                                            <div class="advisor-card">
                                                <h4>{{ $advisor->user->fullname }}</h4>
                                                <p>{{ $advisor->description }}</p>
                                                <input type="hidden" name="advisor_id" value="{{ $advisor->id }}">
                                                <div class="submit-btn"><input class="submit" style="background: #fff; color:#111827;" type="submit" value="Select Advisor"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endforeach
                    </div>
            </div>
        </div>
    </div>
@endsection
@include('side-bars.student_side_bar')
