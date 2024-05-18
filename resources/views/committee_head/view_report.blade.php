@extends ('layouts.master')
@include('side-bars.committee_head_side_bar')
@section('content')
    <div class="form-container">
        <h2>Reports</h2>
        @foreach ($groups as $group)
            <table class="table mt-1"> 
                <tbody>
                    <tr>
                        <th>Group name</th>
                        <td>{{ $group->group_name }}</td>
                    </tr>
                    <tr>
                        <th>Project Title</th>
                        <td>{{ $group->project_title }}</td>
                    </tr>
                    @forelse ($reports as $report)
                        <tr>
                            <th>Project Report {{$report->id}}</th>
                            <td>
                                <p>File Name: {{ $report->file_name }}</p>
                                <p>Report Type: {{ ucfirst($report->report_type) }}</p>
                                <p>Upload Date: {{ $report->created_at->format('d-m-Y H:i') }}</p>
                                <p>Download: <a class="download-button" href="{{ route('reports.download', $report->id) }}">Download</a></p>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No reports found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        @endforeach
    </div>
@endsection
