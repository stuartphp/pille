<div class="">
    <div class="card">
        <div class="card-body"><div class="row">
                <div class="col-md-6"><span class="fs-4"> {{ __('Roles') }}</span></div>
                <div class="col-md-1"><a href="#" onclick="window.location.href='{{ route('users.roles.create') }}'"><span class="fs-4">+</span></a></div>
                <div class="col-md-1">
                    <x-page-size/>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control form-control-sm" wire:model.debounce.300ms="searchTerm" placeholder="Search" aria-label="Search"/>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
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
                            <td class="text-end">
                                <div class="btn-group dropstart">
                                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
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
