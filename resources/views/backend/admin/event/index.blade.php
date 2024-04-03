@extends('layouts.admin')
@section('title', 'Event Calender Settings')
@section('content')

<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title d-inline-block">
          <i class="mdi mdi-calendar-clock title_icon"></i> Event Calender
        </h4>
        <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle float-end mt-1" onclick="openCreateEventModal()"> <i class="mdi mdi-plus"></i> Add New Event</button>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row">
   <div class="col-12 event_calendar_content">
      @include('backend.admin.event.list')
   </div>
</div>

<script>
$(document).ready(function() {
   refreshEventCalendar();
});

var showAllEvents = function () {
   var url = '#';

   $.ajax({
      type : 'GET',
      url: url,
      success : function(response) {
         $('.event_calendar_content').html(response);
         initDataTable("basic-datatable");
         refreshEventCalendar();
      }
   });
}

var refreshEventCalendar = function () {
   var url = '#';
   $.ajax({
       type : 'GET',
       url: url,
       dataType: 'json',
       success : function(response) {
           var event_calendar = [];
           for(let i = 0; i < response.length; i++) {

               var obj;
               obj  = {"title" : response[i].title, "start" : response[i].starting_date, "end" : response[i].ending_date};
               event_calendar.push(obj);
           }

           $('#calendar').fullCalendar({
               disableDragging: true,
               events: event_calendar,
               displayEventTime: false
           });
       }
   });
}
</script>


<!-- Modal for Create Event -->
<div class="modal fade mt-3" id="createEventModal" tabindex="-1" aria-labelledby="createEventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createEventModalLabel">Create Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('backend.admin.event.create') 
            </div>
        </div>
    </div>
</div>

<script>
    function openCreateEventModal() {
        $('#createEventModal').modal('show');
    }
</script>

@extends('backend.admin.header')
@extends('backend.admin.navigation')
@extends('backend.admin.footer')
@endsection