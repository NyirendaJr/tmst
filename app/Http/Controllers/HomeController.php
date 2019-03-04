<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\RepositoryInterface;

class HomeController extends Controller
{

  protected $interface;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RepositoryInterface $interface)
    {
        $this->middleware('auth');
        $this->interface = $interface;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sent_documents = $this->interface->getSentDocument();
        $received_documents = $this->interface->getReceivedDocument();
        return view('home', compact('received_documents', 'sent_documents'));
    }
}
