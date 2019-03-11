@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">
      @lang('quickadmin.documents.title')
      <small>View</small>
    </h3>

    @can('crm_document_create')
    <p>
        <a href="{{ route('admin.crm_documents.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-body" style="padding: 0px;">
             <iframe src="{{ asset(env('UPLOAD_PATH').'files/' . $document->file) }}" style="width: 100%; height: 500px"></iframe>
        </div>
    </div>
@stop
