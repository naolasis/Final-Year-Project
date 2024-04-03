@extends ('layouts.master')
@section('content')
<style>
.forum-container{
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    width: 100%;
    height: 68%;
}  
.forum{
  border-radius: 10px 10px;
    margin: 0 auto;
    max-height: 70%;
    box-shadow: 4px 4px 4px rgba(54, 52, 52, 0.185);
    background-color: #fff;
} 


</style>

<div class="forum-container">
      <div class="form-container forum">
      <form action="#" class="add-committee-form" style="display: block;">
          <div class="manage-status">Create Group</div>
          <div class="input-container">
              <div class="form-input"><input class="form-input-field" type="text" name="groupname" placeholder="Group Name"></div>
              <div class="form-input"><input class="form-input-field" type="text" name="projecttitle" placeholder="Project Title"></div>
              <div class="submit-btn"><input class="submit" type="submit" value="Create"></div>
              <div class="invalid-credential">Group Succesfully Created</div>
          </div>
        </form>
      </div>
</div>

@endsection
@include('side-bars.student_side_bar')