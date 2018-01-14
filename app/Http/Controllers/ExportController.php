<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Students;
use App\Models\Course;
use App\Models\StudentAddresses;
use App\Utils\Excel;

class ExportController extends Controller
{
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

    public function export(Request $request)
    {
        if($request->has('studentId')){
            $studentModel = array();
            foreach($request->input('studentId') as $key=>$value){
                $studentModel[] = $this->findStudents($value);
            }

            $this->exportStudentsToCSV($this->formatStudentData($studentModel));
        }
    }

    /**
     * Exports all student data to a CSV file
     */
    private function exportStudentsToCSV($data=array())
    {
        $excel = new Excel('Student Record');
        $excel->setHeading(['Id', 'Forname', 'Surname', 'Email', 'University', 'Course', 'Address'])
            ->setData($data)
            ->pushDocument();
    }

    private function findStudents($studentId=0)
    {
        if($studentId > 0){
            return Students::with('course')
                            ->with('address')
                            ->where('id', $studentId)
                            ->first();
        }else{
            return Students::with('course')
                            ->with('address')
                            ->get();
        }
    }

    private function formatStudentData($studentModel = array()){
        $data = array();
        foreach($studentModel as $key => $value){
            $data[$key]['id'] = $value['id'];
            $data[$key]['firstname'] = $value['firstname'];
            $data[$key]['surname'] = $value['surname'];
            $data[$key]['email'] = $value['email'];
            $data[$key]['university'] = $value['course']['university'];
            $data[$key]['course_name'] = $value['course']['course_name'];
            $data[$key]['address'] = $value['address']['houseNo'].' '.$value['address']['line_1'].' '.$value['address']['line_2'].' '.$value['address']['postcode'].' '.$value['address']['city'];
        }
        return $data;
    }

    /**
     * Exports the total amount of students that are taking each course to a CSV file
     */
    private function exporttCourseAttendenceToCSV()
    {
        /*TBC*/
    }
}
