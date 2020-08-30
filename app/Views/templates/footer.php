  </div>
</div>
<div class="section">
  <div class="footer">
    <div class="columns is-centered">
      <div class="column is-8 is-multiline">
        <div class="content has-text-centered">
          <p><strong>Our Stadia Friends:</strong></p>
          <p><a href="https://www.cloudgamingxtreme.com" alt="Cloud Gaming Xtreme" title="Cloud Gaming Xtreme" target="_blank"><img class="image is-96x96 mr-2" src="<?= base_url() ?>/images/friends/xcloudxtreme.jpeg" alt="Cloud Gaming Xtreme" title="Cloud Gaming Xtreme"></a></p>
        </div>
        <div class="content has-text-centered">
          <p><strong>Stadia GamesDB!</strong> is made with <span class="icon has-text-danger"><i class="fas fa-heart"></i></span> In Barcelona <span class="icon has-text-dark"><i class="fas fa-copyright"></i></span>&nbsp;<?= date('Y') ?> <strong>jolupa</strong><br>
          Stadia and the Stadia Logo are <span class="icon has-text-dark"><i class="fas fa-copyright"></i></span> & <span class="icon has-text-dark"><i class="fas fa-trademark"></i></span> of Google Inc.<br>
          All Games Names, Images, and Logos are property of their respective owners<br>
          <a href="https://twitter.com/DbStadia" target="_blank"><span class="icon"><i class="fab fa-twitter"></i></span></a> <a href="https://github.com/jolupa/stdbgames" target="_blank"><span class="icon"><i class="fab fa-github"></i></span></a> <span class="icon"><i class="fab fa-patreon"></i></span></p>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>

<script>
  document.addEventListener('DOMContentLoaded', () => {

    // Get all "navbar-burger" elements
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

    // Check if there are any navbar burgers
    if ($navbarBurgers.length > 0) {

      // Add a click event on each of them
      $navbarBurgers.forEach( el => {
        el.addEventListener('click', () => {

          // Get the target from the "data-target" attribute
          const target = el.dataset.target;
          const $target = document.getElementById(target);

          // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
          el.classList.toggle('is-active');
          $target.classList.toggle('is-active');

        });
      });
    }

  });
</script>

<!-- Default Statcounter code for Stadia GamesDB! https://stdb.games -->
<script type="text/javascript">
var sc_project=12351925;
var sc_invisible=1;
var sc_security="24327085";
var sc_https=1;
</script>
<script type="text/javascript"
src="https://www.statcounter.com/counter/counter.js" async></script>
<noscript><div class="statcounter"><a title="Web Analytics Made Easy -
StatCounter" href="https://statcounter.com/" target="_blank"><img
class="statcounter" src="https://c.statcounter.com/12351925/0/24327085/1/"
alt="Web Analytics Made Easy - StatCounter"></a></div></noscript>
<!-- End of Statcounter Code -->

<?php if(isset($editor)): ?>
  <script>
    tinymce.init({
      selector: '#textarea',
      plugins: 'code, lists',
      menubar: false,
      toolbar:[{
        name: 'formatting', items: ['bold','italic','code','numlist','bullist']
      }],
      valid_elements: 'p,strong,br,strong/b,ul,ol,li',
      elementpath: false,
      branding: false,
    });
  </script>
<?php endif; ?>

<?php if(isset($doodle)): ?>
  <script>
    lighbox.option({})
  </script>
<?php endif; ?>
