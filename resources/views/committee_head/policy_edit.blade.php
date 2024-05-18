@extends ('layouts.master')
@include('side-bars.committee_head_side_bar')
@section('content')
    <div class="form-container">
        <form action="{{ route('policies.update', $policy->id) }}" method="POST" class="">
            @csrf
            @method('PUT')
            <div class="input-container">
                @if ($errors->any())
                <div class="invalid-credential mt-1">{{ $errors->first() }}</div>
                @endif
        
                @if (session('success'))
                    <div class="success-credential mt-1">{{ session('success') }}</div>
                @endif
                <div class="manage-status">Edit Policy</div>
                <div class="form-input"><input class="form-input-field" value="{{ $policy->title }}" name="policy_title" id="" placeholder="Title"></div>
                <div class="form-input"><textarea class="form-input-field" name="policy_content" id="" cols="30" rows="10" placeholder="Content...">{{ $policy->content }}</textarea></div>
                <div class="submit-btn"><input class="submit" type="submit" value="Save Changes"></div>
            </div>
        </form>
    </div>
@endsection