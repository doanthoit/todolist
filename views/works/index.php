<header>
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex justify-content-around">
                <a href="/works/calendar" class="btn btn-info">Calendar Viewer</a>
            </div>
            <div class="col-md-6 d-flex justify-content-around">
                <a href="/works/create" class="btn btn-success">Create New Work</a>
            </div>
        </div>
    </div>
</header>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Starting Date</th>
                        <th scope="col">Ending Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($works as $index => $work) : ?>
                        <tr>
                            <td><?= $index+1; ?></td>
                            <td><?= $work->name; ?></td>
                            <td><?= date('Y-m-d H:i:s', strtotime($work->starting_date)); ?></td>
                            <td><?= date('Y-m-d H:i:s', strtotime($work->ending_date)); ?></td>
                            <td><?= $status[$work->status]; ?></td>
                            <td>
                                <a href="/works/edit?id=<?= $work->id; ?>" class="btn btn-primary">Edit</a>
                                <a href="/works/delete?id=<?= $work->id; ?>" class="btn btn-danger delete-work">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>