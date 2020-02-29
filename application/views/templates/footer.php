    <!-- Footer -->
    <footer class="page-footer font-small bg-pink py-3">

      <!-- Copyright -->
      <div class="footer-copyright text-center py-3">© 2018 Copyright:
        <a href="https://mdbootstrap.com/education/bootstrap/"> PINKLABEL.COM</a>
      </div>
      <!-- Copyright -->

    </footer>
    <!-- Footer -->
  </div>
</div>

  <div class="overlay"></div>


<!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal trash -->
<div class="modal fade" style="z-index: 1501;"id="trashModal" tabindex="-1" role="dialog" aria-labelledby="trashModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="trashModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        hapus dari keranjang?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="<?= base_url('keranjang/hapus/').$produk['id']; ?>" method="post">
            <input type="hidden" name="uri" value="<?= $this->uri->uri_string; ?>">
            <input type="hidden" name="pid" value="">
            <!-- <input type="hidden" name="segment" value="<?= $this->uri->segment(4, 0); ?>"> -->
        <button type="submit" class="btn btn-danger">hapus</button>
            </form>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- jQuery Custom Scroller CDN -->

    <script type="text/javascript">
        $(document).ready(function () {
           
            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });


            $('#dismiss2, .overlay').on('click', function () {
                $('#sidebar2').removeClass('active');
                $('.overlay').removeClass('active');
                document.documentElement.style.overflowY = "scroll";
            });

            var sidebar2 = function(){

               document.documentElement.style.overflowY = "hidden";
              $('#sidebar2').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
            }

            $('#sidebarCollapse2').on('click', sidebar2); 

            function bla(elm){
              
              var data = {jumlah : elm.val(), idp: elm.siblings('.idprod').val(), idk: elm.siblings('.idkrj').val()};
              $.ajax({
                type: 'POST',
                url: "<?= base_url('keranjang/ubahJumlah/'); ?>",
                data: data,
                success: function(response) {
                  elm.parent().siblings('.card-body').children('.harga').html(response);
                }
              });
            }
            var ubahJumlah = function(el,data){
              $.ajax({
                type: 'POST',
                url: "<?= base_url('keranjang/ubahJumlah/'); ?>",
                data: data,
                success: function(response) {
                  el.parent().siblings('.card-body').children('.harga').html(response);
                }
              });
            }

            var ubahTotal = function(){
              $.ajax({
                url: "<?= base_url('keranjang/ubahTotal/'); ?>",
                success: function(response) {
                  $('.totalkeranjang').html(response);
                }
              });
            }
              $('.plus').click(function(){
                $(this).siblings('.count').val(parseInt($(this).siblings('.count').val()) + 1 );
                bla($(this).siblings('.count')); 
                ubahTotal();
              });
              
              $('.minus').click(function(){
                $(this).siblings('.count').val(parseInt($(this).siblings('.count').val()) - 1 );
                  if ($(this).siblings('.count').val() == 0) {
                  $(this).siblings('.count').val(1);
                }
                bla($(this).siblings('.count'));
                ubahTotal();
              });
            // $('.btn-ker').click(function(event){
            <?php if($this->input->get('ker') != null) :?>
              sidebar2();
            <?php endif; ?>
            // });
            // const harga = $('.count').parent().siblings('.card-body').children('.harga');
// 
            

            $('.count').keyup(function(){
              
              var data = {jumlah : $(this).val(), idp: $(this).siblings('.idprod').val(), idk: $(this).siblings('.idkrj').val()};

              ubahJumlah($(this),data);
              ubahTotal();

            });
            $('#trashModal').on('show.bs.modal', function(e) {

                //get data-id attribute of the clicked element
                var bookId = $(e.relatedTarget).data('pid');

                //populate the textbox
                $(e.currentTarget).find('input[name="pid"]').val(bookId);
            });



        });


    </script>

</body>

</html>
