<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if(session('error'))
        window.Swal.fire({
            icon: "error",
            title: "خطا",
            text: "{{session('error')}}",
        });
        @endif
    })
</script>
