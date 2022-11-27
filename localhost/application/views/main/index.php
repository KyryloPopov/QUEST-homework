<div>
    <?php if (isset($_SESSION['status'])) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong><?= $_SESSION['status'] ?></strong>
        </div>
        <?php unset($_SESSION['status']); ?>
    <?php endif ?>
</div>
<div class="d-flex justify-content-between pb-5 align-items-center">
    <div>
        <h1>Conference list</h1>
    </div>
    <div>
        <button onclick="window.location.href='conference/create'" class="btn btn-primary">Add Conference</button>
    </div>
</div>
<div>
    <?php foreach ($conferences as $conference) : ?>
        <div value="<?= $conference['id']; ?>" class="d-flex justify-content-between pd-2 pl-2 conference">
            <div>
                <h3>Title: <?php echo htmlspecialchars($conference['title'], ENT_QUOTES); ?></h3>
                <p>Date: <?php echo $conference['date']; ?></p>
            </div>
            <div>
                <a href="/conference/delete/<?= $conference['id'] ?>" class="btn btn-danger" id="deleteButton"><b>Delete</b></a>
            </div>
        </div>
    <?php endforeach ?>
</div>