<x-app-layout>
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
      <div class="row g-4">
          <div class="col-sm-6 col-xl-3">
              <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa-solid fa-utensils fa-3x text-primary"></i>
                  <div class="ms-2">
                    <a href="{{route('admin.menus.index')}}" class="mb-2">Menus</a>
                      <h6 class="mb-0">{{count($menus) > 0 ? "Have ".count($menus) : "No"}} dish</h6>
                  </div>
              </div>    
          </div>
          <div class="col-sm-6 col-xl-3">
              <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa-solid fa-star fa-3x text-primary"></i>
                  <div class="ms-2">
                    <a href="{{route('admin.reviews.index')}}" class="mb-2">Review Pending</a>
                      <h6 class="mb-0">Have {{count($reviews)}} Reviews</h6>
                  </div>
              </div>
          </div>
          <div class="col-sm-6 col-xl-3">
              <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa-solid fa-people-group fa-3x text-primary" >
                    </i>
                  <div class="ms-2">
                      <a href="{{route('admin.customers.index')}}" class="mb-2">Customer Account</a>
                      <h6 class="mb-0">Have {{count($customersaccounts)}} Account</h6>
                  </div>
              </div>
          </div>
          <div class="col-sm-6 col-xl-3">
              <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                  <i class="fa-solid fa-blog fa-3x text-primary"></i>
                  <div class="ms-2">
                    <a href="{{route('admin.posts.index')}}" class="mb-2">Posts posted</a>
                      <h6 class="mb-0">Have {{count($posts)}} post</h6>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Sale & Revenue End -->


  <!-- Recent Sales Start -->
  <div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-md-6">
            <div class="bg-secondary text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h5 class="mb-0 text-primary ">Table Reservation Pending🛎️🛎️🛎️ </h5>
                    <a href="{{route('admin.reservation.index')}}">View All</a>
                </div>
                @if (count($reservations_pending) >0)
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-white">
                                <th scope="col">Date</th>
                                {{-- <th scope="col">Invoice</th> --}}
                                <th scope="col">Customer</th>
                                {{-- <th scope="col">Amount</th> --}}
                                <th scope="col">Guest Number</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($reservations_pending as $reservation)
                          <tr>
                              <td>{{$reservation->res_date}}</td>
                              {{-- <td>INV-0123</td> --}}
                              <td>{{$reservation->name}}</td>
                              {{-- <td>$123</td> --}}
                              <td>{{$reservation->guest_number}}</td>
                              <td><a class="btn btn-sm btn-primary" href="{{route('admin.reservation.show',$reservation->id)}}">Process</a></td>
                          </tr>
                              
                          @endforeach
                           
                        </tbody>
                    </table>
                </div>
                 @else
                  <h2>No pending table orders🥲</h2>   
                @endif
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="bg-secondary text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h5 class="mb-0 text-primary ">Table Reservation Confirmed  </h5>
                    <a href="{{route('admin.reservation.index')}}">View All</a>
                </div>
                @if (count($reservations_confirmed) >0)
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-white">
                                <th scope="col">Date</th>
                                {{-- <th scope="col">Invoice</th> --}}
                                <th scope="col">Customer</th>
                                {{-- <th scope="col">Amount</th> --}}
                                <th scope="col">Guest Number</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($reservations_confirmed as $reservation)
                          <tr>
                              <td>{{$reservation->res_date}}</td>
                              {{-- <td>INV-0123</td> --}}
                              <td>{{$reservation->name}}</td>
                              {{-- <td>$123</td> --}}
                              <td>{{$reservation->guest_number}}</td>
                              <td><a class="btn btn-sm btn-primary" href="{{route('admin.reservation.show',$reservation->id)}}">Process</a></td>
                          </tr>
                              
                          @endforeach
                           
                        </tbody>
                    </table>
                </div>
                 @else
                  <h2>No confirmed table orders </h2>   
                @endif
            </div>
        </div>
    </div>
   
  </div>
  <!-- Recent Sales End -->


  <!-- Widgets Start -->
  <div class="container-fluid pt-4 px-4">
      <div class="row g-4">
          
          <div class="col-sm-12 col-md-6 ">
              <div class="h-100 bg-secondary rounded p-4">
                  <div class="d-flex align-items-center justify-content-between mb-4">
                      <h6 class="mb-0">Calender</h6>
                      <a href="">Show All</a>
                  </div>
                  <div id="calender"></div>
              </div>
          </div>
          <div class="col-sm-12 col-md-6">
              <div class="h-100 bg-secondary rounded p-4">
                  <div class="d-flex align-items-center justify-content-between mb-4">
                      <h6 class="mb-0 text-primary">Recent posts <span class="text-info">(7days)</span></h6>
                      <a href="{{route('admin.posts.index')}}">View All</a>
                  </div>
                  @if (count($rencent_posts)>0)
                  <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-white">
                                <th scope="col">Title</th>
                                <th scope="col">Image</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Author</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rencent_posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td><img src="{{Storage::url($post->image)}}" width="100px" alt=""></td>
                                <td>{{$post->created_at->format('d-m-Y')}}</td>
                                <td>{{$post->user->name == Auth::user()->name ? "You" : $post->user->name}}</td>
                                <td><a class="btn btn-sm btn-primary" href="{{route('admin.posts.show',$post->id)}}">Detail</a></td>
                            </tr>
                            @endforeach
                            
                           
                        </tbody>
                    </table>
                </div>
                  @else
                      <h2 class="text-primary text-center">No Post</h2>
                  @endif
                  
                  
                  
              </div>
          </div>
      </div>
  </div>
  <!-- Widgets End -->
</x-app-layout>