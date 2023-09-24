<div class="modal fade" id="createPlaylistModal" tabindex="-1" aria-labelledby="createPlaylistModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createPlaylistModalLabel">Create Playlist</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="createPlaylistForm" action="<?= base_url('/savePlaylist') ?>" method="post">
          <div class="mb-3">
            <label for="playlistName" class="form-label">Playlist Name:</label>
            <input type="text" class="form-control" id="playlistName" name="name" placeholder="Enter playlist name" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" form="createPlaylistForm">Create</button>
      </div>
        </form>
    </div>
  </div>
</div>