<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Document;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

  public function writeComment($document_id, $user_reg_no){
    $accessor = Auth::user()->reg_no;
    $comments = DB::table("comments")->select("comments.*", "users.name")
    ->join("users", "comments.accessor", "=", "users.reg_no")
    ->where("comments.document_id", "=", $document_id)->get();

    $document = DB::table("documents")
    ->select("documents.*", "users.name")
    ->join("users", "documents.sender_id", "=", "users.reg_no")
    ->where("documents.id", "=", $document_id)->get();
    //return $document;
    return view('Admin.comments.document_comments', compact('document', 'comments', 'accessor'));
  }
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // $comment              = new Comment;
      // $comment->document_id = $request->document_id;
      // $comment->user_reg_no = $request->user_reg_no;
      // $document->comment    = $request->input('comment');
      // $document->save();
      Comment::create($request->all());
      return redirect(route('admin.comments.write_comment', [$request->document_id, $request->user_reg_no]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
