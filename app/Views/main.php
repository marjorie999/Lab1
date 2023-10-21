<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Belanosima:wght@600&family=Dosis:wght@200;300&family=Fjalla+One&family=Kanit:wght@300&family=Oswald:wght@300&family=Outfit:wght@200&family=Poppins:wght@300&family=Rowdies:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
  
    <style>
    body {
         font-family:Georgia, 'Times New Roman', Times, serif;
         text-align: center;
         background: #237F2e;  
         background: -webkit-linear-gradient(to right, #1a5597, #3ad093);  /* Chrome 10-25, Safari 5.1-6 */
         background: linear-gradient(to right, #1a5597, #3ad093); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
         padding: 20px;
     }

     h1 {
         color: #444;
     } 

     #player-container {
         max-width: 100px;
         margin: 0 auto;
         padding: 10 0px;
         background-color: #3f3f3f;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
     }


     #playlist {
         list-style: none;
         padding: 0;
     }

     #playlist li {
          width: 500px;
          margin: 10px auto; 
         margin-top: 101, 10px;
         background-color: white;
         background-color: skyblue;
        transition: all 0.3s ease;
     }

     #playlist li:hover {
         background-color: #1a5597;
     }

     #playlist li.active {
         background-color: #3ad093;
         color: #fff;
     }
     h1{
            font-family: Papyrus;
            font-size: 50px;
            margin-top:10px;
            color: black;
            
           
        }
        input{
            width: 250px;
            height: 35px;
            font-family:Helvetica;
        }
        .search{
            height: 35px;
            width: 100px;
            margin-left:200px
            position: relative;
            font-family:sans-serif;
            background-color: #3caaab;
            color: black;
            border-radius: 10px;
          }
        
        
        .playlist{
          margin-top: 10px; /* Adjust as needed */
          margin-right: 13cm; /* Adjust as needed */
          margin-bottom: 10px; /* Adjust as needed */
          margin-left: 10cm; /* Adjust as needed */
           
  
           
        }
        .upload{

          margin-top: 10px; /* Adjust as needed */
          margin-right: 13cm; /* Adjust as needed */
          margin-bottom: 10px; /* Adjust as needed */
          margin-left: 10cm; /* Adjust as needed */   
        }

        audio {
         width: 400px;
          margin-top:10px;
          margin-right: 7cm; /* Adjust as needed */
          margin-bottom: 15cm; /* Adjust as needed */
          margin-left: 25px; /* Adjust as needed */
         
     }

        ul{
          list-style-type: none;
        }
    </style>
</head>
<body>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Your Playlist</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <br>
          <ul id="playlistList">
                    </ul>
                    <br>
                    <a href="/playlist/">your playlist</a>
                    <br>

        </div>
        <div class="modal-footer">
          <a href="#" data-bs-dismiss="modal">Close</a>
          <a href="#" data-bs-toggle="modal" data-bs-target="#createPlaylist">Create New</a>

        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="uploadModalLabel">Upload Music</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php include('upload.php'); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="createPlaylist" tabindex="-1" aria-labelledby="createPlaylistLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createPlaylistLabel">Create New Playlist</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="playlistForm" action="/create" method="post">
                        <div class="mb-3">
                            <label for="playlistName" class="form-label">Playlist Name</label>
                            <input type="text" class="form-control" name="playlistName" id="playlistName" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <h1>Music Player</h1>

    <form action="/" method="get">
    <input type="search" name="search" placeholder="search song">
    
    <button type="submit" class="btn btn-primary search">search</button>
    
   
  </form>

 <button type="button" class="btn btn-primary playlist" data-bs-toggle="modal" data-bs-target="#exampleModal">
  My Playlist
</button>
<button type="button" class="btn btn-primary upload" data-bs-toggle="modal" data-bs-target="#uploadModal">
  Upload Music
</button>


    <audio id="audio" controls autoplay></audio>
    <ul id="playlist">
        <?php foreach ($musicList as $track) : ?>
            <li data-src="<?= $track['FilePath']; ?>">
            <a href="#" class="play-link"><?= $track['Title']; ?></a>
            </li>
        <?php endforeach; ?>

    </ul>
    <div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Select from playlist</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
          <form action="/" method="post">
            <!-- <p id="modalData"></p> -->
            <input type="hidden" id="musicID" name="musicID">
            <select  name="playlist" class="form-control" >

              <option value="playlist">playlist</option>

            </select>
            <input type="submit" name="add">
            </form>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
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
<!--     
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

        // Handle the playlist creation form submission
        $('#playlistForm').submit(function (e) {
            e.preventDefault();
            const playlistName = $('#playlistName').val();

            // You can implement logic to create a new playlist here
            // For this example, we'll simply add the playlist name to the list
            const playlistList = $('#playlistList');
            playlistList.append(`<li>${playlistName}</li>`);

            // Close the modal
            $('#createPlaylist').modal('hide');

            // Clear the input field
            $('#playlistName').val('');
        });
    </script>
    <script>
    $(document).ready(function () {
        // Handle the playlist creation form submission
        $('#playlistForm').submit(function (e) {
            e.preventDefault();
            const playlistName = $('#playlistName').val();

            // Debugging: Log the playlistName to the console to check if it's correctly retrieved
            console.log('Playlist Name:', playlistName);

            // Send an AJAX request to create the playlist
            $.ajax({
                type: 'POST',
                url: '/playlist/create', // Route for playlist creation
                data: { playlistName: playlistName },
                success: function (response) {
                    // Debugging: Log the response to the console to check for errors
                    console.log('Response:', response);

                    // Append the new playlist name to the playlist list
                    $('#playlistList').append(`<li>${playlistName}</li>`);

                    // Clear the input field
                    $('#playlistName').val('');

                    // Close the modal
                    $('#createPlaylist').modal('hide');
                },
                error: function (error) {
                    // Debugging: Log any errors to the console
                    console.error('Error creating playlist:', error);

                    alert('Error creating playlist.');
                }
            });
        });
    });
</script> -->

</body>
</html>