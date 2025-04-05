@if (session('message'))
    <div>{{ session('message') }}</div>
@endif

<p>Please verify your email address.</p>

<form method="POST" action="{{ route('verification.send') }}">
    @csrf
    <button type="submit">Resend Verification Email</button>
</form>
