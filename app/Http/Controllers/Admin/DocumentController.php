<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\StoreDocumentsRequest;
use App\Repositories\RepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Document;
use App\User;
use Auth;
use App\Http\Controllers\Traits\FileUploadTrait;

class DocumentController extends Controller
{

  protected $interface;

    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(RepositoryInterface $interface){
       $this->interface = $interface;
     }


    public function index()
    {

      $received_documents =  $this->interface->getReceivedDocument();
      return view('admin.documents.index', compact('received_documents'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if (! Gate::allows('role_create')) {
          return abort(401);
      }

      $loged_in_reg_number = Auth::user()->reg_no;

      $users = \App\User::get()->pluck('name', 'reg_no')->prepend(trans('quickadmin.qa_please_select'), '');

      return view('admin.documents.create', compact('users', 'loged_in_reg_number'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumentsRequest $request)
    {
      if (! Gate::allows('role_create')) {
          return abort(401);
      }

      /**check You can't send document to yourself
      */
      if ($request->receiver_id == Auth::user()->reg_no) {
         return redirect()->route('admin.documents.create')->with('message', 'You can not send document to yourself');
      }

      $request = $this->saveFiles($request);

      $documents = Document::create($request->all());

      return redirect()->route('admin.documents.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = $this->interface->showDocument($id);
        return view('Admin.documents.show', compact('document'));
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
