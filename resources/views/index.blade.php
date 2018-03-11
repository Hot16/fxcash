@extends('layouts.app')

@section('content')
    <div class="panel-heading">Форма загрузки/удаления</div>

    <div class="panel-body table-responsive">
        <router-view name="imagesIndex"></router-view>
        <router-view></router-view>
    </div>

@endsection