<x-guest-layout>
  @section('title', $menu->name)

    <x-hero-card namePage="Detail {{$menu->name}}"  bg="images/bg_4.jpg"/>

    <div class="container mt-5 mb-5">
        <div class="row">
          <div class="col-md-6">
            <img src="{{Storage::url($menu->image)}}" alt="Ảnh sản phẩm" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h1>{{$menu->name}}</h1>
            <p>{{$menu->description}}</p>
            <p>Price: {{$menu->price}}$</p>
            <div class="">
                <a class="btn btn-primary" href="{{route('reservation')}}">Book Table Now</a>
            </div>
          </div>
        </div>
      </div>
      <div class="container mb-4 mt-5 pt-5">
        <div class="col-md-12 text-center heading-section ftco-animate ">
          <span class="subheading">Specialties</span>
        <h2 class="mb-4">Related products</h2>
      </div>
        <div class="row">
          @foreach ($other_menus as $menu)
          <div class="col-md-3">
            <div class="card">
              <img src="{{Storage::url($menu->image)}}" alt="{{$menu->name}}" class="card-img-top" style="height:200px;object-fit:cover">
              <div class="card-body">
                <h5 class="card-title">{{$menu->name}}</h5>
                <a href="{{route('menus.show',$menu->id)}}" class="btn btn-primary">See Detail</a>
              </div>
            </div>
          </div>
              
          @endforeach
         
        </div>
      </div>
</x-guest-layout>