@extends('layout')

@section('content')
<h2>Edit Task</h2>
<form method="POST" action="{{ route('tasks.update', $task) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}" required>
        @error('title') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" class="form-control" required>{{ $task->description }}</textarea>
        @error('description') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" id="status" class="form-control" required>
            <option value="pending" @if($task->status == 'pending') selected @endif>Pending</option>
            <option value="completed" @if($task->status == 'completed') selected @endif>Completed</option>
        </select>
        @error('status') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>
@endsection