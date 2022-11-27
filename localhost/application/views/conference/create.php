<div class="pb-3">
    <h1>Conference creating</h1>
</div>
<div class="px-5 w-75">
    <form action="/conference/create" method="POST">
        <h3>Title</h3>
        <p><input type="text" name="title" class="form-control"></p>
        <h3>Date</h3>
        <p><input type="date" name="date" class="form-control"></p>
        <h3>Adress:</h3>
        <div id="maps"></div>
        <p>Latitude: <input oninput="coordChange()" id="latitude" type="text" name="latitude" value="0" class="form-control"></p>
        <p>Longitude: <input oninput="coordChange()" id="longitude" type="text" name="longitude" value="0" class="form-control"></p>
        <h3>Country</h3>
        <p><select name="country" class="custom-select">
                <option>Select country</option>
                <?php foreach ($countries as $country) : ?>
                    <option><?php echo $country ?></option>
                <?php endforeach ?>
            </select>
        </p>
        <div>
            <a href="/" class="btn btn-secondary"><b>Back</b></a>
            <button type="submit" class="btn btn-success"><b>Save</b></button>
        </div>
    </form>
</div>