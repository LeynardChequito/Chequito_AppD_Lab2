<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">My Playlist</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-content">
        
        <div class="modal-body">
          
              <?php foreach ($playlist as $item): ?>
              <br>
              <a href="/playlist/<?= $item['id']?>">
              <?=$item['name']?> 
              </a>
              <br>
              <?php endforeach?>
        </div>
        
        <div class="modal-footer">
          <a href="#" data-bs-dismiss="modal">Close</a>
          <a href="#" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Create New</a>

        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">Add to Playlist</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/createPlaylist" method="post">
            <input type="text" name="pname">
            <button type="submit">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Back to first</button>
      </div>
    </div>
  </div>
</div>