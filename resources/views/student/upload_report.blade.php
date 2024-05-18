@extends ('layouts.master')
@section('forum')

<div class="forum-container">
    <div class="form-container forum">
        
        @if (session('error'))
            <div class="invalid-credential mt-1">{{ session('error') }}</div>
        @endif
        
        @if (session('success'))
            <div class="success-credential mt-1">{{ session('success') }}</div>
        @endif
        <form action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data" class="add-committee-form" style="display: block;">
            @csrf
            <div class="manage-status">Upload Report</div>
            <div class="input-container" style="margin-top: 2rem">
                <label for="report" style="font-size: .8rem; margin-top:2rem">Upload Report (PDF, DOC, DOCX)</label>
                <div class="form-input"><input class="form-input-field" type="file" id="report" name="report" accept=".pdf,.doc,.docx" required></div>
                <div class="form-input">
                    <select class="form-input-field" name="report_type" id="report_type" required>
                        <option value="" disabled selected>Select Report Type</option>
                        <option value="initial">Initial Report</option>
                        <option value="final">Final Report</option>
                    </select>
                </div>
                <div class="submit-btn"><input class="submit" type="submit" value="Upload Report"></div>
            </div>
        </form>

        {{-- uploaded reports --}}
        <div class="report-list-container">
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
    </div>
</div>


@endsection

@include('side-bars.student_side_bar')