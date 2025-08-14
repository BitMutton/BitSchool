@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $teacher->first_name }} {{ $teacher->last_name }}'s Timetable</h1>
    <a href="{{ route('teacher.timetable.index') }}" class="btn btn-secondary mb-3">Back to Teachers</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Day</th>
                @foreach($bellSchedules as $schedule)
                    <th>{{ $schedule->name }}<br>{{ $schedule->start_time }} - {{ $schedule->end_time }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($daysOfWeek as $day)
                <tr>
                    <td>{{ $day }}</td>
                    @foreach($bellSchedules as $schedule)
                        <td>
                            @php
                                $entry = $timetableEntries[$day]->firstWhere('bell_schedule_id', $schedule->id) ?? null;
                            @endphp
                            @if($entry)
                                {{ $entry->class?->name ?? 'N/A' }} <br>
                                {{ $entry->subject?->name ?? 'N/A' }} <br>
                                Room: {{ $entry->room?->name ?? 'N/A' }}
                            @else
                                -
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

