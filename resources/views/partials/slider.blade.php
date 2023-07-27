
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    @foreach($sliders as $slider)
    @if($loop->first)
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    @else
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    @endif
    @endforeach
  </ol>
  
  <div class="carousel-inner">
    @foreach($sliders as $slider)
    @if($loop->first)
    <div class="carousel-item active">
      <img src="/uploads/slider/{{$slider->image}}" class="d-block w-100" alt="..." style="max-height: 450px; object-fit:cover;">
    </div>
    @else
    <div class="carousel-item">
      <img src="/uploads/slider/{{$slider->image}}" class="d-block w-100" alt="..." style="max-height: 450px; object-fit:cover;">
    </div>
    @endif
    @endforeach
  </div>
  
  <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </button>
</div>

<div class="bg-dark py-4  d-none d-md-block">
  <div class="px-md-5">
    <div class="row mx-0">
      <div class="col-md-3">
        <div class="d-flex">
          <img src="/image/lock.png" alt="lock" width="50px">
          <div class="ml-2">
            <h6 class="text-warning mb-0 pb-2">Security Policy</h6>
            <p class="mb-0 pb-0 text-white">All payment are secured</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="d-flex">
          <img src="/image/truck.png" alt="lock" width="50px">
          <div class="ml-2">
            <h6 class="text-warning mb-0 pb-2">Delivery Policy</h6>
            <p class="mb-0 pb-0 text-white">We deliver very fast</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="d-flex">
          <img src="/image/return.png" alt="lock" width="50px">
          <div class="ml-2">
            <h6 class="text-warning mb-0 pb-2">Return Policy</h6>
            <p class="mb-0 pb-0 text-white">Easy return policy</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="d-flex">
          <img src="/image/affiliate.png" alt="lock" width="50px">
          <div class="ml-2">
            <h6 class="text-warning mb-0 pb-2">Affiliate Policy</h6>
            <p class="mb-0 pb-0 text-white">Earn more with referral</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="py-4  d-none d-md-block">
  <div class="px-md-5">
    <div class="row mx-0">
      <div class="col-md-3">
          <img src="/image/1.jpg" alt="lock" width="100%" height="160px" style="object-fit: cover;" class="rounded-sm border">
      </div>
      <div class="col-md-6">
          <img src="/image/2.jpg" alt="lock" width="100%" height="160px" style="object-fit: cover;" class="rounded-sm border">
      </div>
      <div class="col-md-3">
          <img src="/image/3.jpg" alt="lock" width="100%" height="160px" style="object-fit: cover;" class="rounded-sm border">
      </div>
    </div>
  </div>
</div>