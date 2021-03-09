<div class="content">
  <p class="title is-5">Most Visited</p>
  <p class="subtitle is-3">#Games:</p>
  <table class="table is-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>#Visits</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($mostvisited as $mostvisited): ?>
        <tr>
          <td><?= $mostvisited['name'] ?></td>
          <td><strong><?= $mostvisited['views'] ?></strong></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
