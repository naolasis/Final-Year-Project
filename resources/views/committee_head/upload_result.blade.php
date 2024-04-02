@extends ('layouts.master')
@include('side-bars.committee_head_side_bar')
@section('content')

<div class="form-container">
    <form action="#" class="add-committee-form" style="display:block">
        <div class="manage-status">Upload Result</div>
        <div class="input-container">
            <div class="submit-btn"><label for="files"></label>Upload Student's Result File </div>
            <div class="form-input"><input class="form-input-field" id="files" type="file" name="file" accept=".xlsx, .xls"></div>
            <div class="submit-btn"><input class="submit" type="submit" value="Upload"></div>
            <div class="invalid-credential">Student Result Uploaded Succesfully</div>
        </div>
    </form>
</div>
@endsection