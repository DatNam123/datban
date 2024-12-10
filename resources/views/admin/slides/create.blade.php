<x-app-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <a href="{{route('admin.slides.index')}}" class="btn btn-primary mb-4"><i class="fa-solid fa-circle-left"> Back</i></a>
                    <form action="{{route('admin.slides.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('subheading') is-invalid @enderror" name="subheading" id="subheading"
                        placeholder="Name">
                        <label for="subheading">SubHeading</label>
                        @error('subheading')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('heading') is-invalid @enderror" name="heading" id="heading"
                        placeholder="Name">
                        <label for="Heading">heading</label>
                        @error('heading')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                    </div>
                    <div class=" mb-3">
                        <label for="image"  class="form-babel">Image</label>
                        <input class="form-control bg-dark @error('image') is-invalid @enderror" type="file" id="image" name="image">
                        @error('image')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                    </div>
                    
                    <div class="mb-3">
                        <input type="checkbox" name="terms">
                        <label for="terms">Show slide</label>
                        
                    </div>
                    <button type="submit" class="btn btn-primary mt-2"><i class="fa-solid fa-circle-plus"> Store</i> </button>

                </form>
                </div>
            </div>
        </div>
    </div>        
 </x-app-layout>
 