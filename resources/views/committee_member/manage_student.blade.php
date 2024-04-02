@extends ('layouts.master')
@include('side-bars.committee_member_side_bar')
@section('content')

<div class="form-container">
    <div class="button-container row">
        <div><a class="add-committee ms-button" href="#">Create Student's</a></div>
        <div><a class="modify-committee ms-button" href="#">Modify Student's</a></div>
    </div>
    <form action="#" class="add-committee-form">
        <div class="manage-status">Create Advisor's</div>
        <div class="input-container">
            <div class="submit-btn"><label for="files"></label>Upload Student's Excell File </div>
            <div class="form-input"><input class="form-input-field" id="files" type="file" name="file" accept=".xlsx, .xls"></div>
            <div class="submit-btn"><input class="submit" type="submit" value="Submit"></div>
            <div class="invalid-credential">Student File Uploaded Succesfully</div>
        </div>
    </form>


    <form action="#" class="modify-committee-form">
        <div>student example</div>
        <div>student example</div>
        <div>student example</div>
        <div>student example</div>
        <div>student example</div>
    </form>

</div>


@endsection