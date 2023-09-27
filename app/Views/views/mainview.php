<form action="/" method="get">
    <input type="search" name="search" placeholder="search song">
    <button type="submit" class="btn btn-primary">Search</button>
  </form>
    <h1>Music Player</h1>
    <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Open Playlist </a>
    <a class="btn btn-primary" data-bs-toggle="modal" href="#addsongs" role="button">Add Songs</a>

    <audio id="audio" controls autoplay></audio>
    <ul id="playlist">

        <?php foreach ($songs as $songs): ?>
            <li data-src="uploads/<?= $songs['file'] ?>">
                <?= $songs['title'] ?>
            </li>
        <?php endforeach ?>
        
    </ul>