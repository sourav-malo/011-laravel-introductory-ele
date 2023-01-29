<script>
  @if(Illuminate\Support\Facades\Session::has('message'))
    const alertType = "{{ Illuminate\Support\Facades\Session::get('alert-type') }}" || "info";
    switch(alertType) {
      case 'info':
        toastr.info("{{ Illuminate\Support\Facades\Session::get('message') }}");
        break;
      case 'success':
        toastr.success("{{ Illuminate\Support\Facades\Session::get('message') }}");
        break;
      case 'warning':
        toastr.warning("{{ Illuminate\Support\Facades\Session::get('message') }}");
        break;
      case 'error':
        toastr.error("{{ Illuminate\Support\Facades\Session::get('message') }}");
        break;
    }
  @endif
</script>