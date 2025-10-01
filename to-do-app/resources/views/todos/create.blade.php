@extends('layouts.app')

@section('title', 'Create Todo')

@section('content')
<div class="card">
    <div class="card-header">
        <h4><i class="fas fa-plus-circle text-primary"></i> Create New Todo</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('todos.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                <input type="text" 
                       class="form-control @error('title') invalid @enderror" 
                       id="title" 
                       name="title" 
                       value="{{ old('title') }}"
                       placeholder="Enter todo title"
                       required>
                @error('title')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') invalid @enderror" 
                          id="description" 
                          name="description" 
                          rows="4"
                          placeholder="Enter todo description (optional)">{{ old('description') }}</textarea>
                @error('description')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex-gap">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Create Todo
                </button>
                <a href="{{ route('todos.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection