@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Timetable Entry</h1>

    <form action="{{ route('teacher.timetable.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Class & Subject</label>
            <select name="class_subject_id" class="form-control" required>
                @foreach($classSubjects as $cs)
                    <option value="{{ $cs->id }}">
                        {{ $cs->class->name ?? 'Unknown Class' }} - {{ $cs->subject->name ?? 'Unknown Subject' }} ({{ $cs->teacher->first_name ?? '' }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
    <label>Day</label>
    
<select name="day_of_week" class="form-control" required>
    @foreach($daysOfWeek as $day)
        <option value="{{ $day }}">{{ $day }}</option>
    @endforeach
</select>




</div>












        <div class="mb-3">
            <label>Period</label>
            <input type="number" name="period" class="form-control" min="1" required>
        </div>

        <div class="mb-3">
            <label>Time Slot</label>
            <select name="bell_schedule_id" class="form-control" required>
                @foreach($bellSchedules as $bell)
                    <option value="{{ $bell->id }}">{{ $bell->name }} ({{ $bell->start_time }} - {{ $bell->end_time }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Room</label>
            <select name="room_id" class="form-control">
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection

