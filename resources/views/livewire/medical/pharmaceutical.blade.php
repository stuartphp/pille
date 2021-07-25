<div class="mt-2 container-fluid">
    <div class="card rounded-lg">
        <div class="card-header">Pharmaceutical</div>
        <div class="card-body row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-6">
            @foreach ($data as $item)
            <div class="col mb-3">
                 <div class="card" style="width: 15rem;">
                <div class="card-body position-relative">
                  <h6 class="card-title">{{ $item->name }}<span class="badge badge-pill badge-danger position-relative">{{ $item->schedule }}</span></h6>
                  <h6 class="card-subtitle mb-2 text-muted">{{ $item->schedule }} </h6>
                  <p class="card-text">{{ number_format(($item->cost_price+$item->dispensing_fee+$item->add_on_fee)/100,2) }} ({{ $item->pack_size }})</p>
                  <a href="#" class="card-link">Card link</a>
                  <a href="#" class="card-link">Another link</a>
                </div>
              </div>
            </div>

            @endforeach
        </div>
    </div>
</div>
