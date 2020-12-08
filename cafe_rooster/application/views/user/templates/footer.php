    <!-- Load Modal -->
    <?php $this->load->view("admin/templates/modal.php"); ?>
    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Contact form JS-->
    <script src="<?= base_url(); ?>assets/user/mail/jqBootstrapValidation.js"></script>
    <script src="<?= base_url(); ?>assets/user/mail/contact_me.js"></script>
    <!-- Core theme JS-->
    <script src="<?= base_url(); ?>assets/user/js/scripts.js"></script>
    <script>
        $(function() {
            $(document).on('click', '.open-modal', function(e) {
                e.preventDefault();
                // console.log($(this).attr('data-id'));
                $("#get-data").modal('show');
                $.post('application/controllers/menu.php', {
                        id: $(this).attr('data-id')
                    },
                    function(html) {
                        $(".modal-body").html(html);
                    });
            });
        });
    </script>
</body>

</html>