@extends ('layouts.master')
@section('content')
<style>


</style>

<div class="forum-container">
      <div class="form-container forum">
        @if (session('error'))
            <div class="invalid-credential mt-1">{{ session('error') }}</div>
        @endif
        
        @if (session('success'))
            <div class="success-credential mt-1">{{ session('success') }}</div>
        @endif
        <form method="POST" action="{{route('groups.store')}}" class="add-committee-form" style="display: block;">
            @csrf
            <div class="manage-status">Create Group</div>
            <div class="input-container">
                <div class="form-input"><input class="form-input-field" type="text" name="group_name" placeholder="Group Name"></div>
                <div class="form-input"><input class="form-input-field" type="text" name="project_title" placeholder="Project Title"></div>
                <div class="form-input"><textarea class="form-input-field" name="description" id="" cols="30" rows="5" placeholder="A small description about your project..."></textarea></div>
                <div class="submit-btn"><input class="submit" type="submit" value="Create"></div>
            </div>
        </form>
      </div>
</div>

@endsection
@include('side-bars.student_side_bar')