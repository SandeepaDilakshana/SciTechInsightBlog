@if (count($errors) > 0)
    <div class="mb-4 border-0 alert alert-danger" role="alert">
        <ul class="list-group list-group-flush" style="background: transparent;">
            @foreach ($errors->all() as $error)
                <li class="p-1 bg-transparent border-0 list-group-item text-danger">
                    <i class="bx bx-error-circle me-2"></i> {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif
