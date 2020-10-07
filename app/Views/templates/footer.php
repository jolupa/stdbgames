    <section class="section">
      <div class="footer">
        <div class="columns is-centered">
          <div class="column is-8 is-multiline">
            <div class="content has-text-centered">
              <p><strong>Our Stadia Friends:</strong></p>
              <p class="is-inline-block">
                <a class="is-inline-block" href="https://www.cloudgamingxtreme.com" alt="Cloud Gaming Xtreme" title="Cloud Gaming Xtreme" target="_blank"><img class="image is-96x96 mr-2" src="<?= base_url() ?>/images/friends/xcloudxtreme.jpeg" alt="Cloud Gaming Xtreme" title="Cloud Gaming Xtreme"></a>&nbsp;
                <a  class="is-inline-block" href="https://twitter.com/scarlet_stream" alt="Scarlet Stream" title="Scarlet Stream" target="_blank"><img class="image is-96x96 mr-2" src="<?= base_url() ?>/images/friends/scarletlogo.jpeg" alt="Scarlet Stream" title="Scarlet Stream"></a>&nbsp;
                <a  class="is-inline-block" href="https://twitter.com/teamstadiaplay" alt="Team Stadia Play" title="Team Stadia Play" target="_blank"><img class="image is-96x96 mr-2" src="<?= base_url() ?>/images/friends/teamstadialogo.jpeg" alt="Team Stadia Play" title="Team Stadia Play"></a>&nbsp;
                <a  class="is-inline-block" href="https://twitter.com/deolhonostadia" alt="De olho no Stadia" title="De olho no Stadia" target="_blank"><img class="image is-96x96 mr-2" src="<?= base_url() ?>/images/friends/deolhostadialogo.jpeg" alt="De olho no Stadia" title="De olho no Stadia"></a>&nbsp;
                <a  class="is-inline-block" href="https://www.youtube.com/channel/UCvx7nDcdRYMuwbqcYscoDAg" alt="Dr. Spaceman" title="Dr. Spaceman" target="_blank"><img class="image is-96x96 mr-2" src="<?= base_url() ?>/images/friends/drspaceman.jpeg" alt="Dr. Spaceman" title="Dr. Spaceman"></a>
              </p>
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
    </section>
  </body>
</html>

<!-- Default Google Analytics code for Stadia GamesDB! https://stdb.games -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-179938115-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-179938115-1');
</script>
<!-- End of Google Analytics Code -->

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
  <script src="<?= base_url() ?>/assets/js/lightbox.js"></script>
  <script>
    lighbox.option({})
  </script>
<?php endif; ?>
