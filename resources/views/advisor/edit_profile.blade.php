@extends ('layouts.master')

@section('content')
    <div class="form-container">
        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="input-container">
                @if ($errors->any())
                <div class="invalid-credential mt-1">{{ $errors->first() }}</div>
                @endif
        
                @if (session('success'))
                    <div class="success-credential mt-1">{{ session('success') }}</div>
                @endif
                <div class="form-input"><input class="form-input-field" type="text" name="fullname" placeholder="Full Name" value="{{ $user->fullname }}" required></div>
                <div class="form-input"><input class="form-input-field" type="email" name="email" placeholder="Email" value="{{ $user->email }}" required></div>
                <div class="form-input"><input class="form-input-field" type="text" name="username" placeholder="Username" value="{{ $user->username }}" required></div>
                <div class="form-input"><input class="form-input-field" id="image-file" type="file" name="image" value="image"></div>
                <div class="submit-btn"><input class="submit" type="submit" value="Submit"></div>
            </div>
        </form>
    </div>
@endsection

@include('side-bars.advisor_side_bar')