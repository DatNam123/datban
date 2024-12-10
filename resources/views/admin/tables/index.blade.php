<x-app-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <a href="{{ route('admin.tables.create') }}" class="mb-4 btn btn-primary">New Table</a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Table Name</th>
                                    <th scope="col">Seats</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tables as $table)
                                    <tr>
                                        <td>{{ $table->name }}</td>
                                        <td>{{ $table->seats }}</td>
                                        <td>
                                            <span class="badge 
                                                {{ $table->status === 'available' ? 'bg-success' : 'bg-danger' }}">
                                                {{ ucfirst($table->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('admin.tables.edit', $table->id) }}" 
                                                   class="btn btn-info me-2">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <form method="POST" 
                                                      action="{{ route('admin.tables.destroy', $table->id) }}" 
                                                      onsubmit="return confirm('Are you sure you want to delete this table?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
