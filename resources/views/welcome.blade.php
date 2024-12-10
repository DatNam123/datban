<x-guest-layout>
  @section('title', 'Feliciano - A Restaurant for Food Lovers')

    <section class="home-slider owl-carousel js-fullheight">
      @foreach ($slides as $slide)
      <div class="slider-item js-fullheight" style="background-image: url({{Storage::url($slide->image)}});">
          <div class="overlay"></div>
        <div class="container">
          <div class="row slider-text js-fullheight justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-12 col-sm-12 text-center ftco-animate">
                <span class="subheading">{{$slide->subheading}}</span>
              <h1 class="mb-4">{{$slide->heading}}</h1>
              <a class="btn btn-primary" href="{{route('reservation')}}">Make Your Reservation <i class="fa-solid fa-utensils"></i></a>
            </div>

          </div>
        </div>
      </div>
      @endforeach
      </section>
  
      {{-- about --}}
      @include('partials._about')
  
      {{-- services --}}
      @include('partials._services')

  
      {{-- menus --}}
      <section class="ftco-section">
          <div class="container">
              <div class="row no-gutters justify-content-center mb-5 pb-2">
            <div class="col-md-12 text-center heading-section ftco-animate">
                <span class="subheading">Specialties</span>
              <h2 class="mb-4">Our Menu</h2>
            </div>
          </div>
          @if ($specials)
          <div class="row no-gutters d-flex align-items-stretch">
            @foreach ($specials->menus as $menu)
            <div class="col-md-12 col-lg-6 d-flex align-self-stretch">
                <div class="menus d-sm-flex ftco-animate align-items-stretch mt-3 ">
              <div class="menu-img img {{$loop->index % 2 == 1 ? 'order-md-last' : ''}}" style="background-image: url({{Storage::url($menu->image)}});"></div>
              <div class="text d-flex align-items-center">
                                <div>
                      <div class="d-flex">
                        <div class="one-half">
                          <h3>{{$menu->name}}</h3>
                        </div>
                        <div class="one-forth">
                          <span class="price">${{$menu->price}}</span>
                        </div>
                      </div>
                      <p class="mb-2 text-sm">
                        Categories: 
                        @foreach ($menu->categories as $category)
                        <span class="">{{$category->name}},</span>
                        @endforeach
                    </p>

                      <p><a href="{{route('menus.show',$menu->id)}}" class="btn btn-primary">See details</a></p>
                  </div>
              </div>
            </div>
            </div>
                
            @endforeach
              
          </div>
          @else
              <h2 class="text-center">Today our restaurant does not have a special menu</h2>
          @endif
          <div class="d-flex justify-content-center align-items-center pt-5" style="padding-right: 30px">
            <a href="{{route('menus.index')}}" class="btn btn-primary ">View all</a>
          </div>
        </div>
      </section>
      
      {{-- chef --}}
          <section class="ftco-section">
             <div class="container">
              <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-12 text-center heading-section ftco-animate">
                    <span class="subheading">Our Chef</span>
                  <h2 class="mb-4">Feliciano Restaurant</h2>
                </div>
              </div>	
                      <div class="row "id="demo">
                            @foreach ($teams as $team)
                            <x-team-card :team=$team/>
                            @endforeach
                      </div>
             </div>
          </section>
  


          {{-- Gallery --}}
         @include('partials._gallery')


          {{-- Book table --}}
          <section class="ftco-section img" style="background-image: url(images/bg_3.jpg)" data-stellar-background-ratio="0.5">
            <div class="container">
              <div class="row d-flex">
                <div class="col-md-7 ftco-animate makereservation p-4 px-md-5 pb-md-5">
                  <div class="heading-section ftco-animate mb-5 text-center">
                    <span class="subheading">Book a table</span>
                    <h2 class="mb-4">Make Reservation</h2>
                  </div>
                  <form action="{{route('reservation.store')}}" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" name="name" class="form-control" placeholder="Your Name">
                          @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" name="email" class="form-control" placeholder="Your Email">
                          @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="tel_number">Phone</label>
                          <input type="text" name="tel_number" class="form-control" placeholder="Phone">
                          @error('tel_number')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Guest Number</label>
                          <input type="number" min="1" max="20" name="guest_number" class="form-control"  placeholder="Guest number">
                          @error('guest_number')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="res_date">Reservation Date</label>
                          <input type="datetime-local" name="res_date" class="form-control" placeholder="Date"
                          value="{{ \Carbon\Carbon::now()->format('Y-m-d\TH:i') }}">
                          @error('res_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Message</label>
                          <textarea name="message" class="w-100" rows="3"></textarea>
                          @error('message')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                        </div>
                      </div>
                      
                      <div class="col-md-12 mt-2">
                        <div class="form-group text-center">
                          <input type="submit" value="Make a Reservation" class="btn btn-primary py-3 px-5">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </section>


          <section class="ftco-section testimony-section img pb-0">
            <div class="overlay"></div>
            <div class="container">
              <div class="row justify-content-center mb-5">
                <div class="col-md-12 text-center heading-section ftco-animate">
                  <span class="subheading">Testimony</span>
                  <h2 class="mb-4">Happy Customer</h2>
                </div>
              </div>
              <div class="row ftco-animate justify-content-center">
                <div class="col-md-12">
                  <div class="carousel-testimony owl-carousel ftco-owl">
                    @foreach ($reviews as $review)
                    <div class="item">
                      <div class="testimony-wrap text-center pb-5">
                        <div class="user-img mb-4" style="background-image: url({{asset('images/smile.jpg')}})">
                          <span class="quote d-flex align-items-center justify-content-center">
                            <i class="icon-quote-left"></i>
                          </span>
                        </div>
                        <div class="text p-3">
                          <p class="mb-4">{{$review->content}}</p>
                          <p class="name" style="color:#c8a97e">
                            @for($i=1; $i<=5; $i++)
                            @if($i <= $review->rating)
                                <i class="fas fa-star"></i>
                            @else
                                <i class="far fa-star"></i>
                            @endif
                           @endfor</p>
                          <span class="position">{{$review->user->name}}</span>
                        </div>
                      </div>
                    </div>
                        
                    @endforeach
                    
                  </div>
                </div>
              </div>
              
            </div>
            
          </section>

          <div class="d-flex justify-content-center">
            <!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Leave your review here💕💕💕
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Review</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">✖️</button>
      </div>
      <div class="modal-body">

        <form method="POST" action="{{ route('reviews.store') }}">
            @csrf
        
            <div class="form-group">
                <label for="content">Content</label>
                <textarea id="content" name="content" class="form-control">{{ old('content') }}</textarea>
                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        
            <div class="form-group">
                <label for="rating">Rating</label>
                <input type="number" id="rating" name="rating" class="form-control" min="1" max="5" value="{{ old('rating') }}">
                @error('rating')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
     
    </div>
  </div>
</div>
          </div>

          {{-- blogs --}}
          <section class="ftco-section bg-light">
              <div class="container">
                  <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Blog</span>
              <h2 class="mb-4">Feliciano Restaurant</h2>
            </div>
          </div>
                  <div class="row" >
                    @foreach ($posts as $post)
                    <div class="col-md-4 ftco-animate">
                      <div class="blog-entry">
                        <a href="{{route('post.show',$post->id)}}" class="block-20" style="background-image: url({{Storage::url($post->image)}});">
                        </a>
                        <div class="text pt-3 pb-4 px-4">
                          <div class="meta">
                            <div><a href="#">{{$post->created_at->format('d-m-Y')}}</a></div>
                            <div><a href="#">{{$post->user->name}}</a></div>
                          </div>
                          <h3 class="heading"><a href="{{route('post.show',$post->id)}}">{{$post->title}}</a></h3>
                          {{-- <p class="text-sm">{{$post->excerpt}}</p> --}}
                          <p class="clearfix">
                            <a href="{{route('post.show',$post->id)}}" class="float-left read">Read more</a>
                          </p>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                  <div class="text-center">
                    <a class="btn btn-primary text-center" href="{{route('post.index')}}">Learn more</a>
                  </div>
              </div>
          </section>
        


</x-guest-layout>