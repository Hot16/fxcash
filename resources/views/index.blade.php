@extends('layouts.app')

@section('content')

    <div class="panel-heading">Форма загрузки/удаления</div>
    <div id="app">
    <div class="panel-body table-responsive">
        <router-view name="ImagesIndex"></router-view>
        <router-view></router-view>
    </div>
    </div>
@endsection