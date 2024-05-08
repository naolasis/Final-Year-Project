@extends ('layouts.master')
@include('side-bars.admin_side_bar')
@section('content')
    <div class="form-container">
        <form action="{{ route('committees.update', $committee->id) }}" method="POST" enctype="multipart/form-data" class="">
            @csrf
            @method('PUT')
            <div class="input-container">
                @if ($errors->any())
                <div class="invalid-credential mt-1">{{ $errors->first() }}</div>
                @endif
        
                @if (session('success'))
                    <div class="success-credential mt-1">{{ session('success') }}</div>
                @endif
                <div class="form-input"><input class="form-input-field" type="text" name="fullname" placeholder="Full Name" value="{{ $committee->user->fullname }}" required></div>
                <div class="form-input"><input class="form-input-field" type="email" name="email" placeholder="Email" value="{{ $committee->user->email }}" required></div>
                <div class="form-input"><input class="form-input-field" type="text" name="username" placeholder="Username" value="{{ $committee->user->username }}" required></div>
                <div class="form-input"><input class="form-input-field" id="image-file" type="file" name="image"></div>
                
                <div class="form-input">
                    <select class="form-input-field" name="type" required>
                        <option value="" disabled selected>Committee Type</option>
                        <option value="committee_head" {{ $committee->type == 'committee_head' ? 'selected' : '' }}>Committee Head</option>
                        <option value="committee_member" {{ $committee->type == 'committee_member' ? 'selected' : '' }}>Committee Member</option>
                    </select>
                </div>
                <div class="submit-btn"><input class="submit" type="submit" value="Submit"></div>
            </div>
        </form>
    </div>
@endsection