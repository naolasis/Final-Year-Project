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
    
    <h2 style="text-align: center;">Manage Student's</h2>
    <!-- Modify Student Form -->
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
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->user->fullname }}</td>
                    <td>{{ $student->user->email }}</td>
                    <td>{{ $student->user->username }}</td>
                    <td class="action-col">
                        <a href="{{ route('students.edit', $student->id) }}" class="edit-button">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST">
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