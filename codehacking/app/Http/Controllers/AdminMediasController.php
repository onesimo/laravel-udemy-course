<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
class AdminMediasController extends Controller
{	

	public function index()
	{	

		$photos = Photo::all();

		return view('admin.media.index', compact('photos'));
	}

	public function create()
	{
		return view('admin.media.create');
	}
    
    public function store(Request $request)
    {
    	$file = $request->file('file');

    	$name = time() . $file->getClientOriginalName();
		$file->move('images',$name);

		Photo::create(['file'=>$name]); 
    }

    public function destroy($id)
    {
    	$photo = Photo::findOrFail($id);

    	if(file_exists(public_path() . $photo->file)){
    		unlink(public_path() . $photo->file);
    	}

    	$photo->delete();

    	//return redirect('/admin/media');
    }

    public function deleteMedia(Request $request)
    {   

      /*  if(isset($request->delete_single)){
            $photoId = array_search('Delete', $request->delete_single);
            $this->destroy($photoId);
            return redirect()->back();
        }*/

        if(isset($request->delete_all) && !empty($request->check_box_array)){

            $photos = Photo::find($request->check_box_array);
                  
            foreach ($photos as $photo) {
                
                $photo->delete();
            }
            return redirect()->back();

        }else{
            return redirect()->back();

        }


    }
}
