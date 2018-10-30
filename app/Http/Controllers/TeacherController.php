<?php

namespace Laravel\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('teacher.teacher_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = new \Laravel\teacher;
            
            $blog->tname = $request->get('tname');
            $blog->email = $request->get('email');
            $blog->mobile_no = $request->get('mobile_no');
            $blog->university = $request->get('university');
            $blog->result = $request->get('result');
            $blog->subject = $request->get('subject');
            $blog->salary = $request->get('salary');
            $blog->time = $request->get('time');
            $blog->day = $request->get('day');
            $blog->area = $request->get('area');
			$table->area = $request->get('image'); 
            // echo "<pre>";
            //     print "$blog";
            // echo "</pre>";
           $blog->save();
            // $request->session()->flash('alert-success', 'Comments has been Submitted!');        
            // return redirect('/')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //print "hellow";

        $blogs = \Laravel\teacher::find($id);
        return view('admin.teacher_show',compact('blogs','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
