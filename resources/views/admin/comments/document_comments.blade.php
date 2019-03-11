@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')
@section('content')
    <h3 class="page-title">
      @lang('quickadmin.documents.title')
      <small>Comments</small>
    </h3>
    <div class="panel panel-default">
        <div class="panel-heading">
            Document
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                <tr>
                  <th>Title</th>
                  <th>Sender</th>
                  <th>File</th>
                  <th>Description</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($document as $key => $value)
                  <tr>
                    <td>{{$value->title}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->file}}</td>
                    <td>{{$value->description}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="row">
            <hr>
              @can ('write_comment')
                <div class="col-xs-12 table-responsive">
                  {!! Form::open(['method' => 'POST', 'route' => ['admin.comments.store']]) !!}
                    {!! Form::textarea('comment', old('comment'), ['class' => 'form-control', 'placeholder' => 'Write your comment...', 'rows' => '3'])!!}
                    {!! Form::submit('Comment', ['class' => 'btn btn-xs btn-success'])!!}
                    {!! Form::hidden('document_id', $value->id) !!}
                    {!! Form::hidden('user_reg_no', $value->sender_id) !!}
                    {!! Form::hidden('accessor', $accessor) !!}
                  {!! Form::close() !!}
                </div>
              @endcan
            @endforeach
          </div>
          <br><br>
          <div class="row">
              <div class="col-xs-12">
               <div class="box box-primary">
                 <div class="box-header with-border">
                   <h3 class="box-title">Comments</h3>
                 </div>
                 <div class="box-body no-padding">
                   <div class="table-responsive mailbox-messages">
                     <table class="table table-hover table-striped">
                       <tbody>
                         @if ($comments->count() > 0)
                           @foreach ($comments as $key => $value)
                             <tr>
                               <td><input type="checkbox"></td>
                               <td class="mailbox-name"><a href="read-mail.html">{{$value->name}}</a></td>
                               <td class="mailbox-subject">{{$value->comment}}</td>
                               <td class="mailbox-attachment"></td>
                               <td class="mailbox-date">{{$value->created_at}}</td>
                             </tr>
                           @endforeach
                         @else
                           <p>No comment yet</p>
                         @endif
                       </tbody>
                     </table>
                   </div>
                 </div>
             </div>
            </div>
          </div>
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
