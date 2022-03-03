<?php

namespace App\Http\Controllers\University;

use App\Mail\SentMail;
use App\Events\SendMail;
use App\Models\University;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreUniversityRequest;

class UniversityConrtoller extends Controller
{
    protected $university;
    /**
     * Constructor binding
     */
    function __construct(University $university) {
        $this->model = $university;
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
            $universities = $this->model->orderBy('id', 'desc')->paginate(5);
            return view($this->view . 'university.index', compact('universities'));

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
            return view($this->view . 'university.create');

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
    public function store(StoreUniversityRequest $request)
    {
        try {

            $file = request()->logo;

            if ($file) {
                $fileName      = $file->getClientOriginalName();
                $fileExtension = $file->getClientOriginalExtension();
                $minifiedName  = md5(uniqid().File::extension($fileName)) . '.' . $fileExtension;
                $filePath      = 'attachments'. '/' . $minifiedName;

                Storage::disk('public')->put($filePath, file_get_contents($file));
            }

            $data = [
                'name'    => request()->name,
                'email'   => request()->email,
                'logo'    => $filePath,
                'website' => request()->website,
            ];
            $university = $this->model->create($data);
            
            if(!empty($university)) {

            /* Send mail */
            $email = 'bit.devesh2030@gmail.com';
            $mailData = [
                'subject' => 'Hello Dear,',
                'title' => 'Created a new university please check and verify.',
                'url' => 'https://matrixmarketers.com'
            ];
    
            $mailData =  Mail::to($email)->send(new SentMail($mailData));

            event(new SendMail($mailData));
        
                toastr()->success('University created successfull.');
            } else {
                toastr()->error('Something went wrong while creating university.');
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
            $university = $this->model->find($id);
            return view($this->view . 'university.edit', compact('university'));
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
            $file = request()->logo;

            if ($file) {
                $fileName      = $file->getClientOriginalName();
                $fileExtension = $file->getClientOriginalExtension();
                $minifiedName  = md5(uniqid().File::extension($fileName)) . '.' . $fileExtension;
                $filePath      = 'attachments'. '/' . $minifiedName;

                Storage::disk('public')->put($filePath, file_get_contents($file));
            } else {
                $filePath = $update->logo;  
            }

            $data = [
                'name'    => request()->name,
                'email'   => request()->email,
                'logo'    => $filePath,
                'website' => request()->website,
            ];

            $update->update($data);

            if(!empty($update)) {
                toastr()->success('University updated successfull.');
            } else {
                toastr()->error('Something went wrong while updating university.');
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
                toastr()->success('Deleted record successfull.');
            } else {
                toastr()->error('Something went wrong while deleting record.');
            }
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
