@extends('layouts.dashboard')
@push('in-header')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
<script>
    var dataEvent = @json($events);
    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'timeGridWeek',
    locale: 'id',
    headerToolbar: {
    start: 'today prev,next', // will normally be on the left. if RTL, will be on the right
    center: 'title',
    end: 'timeGridWeek timeGridDay' // will normally be on the right. if RTL, will be on the left
    },
    slotMinTime: "07:00:00",
    slotMaxTime: "17:00:00",
    nowIndicator: true,
    slotDuration: '00:20:00',
    businessHours: {
    // days of week. an array of zero-based day of week integers (0=Sunday)
    daysOfWeek: [ 1, 2, 3, 4, 5, 6 ], // Monday - Thursday
    
    startTime: '07:00', // a start time (10am in this example)
    endTime: '17:00', // an end time (6pm in this example)
    },
    hiddenDays: [0],
    events: dataEvent,
    // events: [
    // {
    // title : 'event1',
    // start : '2024-02-05'
    // },
    // {
    // title : 'event2',
    // start : '2024-02-05',
    // end : '2024-02-07'
    // },
    // {
    // title : 'event3',
    // start : '2024-02-09T12:30:00',
    // allDay : false // will make the time show
    // }
    // ],
    // events : [
    //     {
    //         title : 'contoh 1',
    //         start : '2024-02-05T07:00:00',
    //         end : '2024-02-05T17:00:00',
    //     }
    // ],
    eventClick: function(info) {
    $('#modalCenter').modal('show');
    var eventId = info.event.id;
    document.getElementById('event_id').value=eventId;
    $('#event_title').val(info.event.title);
    document.getElementById("formDelete").action = "{{ route('jadwalmengajar.delete') }}";
    },
    });
    calendar.render();
    
    });
</script>
@endpush
@section('content')
<div class="card">
    <div class="card-header d-flex">
        <h5 class="card-title flex-grow-1">
            Jadwal Piket Guru
        </h5>
        <button type="button" class="btn btn-success" data-bs-toggle="modal"
            data-bs-target="#modalCreate">Tambah</button>
    </div>
    <div class="card-body">
        <div id='calendar'></div>

    </div>
</div>

<div class="modal fade" id="modalCreate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" action="{{ route('jadwalmengajar.store') }}" method="POST">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateTitle">Tambah Jadwal Piket Guru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <input type="text" hidden id="id_kelas" class="form-control" name="id_kelas" value="" readonly
                            required />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="guru_dan_mapel" class="form-label">Mapel</label>
                        <select name="user_id" id="guru_dan_mapel" class="form-select">
                            <option value="#">Pilih Guru Dan Mapel</option>
                            @forelse ($guru as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @empty
                            <option class="text-white bg-warning">No Data</option>
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="tanggal_mulai" class="form-label">Hari & Tanggal Mulai</label>
                        <input class="form-control" type="date" id="tanggal_mulai" name="tanggal_awal" />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="tanggal_selesai" class="form-label">Hari & Tanggal Selesai</label>
                        <input class="form-control" type="date" id="tanggal_selesai" name="tanggal_selesai" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
</div>

@endsection