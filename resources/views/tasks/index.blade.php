@extends('layout')

@section('content')
<a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Add New Task</a>
<form method="GET" action="{{ route('tasks.index') }}" class="mb-3 d-flex">
    <input 
        type="text" 
        name="search" 
        placeholder="Search by title" 
        class="form-control me-2" 
        value="{{ request('search') }}"
    >
    <button type="submit" class="btn btn-primary me-2">Cari</button>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Reset</a>
</form>


<table class="table table-bordered">
<thead>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Status</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Actions</th>
    </tr>
</thead>
<tbody>
    @foreach ($tasks as $task)
        <tr>
            <td>{{ $task->id }}</td>
            <td>{{ $task->title }}</td>
            <td>{{ $task->description }}</td>
            <td>{{ ucfirst($task->status) }}</td>
            <td>{{ $task->created_at->format('Y-m-d H:i') }}</td> <!-- Created At -->
            <td>{{ $task->updated_at->format('Y-m-d H:i') }}</td> <!-- Updated At -->
            <td>
                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>
</table>

{{ $tasks->links() }}
@endsection
