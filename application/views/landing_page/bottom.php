<div class="modal fade" id="inputcode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Masukan Code Tes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open('hitung/kode_proses') ?>
      <div class="modal-body">
        <div class="form-group">
          <input type="text" name="code_tes" class="form-control">
        </div>
        Belum Punya code ? <a href="">Daftar Sekarang</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Confirm</button>
      <?= form_close() ?>
      </div>

    </div>
  </div>
</div>
  <!-- Bootstrap core JavaScript -->
  <script src="<?= base_url('assets/startbootstrap-landing-page/') ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/startbootstrap-landing-page/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript">
    $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
      if (!$(this).next().hasClass('show')) {
        $(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
      }
      var $subMenu = $(this).next('.dropdown-menu');
      $subMenu.toggleClass('show');

      $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
        $('.dropdown-submenu .show').removeClass('show');
      });

      return false;
    });
  </script>
</body>

</html>