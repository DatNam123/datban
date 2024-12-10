@props(['team'])
<div class="col-md-6 col-lg-3 ftco-animate">
    <div class="staff">
        <div class="img" style="background-image: url({{Storage::url($team->image)}});"></div>
        <div class="text pt-4">
            <h3>{{$team->name}}</h3>
            <span class="position mb-2">{{$team->job}}</span>
            <div class="faded">
                <ul class="ftco-social d-flex">
    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
    <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
    <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
    <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
  </ul>
</div>
        </div>
    </div>
</div>