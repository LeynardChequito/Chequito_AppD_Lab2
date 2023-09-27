<div class="modal fade" id="addsongs" tabindex="-1" aria-labelledby="addsongs" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Song</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <br>

                    <form action="/addsong" method="post" enctype="multipart/form-data">
                        <input type="file" name="song">
                        <button type="submit">Submit</button>
                    </form>


                </div>
                <div class="modal-footer">
                    <a href="#" data-bs-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
    </div>