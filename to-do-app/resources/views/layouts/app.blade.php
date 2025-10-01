<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    {{-- <link rel="stylesheet" href="to-do-app/resources/views/layouts/styles.css"> --}}
    <style>
        body {
    background: linear-gradient(135deg, #90a4fa 0%, #ca99fc 100%);
    min-height: 100vh;
    padding: 2rem;
    font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
}

.main-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 2rem;
}

.todo-item {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 8px;
    padding: 1rem;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease;
}

.todo-item:hover {
    transform: translateY(-2px);
}

.todo-form {
    background: rgba(255, 255, 255, 0.95);
    padding: 2rem;
    border-radius: 12px;
    margin-bottom: 2rem;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
}

.form-control {
    border: 2px solid #e2e8f0;
    border-radius: 6px;
    padding: 0.75rem;
    width: 100%;
    margin-bottom: 1rem;
}

.btn {
    padding: 0.75rem 1.5rem;
    border-radius: 6px;
    border: none;
    cursor: pointer;
    font-weight: 600;
    transition: all 0.2s ease;
}

.btn-primary {
    background: #667eea;
    color: white;
}

.btn-primary:hover {
    background: #5a67d8;
}

.btn-danger {
    background: #e53e3e;
    color: white;
}

.btn-danger:hover {
    background: #c53030;
}

.alert {
    padding: 1rem;
    border-radius: 6px;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.alert-success {
    background: #48bb78;
    color: white;
}

.completed {
    text-decoration: line-through;
    opacity: 0.7;
}

.task-actions {
    display: flex;
    gap: 0.5rem;
}

.checkbox-wrapper {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.checkbox-wrapper input[type="checkbox"] {
    width: 1.2rem;
    height: 1.2rem;
}
    </style>
</head>
<body>
     <div class="main-container">
        <div class="text-center mb-4">
            <h1 class="text-white display-4 fw-bold">
                <i class="fas fa-clipboard-list"></i> Todo List
            </h1>
            <p class="text-white-50">Manage your tasks efficiently</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>

   <script>
    // Close alert function
    function closeAlert() {
        const alert = document.getElementById('successAlert');
        if (alert) {
            alert.style.opacity = '0';
            alert.style.transform = 'translateY(-20px)';
            setTimeout(() => alert.remove(), 300);
        }
    }

    // Auto close alert after 5 seconds
    if (document.getElementById('successAlert')) {
        setTimeout(closeAlert, 5000);
    }
</script>
</body>
</html>