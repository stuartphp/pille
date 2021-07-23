<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">{{ __('Orders') }}</div>
                <div class="col-md-1"><a href="{{ route('orders.create') }}"><span class="h5">+</span></a></div>
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
                        <th>Order Number</th>
                        <th>Total Items</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th class="col-1 text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item )
                        <tr>
                            <td>{{ $item->order_number }}</td>
                            <td>{{ $item->total_items }}</td>
                            <td>{{ $item->total_due }}</td>
                            <td>{{ $item->status }}</td>
                            <td></td>
                        </tr>
                    @empty
                        <tr><td colspan="5">No records found</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
