@extends ('layouts.master')
@include('side-bars.committee_head_side_bar')
@section('content')

<div class="group-container">
    @if ($errors->any())
        <div class="invalid-credential mt-1">{{ $errors->first() }}</div>
    @endif

    @if (session('success'))
        <div class="success-credential mt-1">{{ session('success') }}</div>
    @endif
    <div class="table-container">
        <h2>Evaluation</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Group Name</th>
                    <th>Project Title</th>
                    <th>Evaluate</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($groups as $group)
                    <tr>
                        <td>{{ $group->id }}</td>
                        <td>{{ $group->group_name }}</td>
                        <td>{{ $group->project_title }}</td>
                        <td><a class="evaluate-button" href="{{ route('committee_head.evaluation_result_form', $group->id) }}">Evaluate</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection