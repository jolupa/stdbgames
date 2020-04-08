    <footer class="footer">
      <div class="content has-text-centered">
        <p><strong>Stadia GamesDB!</strong> is made with <span class="icon has-text-danger"><i class="fas fa-heart"></i></span> in <strong>Barcelona</strong> <span class="icon"><i class="fas fa-copyright"></i></span> <?= date("Y") ?> jolupa</p>
        <p>We are in <a href="https://twitter.com/DbStadia" target="_blank"><span class="icon"><i class="fab fa-twitter"></i></span></a></p>
      </div>
    </footer>
  </body>
  <script>
    $(document).ready(function() {

      // Check for click events on the navbar burger icon
      $(".navbar-burger").click(function() {

          // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
          $(".navbar-burger").toggleClass("is-active");
          $(".navbar-menu").toggleClass("is-active");

      });
    });
  </script>
</html>
