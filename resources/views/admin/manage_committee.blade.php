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
    <div class="modify-committee-form">
        <table class="table">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Commitee Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($committees as $committee)
                    <tr>
                        <td>{{ $committee->user->fullname }}</td>
                        <td>{{ $committee->user->email }}</td>
                        <td>{{ $committee->user->username }}</td>
                        <td>{{ $committee->type }}</td>
                        <td>
                            <a href="{{ route('committees.edit', $committee->id) }}" class="edit-button">Edit</a>
                            <form action="{{ route('committees.destroy', $committee->id) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection