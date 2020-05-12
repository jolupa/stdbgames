    <footer class="footer">
      <div class="content has-text-centered">
        <p><strong>Stadia GamesDB!</strong> is made with <span class="icon has-text-danger"><i class="fas fa-heart"></i></span> in <strong>Barcelona</strong> <span class="icon"><i class="fas fa-copyright"></i></span> <?= date("Y") ?> jolupa</p>
				<p>This site is not affiliated with <strong>Google</strong>.<br>
					<strong>Stadia</strong> and the <strong>Stadia Logo</strong> are <span class="icon"><i class="fas fa-trademark"></i></span> of Google</p>
        <p><a href="https://twitter.com/DbStadia" target="_blank" title="We are on Twitter"><span class="icon is-medium"><i class="fab fa-twitter"></i></span></a> <a target="_blank" href="https://github.com/jolupa/stdbgames" title="Help us on Github"><span class="icon is-medium"><i class="fab fa-github"></i></span></a><a title="Patron soon" href="#"><span class="icon is-medium"><i class="fab fa-patreon"></i></span></a></p>
      </div>
    </footer>
  </body>
</html>

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

  <script>
    tinymce.init({
      selector: '.textarea',
      plugins: 'code',
      menubar: false,
      toolbar:[{
        name: 'formatting', items: ['bold','italic','code']
      }],
      block_formats: 'Paragraph=p',
      valid_elements: 'p,strong,br,b/strong',
      elementpath: false,
      branding: false,
    });
  </script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-162315480-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-162315480-1');
</script>
