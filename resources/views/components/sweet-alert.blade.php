@if ($message)
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: '{{ $type }}',
                title: '{{ ucfirst($type) }}',
                text: '{{ $message }}',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: true
            });
        });
    </script>
@endif
