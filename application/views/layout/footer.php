<?php

defined('BASEPATH') OR exit('No direct script access allowed');

?>

</div>


		<script
		src="https://code.jquery.com/jquery-3.6.0.js"
		integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
		crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script src="<?= base_url('public/js/teste.js')?>"></script>
        <script src="<?= base_url('public/plugins/popper.js/dist/umd/popper.min.js')?>"></script>
        <script src="<?= base_url('public/plugins/bootstrap/dist/js/bootstrap.min.js')?>"></script>
        <script src="<?= base_url('public/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js')?>"></script>
        <script src="<?= base_url('public/plugins/screenfull/dist/screenfull.js')?>"></script>
        <!-- <script src="<?= base_url('public/plugins/datatables.net/js/jquery.dataTables.min.js')?>"></script> -->
        <!-- <script src="<?= base_url('public/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js')?>"></script> -->
        <!-- <script src="<?= base_url('public/plugins/datatables.net-responsive/js/dataTables.responsive.min.js')?>"></script> -->
        <!-- <script src="<?= base_url('public/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')?>"></script> -->
        <!-- <script src="<?= base_url('public/plugins/jvectormap/jquery-jvectormap.min.js')?>"></script> -->
        <!-- <script src="<?= base_url('public/plugins/jvectormap/tests/assets/jquery-jvectormap-world-mill-en.js')?>"></script> -->
        <!-- <script src="<?= base_url('public/plugins/moment/moment.js')?>"></script> -->
        <!-- <script src="<?= base_url('public/plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js')?>"></script> -->
        <script src="<?= base_url('public/plugins/d3/dist/d3.min.js')?>"></script>
        <script src="<?= base_url('public/plugins/c3/c3.min.js')?>"></script>
        <!-- <script src="<?= base_url('public/js/tables.js')?>"></script> -->
        <!-- <script src="<?= base_url('public/js/widgets.js')?>"></script> -->
        <!-- <script src="<?= base_url('public/js/charts.js')?>"></script> -->
        <script src="<?= base_url('public/dist/js/theme.min.js')?>"></script>
        <script src="<?= base_url('/public/src/js/vendor/modernizr-2.8.3.min.js')?>"></script>

        <?php if(isset($scripts)) : ?>
            <?php foreach($scripts as $script): ?>
                <script src="<?= base_url('public/'. $script) ?>"></script>
            <?php endforeach ?>
        <?php endif ?>

    </body>
</html>
