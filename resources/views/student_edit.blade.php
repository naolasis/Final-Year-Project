@extends ('layouts.master')
@if(auth()->user()->isCommitteeHead())
    @include('side-bars.committee_head_side_bar')
@elseif(auth()->user()->isCommitteeMember())
    @include('side-bars.committee_member_side_bar')
@endif

@section('content')
    <div class="form-container">
        <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="input-container">
                @if ($errors->any())
                <div class="invalid-credential mt-1">{{ $errors->first() }}</div>
                @endif
        
                @if (session('success'))
                    <div class="success-credential mt-1">{{ session('success') }}</div>
                @endif
                <div class="form-input"><input class="form-input-field" type="text" name="fullname" placeholder="Full Name" value="{{ $student->user->fullname }}" required></div>
                <div class="form-input"><input class="form-input-field" type="email" name="email" placeholder="Email" value="{{ $student->user->email }}" required></div>
                <div class="form-input"><input class="form-input-field" type="text" name="username" placeholder="Username" value="{{ $student->user->username }}" required></div>
                <div class="form-input"><input class="form-input-field" type="password" name="password" placeholder="Password" value="{{ $student->user->password }}" required></div>
                <div class="form-input"><input class="form-input-field" id="image-file" type="file" name="image"></div>
                <div class="submit-btn"><input class="submit" type="submit" value="Submit"></div>
            </div>
        </form>
    </div>
@endsection