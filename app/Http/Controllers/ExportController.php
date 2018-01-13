<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Students;
use App\Models\Course;
use App\Models\StudentAddresses;

class ExportController extends Controller
{
    public function __construct()
    {

    }

    public function welcome()
    {
        return view('hello');
    }

    /**
     * View all students found in the database
     */
    public function viewStudents()
    {
        $students = Students::with('course')->get();
        return view('view_students', compact(['students']));
    }

    /**
     * Exports all student data to a CSV file
     */
    public function exportStudentsToCSV()
    {
        echo 'we got to export students to csv';
    }

    /**
     * Exports the total amount of students that are taking each course to a CSV file
     */
    public function exporttCourseAttendenceToCSV()
    {

    }
}
