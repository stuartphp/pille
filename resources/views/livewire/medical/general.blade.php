<div class="container">
    <div class="card">
        <div class="card-header">
        <div class="row">
            <div class="col-md-6">Medical / Herbal</div>
            <div class="col-md-1">

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
        @foreach ($data as $item )
            <div class="card">
                {{ $item->name }}
            </div>
        @endforeach
        {{ $data->links() }}
    </div>
    </div>

</div>
</div>
