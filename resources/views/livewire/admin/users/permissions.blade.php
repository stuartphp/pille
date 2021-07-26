<div class="mt-2">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">Permissions</div>
                <div class="col-md-1">
                    <a href="#" wire:click="$emitTo('admin.users.permissions-child', 'showCreateForm')"><span class="h5">+</span></a>
                </div>
                <div class="col-md-1"><x-page-size/></div>
                <div class="col-md-4">
                    <input type="text" class="form-control form-control-sm" wire:model.debounce.300ms="searchTerm" placeholder="Search" aria-label="Search"/>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th><a href="#" wire:click="sortBy('title')">
                            Title<x-icon-sort sortField='title' :sort-by="$sortBy" :sort-asc="$sortAsc"/>
                        </a>
                            </th>
                        <th class="col-1 text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td class="text-end">
                                <div class="btn-group dropstart">
                                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                      <x-icon-three-dots-vertical/>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#" wire:click="$emitTo('admin.users.permissions-child', 'showEditForm', {{ $item->id }})">Edit</a>
                                        <a class="dropdown-item" href="#" wire:click="$emitTo('admin.users.permissions-child', 'showDeleteForm',  {{$item->id}});">Delete</a>
                                    </div>
                                  </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="3">No Records Found</td></tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr><td colspan="3">
                        <div class="mt-1 justify-content-end">
                        {{ $data->links() }}
                        </div>

                        </td></tr>
                </tfoot>
            </table>
        </div>
    </div>
    @livewire('admin.users.permissions-child')
</div>
