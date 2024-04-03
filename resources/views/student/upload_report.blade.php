@extends ('layouts.master')
@section('forum')
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
    margin: 0 auto;
    border-radius: 10px 10px;
    max-height: 70%;
    background-color: #fff;
} 
.add-committee-form{
    max-height: 70%;
    box-shadow: 4px 4px 4px rgba(54, 52, 52, 0.185);
}


</style>

<div class="forum-container">
    <div class="form-container forum">
      <form action="#" class="add-committee-form" style="display: block;">
        <div class="manage-status">Upload Report</div>
        <div class="input-container">
            <div class="submit-btn"><label for="files"></label>Upload Your Project File </div>
            <div class="form-input">
              <select class="form-input-field" name="" id="" required>
                  <option value="" disabled selected>Report Type</option>
                  <option value="">Initial Report</option>
                  <option value="">Final Report</option>
              </select>
            </div>
            <div class="form-input"><input class="form-input-field" id="files" type="file" name="file" accept=".xlsx, .xls"></div>
            <div class="submit-btn"><input class="submit" type="submit" value="Submit"></div>
            <div class="invalid-credential">Report Uploaded Succesfully</div>
        </div>
      </form>
   </div>
</div>

@endsection


@include('side-bars.student_side_bar')