@extends('crud.crud_master')
@section('content')
@include('crud.components.header')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col1">
                @include('crud.main.sections.table')
            </div>
            <div class="col2">
                @include('crud.main.sections.crud_form')
            </div>
        </div>
    </div>
</div>
@endsection
