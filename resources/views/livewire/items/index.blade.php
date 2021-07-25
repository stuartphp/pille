<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">{{ __('Items') }}</div>
                <div class="col-md-1">
                    @if (count(array_intersect(session()->get('grant'), ['items_create']))==1)
                    <a href="#" wire:click="$emitTo('items.index-child', 'showCreateForm')"><span class="h5">+</span></a>
                    @endif
                </div>
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
                    <th><a href="#" wire:click="sortBy('name')">{{ __('Name') }} <x-icon-sort sortField="name" :sort-by="$sortBy" :sort-asc="$sortAsc" /></a></th>
                    <th><a href="#" wire:click="sortBy('email')">{{ __('Category') }} <x-icon-sort sortField="email" :sort-by="$sortBy" :sort-asc="$sortAsc" /></a></th>
                    <th>Pack Size</th>
                    <th>Cost</th>
                    <th>Retail</th>
                    <th class="col-1">{{ __('Action') }}</th>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->category }}</td>
                            <td>{{ $item->pack_size }}</td>
                            <td>{{ number_format($item->cost_price/100,2) }}</td>
                            <td>{{ number_format(($item->cost_price+$item->dispensing_fee+$item->add_on_fee)/100,2) }}</td>
                            <td class="text-right">
                                <div class="btn-group dropleft">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <x-icon-three-dots-vertical/>
                                    </a>
                                    <div class="dropdown-menu">

                                        @if (count(array_intersect(session()->get('grant'), ['SU','users_update']))==1)
                                        <a class="dropdown-item" href="#" wire:click="$emitTo('items.index-child', 'showEditForm', {{ $item->id }})">Edit</a>
                                        @endif
                                        @if (count(array_intersect(session()->get('grant'), ['SU','users_delete']))==1)
                                        <a class="dropdown-item" href="#" wire:click="$emitTo('items.index-child', 'showDeleteForm',  {{$item->id}});">Delete</a>
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
        </div>
    </div>
    @livewire('items.index-child')
</div>
