@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10">
          <section class="content-header">
            <h1>
              @lang('quickadmin.qa_dashboard')
              <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">@lang('quickadmin.qa_dashboard')</li>
            </ol>
          </section>
        </div>
    </div>

    <hr>

    <div class="row">
      <div class="col-md-4">
        <div class="box box-solid">
          <!-- /.box-header -->
          <div class="list-group">
            <a href="#" class="list-group-item active">
              <h4 class="box-title">Activity</h4>
            </a>
            <a class="list-group-item" href="{{ route('admin.documents.create') }}">
              @lang('quickadmin.dev_download_document')
            </a>
            <a class="list-group-item" href="{{ route('admin.documents.create') }}">@lang('quickadmin.dev_upload_document')</a>
            <a class="list-group-item" href="{{ route('admin.documents.index')}}">
              @if ($received_documents->count() > 0)
                <span class="badge">{{$received_documents->count()}}</span>
              @else
                <span class="badge">0</span>
              @endif
              @lang('quickadmin.documents.dev_received_document')
            </a>
            <a class="list-group-item" href="{{ url('/sent_documents')}}">
              @if ($sent_documents->count() > 0)
                <span class="badge">{{$sent_documents->count()}}</span>
              @else
                <span class="badge">0</span>
              @endif
              @lang('quickadmin.documents.dev_sent_document')
            </a>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
    </div>
@endsection
