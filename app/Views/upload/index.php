<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-5">
        <form id="upload-form" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="excel-file" class="form-label">Pilih file Excel</label>
                <input type="file" name="excel_file" id="excel-file" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Upload</button>
        </form>

        <div id="loading" class="mt-3 text-center" style="display:none;">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <div>Mengupload file...</div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#upload-form').submit(function(event) {
                event.preventDefault();

                // Menampilkan animasi loading
                $('#loading').show();

                // Mengirim file Excel ke server menggunakan Ajax
                var formData = new FormData($(this)[0]);

                $.ajax({
                    url: '<?php echo base_url('upload/process'); ?>',
                    type: 'POST',
                    data: formData,
                    async: true,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                        // Menyembunyikan animasi loading
                        $('#loading').hide();

                        // Menampilkan Sweet Alert
                        Swal.fire({
                            icon: 'success',
                            title: 'Upload berhasil',
                            // text: response
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>