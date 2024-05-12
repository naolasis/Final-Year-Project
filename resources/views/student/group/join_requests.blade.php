@extends ('layouts.master')
@section('content')

    <div class="forum-container">
        <div class="form-container forum">
            @if (session('error'))
                <div class="invalid-credential mt-1">{{ session('error') }}</div>
            @endif

            @if (session('success'))
                <div class="success-credential mt-1">{{ session('success') }}</div>
            @endif
            <div class="manage-status">Group Join Requests</div>
            @if ($joinRequests->isEmpty())
                <p>No join requests found.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sender</th>
                            <th>Group Name</th>
                            <th>Project Title</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($joinRequests->where('status', '!=', 'rejected') as $joinRequest)
                            <tr>
                                <td>{{ $joinRequest->sender->user->username }}</td>
                                <td>{{ $joinRequest->sender->group->group_name }}</td>
                                <td>{{ $joinRequest->sender->group->project_title }}</td>
                                <td>
                                    <form action="{{ route('join_requests.accept', $joinRequest) }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Accept</button>
                                    </form>
                                    <form action="{{ route('join_requests.reject', $joinRequest) }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Reject</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

@endsection
@include('side-bars.student_side_bar')
