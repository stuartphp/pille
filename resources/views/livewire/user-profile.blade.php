<div>
    <div class="row">
        <div class="col-lg-4 col-xl-4">
            <div class="card text-center">
                <div class="card-body">
                    <img src="{{ (auth()->user()->profile_photo >'') ? auth()->user()->profile_photo :'' }}" class="rounded-circle avatar-xl img-thumbnail" alt="{{ auth()->user()->name }}">

                    <h4 class="mt-3 mb-0">{{ auth()->user()->name }}</h4>
                    <p class="text-muted">@webdesigner</p>

                    <button type="button" class="btn btn-success btn-xs waves-effect mb-2 waves-light">{{ __('Select A New Photo') }}</button>
                    <button type="button" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">{{ __('Remove Photo') }}</button>

                    <div class="text-start mt-3">
                        <div class="table-responsive">
                            <table class="table table-borderless table-sm">
                                <tbody>
                                    <tr>
                                        <th scope="row">Full Name :</th>
                                        <td class="text-muted">{{ auth()->user()->name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Mobile :</th>
                                        <td class="text-muted">{{ auth()->user()->mobile_number }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email :</th>
                                        <td class="text-muted">{{ auth()->user()->email }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Date of Birth :</th>
                                        <td class="text-muted">{{ auth()->user()->date_of_birth }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- <ul class="social-list list-inline mb-0">
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="social-list-item border-purple text-purple"><i class="mdi mdi-facebook"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                        </li>
                    </ul> --}}
                </div>
            </div> <!-- end card-box -->
        </div> <!-- end col-->

        <div class="col-lg-8 col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-6">
                            <label class="form-label">Name</label>
                            <input type="text" wire:model.defer="item.name" class="form-control form-control-sm @error('item.name') is-invalid @enderror" />
                            @error('item.name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label class="form-label">Email</label>
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
                            <label class="form-label">Change Password</label>
                            <input type="password" wire:model.defer="item.password" class="form-control form-control-sm @error('item.password') is-invalid @enderror" />
                            @error('item.password')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label class="form-label">Mobile Number</label>
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
                            <label class="form-label">Date of Birth</label>
                            <input type="text" wire:model.defer="item.date_of_birth" class="form-control form-control-sm @error('item.date_of_birth') is-invalid @enderror" />
                            @error('item.date_of_birth')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label class="form-label">ID Number</label>
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
                            <label class="form-label">Delivery Address</label>
                        <textarea class="form-control form-control-sm @error('item.delivery_address') is-invalid @enderror" wire:model.defer="item.delivery_address" rows="4"></textarea>
                        @error('item.delivery_address')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                    </div>
                    <div class="text-end">
                        <button class="btn btn-outline-primary btn-sm" wire:click="saveForm()">Save</button>
                    </div>
                </div>
            </div> <!-- end card-->

        </div> <!-- end col -->
    </div>
   
</div>
