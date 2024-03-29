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
    <button id="create">CREAR NUEVO ARCHIVO</button>
    <button id="add">AÑADIR EPISODIOS</button>
    <a href="app/controllers/processLogout.php" rel="nofollow">Log out</a>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function generateSerieFields(){
                return `
                <div id="serieFields">
                <label for="format">Formato</label>
                <select name="format" id="">
                    <option value="HDRip">HDRip</option>
                    <option value="HDTV" selected>HDTV</option>
                    <option value="HDTV-720p">HDTV-720p</option>
                    <option value="SAT-Rip">SAT-Rip</option>
                    <option value="DVDRip">DVDRip</option>
                    <option value="MicroHD-720p">MicroHD-720p</option>
                    <option value="MicroHD-1080p">MicroHD-1080p</option>
                    <option value="BluRay-720p">BluRay-720p</option>
                    <option value="BluRay-1080p">BluRay-1080p</option>
                    <option value="BDremux-1080p">BDremux-1080p</option>
                    <option value="4K">4K</option>
                    <option value="PC">PC</option>
                </select><br>
                <label for="release_date">Año de estreno</label>
                <input type="number" name="release_date" id=""><br>
                <label for="ext_img_route">Ruta imagen externa</label>
                <input type="text" name="ext_img_route" id=""><br>
                </div>`
            }

            function generatePeliculaFields(){
                return `
                <div id="peliculaFields">
                <label for="genre">Género</label>
                <input type="text" name="genre" id=""><br>
                <label for="format">Formato</label>
                <select name="format" id="">
                    <option value="HDRip">HDRip</option>
                    <option value="HDTV" selected>HDTV</option>
                    <option value="HDTV-720p">HDTV-720p</option>
                    <option value="SAT-Rip">SAT-Rip</option>
                    <option value="DVDRip">DVDRip</option>
                    <option value="MicroHD-720p">MicroHD-720p</option>
                    <option value="MicroHD-1080p">MicroHD-1080p</option>
                    <option value="BluRay-720p">BluRay-720p</option>
                    <option value="BluRay-1080p">BluRay-1080p</option>
                    <option value="BDremux-1080p">BDremux-1080p</option>
                    <option value="4K">4K</option>
                    <option value="PC">PC</option>
                </select><br>
                <label for="release_date">Año de estreno</label>
                <input type="number" name="release_date" id=""><br>
                <label for="director">Director</label>
                <input type="text" name="director" id=""><br>
                <label for="cast">Reparto</label>
                <input type="text" name="cast" id=""><br>
                <label for="ext_img_route">Ruta imagen externa</label>
                <input type="text" name="ext_img_route" id=""><br>
                </div>`
            }

            function generateVideojuegoFields(){
                return `
                <div id="videojuegoFields">
                <label for="genre">Género</label>
                <input type="text" name="genre" id=""><br>
                <label for="format">Formato</label>
                <select name="format" id="">
                    <option value="HDRip">HDRip</option>
                    <option value="HDTV" selected>HDTV</option>
                    <option value="HDTV-720p">HDTV-720p</option>
                    <option value="SAT-Rip">SAT-Rip</option>
                    <option value="DVDRip">DVDRip</option>
                    <option value="MicroHD-720p">MicroHD-720p</option>
                    <option value="MicroHD-1080p">MicroHD-1080p</option>
                    <option value="BluRay-720p">BluRay-720p</option>
                    <option value="BluRay-1080p">BluRay-1080p</option>
                    <option value="BDremux-1080p">BDremux-1080p</option>
                    <option value="4K">4K</option>
                    <option value="PC">PC</option>
                </select><br>
                <label for="release_date">Año de estreno</label>
                <input type="number" name="release_date" id=""><br>
                <label for="ext_img_route">Ruta imagen externa</label>
                <input type="text" name="ext_img_route" id=""><br>
                </div>`
            }

            function generateDocumentalFields(){
                return `
                <div id="documentalFields">
                <label for="format">Formato</label>
                <select name="format" id="">
                    <option value="HDRip">HDRip</option>
                    <option value="HDTV" selected>HDTV</option>
                    <option value="HDTV-720p">HDTV-720p</option>
                    <option value="SAT-Rip">SAT-Rip</option>
                    <option value="DVDRip">DVDRip</option>
                    <option value="MicroHD-720p">MicroHD-720p</option>
                    <option value="MicroHD-1080p">MicroHD-1080p</option>
                    <option value="BluRay-720p">BluRay-720p</option>
                    <option value="BluRay-1080p">BluRay-1080p</option>
                    <option value="BDremux-1080p">BDremux-1080p</option>
                    <option value="4K">4K</option>
                    <option value="PC">PC</option>
                </select><br>
                <label for="release_date">Año de estreno</label>
                <input type="number" name="release_date" id=""><br>
                <label for="ext_img_route">Ruta imagen externa</label>
                <input type="text" name="ext_img_route" id=""><br>
                </div>`
            }

            function generateMusicaFields(){
                return `
                <div id="musicaFields">
                <label for="genre">Género</label>
                <input type="text" name="genre" id=""><br>
                <label for="release_date">Año de estreno</label>
                <input type="number" name="release_date" id=""><br>
                <label for="ext_img_route">Ruta imagen externa</label>
                <input type="text" name="ext_img_route" id=""><br>
                </div>`
            }

            document.getElementById('create').addEventListener('click', function () {
                let episodeCount = 1;

                let fileForm = document.createElement('form');
                fileForm.id = 'fileForm';
                fileForm.action = 'app/controllers/processFile.php';
                fileForm.method = 'post';
                fileForm.enctype = 'multipart/form-data';

                fileForm.innerHTML = `
                <div id="mainFields">
                    <label for="title">Título</label>
                    <input type="text" name="title" id=""><br>
                    <label for="description">Descripción</label><br>
                    <textarea name="description" id="" cols="30" rows="10"></textarea><br>
                    <label for="type">Tipo</label>
                    <select name="type" id="typeSelect">
                        <option value=""></option>
                        <option value="SERIE">SERIE</option>
                        <option value="PELICULA">PELICULA</option>
                        <option value="MUSICA">MUSICA</option>
                        <option value="VIDEOJUEGO">VIDEOJUEGO</option>
                        <option value="DOCUMENTAL">DOCUMENTAL</option>
                        <option value="LIBRO">LIBRO</option>
                    </select><br>
                </div>

                <div id="fields"></div>

                <h2>Episodio 1</h2>
                <label for="episode_title">Título</label>
                <input type="text" name="episode_title[]" id=""><br>
                <label for="episode_int_file_route">Ruta archivo interna</label>
                <input type="file" name="episode_int_file_route[]" id=""><br>

                <div id="episodes"></div>

                <button type="button" id="addEpisode">Añadir episodio</button><br><br>

                <input type="submit" value="Subir">`;

                document.body.appendChild(fileForm);

                document.getElementById('typeSelect').addEventListener('change', function () {
                    const fieldsContainer = document.getElementById('fields');
                    
                    fieldsContainer.innerHTML = '';

                    switch (this.value) {
                        case 'SERIE':
                            fieldsContainer.innerHTML = generateSerieFields();            break;
                        case 'PELICULA':
                            fieldsContainer.innerHTML = generatePeliculaFields();   
                            break;
                        case 'VIDEOJUEGO':
                            fieldsContainer.innerHTML = generateVideojuegoFields();   
                            break;
                        case 'DOCUMENTAL':
                            fieldsContainer.innerHTML = generateDocumentalFields();   
                            break;
                        case 'MUSICA':
                            fieldsContainer.innerHTML = generateMusicaFields();   
                            break;
                        default:
                            break;
                    }
                });

                document.getElementById('addEpisode').addEventListener('click', function () {
                    episodeCount++;

                    let episodeDiv = document.createElement('div');

                    episodeDiv.innerHTML = `
                    <h2>Episodio ${episodeCount}</h2>
                    <label for="episode_title">Título</label>
                    <input type="text" name="episode_title[]" id=""><br>
                    <label for="episode_int_file_route">Ruta archivo interna</label>
                    <input type="file" name="episode_int_file_route[]" id=""><br>`;

                    document.getElementById('episodes').appendChild(episodeDiv);
                });
            });

            document.getElementById('add').addEventListener('click', () => {
                let episodeCount = 1;
                
                let fileForm = document.createElement('form');
                fileForm.id = 'fileForm';
                fileForm.action = 'app/controllers/processEpisodes.php';
                fileForm.method = 'post';
                fileForm.enctype = 'multipart/form-data';

                fileForm.innerHTML = `
                <label for="file_id">ID archivo</label>
                <input type="number" name="file_id" id="">
                <h2>Episodio 1</h2>
                <label for="episode_title">Título</label>
                <input type="text" name="episode_title[]" id=""><br>
                <label for="episode_magnet_file_route">Ruta archivo MAGNET</label>
                <input type="text" name="episode_magnet_file_route[]" id=""><br>
                <label for="episode_int_file_route">Ruta archivo interna</label>
                <input type="file" name="episode_int_file_route[]" id=""><br>

                <div id="episodes"></div>

                <button type="button" id="addEpisode">Añadir otro episodio</button><br><br>

                <input type="submit" value="Subir">`;

                document.body.appendChild(fileForm);

                document.getElementById('addEpisode').addEventListener('click', function () {
                    episodeCount++;

                    let episodeDiv = document.createElement('div');
                    episodeDiv.innerHTML = `
                    <h2>Episodio ${episodeCount}</h2>
                    <label for="episode_title">Título</label>
                    <input type="text" name="episode_title[]" id=""><br>
                    <label for="episode_magnet_file_route">Ruta archivo MAGNET</label>
                    <input type="text" name="episode_magnet_file_route[]" id=""><br>
                    <label for="episode_int_file_route">Ruta archivo interna</label>
                    <input type="file" name="episode_int_file_route[]" id=""><br>`;

                    document.getElementById('episodes').appendChild(episodeDiv);
                });
            })
        })
    </script>
</body>
</html>