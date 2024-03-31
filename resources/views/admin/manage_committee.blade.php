@extends ('layouts.master')
@include('side-bars.admin_side_bar')
@section('content')


<div class="form-container">
    <div class="button-container row">
        <div><a class="add-committee ms-button" href="#">Create Committee</a></div>
        <div><a class="modify-committee ms-button" href="#">Modify Committee</a></div>
    </div>
    <form action="#" class="add-committee-form">
        <div class="manage-status">form 1</div>
        <div class="input-container">
            <div class="form-input"><input class="form-input-field" type="text" name="fullname" placeholder="Full Name"></div>
            <div class="form-input"><input class="form-input-field" type="email" name="email" placeholder="Email"></div>
            <div class="form-input"><input class="form-input-field" type="text" name="username" placeholder="Username"></div>
            <div class="form-input"><input class="form-input-field" type="password" name="password" placeholder="Password"></div>
            <div class="form-input">
                <select class="form-input-field" name="" id="">
                    <option value="" disabled selected>Committee Type</option>
                    <option value="">Committee Head</option>
                    <option value="">Committee Member</option>
                </select>
            </div>
            <div class="submit-btn"><input class="submit" type="submit" value="Submit"></div>
            <div class="invalid-credential">committee added succesfully</div>
        </div>
    </form>


    <form action="#" class="modify-committee-form">
        <div>success example</div>
        <div>success example</div>
        <div>success example</div>
        <div>success example</div>
        <div>success example</div>
    </form>

</div>


@endsection