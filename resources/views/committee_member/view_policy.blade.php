@extends ('layouts.master')
@include('side-bars.committee_member_side_bar')
@section('content')

<div class="group-container">
    <div class="table-container">
        <h2>Policies</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                </tr>
            </thead>
            <tbody>
                @foreach($policies as $policy)
                    <tr>
                        <td>{{ $policy->title }}</td>
                        <td>{{ $policy->content }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
      </div>
</div>


@endsection