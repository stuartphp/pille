<div class="row mb-2">
    <label>Title</label>
    <input type="text" wire:model.defer="item.title" class="form-control form-control-sm @error('item.title') is-invalid @enderror" />
    @error('item.title')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror
</div>
