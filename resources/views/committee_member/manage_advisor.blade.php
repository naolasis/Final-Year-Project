@extends ('layouts.master')
@include('side-bars.committee_member_side_bar')
@section('content')

<div class="form-container">
    <div class="button-container row">
        <div><a class="add-committee ms-button" href="#">Create Advisor's</a></div>
        <div><a class="modify-committee ms-button" href="#">Modify Advisor's</a></div>
    </div>
    @if ($errors->any())
    <div class="invalid-credential mt-1">{{ $errors->first() }}</div>
    @endif

    @if (session('success'))
        <div class="success-credential mt-1">{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('advisors.store') }}" enctype="multipart/form-data" class="add-committee-form">
        @csrf
        <div class="manage-status">Create Advisor's</div>
        <div class="input-container">
            <div class="form-input"><input class="form-input-field" type="text" name="fullname" placeholder="Full Name" required></div>
            <div class="form-input"><input class="form-input-field" type="email" name="email" placeholder="Email" required></div>
            <div class="form-input"><input class="form-input-field" type="text" name="username" placeholder="Username" required></div>
            <div class="form-input"><input class="form-input-field" type="password" name="password" placeholder="Password" required></div>
            <div class="form-input"><input class="form-input-field" id="image-file" type="file" name="image"></div>
            <div class="submit-btn"><input class="submit" type="submit" value="Submit"></div>
        </div>
    </form>


    <!-- Modify Advisor Form -->
    <div class="modify-committee-form">
        <table class="table">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($advisors as $advisor)
                    <tr>
                        <td>{{ $advisor->user->fullname }}</td>
                        <td>{{ $advisor->user->email }}</td>
                        <td>{{ $advisor->user->username }}</td>
                        <td class="action-col">
                            <a href="{{ route('advisors.edit', $advisor->id) }}" class="edit-button">Edit</a>
                            <form action="{{ route('advisors.destroy', $advisor->id) }}" method="POST">
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