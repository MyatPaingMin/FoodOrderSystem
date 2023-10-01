{{-- @if(session('successPassword')) --}}
        <h3 style="color: green;"> Password changing successful </h3>
        <h3>You need to Login to your account again.</h3>
        <a href="{{route('authLoginPage')}}" class="btn btn-primary p-2 rounded">
            Login Account
        </a>
        <br>
{{-- @endif --}}
