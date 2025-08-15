<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\TimetableEntry;
use App\Models\ClassSubject;
use App\Models\BellSchedule;
use App\Models\Room;
use Illuminate\Http\Request;

class TeacherTimetableController extends Controller
{
    /**
     * Display a list of all teachers.
     */
  public function index()
{
    // Fetch all teachers (staff who are teachers)
    $teachers = Staff::all(); // or filter if you have a role column: Staff::where('role', 'teacher')->get();
    
    return view('teacher_timetable.index', compact('teachers'));
}


    /**
     * Show a teacher's timetable
     */
   public function show($teacherId)
{
    $teacher = Staff::findOrFail($teacherId);

    $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];

    $bellSchedules = BellSchedule::orderBy('start_time')->get();

    // Get all timetable entries for this teacher and group by day_of_week
    $timetableEntries = TimetableEntry::with(['classSubject.class', 'classSubject.subject', 'room'])
        ->whereHas('classSubject', function ($query) use ($teacherId) {
            $query->where('teacher_id', $teacherId);
        })
        ->get()
        ->groupBy('day_of_week'); // Group entries by day

    return view('teacher_timetable.show', compact('teacher', 'daysOfWeek', 'bellSchedules', 'timetableEntries'));
}

    /**
     * Show form to create a new timetable entry
     */
    public function create()
    {
        $teachers = Staff::all();
        $classSubjects = ClassSubject::with(['class', 'subject', 'teacher'])->get();
        $bellSchedules = BellSchedule::orderBy('start_time')->get();
        $rooms = Room::all();
        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];

        return view('teacher_timetable.create', compact('teachers', 'classSubjects', 'bellSchedules', 'rooms', 'daysOfWeek'));
    }

    /**
     * Store a new timetable entry
     */
   public function store(Request $request)
{
   $data = $request->validate([
    'class_subject_id' => 'required|exists:class_subjects,id',
    'bell_schedule_id' => 'required|exists:bell_schedules,id',
    'day_of_week'      => 'required|string|in:Monday,Tuesday,Wednesday,Thursday,Friday',
    'period'           => 'nullable|integer',
    'room_id'          => 'nullable|exists:rooms,id',
]);

$bell = BellSchedule::find($data['bell_schedule_id']);
$data['start_time'] = $bell->start_time;
$data['end_time']   = $bell->end_time;

TimetableEntry::create($data);


    return redirect()->route('teacher.timetable.index')
                     ->with('success', 'Timetable entry created successfully.');
}






       

    /**
     * Show form to edit a timetable entry
     */
    public function edit(TimetableEntry $timetableEntry)
    {
        $teachers = Staff::all();
        $classSubjects = ClassSubject::with(['class', 'subject', 'teacher'])->get();
        $bellSchedules = BellSchedule::orderBy('start_time')->get();
        $rooms = Room::all();
        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];

        return view('teacher_timetable.edit', compact('timetableEntry', 'teachers', 'classSubjects', 'bellSchedules', 'rooms', 'daysOfWeek'));
    }

    /**
     * Update a timetable entry
     */
    public function update(Request $request, TimetableEntry $timetableEntry)
    {
        $data = $request->validate([
            'class_subject_id' => 'required|exists:class_subjects,id',
            'bell_schedule_id' => 'required|exists:bell_schedules,id',
            'day' => 'required|string',
            'room_id' => 'nullable|exists:rooms,id',
        ]);

        $timetableEntry->update($data);

        return redirect()->route('teacher.timetable.index')->with('success', 'Timetable entry updated successfully.');
    }

    /**
     * Delete a timetable entry
     */
    public function destroy(TimetableEntry $timetableEntry)
    {
        $timetableEntry->delete();
        return redirect()->route('teacher.timetable.index')->with('success', 'Timetable entry deleted successfully.');
    }
}

