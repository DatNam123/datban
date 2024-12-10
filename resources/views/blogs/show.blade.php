<x-guest-layout>
  @section('title', $post->title)

    <x-hero-card namePage="Post {{$post->title}}" bg="images/lunch-4.jpg"  />
    <section class="ftco-section">
        <div class="container">
            <div class="row">
      <div class="col-lg-8 ftco-animate">
        <h2 class="mb-3">{{$post->title}}</h2>
        <div class="">{!!$post->body!!}</div>
       
        
        <div class="about-author d-flex p-4 bg-light">
          
          <div class="desc">
            <h3><i class="fa-solid fa-user-pen"></i> {{$post->user->name}} - <i class="fa-solid fa-calendar-days"></i> {{$post->created_at->format('d-m-Y')}} </h3>
          </div>
        </div>


       
      </div> <!-- .col-md-8 -->

      <div class="col-lg-4 sidebar ftco-animate">
        <div class="sidebar-box">
          <form action="#" class="search-form">
            <div class="form-group">
              <span class="icon icon-search"></span>
              <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
            </div>
          </form>
        </div>

        <div class="sidebar-box ftco-animate">
          <h3>Popular Articles</h3>
          @foreach ($posts as $post)
          <div class="block-21 mb-4 d-flex">
            <a href="{{route('post.show',$post->id)}}" class="blog-img mr-4" style="background-image: url({{Storage::url($post->image)}});"></a>
            <div class="text">
              <h3 class="heading"><a href="{{route('post.show',$post->id)}}">{{$post->title}}</a></h3>
              <div class="meta">
                <div><a href="#"><span class="icon-calendar"></span>{{$post->created_at->format('d-m-Y')}}</a></div>
                <div><a href="#"><span class="icon-person"></span> {{$post->user->name}}</a></div>
              </div>
            </div>
          </div>
          @endforeach
         
          
        </div>
      
      </div><!-- END COL -->
    </div>
        </div>
    </section>
</x-guest-layout>