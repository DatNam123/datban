<x-app-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                  @if (Auth::user()->utype =="ADM")
                   <a href="{{route('admin.teams.create')}}" class="mb-4 btn btn-primary">New Chef</a>
                      
                  @endif
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Job</th>
                                    <th scope="col">Description</th>
                                    
                                    <th scope="col">Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teams as $team)
                                <tr>
                                    <td>{{$team->name}}</td>
                                    <td>
                                        <img
                                            src="{{Storage::url($team->image)}}"
                                            alt=""
                                            width="100%"
                                            height="500px"
                                            style="object-fit: cover"
                                        />
                                    </td>
                                    <td>{{$team->job}}</td>
                                    <td>{{$team->description}}</td>
                                   
                                    <td>
                                        <div class="d-flex">
                                        <a href="{{route('admin.teams.edit',$team->id)}}" class="btn btn-info me-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <form class=""
                                            method="POST"
                                            action="{{route('admin.teams.destroy',$team->id)}}"
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
                    <div class="d-flex justify-content-end">{{$teams->links()}}</div>
                </div>
            </div>
        </div>

    </div>
 </x-app-layout>
 