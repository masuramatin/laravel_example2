<?php

namespace Laravel\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\blog;
use DB;
class PagesController extends Controller
{
	public function index(){
		
        $title = 'This is our Home Page';
        //$title2 = \Laravel\blog::all();
		$title2=\Laravel\blog::paginate(3);
		$caty=\Laravel\catagory::all();
        return view('pages.index', compact('title','title2','caty'));
		
        //return view('pages.index')->with('title', $title);	
		}
	public function about(){
		$blogs = \Laravel\aboutus::find(1);
		
        //$title = '';
        return view('pages.about', compact('blogs'));
        //return view('pages.index')->with('title', $title);		
	}
	public function service() {
        $title = 'This is service page';
        return view('pages.service', compact('title'));
        //return view('pages.index')->with('title', $title);		
	}
	public function zin($id,$name,$taklu){
		print $id." ".$name." ".$taklu;	
		
	}
	public function aboutus_display(){
		$blogs = \Laravel\aboutus::find(1);
        return view('pages.about_display', compact('blogs'));		
	}
	public function aboutus_update(Request $request,$id){
		$blogs = \Laravel\aboutus::find(1);
		print $blogs->content = $request->get('content');
		$blogs->save();
		return redirect('/aboutus_display')->with('success', 'Information has been added');		
		
		
	}
	//display content from content table
	public function content_display(){
        $title2 = 'Hello';
        return view('pages.index', compact('title2'));
		
			
	}
	
		public function details($id){
		$blogs = \Laravel\blog::find($id);
		$post = DB::table('comments')->where('post_id', $id)->get();
		
		return view('pages.details',compact('blogs','id','post'));	
		}
		
		public function details_store(Request $request){
			
			$blog = new \Laravel\comment;
			
			$blog->description = $request->get('description');
			$blog->userid = 1;
			$blog->status = 1;
			$blog->post_id = $request->get('id');
			$blog->save();
			$request->session()->flash('alert-success', 'Comments has been Submitted!');		
			return redirect('/')->with('success', 'Information has been added');			
		}
		
		public function comment_display(){
			
			$blogs=\Laravel\comment::paginate(3);
        	return view('admin.comment_dis', compact('blogs'));
			
			
		}
		public function comment_edit($id){
		$blogs = \Laravel\comment::find($id);
		return view('admin.comment_edit',compact('blogs','id'));			
		}
		
		public function comment_update(Request $request, $id){
		$blog =  \Laravel\comment::find($id);
		
		
		$blog->userid = $request->get('userid');
		$blog->post_id = $request->get('post_id');
		$blog->description = $request->get('description');
		$blog->status = $request->get('status');
		
		$blog->save();
		return redirect('/comment_display')->with('success', 'Information has been added');		
		
		}
		
    public function comment_destroy($id)
    {
        //
        $mahabub = \Laravel\comment::find($id);
        $mahabub->delete();
        return redirect('/comment_display');		
    }
	
	public function search_rs_front(Request $request){
		$products=DB::table('blogs')->
		where('subject', $request->search)->get();
		$output="<div align='left'><h4>Search Result</h4><hr />";
		if(count($products)>0)
		{

			foreach ($products as $key => $product) 
			{
				$output.='<tr>'.
				'<h1>'.$product->subject.'</h1>'.
				'<h5>Published At:<b>'.$product->created_at.'</b></h5>'.
				'<div class="row">
	<div class="col-md-10 col-sm-10">'.
	$product->description.'</div><div class="col-md-2 col-sm-2"><img src="http://127.0.0.1:8000/img/'.$product->name.'" alt="Lights" height="100px" width="150px"></div>'.
	
				'</div> ';
			}
			$output .="</div><hr />";
			return Response($output);
	  	 }
		 else {
			$output .="No result Found";
			return Response($output);			 		 }	
	}
	
	public function cat_show($id){
		
		$blogs = \Laravel\blog::find($id);
		$caty=\Laravel\catagory::all();
		
		return view('pages.cat_show',compact('blogs','caty'));
		
	}
}
