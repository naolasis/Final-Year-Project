@extends ('layouts.master')
@section('content')
<div class="table-container">
  <h2>Notices</h2>
  <table class="table">
      <thead>
          <tr>
              <th>Title</th>
              <th>Content</th>
              <th>Posted By</th>
          </tr>
      </thead>
      <tbody>
          @foreach($notices as $notice)
              <tr>
                  <td>{{ $notice->title }}</td>
                  <td>{{ $notice->content }}</td>
                  <td>{{ $notice->posted_by }}</td>
              </tr>
          @endforeach
      </tbody>
  </table>
</div>
@endsection
@include('side-bars.student_side_bar')