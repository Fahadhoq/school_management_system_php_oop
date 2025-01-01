<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Home</title>

    <link rel="stylesheet" type="text/css" href="<?=ROOT?>/assets/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=ROOT?>/assets/all.min.css">
</head>
<body>
    <div class="container-fluid">
        <h1><i class="fa fa-plus"></i> This is home</h1>
        
        <!-- Display rows in a table -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($rows) && is_array($rows)): ?>
                    <?php foreach ($rows as $index => $row): ?>
                        <tr>
                            <td><?= $index + 1; ?></td>
                            <td><?= htmlspecialchars($row->firstname); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">No data found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
