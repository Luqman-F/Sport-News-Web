<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPORT NEWS ARTICLE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>

        .navbar {
            background-color: #FFF8F0;
            border-bottom: 1px solid #000;
        }

        .navbar a {
            color: #000;
        }

        .btn-outline-dark {
            color: #000;
            border-color: #000;
        }

        .btn-outline-transparent {
            color: #000;
            border-color: #000;
            background-color: transparent;
        }

        .btn-search {
            background-color: transparent;
            border-color: #000;
        }

        .btn-search i {
            color: #000;
        }

        .article {
            margin-bottom: 20px;
            background-color: #D9D9D9;
            border: 1px solid #000;
            border-radius: .5em;
            padding: 15px;
        }

        .navbar-brand img {
            max-height: 30px; 
            margin-right: 5px;
        }

        .navbar-brand h1 {
            font-size: 18px; 
            margin-bottom: 0;
        }

        main {
            background-color: #FFF; 
        }
    </style>
</head>

<body>

    <header class="container-fluid navbar">
        <div class="container">
            <div class="row w-100">
                <div class="col-6 py-3 d-flex align-items-center">
                    <img src="{{ asset('images/sports.png') }}" alt="Logo" width="100">
                    <h1 class="display-5">SPORT NEWS ARTICLE</h1>
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                @guest
                    <a href="{{ route('login') }}" class="text-dark mx-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-transparent mx-2">Register</a>
                @else
                    <span class="text-dark mx-2">{{ Auth::user()->name }}</span>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-transparent mx-2">Logout</button>
                    </form>
                @endguest
                <div class="d-flex align-items-center">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-search">
                        <button class="btn btn-search" type="button" id="button-search">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
            </div>
    </header>

    <main class="container mt-4">
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8RCI6I/pIj5i0U42n9NlAyjyIgyh8zLIYb5B+NBnYLdPQ5qL5X6k2tnvbKtk" crossorigin="anonymous"></script>
    <script>
        // Script untuk menangani tampilan dan penyembunyian elemen pencarian
        document.getElementById('button-search').addEventListener('click', function () {
            var searchInput = document.querySelector('.input-group');
            searchInput.classList.toggle('d-none');
        });
    </script>

    <footer class="container-fluid bg-light mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12 py-4">
                    &copy; 2023 Website Sport News
                </div>
            </div>
        </div>
    </footer>

</body>

</html>
