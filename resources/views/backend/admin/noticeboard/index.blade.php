@extends('layouts.admin')
@section('title', 'Noticeboard Settings')
@section('content')

<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title d-inline-block">
          <i class="mdi mdi-calendar-clock title_icon"></i> NoticeBoard Calender
        </h4>
        <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle float-end mt-1" onclick="rightModal('{{ route('teachers') }}')"> <i class="mdi mdi-plus"></i> Add New Notice </button>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row">
  <div class="col-12 noticeboard_content">
    @include('backend.admin.noticeboard.list')
  </div>
</div>


<script>
$(document).ready(function() {
  refreshNoticeCalendar();
});

var showAllNotices = function () {
  var url = '#';

  $.ajax({
    type : 'GET',
    url: url,
    success : function(response) {
      $('.noticeboard_content').html(response);
      refreshNoticeCalendar();
    }
  });
}

var refreshNoticeCalendar = function () {
  var url = '#';
  $.ajax({
    type : 'GET',
    url: url,
    dataType: 'json',
    success : function(response) {

      var notice_calendar = [];
      for(let i = 0; i < response.length; i++) {

        var obj;
        obj  = {"id": response[i].id, "title" : response[i].notice_title, "start" : response[i].date, "end" : response[i].date};
        notice_calendar.push(obj);
      }

      $('#calendar').fullCalendar({
        disableDragging: true,
        events: notice_calendar,
        displayEventTime: false,
        eventClick : function(info) {
          rightModal('{{ route("teachers") }}')
        },
        dayClick: function(date) {
            rightModal('{{ route("teachers") }}');
        }
      });
    }
  });
}
</script>
   @extends('backend.admin.header')
@extends('backend.admin.navigation')
@extends('backend.admin.footer')

@endsection