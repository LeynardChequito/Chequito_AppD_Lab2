<div class="modal fade" id="addToPlaylistModal" tabindex="-1" aria-labelledby="addToPlaylistModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addToPlaylistModalLabel">Add to Playlist</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('addToPlaylist') ?>" method="post">
          <!-- Input for selecting a playlist -->
          <div class="form-group">
            <label for="playlistSelect">Select a Playlist:</label>
            <select class="form-control" id="playlistSelect" name="playlist">
              <?php if (!empty($playlists)): ?>
                <?php foreach ($playlists as $playlist): ?>
                  <option value="<?= $playlist['playlist_id'] ?>"><?= $playlist['name'] ?></option>
                <?php endforeach; ?>
              <?php else: ?>
                <option value="">No playlists available</option>
              <?php endif; ?>
            </select>
          </div>
          <!-- Hidden input for music file path -->
          <input type="hidden" id="musicId" name="musicId" value="">
          <button type="submit" class="btn btn-primary">Add to Playlist</button>
        </form>
      </div>
    </div>
  </div>
</div>