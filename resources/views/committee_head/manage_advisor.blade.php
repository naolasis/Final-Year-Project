@extends ('layouts.master')
@include('side-bars.committee_head_side_bar')
@section('content')

<div class="form-container">
    <div class="button-container row">
        <div><a class="add-committee ms-button" href="#">Create Advisor's</a></div>
        <div><a class="modify-committee ms-button" href="#">Modify Advisor's</a></div>
    </div>
    <form action="#" class="add-committee-form">
        <div class="manage-status">Create Advisor's</div>
        <div class="input-container">
            <div class="form-input"><input class="form-input-field" type="text" name="fullname" placeholder="Full Name"></div>
            <div class="form-input"><input class="form-input-field" type="email" name="email" placeholder="Email"></div>
            <div class="form-input"><input class="form-input-field" type="text" name="username" placeholder="Username"></div>
            <div class="form-input"><input class="form-input-field" type="password" name="password" placeholder="Password"></div>
            <div class="submit-btn"><input class="submit" type="submit" value="Submit"></div>
            <div class="invalid-credential">Advisor added succesfully</div>
        </div>
    </form>


    <form action="#" class="modify-committee-form">
        <div>Advisor example</div>
        <div>Advisor example</div>
        <div>Advisor example</div>
        <div>Advisor example</div>
        <div>Advisor example</div>
    </form>

</div>


@endsection