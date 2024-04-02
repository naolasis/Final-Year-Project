@extends ('layouts.master')
@include('side-bars.committee_head_side_bar')
@section('content')

<div class="form-container">
    <div class="button-container row">
        <div><a class="add-committee ms-button" href="#">Add Policy</a></div>
        <div><a class="modify-committee ms-button" href="#">Update Policy</a></div>
    </div>
    <form action="#" class="add-committee-form">
        <div class="manage-status">Add Policy</div>
        <div class="input-container">
            <div class="form-input"><textarea class="form-input-field"name="policy" id="" cols="30" rows="10"></textarea></div>
            <div class="submit-btn"><input class="submit" type="submit" value="Submit"></div>
            <div class="invalid-credential">Policy created succesfully</div>
        </div>
    </form>


    <form action="#" class="modify-committee-form">
        <div>modify policy</div>
        <div>modify policy</div>
        <div>modify policy</div>
        <div>modify policy</div>
        <div>modify policy</div>
    </form>

</div>


@endsection