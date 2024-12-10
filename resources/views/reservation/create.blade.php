<x-guest-layout>
  @section('title', 'Book Table - Feliciano Restaurant')

    <x-hero-card namePage="Book A Table" bg="images/bg_3.jpg" />

      <!-- Reservation Start -->
      <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container-fluid px-0">
            <div class="row d-flex no-gutters">
      <div class="col-md-6 order-md-last ftco-animate makereservation">
          <div class="py-md-5 p-4">
              <div class="heading-section ftco-animate">
                <h2 class="">Make Reservation</h2>
              </div>
            <form action="{{route('reservation.store')}}" method="POST">
                @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Tên của bạn" value="{{old('name')}}">
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email của bạn" value="{{old('email')}}">
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Phone</label>
                    <input type="text" name="tel_number" class="form-control" placeholder="Phone" value="{{old('tel_number')}}">
                    @error('tel_number')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="guest_number">Guest number</label>
                      <input type="number" name="guest_number" min="1" max="20" class="form-control" placeholder="Guest number"
                      value="{{old('guest_number')}}">
                      @error('guest_number')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
                    </div>
                  </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Reservation Date</label>
                    <input type="datetime-local"name="res_date" class="form-control"  placeholder="Date"
                    value="{{ \Carbon\Carbon::now()->format('Y-m-d\TH:i') }}"
                    >
                    @error('res_date')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
                  </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Message</label>
                      <textarea name="message" class="w-100" rows="4">{{old('message')}}</textarea>
                      @error('message')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
                    </div>
                  </div>
               
                
                <div class="col-md-12 mt-3">
                  <div class="form-group">
                    <input type="submit" value="Make a Reservation" class="btn btn-info py-3 px-5">
                  </div>
                </div>
              </div>
            </form>
          </div>
      </div>
      <div class="col-md-6 p-4">
        <img src="{{asset('images/insta-3.jpg')}}" width="100%" alt="">
    </div>
        </div>
    </section>
</x-guest-layout>