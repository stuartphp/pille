<div class="container-sm">
    <div class="card">
        <div class="card-header">{{ auth()->user()->name }}</div>
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-6">
                    <label>Name</label>
                    <input type="text" wire:model.defer="item.name" class="form-control form-control-sm @error('item.name') is-invalid @enderror" />
                    @error('item.name')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-6">
                    <label>Email</label>
                    <input type="email" wire:model.defer="item.email" class="form-control form-control-sm @error('item.email') is-invalid @enderror" />
                    @error('item.email')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-6">
                    <label>Change Password</label>
                    <input type="password" wire:model.defer="item.password" class="form-control form-control-sm @error('item.password') is-invalid @enderror" />
                    @error('item.password')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-6">
                    <label>Mobile Number</label>
                    <input type="text" wire:model.defer="item.mobile_number" class="form-control form-control-sm @error('item.mobile_number') is-invalid @enderror" />
                    @error('item.mobile_number')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-6">
                    <label>Date of Birth</label>
                    <input type="text" wire:model.defer="item.date_of_birth" class="form-control form-control-sm @error('item.date_of_birth') is-invalid @enderror" />
                    @error('item.date_of_birth')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-6">
                    <label>ID Number</label>
                    <input type="text" wire:model.defer="item.id_number" class="form-control form-control-sm @error('item.id_number') is-invalid @enderror" />
                    @error('item.id_number')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-12">
                    <label>Delivery Address</label>
                <textarea class="form-control form-control-sm @error('item.delivery_address') is-invalid @enderror" wire:model.defer="item.delivery_address" rows="4"></textarea>
                @error('item.delivery_address')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-primary btn-sm" wire:click="saveForm()">Save</button>
            </div>
        </div>
    </div>
</div>
