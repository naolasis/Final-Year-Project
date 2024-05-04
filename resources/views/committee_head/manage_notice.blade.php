@extends ('layouts.master')
@include('side-bars.committee_head_side_bar')
@section('content')

<div class="form-container">
    <div class="button-container row">
        <div><a class="add-committee ms-button" href="#">Send Notice</a></div>
        <div><a class="modify-committee ms-button" href="#">Update Notice</a></div>
    </div>
    @if ($errors->any())
    <div class="invalid-credential mt-1">{{ $errors->first() }}</div>
    @endif

    @if (session('success'))
        <div class="success-credential mt-1">{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('notices.store') }}" class="add-committee-form">
        @csrf
        <div class="manage-status">Create New Notice</div>
        <div class="input-container">
            <div class="form-input"><input class="form-input-field" name="notice_title" id="" placeholder="Title"></div>
            <div class="form-input"><textarea class="form-input-field" name="notice_content" id="" cols="30" rows="10" placeholder="Content..."></textarea></div>
            <div class="submit-btn"><input class="submit" type="submit" value="Submit"></div>
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