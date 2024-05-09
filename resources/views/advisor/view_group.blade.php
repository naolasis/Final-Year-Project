@extends ('layouts.master')
@section('content')
<div class="table-container">
  <h2>Groups</h2>
  <table class="table">
      <thead>
          <tr>
              <th>Group Name</th>
              <th>Project Title</th>
              <th>Members</th>
              <th>Date</th>
          </tr>
      </thead>
      <tbody>
          @foreach($groups as $group)
              <tr>
                  <td>{{ $group->title }}</td>
                  <td>{{ $group->content }}</td>
                  <td>{{ $group->members }}</td>
                  <td>{{ $group->updated_at->format('d-m-Y') }}</td>
              </tr>
          @endforeach
      </tbody>
  </table>
</div>
@endsection
@include('side-bars.advisor_side_bar')