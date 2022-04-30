<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    // all jobs
    public function index(){
        return view('job.index',[
            'jobs' => Jobs::latest()->filter(request(['tag',
            'search']))->paginate(4)
        ]);
    }

    //single jobs
    public function show(Jobs $job){
        return view('job.show',[
            'heading' => 'Find Job',
            'job' => $job
        ]);
    }

    //create jobs
    public function create(){
        return view('job.create');
    }

    //store jobs data
    public function store(Request $request){
        $formField = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('jobs','company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')){
            $formField['logo'] = $request->file('logo')->store('logos','public');
        }

        $formField['user_id'] = auth()->id();

        Jobs::create($formField);
        return redirect('/')->with('message','Job Created Successfully');
    }
    // show edit form
    public function edit(Jobs $job){
        return view('job.edit',[
            'job' => $job
        ]); 
    }

    public function update(Request $request, Jobs $job){

        if($job->user_id != auth()->id()){
            abort(403,'Unauthorized action');
        }

        $formField = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')){
            $formField['logo'] = $request->file('logo')->store('logos','public');
        }

        $job->update($formField);

        return back()->with('message','Job updated Successfully');
    }

    public function delete(Jobs $job){
        if($job->user_id != auth()->id()){
            abort(403,'Unauthorized action');
        }
        $job->delete();
        return redirect('/')->with('message','Job deleted Successfully');
    }

    public function manage(){
        return view('job.manage',['jobs' => auth()->user()->jobs()->get()]);
    }
}
