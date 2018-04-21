<!--Navigation bar-->
<div class="w3-top"  style= "position: fixed;  top: 0;  width: 100%;  ">
    <div class="w3-bar w3-card"  style="height:55px; background-color: #000000; color: #ffffff;">
        <a href="/home" class="w3-bar-item w3-button"><img src="logo2.jpg" style="width:30px; height:30px;"/> Movies</a>
        <div class="w3-right w3-hide-small">
            <a href="/movies" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Movies</a>
            <a href="/cart" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Cart</a>
            <a href="/history" class="w3-bar-item w3-button w3-padding-large w3-hover-white">History</a>
            <a href="/contact" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Contact Us</a>
            @if ( !auth()->check() )

                <a href="/register" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Create an account</a>
                <a href="/login" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Sign in</a>

            @elseif( auth()->check() )

                <a href="/logout" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Logout</a>

            @endif

        </div>
    </div>
</div>