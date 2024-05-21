@extends ('layouts.master')
@include('side-bars.admin_side_bar')
@section('content')

<div class="form-container">

    @if ($errors->any())
    <div class="invalid-credential mt-1">{{ $errors->first() }}</div>
    @endif

    @if (session('success'))
        <div class="success-credential mt-1">{{ session('success') }}</div>
    @endif

    <h2 style="text-align: center;">Manage Advisor's</h2>
    <!-- Modify Advisor Form -->
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


@endsection