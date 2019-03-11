<?php
namespace App\Repositories;

use App\Document;
use App\Repositories\RepositoryInterface;
use Illuminate\Support\Facades\Auth;
use DB;

/**
 *
 */
class Repository implements RepositoryInterface {

  // get received documents
  public function getReceivedDocument(){
    $receiver_id = Auth::user()->reg_no;

    $received_documents = DB::table("documents")->select("documents.*", "users.name")
    ->join("users", "documents.sender_id", "=", "users.reg_no")
    ->where("receiver_id", "=", $receiver_id)->get();

    return $received_documents;
  }

  //get sent documents by the users
  public function getSentDocument(){
    $sender_id = Auth::user()->reg_no;

    $sent_documents = DB::table("documents")->select("documents.*", "users.name")
    ->join("users", "documents.sender_id", "=", "users.reg_no")
    ->where("sender_id", "=", $sender_id)->get();

    return $sent_documents;
  }

  public function showDocument($id){
    $document = Document::find($id);
    return $document;
  }

}


 ?>
