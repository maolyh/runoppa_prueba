@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                {{$title}}</div>

                <div class="panel-body">
                @if (isset($isEditable))
                    @if ($isEditable)
                        @include('admin.edit')
                    @else
                    @include('admin.form')
                    @include('admin.table')
                    @endif
                @else
                    @include('admin.form')
                    @include('admin.table')   
                @endif
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
