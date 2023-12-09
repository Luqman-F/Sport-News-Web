<div>
    <div>
        <form action="{{ route('register') }}" method="post">
            @csrf
            <input type="text" name="name">
            <input type="email" name=email>
            <input type="password" name=password>
            <input type="password" name=password_confirmation>
            <button type="submit"></button>
        </form>
        @error('name')
        <div>
            {{ $message }}
        @enderror
        @error('password')
        <div>
            {{ $message }}
        </div>
        @enderror
        @error('email')
        <div>
            {{ $message }}
        </div>
        @enderror

    </div>

</div>
