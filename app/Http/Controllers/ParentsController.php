<?php

namespace Laravel\Http\Controllers;

use Illuminate\Http\Request;

class ParentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //
		//$blogs = blog::all();
		$blogs=\Laravel\parents::paginate(5);
		//$blogs = blog::where('name','Hotovaga Josh')->get();
		//$blogs = DB::select("select * from blogs");
		
		//$blogs = blog::orderBy('id','asc')->get();
		//$blogs = blog::orderBy('id','desc')->take(2)->get();		
		return view('parents.post',compact('blogs'));		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function parents_create ()
    {
        //
		$blogs=\Laravel\parents::all();
		return view('parents.parents_create',compact('blogs'));
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function parents_store(Request $request)
    {
        //
		$blog = new \Laravel\parents;
		$blog->name = $request->get('name');
		$blog->clocation = $request->get('clocation');
		$blog->house_no = $request->get('house_no');
		$blog->road_no = $request->get('road_no');
		$blog->village = $request->get('village');
		$blog->email = $request->get('email');
		$blog->mobile = $request->get('mobile');
		$blog->subject = $request->get('subject');
		$blog->qualification = $request->get('qualification');
		$blog->rang = $request->get('rang');
		$blog->time = $request->get('time');
		$blog->day = $request->get('day');			
		$blog->save();
		return redirect('/parents')->with('success', 'Information has been added');		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function parents_show($id)
    {
        //
		$blogs = \Laravel\parents::find($id);
		return view('parents.parents_show',compact('blogs','id'));  
				
		
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function parents_edit($id)
    {
        //
		$blogs = \Laravel\parents::find($id);
		return view('parents.parents_edit',compact('blogs','id'));	
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function parents_update(Request $request, $id)
    {
        //
		$blog =  \Laravel\parents::find($id);		
		$blog->name = $request->get('name');
		$blog->clocation = $request->get('clocation');
		$blog->house_no = $request->get('house_no');
		$blog->road_no = $request->get('road_no');
		$blog->village = $request->get('village');
		$blog->email = $request->get('email');
		$blog->mobile = $request->get('mobile');
		$blog->subject = $request->get('subject');
		$blog->qualification = $request->get('qualification');
		$blog->rang = $request->get('rang');
		$blog->time = $request->get('time');
		$blog->day = $request->get('day');
		$blog->save();
		return redirect('/parents')->with('success', 'Information has been added');	
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
		
		$del = \Laravel\parents::find($id);
        $del->delete();
        return redirect('/parents');	
    }
	
	
	//for teacher controller......
	public function teacher_create ()
    {
        //
		$blogs=\Laravel\parents::all();
		return view('teacher.teacher_create',compact('blogs'));
		
    }
}
