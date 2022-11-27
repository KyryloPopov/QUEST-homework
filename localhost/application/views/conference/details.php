<div class="pb-3">
    <h1>Conference details</h1>
</div>
<div>
    <form>
        <h3>
            <p>Title: <?php echo htmlspecialchars($conference['title'], ENT_QUOTES); ?></p>
            <p>Date: <?php echo $conference['date']; ?></p>
            <p>Adress:</p>
        </h3>
        <div id="maps"></div>
        <p style="margin-top: 10px;">Latitude: <span class="in" id='latitude'><?php echo $conference['latitude']; ?></span></p>
        <p>Longitude: <span id='longitude'><?php echo $conference['longitude']; ?></span></p>
        <h3>
            <p>Country: <?php echo $conference['country']; ?></p>
        </h3>
        <div class="pl-2">
            <a href="/" class="btn btn-secondary"><b>Back</b></a>
            <a href="/conference/edit/<?= $conference['id'] ?>" class="btn btn-warning"><b>Edit</b></a>
        </div>
    </form>
</div>