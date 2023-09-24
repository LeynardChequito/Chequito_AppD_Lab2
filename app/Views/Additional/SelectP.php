<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select Playlist</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <br>
        <?php foreach ($playlists as $playlist) { ?>
          <a href="<?= base_url('/' . $playlist['playlist_id']) ?>" class="playlist-link"><?= esc($playlist['name']) ?></a>
          <br>
        <?php } ?>
      </div>
      <div class="modal-footer">
        <a href="#" data-bs-dismiss="modal">Close</a>
        <a href="#" data-bs-toggle="modal" data-bs-target="#createPlaylistModal">Create New</a>
      </div>
    </div>
  </div>
</div>