<x-app-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <a href="{{ route('admin.tables.index') }}" class="btn btn-primary mb-4">
                        <i class="fa-solid fa-circle-left"></i> Back
                    </a>
                    <form action="{{ route('admin.tables.update', $table->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-floating mb-3">
                            <input type="text" value="{{ $table->name }}" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   name="name" id="name" placeholder="Table Name">
                            <label for="name">Table Name</label>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" value="{{ $table->seats }}" 
                                   class="form-control @error('seats') is-invalid @enderror" 
                                   name="seats" id="seats" placeholder="Number of Seats">
                            <label for="seats">Seats</label>
                            @error('seats')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select @error('status') is-invalid @enderror" 
                                    id="status" name="status">
                                <option value="available" {{ $table->status == 'available' ? 'selected' : '' }}>Available</option>
                                <option value="reserved" {{ $table->status == 'reserved' ? 'selected' : '' }}>Reserved</option>
                            </select>
                            <label for="status">Status</label>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mt-2">
                            <i class="fa-solid fa-circle-arrow-up"></i> Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
