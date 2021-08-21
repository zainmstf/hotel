</div>
</div>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin keluar ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Klik Logout untuk keluar </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/bootstrap/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/bootstrap/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/bootstrap/js/sb-admin-2.min.js') ?>"></script>
<!-- Page level plugins -->
<script src="<?= base_url('assets/bootstrap/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/bootstrap/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>
<!-- Page level custom scripts -->
<script src="<?= base_url('assets/bootstrap/js/demo/datatables-demo.js') ?>"></script>
<script src="<?= base_url('assets/bootstrap/vendor/moment/min/moment.min.js') ?>"></script>
<script src="<?= base_url('assets/bootstrap/vendor/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') ?>"></script>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
    $('.datetimepicker').datetimepicker({
        format: 'YYYY-MM-DD'
    });

    $(document).ready(function() {
        $('#id_kamar').change(function() {
            var id_kamar = $('#id_kamar').val();
            $.ajax({
                type: 'GET',
                url: '<?= base_url('booking/getStock') ?>/' + id_kamar,
                success: function(html) {
                    $('#stock').html(html);
                }
            });
        });
    });
    $('.kamar_only').attr('disabled', true);

    function enableSelect() {
        $('.kamar_only').attr('disabled', false);
    }

    $(document).ready(function() {
        $('.kamarid').mouseover(function() {
            var key = $(this).attr('data-key');
            var kamar_only = $('#kamar_only' + key).val();
            $.ajax({
                type: 'GET',
                url: '<?= base_url('booking/getStockHidden') ?>/' + kamar_only,
                success: function(html) {
                    $('#stock' + key).html(html);
                }
            });
        });
    });
</script>
</body>

</html>