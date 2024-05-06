@extends ('layouts.master')
@if(auth()->user()->isCommitteeHead())
    @include('side-bars.committee_head_side_bar')
@elseif(auth()->user()->isCommitteeMember())
    @include('side-bars.committee_member_side_bar')
@endif
@section('content')
    <div class="form-container">
        <form action="{{ route('notices.update', $notice->id) }}" method="POST" class="">
            @csrf
            @method('PUT')
            <div class="input-container">
                @if ($errors->any())
                <div class="invalid-credential mt-1">{{ $errors->first() }}</div>
                @endif
        
                @if (session('success'))
                    <div class="success-credential mt-1">{{ session('success') }}</div>
                @endif
                <div class="manage-status">Edit Notice</div>
                <div class="form-input"><input class="form-input-field" value="{{ $notice->title }}" name="notice_title" id="" placeholder="Title"></div>
                <div class="form-input"><textarea class="form-input-field" name="notice_content" id="" cols="30" rows="10" placeholder="Content...">{{ $notice->content }}</textarea></div>
                <div class="submit-btn"><input class="submit" type="submit" value="Save Changes"></div>
            </div>
        </form>
    </div>
@endsection