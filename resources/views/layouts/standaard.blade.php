
<!DOCTYPE html>
<html lang="nl">

    <head>
	    @include('includes.head')
    </head>

	<body>
        <nav class="navbar navbar-light navbar-expand-lg navbar-mpl fixed-top">
            @include('includes.nav')
        </nav>

        <section class="content">
            @yield('content')
        </section>

        <footer class="footer">
		    @include('includes.footer')
        </footer>

        @include('includes.scriptsrcs')
	</body>
</html>
