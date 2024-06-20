<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File XLS/XLSX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMO9fXk9fGsBpHqXzQftOuw7brGz6Ht92v8RMsK" crossorigin="anonymous">
    <style>
    body {
        background-size: cover;
        background-position: center;
        height: 100vh;

    }


    .card-body {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        padding-bottom: 20px;
        /* Sesuaikan dengan kebutuhan Anda */
    }

    .card {
        background: rgba(255, 255, 255, 0.4);
        /* Warna putih dengan transparansi */
    }

    .card-header {
        background: rgba(255, 255, 255, 0.4);
        /* Warna putih dengan transparansi */
    }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Upload File XLS/XLSX</h4>
                    </div>
                    <?php include("aksi.php") ?>
                    <div class="card-body ">
                        <div class="row">
                        <div class="col-auto mb-2">
    
                            
                        </div>
                        </div>
                        <form action="" method="POST" enctype="multipart/form-data" class="row g-3">
                            <div class="col-auto">
                                <i class="fas fa-cpanel"></i>
                            </div>
                            <div class="col-auto">
                                <input class="form-control" type="file" id="formFile" name="filexls" required>
                            </div>
                            <div class="col-auto">
                                <button type="submit" name="submit" class="btn btn-primary">Upload File</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl1PILFhosVNubqM3pGY2J6T8eD1D1H9pYPyy56P7XoJUKdIJ0VXNJm5GsE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGcbGSUNTdA5KQpe1g+2vDA5OAKgkFOktZPrVxP0h/1RWKQdZpG8FqW/ZTv" crossorigin="anonymous">
    </script>
</body>

</html>