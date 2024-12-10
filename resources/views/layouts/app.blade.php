<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Feliciano</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{asset('images/Feliciano.png')}}">


    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('app/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('app/css/style.css')}}" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    

</head>

<body>
    <div class="">
        @if(session()->has('danger'))
        <div >
            <script>swal("{{session()->get('danger')}}", "", "error");</script>
        </div>
        @endif
        @if(session()->has('success'))
        <div >
            <script>swal("{{session()->get('success')}}", "", "success");</script>
        </div>
        @endif
        @if(session()->has('warning'))
        <div >
            <script>swal("{{session()->get('warning')}}", "", "warning");</script>
        </div>
        @endif
        @if(session()->has('message'))
        <div >
            <script>swal("{{session()->get('message')}}", "", "success");</script>
        </div>
        @endif
    </div>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="/admin" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-utensils me-2"></i>Feliciano</h3>
                </a>
                <div class="navbar-nav w-100">
                    <a href="/admin" class="nav-item nav-link {{(request()->is('admin')) ? 'active' : ''}}"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{route('admin.reservation.index')}}" class="nav-item nav-link {{(request()->is('admin/reservation')) ? 'active' : ''}} "><i class="fa-solid fa-bell me-2"></i>Reservations</a>
                    <a href="{{route('admin.tables.index')}}" class="nav-item nav-link {{(request()->is('admin/tables')) ? 'active' : ''}} "><i class="fa-solid fa-bell me-2"></i>Tables</a>
                    <a href="{{route('admin.categories.index')}}" class="nav-item nav-link {{(request()->is('admin/categories')) ? 'active' : ''}}  "><i class="fa-solid fa-bars me-2"></i>Categories</a>
                    <a href="{{route('admin.menus.index')}}" class="nav-item nav-link {{(request()->is('admin/menus')) ? 'active' : ''}} "><i class="fa-solid fa-utensils me-2"></i>Menus</a>
                    <a href="{{route('admin.posts.index')}}" class="nav-item nav-link {{(request()->is('admin/posts')) ? 'active' : ''}} "><i class="fa-solid fa-blog me-2"></i>All of Posts</a>
                    <a href="{{route('admin.slides.index')}}" class="nav-item nav-link {{(request()->is('admin/slides')) ? 'active' : ''}} "><i class="fa-solid fa-sliders me-2"></i>Slides</a>
                    <a href="{{route('admin.reviews.index')}}" class="nav-item nav-link {{(request()->is('admin/reviews')) ? 'active' : ''}} "><i class="fa-solid fa-star"></i>Reviews</a>
                    <a href="{{route('admin.contact.index')}}" class="nav-item nav-link {{(request()->is('admin/contact')) ? 'active' : ''}} "><i class="fa-solid fa-address-book me-2"></i>Contact</a>
                    <a href="{{route('admin.teams.index')}}" class="nav-item nav-link {{(request()->is('admin/teams')) ? 'active' : ''}} "><i class="fa-solid fa-user-group"></i>Chefs</a>
                    <a href="{{route('admin.customers.index')}}" class="nav-item nav-link {{(request()->is('admin/customers')) ? 'active' : ''}} "><i class="fa-solid fa-people-group me-2"></i>Customer</a>
                    
                    
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
               
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            {{-- @foreach ($reservations_pending as $reservation)
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">{{$reservation->name}}</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                                
                            @endforeach --}}
                           
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="d-none d-lg-inline-flex">{{Auth::user()->name}}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="/" class="dropdown-item">View Website</a>
                            {{-- <a href="{{route('profile.edit')}}" class="dropdown-item">My Profile</a> --}}
                            <form action="{{route('logout')}}" method="POST" class="dropdown-item">
                                @csrf
                                <button type="submit" class="btn">Log Out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


           <div>
          
            {{$slot}}
           </div>


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="/">Feliciano Restaurant</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                            <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('app/lib/chart/chart.min.js')}}"></script>
    <script src="{{asset('app/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('app/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('app/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('app/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('app/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('app/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('app/js/main.js')}}"></script>
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
           $('.ckeditor').ckeditor();
        });
    </script>  
    <script type="text/javascript">
        CKEDITOR.replace('body', {
            filebrowserUploadUrl: "{{route('admin.ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
</body>

</html>