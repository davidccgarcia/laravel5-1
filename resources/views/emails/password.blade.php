<p>
    Hola, {{ $user->name }}
    click here to <strong>reset your password</strong>: {{ url('password/reset/' . $token) }}
</p>