<x-app-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <a href="{{route('admin.menus.index')}}" class="btn btn-primary mb-4"><i class="fa-solid fa-circle-left"> Back</i></a>

                    <form action="{{route('admin.menus.update',$menu->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                         name="name" id="name" value="{{$menu->name}}"
                        placeholder="Name">
                        <label for="name">Name</label>
                        @error('name')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                    </div>
                    <div class="mb-3">
                        <div class="">
                            <img src="{{Storage::url($menu->image)}}" height="300px" style="object-fit: cover" alt="">
                        </div>
                        <label for="image"  class="form-babel">Image</label>
                        <input class="form-control bg-dark @error('image') is-invalid @enderror" type="file" id="image" name="image">
                        @error('image')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @error('price') is-invalid @enderror"
                         name="price" id="price" value="{{$menu->price}}"
                        placeholder="Price">
                        <label for="price">Price</label>
                        @error('price')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                    </div>
                    <div class="mb-3">
                        <label for="categories">Select Categories (you can choose multiple categories)</label>
                        <select class="form-select" multiple name="categories[]" id="categories"
                            aria-label="Floating label select example">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}"@selected($menu->categories->contains($category))>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" name="description" placeholder="Description for menu"
                        id="description" style="height: 100px;">{{$menu->description}}</textarea>
                        <label for="description">Description</label>
                            @error('description')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-2"><i class="fa-solid fa-circle-arrow-up"> Update</i></button>

                </form>
                </div>
            </div>
        </div>
    </div>        
 </x-app-layout>
 