<form action="/" method="get">
    <input type="search" name="search" placeholder="search song">
    <button type="submit" class="btn btn-primary">search</button>
  </form>
    <h1>Music Player</h1>
    <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Open Playlist </a>

    <audio id="audio" controls autoplay></audio>
    <ul id="playlist">

        <li data-src="/your music src">music name
        </li>
    </ul>