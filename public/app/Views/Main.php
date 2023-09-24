<!DOCTYPE html>
<html lang="en">
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
         background-color: #f5f5f5;
         padding: 20px;
     }

     h1 {
         color: #333;
     }

     #player-container {
         max-width: 400px;
         margin: 0 auto;
         padding: 20px;
         background-color: #fff;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
     }

     audio {
         width: 100%;
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
<body>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </button> 
        </div>
        <div class="modal-body">
          <br>
          <label for="playlist">Playlist</label>
             <input type="text" name="playlist" id="playlist">
            <input type="submit" name="add">
             <br>
              <a href="/Music Player/Far Away.mp3 /">Far Away</a>
              <br>
              <a href="/playlist/">Style</a>
              <br>
              <a href="/playlist/">All I ever Need</a>
              <br>
              <a href="/playlist/">Super Far</a>
              <br>
        </div>
        <div class="modal-footer">
          <a href="#" data-bs-dismiss="modal">Close</a>
          <a href="#" data-bs-toggle="modal" data-bs-target="#createPlaylist">Create New</a>
             <br />
    <a href="#" data-bs-toggle="modal" data-bs-target="#deletePlaylist">Delete</a>
             <br>
        </div>
        </div>
      </div>
    </div>
  </div>
  <form action="/" method="get">
    <input type="search" name="search" placeholder="search song">
    <button type="submit" class="btn btn-primary">search</button>
  </form>
    <h1>Music Player</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  My Playlist
</button>
    <audio id="song" controls autoplay></audio>
    <ul id="playlist">
             </audio>
        <li data-src="">Far Away</li>
        <li data-src="/">Style
        <li data-src="/your music src">All I ever Need
        <li data-src="">Super Far
        </li>
    </ul>
    <div class="modal id="myModal>
      <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Select from playlist</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPlaylist">Add Playlist</button>
             <br>
            </div>
          <!-- Modal body -->
          <div class="modal-body">
          <form action="/" method="post">
            <!-- <p id="modalData"></p> -->
            <input type="hidden" id="musicID" name="musicID">
            <select  name="playlist" class="form-control" >
              <option value="playlist">playlist</option>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPlaylist">Create Playlist</button>
             <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deletePlaylist">Delete Playlist</button>
             <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSong">Add Song</button>
             <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteSong">Delete Song</button>
             <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editSong">Edit Song</button>
             <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editPlaylist">Edit Playlist</button>
            </select>
            <input type="submit" name="add">  
            </form>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <a href="a"data-bs-dismiss="modal">Close</a>
            <a href="a"data-bs-toggle="modal">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
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
</body>
</html>
