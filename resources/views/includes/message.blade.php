@if (Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
    <script>
        setTimeout(() => document.querySelector('.alert-success').style.display = 'none', 3000);
    </script>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger">{{ Session::get('error') }}</div>
    <script>
        setTimeout(() => document.querySelector('.alert-danger').style.display = 'none', 2000);
    </script>
@endif
