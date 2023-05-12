<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }

        thead {
            background-color: gray;
        }

        .head {
            text-align: center;
            ;
        }

        .footer {
            /* display: flex;
            flex-direction: row;
            justify-content: center; */
            text-align: center;
            margin-left: 600px;
        }

        .title {
            margin-top: 20px;
            margin-bottom: 70px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div style="text-align: center; ">
            <?php
            $srcLogo = APPPATH . '../public/assets/img/logo.png';
            $srcNtt = APPPATH . '../public/assets/img/ntt.png';

            $imageDataLogo  = base64_encode(file_get_contents($srcLogo));
            $imageDataNtt   = base64_encode(file_get_contents($srcNtt));

            $renderLogo     = 'data:' . mime_content_type($srcLogo) . ';base64,' . $imageDataLogo;
            $renderDataNtt   = 'data:' . mime_content_type($srcNtt) . ';base64,' . $imageDataNtt;
            ?>



            <div style="display: inline-block;">
                <img width="60px" src="<?= $renderDataNtt; ?>" alt="">
            </div>

            <div style="display: inline-block; text-align: center; margin: 0 80px;">
                <p style="margin: 0; font-weight: bold;">PEMERINTAH PROVINSI NUSA TENGGARA TIMUR</p>
                <p style="margin: 0; font-weight: bold;">KABUPATEN MANGGARAI BARAT</p>
                <p style="margin: 0; font-weight: bold;">SMP NEGERI 2 BOLENG</p>
                <!-- <p style="margin: 0; font-size: small;">Jalan Lintas Selatan Desa Nggorang</p> -->
            </div>

            <div style="display: inline-block;">
                <img width="60px" src="<?= $renderLogo; ?>" alt="">
            </div>
        </div>
        <hr>

        <div>

            <p style="text-align: right;"><?php echo "Boleng, " . date('d-m-Y'); ?></p>
            <h3 class="head"><?= $title; ?></h3>
        </div>


        <?= $this->renderSection("table"); ?>
        <div class="footer">
            <div class="title">
                Kepala Sekolah
            </div>

            <div>
                <p style="font-weight: bold; margin: 0;">( ------------------------------------- )</p>
                <!-- <p style="margin: 0;">Pembi</p> -->
                <p style="margin: 0;">NIP. </p>
            </div>
        </div>
    </div>
</body>

</html>