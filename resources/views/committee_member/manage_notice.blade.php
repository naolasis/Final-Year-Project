@extends ('layouts.master')
@include('side-bars.committee_member_side_bar')
@section('content')

<div class="form-container">
    <div class="button-container row">
        <div><a class="add-committee ms-button" href="#">Send Notice</a></div>
        <div><a class="modify-committee ms-button" href="#">Update Notice</a></div>
    </div>
    <form action="#" class="add-committee-form">
        <div class="manage-status">Create New Notice</div>
        <div class="input-container">
            <div class="form-input"><textarea class="form-input-field"name="policy" id="" cols="30" rows="10"></textarea></div>
            <div class="submit-btn"><input class="submit" type="submit" value="Submit"></div>
            <div class="invalid-credential">Notice created succesfully</div>
        </div>
    </form>


    <form action="#" class="modify-committee-form">
        <div>update notice</div>
        <div>update notice</div>
        <div>update notice</div>
        <div>update notice</div>
        <div>update notice</div>
    </form>

</div>


@endsection