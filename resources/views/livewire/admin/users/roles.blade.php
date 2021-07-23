<div class="container-sm mt-2">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">{{ __('Roles') }}</div>
                <div class="col-md-1"><a href="#" onclick="window.location.href='{{ route('users.roles.create') }}'"><span class="h5">+</span></a></div>
                <div class="col-md-1">
                    <x-page-size/>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control form-control-sm" wire:model.debounce.300ms="searchTerm" placeholder="Search" aria-label="Search"/>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="col-2">Title</th>
                        <th>Permissions</th>
                        <th class="col-1">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item )
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>
                                @foreach ($item->permissions as $permission )
                                <span class="badge bg-primary">{{ ucwords(str_replace('_', ' ', $permission->title)) }}</span>
                                @endforeach
                            </td>
                            <td class="text-right">
                                <div class="btn-group dropleft">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                      <x-icon-three-dots-vertical/>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('users.roles.edit', [$item->id]) }}">Edit</a>
                                        <a class="dropdown-item" href="#" >Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                    <tr><td colspan="3">No Records found</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
