@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.documents.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.documents.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', trans('quickadmin.documents.fields.title').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::hidden('sender_id', $loged_in_reg_number) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description', trans('quickadmin.documents.fields.description'), ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', old('description'), ['class' => 'form-control', 'placeholder' => '', 'required' => '', 'rows' => 2, 'cols' => 20]) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('receiver_id', trans('quickadmin.documents.fields.send_to').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('receiver_id', $users, old('receiver_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('receiver_id'))
                        <p class="help-block">
                            {{ $errors->first('receiver_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
               <div class="col-xs-12 form-group">
                   {!! Form::label('file', trans('quickadmin.documents.fields.file').'*', ['class' => 'control-label']) !!}
                   {!! Form::hidden('file', old('file')) !!}
                   {!! Form::file('file', ['class' => 'form-control', 'required' => '']) !!}
                   {!! Form::hidden('file_max_size', 10240) !!}
                   <p class="help-block"></p>
                   @if($errors->has('file'))
                       <p class="help-block">
                           {{ $errors->first('file') }}
                       </p>
                   @endif
               </div>
           </div>


        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
@stop
