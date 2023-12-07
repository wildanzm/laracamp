@if ($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ $message }}</strong>
    <button type="button" data-bs-dismiss="alert" aria-label="Close" class="btn-close"></button>
</div>

@endif
