<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return DB::table('comments')
            ->where('post_id',$id)
            ->leftJoin('users', 'users.id', '=', 'comments.user_id')
            ->select('comments.*', 'name', 'comment')  //specify the return data
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required',
            'post_id' => 'required',
            'user_id' => 'required',
        ]);
        //returns new comment data and user data
        $comment = Comment::create($request->all());
        return DB::table('comments')
                ->where('comments.id', $comment->id)
                ->join('users', 'users.id', '=', 'comments.user_id')  
                ->select('comments.*', 'name', 'comment')  //specify the return data
                ->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        return Comment::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $p_id, $id)
    {
        $post = Comment::find($id);
        $post->update($request->all());
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($p_id, $id)
    {
        return Comment::destroy($id);

    }
}
