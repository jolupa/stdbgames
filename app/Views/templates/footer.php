  <div class="footer is-green-eagle mt-5">
    <article id="footer" class="container section">
      <div class="colums">
        <div class="column is-full">
          <p class="title is-5 has-text-centered">Social Networks</p>
          <p class="subtitle is-3 has-text-centered"><span class="icon"><a href="https://twitter.com/DbStadia" target="_blank"><i class="fab fa-twitter-square"></i></span></a>&nbsp;<span class="icon"><a href="https://www.youtube.com/channel/UC-iYBmekqPeVhPbNWCG0ukQ" target="_blank"><i class="fab fa-youtube-square"></i></a></span>&nbsp;<span class="icon"><a href="https://github.com/jolupa/stdbgames" target="_blank"><i class="fab fa-github-square"></i></a></span></p>
        </div>
      </div>
      <div class="columns">
        <div class="column is-full">
          <p class="title is-5 has-text-centered">
            <span class="icon-text"><span><strong>Stadia GamesDB!</strong> is made with</span> <span class="icon has-text-danger"><i class="fas fa-heart"></i></span> <span>In Barcelona</span></span>
            <br>
            <span class="icon-text"><span class="icon"><i class="fas fa-copyright"></i></span><span>&nbsp;2020&nbsp;/&nbsp;<?= date('Y') ?><strong>&nbsp;jolupa</strong></span></span>
            <br>
            <span class="icon-text"><span>Stadia and the Stadia Logo are</span> <span class="icon"><i class="fas fa-copyright"></i></span> <span>&</span>&nbsp;<span class="icon"><i class="fas fa-trademark"></i></span>&nbsp;of Google Inc.</span>
            <br>
            All Games Names, Images, and Logos are property of their respective owners.
          </p>
        </div>
      </div>
    </article>
  </div>
  <script src="<?= base_url('/js/vendor/modernizr-3.11.2.min.js') ?>"></script>
  <script src="<?= base_url('/js/plugins.js') ?>"></script>
  <script src="<?= base_url('/js/main.js') ?>"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-179938115-1', 'auto'); ga('set', 'anonymizeIp', true); ga('set', 'transport', 'beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>
