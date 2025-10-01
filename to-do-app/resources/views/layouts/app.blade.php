<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List App</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="to-do-app/resources/views/layouts/styles.css">
</head>
<body>
     <div class="main-container">
        <div class="text-center mb-4">
            <h1 class="text-white display-4 fw-bold">
                <i class="fas fa-clipboard-list"></i> Todo App
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