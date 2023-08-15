<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>    
</head>
<body>

    
    <div class="container">
        <div class="row">
            <div class="col-12">


                <h1><?= $title ?></h1>

            </div>
        </div>
        <div class="row">
            <div class="col">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAMA</th>
                            <th>JABATAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($employees as $k => $e) : ?>
                        <tr>
                            <td><?= ($k + 1)?></td>
                            <td><?= $e['name'] ?></td>
                            <td><?= $e['department'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>
</html>