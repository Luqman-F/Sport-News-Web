<!-- resources/views/dashboard.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid border main">
        <div class="row vh-20">
            <div class="col-2 px-2" style="background-color: #FFF8F0;">
                <img src="{{ asset('/images/sports.png') }}" alt="Logo" width="80">
                <span class="d-none d-md-inline">Sport News Article</span>
            </div>
            <div class="col-10" style="background-color: #9DD9D2; padding: 10px;">
                <h2>Dashboard</h2>
            </div>
        </div>
        <div class="row vh-80">
            <div class="col-2 sidebar">
                @yield('sidebar')
                <button class="btn btn-info mt-4" onclick="logout()">Logout</button>
            </div>
            <div class="col-10">
                <div class="row p-5">
                    <h1>Welcome To Dashboard!</h1>
                </div>
                <div class="row">
                    {{-- Add your content here --}}
                </div>
            </div>
        </div>
    </div>
    <script>
        function logout() {
            // Implement your logout functionality here
            alert('Logout button clicked!');
        }
    </script>
</body>

</html>
