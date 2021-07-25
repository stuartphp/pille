<div class="row mb-2">
    <label>Nappi Code</label>
    <input type="text" wire:model.defer="item.nappi_code"
        class="form-control form-control-sm @error('item.nappi_code') is-invalid @enderror" />
    @error('item.nappi_code')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="row mb-2">
    <label>RegNo</label>
    <input type="text" wire:model.defer="item.regno"
        class="form-control form-control-sm @error('item.regno') is-invalid @enderror" />
    @error('item.regno')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror
</div>
