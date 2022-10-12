<header>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-3">
                <h1 class="h1 text-center"><?= $title; ?></h1>
            </div>
        </div>
    </div>
</header>

<scetion>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form action="/works/store" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Name..."
                               required="required">
                    </div>
                    <div class="form-group mt-3">
                        <label for="starting_date">Start date</label>
                        <input type="text" name="starting_date" id="starting_date" class="form-control"
                               placeholder="YYYY-MM-DD">
                    </div>
                    <div class="form-group mt-3">
                        <label for="ending_date">End date</label>
                        <input type="text" name="ending_date" id="ending_date" class="form-control"
                               placeholder="YYYY-MM-DD">
                    </div>
                    <div class="form-group mt-3">
                        <label for="ending_date">Status</label>
                        <select name="status" class="form-control">
                            <?php foreach ($status as $key => $value) : ?>
                                <option value="<?php echo $key; ?>">
                                    <?php echo $value ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group d-grid gap-2 mx-auto  mt-3">
                        <input class="btn btn-primary" type="submit" value="Create">
                    </div>
                    <div class="form-group d-grid gap-2 mx-auto mt-3">
                        <a class="btn btn-info" href="/works">Back To List</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</scetion>