@extends ('layouts.master')
@section('content')
<div class="form-container">
  <h2>Uploaded Reports</h2>
  <table class="table">
      <thead>
          <tr>
              <th>File Name</th>
              <th>Report Type</th>
              <th>Upload Date</th>
              <th>Download</th>
          </tr>
      </thead>
      <tbody>
          @forelse ($reports as $report)
              <tr>
                  <td>{{ $report->file_name }}</td>
                  <td>{{ ucfirst($report->report_type) }}</td>
                  <td>{{ $report->created_at->format('d-m-Y H:i') }}</td>
                  <td><a class="download-button" href="{{ route('reports.download', $report->id) }}">Download</a></td>
              </tr>
          @empty
              <tr>
                  <td colspan="4">No reports found.</td>
              </tr>
          @endforelse
      </tbody>
  </table>
</div>
@endsection
@include('side-bars.advisor_side_bar')