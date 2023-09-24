<div class="modal fade" id="addMusicModal" tabindex="-1" aria-labelledby="addMusicModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMusicModalLabel">Add Music</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Music input form -->
                <form action="<?= base_url('/saveMusic') ?>" method="post" enctype="multipart/form-data">
                    <!-- Add form fields for music details -->
                    <div class="mb-3">
                        <label for="musicTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="musicTitle" name="musicTitle" required>
                    </div>

                    <div class="mb-3">
                        <label for="musicArtist" class="form-label">Artist</label>
                        <input type="text" class="form-control" id="musicArtist" name="musicArtist" required>
                    </div>

                    <div class="mb-3">
                        <label for="musicAlbum" class="form-label">Album</label>
                        <input type="text" class="form-control" id="musicAlbum" name="musicAlbum">
                    </div>

                    <div class="mb-3">
                        <label for="musicGenre" class="form-label">Genre</label>
                        <input type="text" class="form-control" id="musicGenre" name="musicGenre">
                    </div>

                    <div class="mb-3">
                        <label for="musicFilePath" class="form-label">Audio File</label>
                        <input type="file" class="form-control" id="musicFilePath" name="musicFilePath" accept=".mp3,.wav" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>