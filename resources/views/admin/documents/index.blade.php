@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">
      @lang('quickadmin.documents.title')
      <small>Received</small>
    </h3>

    @can('crm_document_create')
    <p>
        <a href="{{ route('admin.crm_documents.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($received_documents) > 0 ? 'datatable' : '' }} dt-select ">
                <thead>
                    <tr>
                        {{-- @can('crm_document_delete') --}}
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        {{-- @endcan --}}

                        <th>@lang('quickadmin.documents.fields.title')</th>
                        {{-- <th>@lang('quickadmin.documents.fields.description')</th> --}}
                        <th>@lang('quickadmin.documents.fields.sender')</th>
                        <th>@lang('quickadmin.documents.fields.file')</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($received_documents) > 0)
                        @foreach ($received_documents as $crm_document)
                            <tr data-entry-id="{{ $crm_document->id }}">
                                {{-- @can('crm_document_delete') --}}
                                    <td></td>
                                {{-- @endcan --}}

                                <td field-key='title'>{{ $crm_document->title }}</td>
                                {{-- <td field-key='description'></td> --}}
                                <td field-key='sender_id'>{{ $crm_document->name }}</td>
                                <td field-key='file'>{{ $crm_document->file }}</td>

                                <td field-key='file'>
                                  @if($crm_document->file)
                                    <a href="{{ asset(env('UPLOAD_PATH').'files/' . $crm_document->file) }}" target="_blank">
                                      <i class="fas fa-file-download"></i>
                                      Download
                                    </a>
                                  @endif
                                </td>
                                <td>
                                    {{-- @can('crm_document_view') --}}
                                    <a href="{{ route('admin.documents.show',[$crm_document->id]) }}" class="btn btn-xs btn-primary">
                                      @lang('quickadmin.qa_view')
                                    </a>
                                    {{-- @endcan --}}
                                    {{-- @can('crm_document_edit') --}}
                                    <a href="{{ route('admin.comments.write_comment',[$crm_document->id, $crm_document->sender_id]) }}" class="btn btn-xs btn-info">
                                      @lang('quickadmin.dev_comment_document')
                                    </a>
                                    {!! Form::hidden('sender_id_hidden', $crm_document->sender_id) !!}
                                    {{-- @endcan --}}
                                    {{-- @can('crm_document_delete') --}}
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.documents.destroy', $crm_document->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    {{-- @endcan --}}
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        @can('crm_document_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.crm_documents.mass_destroy') }}';
        @endcan

    </script>
@endsection
