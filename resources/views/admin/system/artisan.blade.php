@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Artisan</div>
        <div class="card-body">
            <div class="list-group">
                <a href="{{ route('sysadmin.artisan-command', ['val'=>'dump-autoload']) }}" class="list-group-item list-group-item-action" aria-current="true">
                    Dump Auto Load
                </a>
                <a href="{{ route('sysadmin.artisan-command', ['val'=>'cache:clear']) }}" class="list-group-item list-group-item-action">Clear Cache</a>
                <a href="{{ route('sysadmin.artisan-command', ['val'=>'route:list']) }}" class="list-group-item list-group-item-action">Route List</a>
                <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">A disabled link item</a>
              </div>
        </div>
    </div>
</div>
@endsection
