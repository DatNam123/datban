<x-app-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <a href="{{route('admin.categories.index')}}" class="btn btn-primary mb-4"><i class="fa-solid fa-circle-left"> Back</i></a>
                    <form action="{{route('admin.categories.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <div class="form-floating mb-3">
                        <input type="text" value="{{$category->name}}" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                        placeholder="Name">
                        <label for="name">Name</label>
                        @error('name')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                    </div>
                   
                    <div class="form-floating">
                        <textarea class="form-control" name="description" placeholder="Description for category"
                            id="description" style="height: 100px;">{{$category->description}}</textarea>
                        <label for="description">Description</label>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2"><i class="fa-solid fa-circle-arrow-up"> Update</i> </button>

                </form>
                </div>
            </div>
        </div>
    </div>        
 </x-app-layout>
 