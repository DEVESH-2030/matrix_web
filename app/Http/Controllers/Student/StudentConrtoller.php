<?php

namespace App\Http\Controllers\Student;

use App\Models\Student;
use App\Models\University;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreStudentRequest;

class StudentConrtoller extends Controller
{
    protected $student;
    protected $university;
    function __construct(Student $student, University $university) {
        $this->model = $student;
        $this->university = $university;
        $this->view = '.frontend.';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $universities = $this->university->get();
            $students = $this->model->orderBy('id', 'desc')->paginate(5);
            return view($this->view . 'student.index', compact('students', 'universities'));

        } catch (\Throwable $th) {
           return $th->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $universities = $this->university->get();
            return view($this->view . 'student.create', compact('universities'));

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        try {
            $student = $this->model->create($request->all());
            if(!empty($student)) {
                toastr()->success('Student created successfull.');
            } else {
                toastr()->error('Something went wrong while creating student.');
            }
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $student = $this->model->find($id);
            $universities = $this->university->get();

            return view($this->view . 'student.edit', compact('student','universities'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $update = $this->model->find($id);

            $update->update($request->all());

            if(!empty($update)) {
                toastr()->success('Student updated successfull.');
            } else {
                toastr()->error('Something went wrong while updating student.');
            }
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $deleted = $this->model->find($id);
            if($deleted->delete()) {
                toastr()->success('Deleted resord successfull.');
            } else {
                toastr()->error('Something went wrong while deleting record.');
            }
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
