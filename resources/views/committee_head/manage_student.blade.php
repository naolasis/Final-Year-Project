@extends('layouts.master')
@include('side-bars.committee_head_side_bar')
@section('content')

<div class="form-container">
    <div class="button-container row">
        <div><a class="add-committee ms-button" href="#">Create Student's</a></div>
        <div><a class="modify-committee ms-button" href="#">Modify Student's</a></div>
    </div>
    @if ($errors->any())
        <div class="invalid-credential mt-1">{{ $errors->first() }}</div>
    @endif

    @if (session('success'))
        <div class="success-credential mt-1">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data" class="add-committee-form">
        @csrf
        <div class="manage-status">Import Students</div>
        <div class="input-container">
            <div class="form-input"><input class="form-input-field" type="file" name="file" required></div>
            <div class="submit-btn"><input class="submit" type="submit" value="Upload"></div>
            <a href="{{ route('committee_head.student_list') }}" class="evaluate-button mt-1" style="padding: 1rem;">Students</a>
        </div>

    </form>

        <!-- Modify Student Form -->
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
</div>

@endsection
