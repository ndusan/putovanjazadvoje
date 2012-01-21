<div id="container">
    <!-- Image Puzzle -->
    <div id="puzzle">
        <!-- Image Puzzle -->
        <ul id="sortable" style="background:url(<?= IMAGE_PATH . 'dog.jpg'; ?>) center center no-repeat; width:500px; height:500px;">
            <div id="start">Click to Start</div>
        </ul>
        <!-- Puzzle Stats -->
        <div id="stats">
            <span id="moves">0</span> moves
            <span id="time">0</span> seconds
        </div>
    </div>
</div>
<div class="containerSide">
    <h1>Ime nagradne igre</h1>
    <p>
        Fotografija mora biti zapisa od minimalno 500 kb s naznakom za Foto natječaj. Ne zaboravite istaknuti vaše podatke: ime, prezime, adresu, e-mail i broj telefona.
    </p>
    <img width=300" height="300" src="<?= IMAGE_PATH . 'dog.jpg'; ?>" />
</div>

<script type="text/javascript">
    App.Competition = App.Competition || {};
    //This needs to be translated
    App.Competition.completed = 'Congratulations! <a href="<?= DS . $params['lang']; ?>">Click here to finish.</a>';
</script>