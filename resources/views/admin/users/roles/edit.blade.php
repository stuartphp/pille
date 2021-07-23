@extends('layouts.app')
@section('content')
    <div class="container mt-2 card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">{{ __('Roles') }}</div>
                <div class="col-md-1"><a href="#" onclick="window.location.href='{{ route('users.roles.create') }}'"><span
                            class="h5">+</span></a></div>
                <div class="col-md-5"></div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('users.roles.update', [$role->id]) }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="PUT" />
                <div class="row mb-2">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ $role->name }}"
                        class="form-control form-control-sm @error('name') is-invalid @enderror" />
                    @error('name')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="row mb-2">
                    <label>Permissions</label>
                    <div class="container">
                        <div class="row">
                            @foreach ($permissions as $id => $permission)
                                <div class="col-3 mb-2">
                                    <label for="{{ $id }}">
                                        <input type="checkbox" id="{{ $id }}" name="permissions[]"
                                            {{ in_array($id, old('permissions', [])) || (isset($role) && $role->permissions->contains($id)) ? 'checked' : '' }}
                                            value="{{ $id }}" />
                                        <span class="ml-2">{{ ucwords(str_replace('_', ' ', $permission)) }}</span>
                                    </label>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <button type="submit" class="btn btn-outline-primary btn-sm">Save changes</button>
                </div>
            </form>
        </div>
    </div>
@endsection