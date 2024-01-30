@extends('layouts.dashboard')
@push('in-header')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
<script>
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
                slotDuration: '00:45:00',
                businessHours: {
                // days of week. an array of zero-based day of week integers (0=Sunday)
                daysOfWeek: [ 1, 2, 3, 4, 5, 6 ], // Monday - Thursday
                
                startTime: '07:00', // a start time (10am in this example)
                endTime: '17:00', // an end time (6pm in this example)
                },
                hiddenDays: [0],
                events:[
                    {
                        title : 'MTK',
                        start : '2024-01-27T07:00:00',
                        end   : '2024-01-27T08:45:00',
                        allDay: false
                    },
                ],
                allDaySlot: false,
            });
            calendar.render();
            
          });
    
</script>
@endpush
@section('content')
<div class="card">
    <div class="card-header d-flex">
        <h5 class="card-title flex-grow-1">
            Jadwal Pelajaran {{ $gurudanmapel[0]->kelas->nama_kelas }}
        </h5>
        <button type="button" class="btn btn-success" data-bs-toggle="modal"
            data-bs-target="#modalCreate">Tambah</button>
    </div>
    <div class="card-body">
        <div id='calendar'></div>

    </div>
</div>

<!-- Modal untuk create -->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" action="{{ route('jurusan.store') }}" method="POST">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateTitle">Tambah Jadwal Pelajaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <input type="text" hidden id="id_kelas" class="form-control" name="id_kelas"
                            value="{{ $gurudanmapel[0]->kelas->id }}" readonly required />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="guru_dan_mapel" class="form-label">Mapel</label>
                        <select name="guru_dan_mapel" id="guru_dan_mapel" class="form-select">
                            <option value="#">Pilih Guru Dan Mapel</option>
                            @forelse ($gurudanmapel as $item)
                            <option value="{{ $item->id }}">{{ $item->user->name }} - {{ $item->mapel->nama_mapel }}</option>
                            @empty
                            <option class="text-white bg-warning">No Data</option>
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="tanggal_mulai" class="form-label">Hari & Tanggal Mulai</label>
                        <input class="form-control" type="date"  id="tanggal_mulai" />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="tanggal_selesai" class="form-label">Hari & Tanggal Selesai</label>
                        <input class="form-control" type="date"  id="tanggal_selesai" />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <h5 class="form-label">Jam Pelajaran</h5>
                        <div class="row gy-3">
                            <div class="col-md">
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" value="07:45" id="jp1"  />
                                    <label class="form-check-label" for="jp1"> Jam Pelajaran ke-1 </label>
                                </div>
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" value="08:45" id="jp2"  />
                                    <label class="form-check-label" for="jp2"> Jam Pelajaran ke-2 </label>
                                </div>
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" value="09:45" id="jp3"  />
                                    <label class="form-check-label" for="jp3"> Jam Pelajaran ke-3 </label>
                                </div>
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" value="11:45" id="jp4"  />
                                    <label class="form-check-label" for="jp4"> Jam Pelajaran ke-4 </label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" value="13:45" id="jp5"  />
                                    <label class="form-check-label" for="jp5"> Jam Pelajaran ke-5 </label>
                                </div>
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" value="14:45" id="jp6"  />
                                    <label class="form-check-label" for="jp6"> Jam Pelajaran ke-6 </label>
                                </div>
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" value="15:45" id="jp7"  />
                                    <label class="form-check-label" for="jp7"> Jam Pelajaran ke-7 </label>
                                </div>
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" value="16:45" id="jp8"  />
                                    <label class="form-check-label" for="jp8"> Jam Pelajaran ke-8 </label>
                                </div>
                            </div>
                        </div>
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