<div class="content">
  <div class="columns has-background-gunmetal is-vcentered">
    <div class="column is-8 has-text-centered">
      <p>Is <strong><?= $game['name'] ?></strong> your favourite Game? Vote to choose it as the best game!<br \>
      <span class="help">1 Vote for user. Votes runs from 2021-01-05 until 2021-01-31</span></p>
    </div>
    <div class="column is-4 has-text-centered">
      <a class="button is-info" href="<?= base_url() ?>/award/setvote/<?= $game['id'] ?>"><strong>Vote!</strong></a>
    </div>
  </div>
</div>
