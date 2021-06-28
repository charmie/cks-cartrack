<?php

class SetupView {
    public function index() {
        echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <button id="btn-setup">Setup DB</button>
        <script>
            jQuery('#btn-setup').click(function(){
                alert('setup db here');
            });
        </script>';
    }
}