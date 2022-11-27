<div class="pb-3">
    <h1>Conference editing</h1>
</div>
<div class="px-5 w-75">
    <form action="/conference/edit/<?= $id; ?>" method="POST">
        <h3>Title</h3>
        <p><input type="text" value="<?= htmlspecialchars($data['title'], ENT_QUOTES); ?>" class="form-control" name="title"></p>
        <h3>Date</h3>
        <p><input type="date" value="<?= $data['date'] ?>" name="date" class="form-control"></p>
        <h3>Adress:</h3>
        <div id="maps"></div>
        <p>Latitude:<input oninput="coordChange()" id='latitude' type="text" value="<?= $data['latitude']; ?>" name="latitude" class="form-control"></p>
        <p>Longitude:<input oninput="coordChange()" id='longitude' type="text" value="<?= $data['longitude']; ?>" name="longitude" class="form-control"></p>
        <h3>Country</h3>
        <p><select name="country" class="custom-select">
                <option>Select country</option>
                <?php foreach ($countries as $country) : ?>
                    <option <?php if ($data['country'] == $country) {
                                echo "selected";
                            } ?>> <?php echo $country; ?> </option>
                <?php endforeach ?>
            </select>
        </p>
        <div class="pl-2">
            <b><a href="/" class="btn btn-secondary">Back</a></b>
            <b><a href="/conference/delete/<?= $id ?>" class="btn btn-danger">Delete</a></b>
            <b><button type="submit" class="btn btn-success">Save</button></b>
        </div>
    </form>
</div>