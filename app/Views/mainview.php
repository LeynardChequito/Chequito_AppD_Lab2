<!DOCTYPE html>
<html lang="en">
<body>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #d3d3d3;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        #player-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #000;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        audio {
            width: 50%;
        }

        #playlist {
            list-style: none;
            padding: 0;
        }

        #playlist li {
            cursor: pointer;
            padding: 10px;
            background-color: #eee;
            margin: 5px 0;
            transition: background-color 0.2s ease-in-out;
        }

        #playlist li:hover {
            background-color: #ddd;
        }

        #playlist li.active {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>

<div class="modal fade" id="manageSongsModal" tabindex="-1" aria-labelledby="manageSongsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="manageSongsModalLabel">Manage Songs</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!-- Inside the Manage Songs Modal -->
                <form action="/doupload" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="music_id" value="">


                    <div class="mb-3">
                        <label for="file" class="form-label">Song File (MP3 or WAV)</label>
                        <input type="file" class="form-control" name="song" required>
                    </div>



                    <button type="submit" class="btn btn-dark">Add Song</button>
                </form>
            </div>
            <div class="modal-footer bg-dark">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

<!-- Playlist Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="exampleModalLabel">My Playlists</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php foreach ($listplay as $playlist): ?>
                            <div class="playlist-item d-flex justify-content-between align-items-center mb-3">
                                <a href="/playlist/<?= $playlist['playlist_id'] ?>?playlistID=<?= $playlist['playlist_id'] ?>"
                                    class="playlist-link">
                                    <?= $playlist['name'] ?>
                                </a>

                                <a href="/delete_playlist/<?= $playlist['playlist_id'] ?>" class="btn btn-secondary btn-sm">
                                    Delete
                                </a>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <!-- Create Playlist Form -->
                <form action="/create_playlist" method="post">
                    <div class="input-group">
                        <input type="text" name="playlist_name" class="form-control" placeholder="Enter playlist name"
                            value="">
                        <button type="submit" class="btn btn-dark">Create</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-dark">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="exampleModalLabel">Select from playlist</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form action="/addtoplaylist" method="post">
                    <input type="hidden" id="musicID" name="musicID" value="">
                    <div class="mb-3">
                        <label for="playlistSelect" class="form-label">Select Playlist</label>
                        <select name="playlist" class="form-select">
                            <?php foreach ($listplay as $playlist): ?>
                                <option value="<?= $playlist['playlist_id'] ?>">
                                    <?= $playlist['name'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer bg-dark">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



          <div class="container">
            <div class="row">
              <div class="col">
                <a href="/mainview" class="btn btn-dark ml-2">
                  <i class="fas fa-home"></i> Home
                </a>
              </div>
              <div class="col">
                <!-- Search Form -->
                <form action="/search" method="get">
                  <div class="input-group">
                    <input type="search" name="search" class="form-control" placeholder="Search song">
                    <input type="hidden" name="context" value="<?= $context ?>">
                    <?php if ($context === 'playlist'): ?>
                      <input type="hidden" id="playlistIDInput" name="playlistID" value="">
                    <?php endif ?>
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-dark">Search</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>




        <!-- Music Player Header -->
        <h1 class="mt-4">Music Player</h1>

        <!-- Action Buttons -->
        <div class="mb-3">
          <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">My
            Playlist
          </button> 
          
        </div>
    </div>


    <!-- Audio Player -->
    <div class="audio-controls mb-3">
      <audio id="audio" controls autoplay></audio>
    </div>
          <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#manageSongsModal">Manage
            Songs
          </button> 

    <!-- Music Playlist -->
      <ul class="list-group" id="playlist">
        <?php foreach ($music as $musicItem): ?>
          <li class="list-group-item d-flex justify-content-between align-items-center"
            data-src="<?= base_url('/uploads/songs/' . $musicItem['file']) ?>">
            <?= $musicItem['title'] ?>
            <?php if ($context === 'playlist'): ?>
              <div class="btn-group">
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#myModal"
                  onclick="setMusicID('<?= $musicItem['music_id'] ?>')">
                  <i class="fas fa-plus"></i>+
                </button>
                <a href="<?= site_url('/removeFromPlaylist/' . $musicItem['id']) ?>" class="btn btn-secondary btn-sm">
                  <i class="fas fa-minus"></i>-
                </a>
              </div>
            <?php else: ?>
              <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#myModal"
                onclick="setMusicID('<?= $musicItem['music_id'] ?>')">
                <i class="fas fa-plus"></i>+
              </button>
            <?php endif ?>
          </li>
        <?php endforeach ?>
      </ul>




  </div>


  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Get the playlist ID from the URL
      const urlParams = new URLSearchParams(window.location.search);
      const playlistID = urlParams.get('playlistID');

      // Set the value of the hidden input field
      const playlistIDInput = document.getElementById('playlistIDInput');
      if (playlistID) {
        playlistIDInput.value = playlistID;
      }
    });
  </script>

  <script>
    $(document).ready(function () {
      // Get references to the button and modal
      const modal = $("#myModal");
      const modalData = $("#modalData");
      const musicID = $("#musicID");
      // Function to open the modal with the specified data
      function openModalWithData(dataId) {
        // Set the data inside the modal content
        modalData.text("Data ID: " + dataId);
        musicID.val(dataId);
        // Display the modal
        modal.css("display", "block");
      }

      // Add click event listeners to all open modal buttons

      // When the user clicks the close button or outside the modal, close it
      modal.click(function (event) {
        if (event.target === modal[0] || $(event.target).hasClass("close")) {
          modal.css("display", "none");
        }
      });
    });
  </script>
  <script>
    const audio = document.getElementById('audio');
    const playlist = document.getElementById('playlist');
    const playlistItems = playlist.querySelectorAll('li');

    let currentTrack = 0;

    function playTrack(trackIndex) {
      if (trackIndex >= 0 && trackIndex < playlistItems.length) {
        const track = playlistItems[trackIndex];
        const trackSrc = track.getAttribute('data-src');
        audio.src = trackSrc;
        audio.play();
        currentTrack = trackIndex;
      }
    }

    function nextTrack() {
      currentTrack = (currentTrack + 1) % playlistItems.length;
      playTrack(currentTrack);
    }

    function previousTrack() {
      currentTrack = (currentTrack - 1 + playlistItems.length) % playlistItems.length;
      playTrack(currentTrack);
    }

    playlistItems.forEach((item, index) => {
      item.addEventListener('click', () => {
        playTrack(index);
      });
    });

    audio.addEventListener('ended', () => {
      nextTrack();
    });

    playTrack(currentTrack);
  </script>
  <script>
    function setMusicID(musicID) {
      // Set the value of the hidden input field
      document.getElementById('musicID').value = musicID;
    }
  </script>

</body>

</html>