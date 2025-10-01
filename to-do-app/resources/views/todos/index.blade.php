@extends('layouts.app')

@section('title', 'All Todo lists')

@section('content')
<div class="card">
    <div class="card-header">
        <h4><i class="fas fa-tasks text-primary"></i> My Todos</h4>
        <a href="{{ route('todos.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Todo
        </a>
    </div>
    <div class="card-body">
        @if($todos->isEmpty())
            <div class="empty-state">
                <i class="fas fa-clipboard-check"></i>
                <p>No todos yet. Create your first one!</p>
                <a href="{{ route('todos.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Create Todo
                </a>
            </div>
        @else
            <ul class="todo-list">
                @foreach($todos as $todo)
                    <li class="todo-item {{ $todo->completed ? 'completed' : '' }}">
                        <div class="todo-content">
                            <div class="todo-header">
                                <form action="{{ route('todos.toggle', $todo) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-circle {{ $todo->completed ? 'btn-success' : 'btn-outline-secondary' }}">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </form>
                                <h5 class="todo-title">{{ $todo->title }}</h5>
                            </div>
                            @if($todo->description)
                                <p class="todo-description">{{ $todo->description }}</p>
                            @endif
                            <small class="todo-meta">
                                <i class="far fa-clock"></i> {{ $todo->created_at->diffForHumans() }}
                            </small>
                        </div>
                        <div class="todo-actions">
                            <a href="{{ route('todos.edit', $todo) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('todos.destroy', $todo) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this todo?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>

            <div class="todo-stats">
                Total: {{ $todos->count() }} | 
                Completed: {{ $todos->where('completed', true)->count() }} | 
                Pending: {{ $todos->where('completed', false)->count() }}
            </div>
        @endif
    </div>
</div>
@endsection