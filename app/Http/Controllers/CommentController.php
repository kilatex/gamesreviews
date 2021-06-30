<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
class CommentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function upload(Request $request){

        $validate = $this->validate($request,[
            'image_id' => 'integer|required',
            'content' => 'string|required'
        ]);

        // GET DATA
        $user = \Auth::user();
        $image_id = $request->input('image_id');
        $content = $request->input('content');

        // OBJECT

        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->image_id = $image_id;
        $comment->content = $content;

        //SAVE
        $comment->save();

        return redirect()->route('image.detail',['id' => $comment->image_id])
                        ->with([
                            'message' => 'Your Comment has been posted'
                        ]);
    }

    public function delete($id){
        // GET USER IDENTIFIED
        $user =  \Auth::user();

        //GET COMMENT OBJECT
        $comment = Comment::find($id);

        //check if I'm the one who commented or the one who posted the image
        if($user && ( $comment->user_id == $user->id || $comment->image->user_id == $user->id) ){
            $comment->delete();
            
            return redirect()->route('image.detail',['id' => $comment->image->id])
                            ->with([
                                'message' => 'Comment deleted successfully'
            ]);

        }else{
 
            return redirect()->route('image.detail',['id' => $comment->image->id])
                            ->with([
                                'message' => 'The Comment was not deleted'
            ]);
        }

    }
}
