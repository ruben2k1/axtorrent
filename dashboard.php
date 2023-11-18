<?php require_once('app/middlewares/checkSession.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - AXTorrent</title>
    <link rel="shortcut icon" href="public/favicon.ico" type="image/x-icon">
    <meta name="robots" content="noindex, nofollow">
</head>
<body>
    <button id="create">CREATE NEW FILE</button>
    <button id="add">ADD EPISODE</button>
    <a href="app/controllers/processLogout.php" rel="nofollow">Log out</a>

    <script>
        document.getElementById('create').addEventListener('click', function () {
            let fileForm = document.createElement('form');
            fileForm.id = 'fileForm';
            fileForm.action = 'app/controllers/processFile.php';
            fileForm.method = 'post';
            fileForm.enctype = 'multipart/form-data';

            fileForm.innerHTML = `
                <label for="title">Title</label>
                <input type="text" name="title" id=""><br>
                <label for="description">Description</label><br>
                <textarea name="description" id="" cols="30" rows="10"></textarea><br>
                <label for="type">Type</label>
                <select name="type" id="">
                    <option value="SERIE">SERIE</option>
                    <option value="PELICULA">PELICULA</option>
                    <option value="MUSICA">MUSICA</option>
                    <option value="VIDEOJUEGO">VIDEOJUEGO</option>
                    <option value="DOCUMENTAL">DOCUMENTAL</option>
                    <option value="LIBRO">LIBRO</option>
                </select><br>
                <label for="genre">Genre</label>
                <input type="text" name="genre" id=""><br>
                <label for="format">Format</label>
                <select name="format" id="">
                    <option value="HDRip">HDRip</option>
                    <option value="HDTV">HDTV</option>
                    <option value="HDTV-720p">HDTV-720p</option>
                    <option value="SAT-Rip">SAT-Rip</option>
                    <option value="DVDRip">DVDRip</option>
                    <option value="MicroHD-720p">MicroHD-720p</option>
                    <option value="MicroHD-1080p">MicroHD-1080p</option>
                    <option value="BluRay-720p">BluRay-720p</option>
                    <option value="BluRay-1080p">BluRay-1080p</option>
                    <option value="BDremux-1080p">BDremux-1080p</option>
                    <option value="4K">4K</option>
                </select><br>
                <label for="release_date">Release date</label>
                <input type="number" name="release_date" id=""><br>
                <label for="director">Director</label>
                <input type="text" name="director" id=""><br>
                <label for="cast">Cast</label>
                <input type="text" name="cast" id=""><br>
                <label for="ext_img_route">External image route</label>
                <input type="text" name="ext_img_route" id=""><br>

                <h2>Episode 1</h2>
                <label for="episode_title">Title</label>
                <input type="text" name="episode_title[]" id=""><br>
                <label for="episode_int_file_route">Internal file route</label>
                <input type="file" name="episode_int_file_route[]" id=""><br>
                <label for="episode_date">Date</label>
                <input type="date" name="episode_date[]" id=""><br>

                <div id="episodes"></div>

                <button type="button" id="addEpisode">Add Episode</button><br><br>

                <input type="submit" value="Upload">`;

            document.body.appendChild(fileForm);

            let episodeCount = 1;
            
            document.getElementById('addEpisode').addEventListener('click', function () {
                episodeCount++;

                let episodeDiv = document.createElement('div');
                episodeDiv.innerHTML = `
                    <h2>Episode ${episodeCount}</h2>
                    <label for="episode_title">Title</label>
                    <input type="text" name="episode_title[]" id=""><br>
                    <label for="episode_int_file_route">Internal file route</label>
                    <input type="file" name="episode_int_file_route[]" id=""><br>
                    <label for="episode_date">Date</label>
                    <input type="date" name="episode_date[]" id=""><br>`;
                    
                document.getElementById('episodes').appendChild(episodeDiv);
            });
        });

        document.getElementById('add').addEventListener('click', () => {
            
        })
    </script>
</body>
</html>