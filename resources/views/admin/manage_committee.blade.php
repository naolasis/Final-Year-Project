@extends ('layouts.master')
@include('side-bars.admin_side_bar')
@section('content')

<div class="form-container">
    <div class="button-container row">
        <div><a class="add-committee ms-button" href="#">Create Committee</a></div>
        <div><a class="modify-committee ms-button" href="#">Modify Committee</a></div>
    </div>
    @if ($errors->any())
    <div class="invalid-credential mt-1">{{ $errors->first() }}</div>
    @endif

    @if (session('success'))
        <div class="success-credential mt-1">{{ session('success') }}</div>
    @endif

    <!-- Add Committee Form -->
    <form method="POST" action="{{ route('committees.store') }}" enctype="multipart/form-data" class="add-committee-form">
        @csrf
        <div class="manage-status">Create Committee</div>
        <div class="input-container">
            <div class="form-input"><input class="form-input-field" type="text" name="fullname" placeholder="Full Name" required></div>
            <div class="form-input"><input class="form-input-field" type="email" name="email" placeholder="Email" required></div>
            <div class="form-input"><input class="form-input-field" type="text" name="username" placeholder="Username" required></div>
            <div class="form-input"><input class="form-input-field" type="password" name="password" placeholder="Password" required></div>
            <div class="form-input"><input class="form-input-field" id="image-file" type="file" name="image"></div>
            
            <div class="form-input">
                <select class="form-input-field" name="type" required>
                    <option value="" disabled selected>Committee Type</option>
                    <option value="committee_head">Committee Head</option>
                    <option value="committee_member">Committee Member</option>
                </select>
            </div>
            <div class="submit-btn"><input class="submit" type="submit" value="Submit"></div>
        </div>
    </form>

    <!-- Modify Committee Form -->
    {{-- <form method="POST" action="{{ route('committees.update', $committee->id) }}" enctype="multipart/form-data" class="modify-committee-form" style="display: none;">
        @csrf
        @method('PUT') --}}
        <div class="manage-status">Modify Committee</div>
        {{-- <div class="input-container">
            <div class="form-input"><input class="form-input-field" type="text" name="fullname" placeholder="Full Name" value="{{ $committee->fullname }}" required></div>
            <div class="form-input"><input class="form-input-field" type="email" name="email" placeholder="Email" value="{{ $committee->email }}" required></div>
            <div class="form-input"><input class="form-input-field" type="text" name="username" placeholder="Username" value="{{ $committee->username }}" required></div>
            <div class="form-input"><input class="form-input-field" type="password" name="password" placeholder="Password" value="{{ $committee->password }}" required></div>
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
    </form> --}}
</div>



@endsection