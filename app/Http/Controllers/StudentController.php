<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class StudentController extends Controller
{   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::orderBy('name', 'asc')->paginate(15);         

        return view('student.list')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validateData($request);
        $this->validatePhoto($request);   

        $path = $request->photo->store('images');
        
       $student = Student::create([
            'name' => $request->name,
            'rg' => $request->rg, 
            'voter_id' => $request->voter_id,
            'phone' => $request->phone,
            'address' => $request->address,
            'course' => $request->course,
            'institution' => $request->institution,
            'semester' => $request->semester,
            'city' => $request->city,
            'period' => implode(' ', $request->period),
            'days' => implode(' ', $request->days),
            'study_begin' => date("Y-m-d", strtotime($request->study_begin)),
            'study_ends' => date("Y-m-d", strtotime($request->study_ends)),
            'profession' => $request->profession,
            'enterprise' => $request->enterprise,
            'photo' => $path,
        ]);

        return view('student.show')->with('s', $student);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {

        return view('student.show')->with('s', $student);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function showPDF(Student $student)
    {

        return \PDF::loadView('student.showpdf', compact('student'))->stream();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {     

        return view('student.edit')->with('s', $student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {        

        
        if($request->photo != null){
            $this->validateData($request);
            $this->validatePhoto($request);
            $path = $request->photo->store('images');
        }
        else{
            $this->validateData($request);
            $path = $student->photo;
        }

        $student->update([
            'name' => $request->name,
            'rg' => $request->rg, 
            'voter_id' => $request->voter_id,
            'phone' => $request->phone,
            'address' => $request->address,
            'course' => $request->course,
            'institution' => $request->institution,
            'semester' => $request->semester,
            'city' => $request->city,
            'period' => implode(' ', $request->period),
            'days' => implode(' ', $request->days),
            'study_begin' => date("Y-m-d", strtotime($request->study_begin)),
            'study_ends' => date("Y-m-d", strtotime($request->study_ends)),
            'profession' => $request->profession,
            'enterprise' => $request->enterprise,
            'photo' => $path,
        ]);

        return view('student.show')->with('s', $student);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {

        Storage::delete($student->photo);
        $student->delete();

        return redirect()->action('StudentController@index');

    }


    /**
     * Search the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        
        $search = $request->search;

        $students = Student::where('name', 'LIKE', '%' . $search . '%')
                            ->orWhere('rg', 'LIKE', '%' . $search . '%')
                            ->orWhere('voter_id', 'LIKE', '%' . $search . '%')
                            ->orWhere('phone', 'LIKE', '%' . $search . '%')
                            ->orWhere('address', 'LIKE', '%' . $search . '%')
                            ->orWhere('course', 'LIKE', '%' . $search . '%')
                            ->orWhere('institution', 'LIKE', '%' . $search . '%')
                            ->orWhere('semester', 'LIKE', '%' . $search . '%')
                            ->orWhere('city', 'LIKE', '%' . $search . '%')
                            ->orWhere('period', 'LIKE', '%' . $search . '%')
                            ->orWhere('days', 'LIKE', '%' . $search . '%')
                            ->orWhere('study_begin', 'LIKE', '%' . $search . '%')
                            ->orWhere('study_ends', 'LIKE', '%' . $search . '%')
                            ->paginate(15);

        return view('student.list')->with('students', $students);                            
    }


    /**
     * Validate the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Request  $data
     */

    protected function validateData(Request $request){

        $data = $request->validate([
            'name' => 'required|max:100',
            'rg' => 'required|max:30',
            'voter_id' => 'required|max:30',
            'phone' => 'required|celular_com_ddd|max:30',
            'address' => 'required|max:150',
            'course' => 'required|ma  x:150',
            'institution' => 'required|max:150',
            'semester' => 'required|numeric',
            'city' => 'required|max:150',
            'period' => 'required|max:30',
            'days' => 'required|max:100',
            'study_begin' => 'required|date',
            'study_ends' => 'required|date',
            'profession' => 'max:100',
            'enterprise' => 'max:100',
        ]);

        return $data;
    }

    protected function validatePhoto(Request $request){

        $data = $request->validate([
            'photo' => 'required|image|max:5000',
        ]);

        return $data;
    }


    /**
     * Search the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request)
    {
  
        $cities = DB::table('students')->select('city')->groupBy('city')->get();
        $institutions = DB::table('students')->select('institution')->groupBy('institution')->get();
        $students = $this->getStudentsReport($request); 
                         

        return view('student.report')->with('cities', $cities)
                                     ->with('institutions', $institutions)
                                     ->with('students', $students)
                                     ->with('city', $request->city)
                                     ->with('year', $request->year)
                                     ->with('institution', $request->institution);               
    }

    /**
     * Search the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reportPDF(Request $request)
    {
  
        $city = $request->city;
        $institution = $request->institution;
        $year = $request->year;
        $students = $this->getStudentsReport($request);  
                         
       return \PDF::loadView('student.reportpdf', compact('city', 'institution', 'year', 'students'))
       ->stream();
                
    }

    /**
     * Search the students from storage to the report.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getStudentsReport(Request $request)
    {
  
        $students = Student::where('city', 'LIKE', '%' . $request->city . '%')
                            ->where('study_begin', 'LIKE', '%' . $request->year . '%')
                            ->where('institution', 'LIKE', '%' . $request->institution . '%')
                            ->orderBy('name')->get();   
                         
        return $students;             
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function getIdCard(Student $student)
    {

        return view('student.idcard')->with('s', $student);
    }


}
