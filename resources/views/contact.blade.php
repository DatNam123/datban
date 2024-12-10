<x-guest-layout>
  @section('title', 'Contact us - Feliciano Restaurant')

    <x-hero-card namePage="Contact" bg="images/bg_4.jpg"  />
   

     <!-- Contact Start -->
     <section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
        <div class="container">
            <div class="row d-flex align-items-stretch no-gutters">
                <div class="col-md-6 pt-5 px-2 pb-2 p-md-5 order-md-last">
                    <h2 class="h4 mb-2 mb-md-5 font-weight-bold">Contact Us</h2>
                    <form action="{{route('contact.store')}}" method="POST">
                        @csrf
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Your Name">
            @error('name')
            <div class="text-sm text-danger">{{$message}}</div>
             @enderror
        </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Your Email">
            @error('email')
            <div class="text-sm text-danger">{{$message}}</div>
             @enderror
          </div>
          <div class="form-group">
            <input type="text" name="subject" class="form-control" placeholder="Subject">
            @error('subject')
            <div class="text-sm text-danger">{{$message}}</div>
             @enderror
          </div>
          <div class="form-group">
            <textarea name="message"cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
            @error('message')
            <div class="text-sm text-danger">{{$message}}</div>
             @enderror
          </div>
          <div class="form-group">
            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
          </div>
        </form>
                </div>
                <div class="col-md-6 d-flex align-items-stretch">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1209.5715619279324!2d105.6941447805488!3d18.659713083800067!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3139cddf0bf20f23%3A0x86154b56a284fa6d!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBWaW5o!5e0!3m2!1svi!2s!4v1678938150810!5m2!1svi!2s" width="100%" height="600px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section contact-section">
  <div class="container">
    <div class="row d-flex contact-info">
      <div class="col-md-12 mb-4">
        <h2 class="h4 font-weight-bold">Contact Information</h2>
      </div>
      <div class="w-100"></div>
      <div class="col-md-3 d-flex">
          <div class="dbox">
            <p><span>Address:</span> 182 Lê Duẩn - Đại học Vinh</p>
        </div>
      </div>
      <div class="col-md-3 d-flex">
          <div class="dbox">
            <p><span>Phone:</span> <a href="tel://1234567920">+ 037483723</a></p>
        </div>
      </div>
      <div class="col-md-3 d-flex">
          <div class="dbox">
            <p><span>Email:</span> <a href="mailto:datnam241002@gmail.com">FelicianoRestaurant@gmail.com</a></p>
        </div>
      </div>
      <div class="col-md-3 d-flex">
          <div class="dbox">
            <p><span>Website</span> <a href="/">FelicianoRestaurant.com</a></p>
        </div>
      </div>
    </div>
  </div>
</section>
    <!-- Contact End -->
</x-guest-layout>