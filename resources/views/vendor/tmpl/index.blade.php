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
                    <li class="breadcrumb-item active">Roles</li>
                </ol>
            </div>            
        </div>
    </div>
</div>     
<!-- end page title --> 
    @livewire('admin.users.roles')
@endsection