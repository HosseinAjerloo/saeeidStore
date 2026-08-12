<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if(session('success'))
        window.Swal.fire({
            icon: "success",
            title: "موفقیت",
            text: "{{session('success')}}",
        });
        @endif
    })
</script>
