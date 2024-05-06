@extends ('layouts.master')
@section('content')
<div class="table-container">
  <h2>Notices</h2>
  <table class="table">
      <thead>
          <tr>
              <th>Title</th>
              <th>Content</th>
              <th>Date</th>
          </tr>
      </thead>
      <tbody>
          @foreach($notices as $notice)
              <tr>
                  <td>{{ $notice->title }}</td>
                  <td>{{ $notice->content }}</td>
                  <td>{{ $notice->updated_at->format('d-m-Y') }}</td>
              </tr>
          @endforeach
      </tbody>
  </table>
</div>
@endsection
@include('side-bars.student_side_bar')