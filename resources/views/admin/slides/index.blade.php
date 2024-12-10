<x-app-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <a href="{{route('admin.slides.create')}}" class="mb-4 btn btn-primary">New Slide</a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SubHeading</th>
                                    <th scope="col">Heading</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($slides as $slide)
                                <tr>
                                    <td>{{$slide->subheading}}</td>
                                    <td>{{$slide->heading}}</td>

                                    <td>
                                        <img
                                            src="{{Storage::url($slide->image)}}"
                                            alt=""
                                            width="100%"    
                                            height="200px"
                                            style="object-fit: cover"
                                        />
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                        <a href="{{route('admin.slides.edit',$slide->id)}}" class="btn btn-info me-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <form class=""
                                            method="POST"
                                            action="{{route('admin.slides.destroy',$slide->id)}}"
                                            onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="d-flex justify-content-end">{{$categories->links()}}</div> --}}
                </div>
            </div>
        </div>

    </div>
 </x-app-layout>
 