<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use DB;
class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all(); //fetch all products from DB
        return view('student.list', ['students' => $students]);
    }

    public function create(){
        $students = Student::all(); //fetch all products from DB
        return view('student.add', ['students' => $students]);
    }
    public function store(Request $req){
        $validated = $req->validate([
            'fullname' => ['required'],
            'birthday' => ['required'],
            'address' => ['required'],
            
        ]);
     
        $name = $req->name;
        $birth = $req->birth;
        $address = $req->address;
        $newPost = Student::create([
            'fullname' =>  $name,
            'birthday'=> $birth,
            'address' =>  $address,
        ]);
        
        return redirect('/student');

    }

    public function get_student_by_id($id){
        $student = Student::find($id);
        return view('student.detail', ['student' => $student]);
    }
    public function edit($id)
    {
        $student = Student::find($id);
        return view('student.edit', ['student' => $student]);
    }
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->fullname = $request->fullname;
        $student->birthday = $request->birthday;
        $student->address = $request->address;
        $student->update();
        return view('student.detail', ['student' => $student]);
    }
    public function delete($id){
        DB::delete('DELETE FROM students WHERE id = ?', [$id]);
        
         return redirect('/student');
    }

    public function validation(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);
    
    }
}
