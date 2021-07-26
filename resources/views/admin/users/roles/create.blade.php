@extends('layouts.admin')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Roles</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">User Management</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.roles.index') }}">Roles</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </div>            
        </div>
    </div>
</div>  
<!-- end page title -->
<div class="">
    <div class="card">
    <div class="card-body"><div class="row">
            <div class="col-md-6"><span class="fs-4">{{ __('Roles') }}</span> </div>
            <div class="col-md-1"><a href="#" onclick="window.location.href='{{ route('users.roles.create') }}'"><span class="fs-4">+</span></a></div>
            <div class="col-md-5"></div>
        </div>
        <form action="{{ route('users.roles.store') }}" method="POST">
            @csrf
            <input type="hidden" name="company_id" value="{{ session()->get('company_id') }}"/>
            <div class="row mb-2">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control form-control-sm @error('name') is-invalid @enderror" />
                @error('name')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="row mb-2">
                <label class="form-label">Permissions</label>
                <div class="container">
                    <div class="row">
                @foreach ($permissions as $id => $permission )
                <div class="col-3 mb-2">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="{{ $id }}" value="{{ $id }}" name="permissions[]">
                        <label class="form-check-label" for="{{ $id }}">{{ ucwords(str_replace('_', ' ',$permission)) }}</label>
                    </div>
                </div>

                @endforeach
            </div></div>
                </div>
            <div class="row mb-2">
                <button type="submit" class="btn btn-outline-primary btn-sm">Save</button>
            </div>
        </form>
    </div></div>
</div>
@endsection
