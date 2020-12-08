<div class="container">
    @if(count($errors) > 0)

    @foreach($errors->all() as $error)

    <div class="alert alert-danger">{{ $error }}</div>

    @endforeach

    @endif

    @if(session('Error'))

    <div aria-hidden="true" class=" alert alert-danger">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-exclamation-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
        </svg>
        {{ session('Error') }}</div>

    @endif

    @if(session('Success'))

    <div class="alert alert-success">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </svg>
        {{ session('Success') }}</div>

    @endif
</div>
