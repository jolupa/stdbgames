<div class="content mt-5">
  <h1 class="title">
    Sales History:
  </h1>
</div>
<div class="table-container">
  <table class="table is-fullwidth">
    <thead>
      <tr>
        <th class="has-text-centered">Sales Start</th>
        <th class="has-text-centered">Price Pro</th>
        <th class="has-text-centered"><abbr title="Sales End For Pro Users">SEFPU</abbr></th>
        <th class="has-text-centered">Price All</th>
        <th class="has-text-centered"><abbr title="Sales End For All Users">SEFAU</abbr></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($history as $history): ?>
        <tr>
          <td><?= date ('d-m-Y', strtotime ($history ['date'])) ?></td>
          <?php if (empty ($history ['price_pro'])): ?>
            <td class="has-text-centered"><span class="icon"><i class="fa-solid fa-circle-xmark"></i></span></td>
          <?php else: ?>
            <td class="has-text-centered"><strong><?= $history ['price_pro'] ?> €</strong></td>
          <?php endif; ?>
          <?php if (empty ($history ['date_till_pro'])): ?>
            <td class="has-text-centered"><span class="icon"><i class="fa-solid fa-circle-xmark"></i></span></td>
          <?php else: ?>
            <td class="has-text-centered"><?= date ('d-m-Y', strtotime ($history ['date_till_pro'])) ?></td>
          <?php endif; ?>
          <?php if (empty ($history ['price_nonpro'])): ?>
            <td class="has-text-centered"><span class="icon"><i class="fa-solid fa-circle-xmark"></i></span></td>
          <?php else: ?>
            <td class="has-text-right"><strong><?= $history ['price_nonpro'] ?> €</strong></td>
          <?php endif; ?>
          <?php if (empty ($history ['date_till_nonpro'])): ?>
            <td class="has-text-centered"><span class="icon"><i class="fa-solid fa-circle-xmark"></i></span></td>
          <?php else: ?>
            <td class="has-text-right"><?= date ('d-m-Y', strtotime ($history ['date_till_nonpro'])) ?></td>
          <?php endif; ?>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
