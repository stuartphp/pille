<div class="">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6"><span class="fs-4">Users</span></div>
                <div class="col-md-1">
                    @if (count(array_intersect(session()->get('grant'), ['SU','users_create']))==1)
                    <a href="#" wire:click="$emitTo('admin.users.users-child', 'showCreateForm')"><span class="fs-4">+</span></a>
                    @endif
                </div>
                <div class="col-md-1">
                    <x-page-size/>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control form-control-sm" wire:model.debounce.300ms="searchTerm" placeholder="Search" aria-label="Search"/></div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th><a href="#" wire:click="sortBy('name')">{{ __('Name') }} <x-icon-sort sortField="name" :sort-by="$sortBy" :sort-asc="$sortAsc" /></a></th>
                    <th><a href="#" wire:click="sortBy('email')">{{ __('Email') }} <x-icon-sort sortField="email" :sort-by="$sortBy" :sort-asc="$sortAsc" /></a></th>
                    <th>{{ __('Verified') }}</th>
                    <th>{{ __('Role') }}</th>
                    <th class="col-1">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->email_verified_at }}</td>
                            <td>
                                @foreach ($item->roles as $role )
                                    <span>{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td class="text-end">
                                <div class="btn-group dropstart">
                                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        <x-icon-three-dots-vertical/>
                                    </a>
                                    <div class="dropdown-menu">

                                        @if (count(array_intersect(session()->get('grant'), ['SU','users_update']))==1)
                                        <a class="dropdown-item" href="#" wire:click="$emitTo('admin.users.users-child', 'showEditForm', {{ $item->id }})">Edit</a>
                                        @endif
                                        @if (count(array_intersect(session()->get('grant'), ['SU','users_delete']))==1)
                                        <a class="dropdown-item" href="#" wire:click="$emitTo('admin.users.users-child', 'showDeleteForm',  {{$item->id}});">Delete</a>
                                        @endif

                                    </div>
                                  </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5">No records found</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div> <!-- end table-responsive-->

        </div>
    </div> <!-- end card -->
    <!-- end page title -->
    @livewire('admin.users.users-child')
</div>
