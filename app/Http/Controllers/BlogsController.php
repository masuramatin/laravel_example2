<?php

namespace Laravel\Http\Controllers;
use Illuminate\Http\Request;
use Laravel\blog;
use DB;
use session;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		//$blogs = blog::all();
		$blogs=\Laravel\blog::paginate(5);
		//$blogs = blog::where('name','Hotovaga Josh')->get();
		//$blogs = DB::select("select * from blogs");
		
		//$blogs = blog::orderBy('id','asc')->get();
		//$blogs = blog::orderBy('id','desc')->take(2)->get();		
		return view('admin.post',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		$blogs=\Laravel\catagory::all();
		return view('admin.create',compact('blogs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
		$blog = new \Laravel\blog;
		$image = $request->file('name');
		$input['imagename'] = time().'.'.$image->getClientOriginalExtension();
		$destinationPath = public_path('/img');
    	$image->move($destinationPath, $input['imagename']);		
		$blog->category_id = $request->get('category_id');
		$blog->description = $request->get('description');
		$blog->subject = $request->get('subject');
		$blog->name = $input['imagename'];
		$blog->save();
		return redirect('/admin')->with('success', 'Information has been added');
		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
		$blogs = \Laravel\blog::find($id);
		return view('admin.show',compact('blogs','id'));    
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
		//print $id;
		
		$blogs = \Laravel\blog::find($id);
		//print $blogs->category_id;
		$caty=\Laravel\catagory::all();
		$cat_nam = \Laravel\catagory::find($blogs->category_id);
		return view('admin.edit',compact('blogs','id','caty','cat_nam'));
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
		$blog =  \Laravel\blog::find($id);
		
		$image = $request->file('name');
		$input['imagename'] = time().'.'.$image->getClientOriginalExtension();
		$destinationPath = public_path('/img');
    	$image->move($destinationPath, $input['imagename']);		
		$blog->category_id = $request->get('category_id');
		$blog->description = $request->get('description');
		$blog->subject = $request->get('subject');
		$blog->name = $input['imagename'];
		$blog->save();
		return redirect('/admin')->with('success', 'Information has been added');		
		
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
        $mahabub = \Laravel\blog::find($id);
        $mahabub->delete();
        return redirect('/admin');		
    }
	public function search_rs(Request $request){
		$products=DB::table('blogs')->
		where('subject', $request->search)->get();
		$output="<div align='left'><h4>Search Result</h4><hr />";
		
		if(count($products)>0)
		{
			$output .="<table class='table table-striped'>";	
			$output .="<th>Subject</th>";
			$output .="<th>Description</th>";
			$output .="<th>Image</th>";
	
			foreach ($products as $key => $product) 
			{
				$output.='<tr>'.
				'<td>'.$product->subject.'</td>'.
				'<td>'.$product->description.'</td>'.
				'<td>'.$product->name.'</td>'.
	
				'</tr>';
			}
			$output .="</table></div><hr />";
			return Response($output);
	  	 }
		 else {
			$output .="No result Found";
			return Response($output);			 
			 
		 }
		
		
	}

	public function user_display(){
		$blogs=\Laravel\User::paginate(5);
		return view('admin.user_display',compact('blogs'));
	}
	
	public function user_edit($id){
		$blogs = \Laravel\User::find($id);
		return view('admin.user_edit',compact('blogs','id'));		
	}
	
	public function user_update(Request $request, $id){
		
		$blog =  \Laravel\User::find($id);
		$blog->name = $request->get('name');
		$blog->email = $request->get('email');
		$blog->password = $request->get('password');
		$blog->type = $request->get('type');
		$blog->status = $request->get('status');		
		$blog->save();
		return redirect('/user_display')->with('success', 'Information has been added');		
		
	}
	public function cat_display(){
		$cats = \Laravel\catagory::all();
		
		return view('admin.cat_display',compact('cats'));
		
	}
	
    public function cat_create()
    {
        //
		return view('admin.cat_create');
    }
	
    public function cat_store(Request $request)
    {
        //
		$blog = new \Laravel\catagory;

		$blog->cat_name = $request->get('cat_name');
		
		
		$blog->save();
		return redirect('/cat_display')->with('success', 'Information has been added');
		
    }		
}
