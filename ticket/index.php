<?php include('../layout/header.php') ?>

<div class="px-28 flex flex-col">
  <div class="mt-3">
    <a href="advancefilter.php" class="bg-gray-400 hover:bg-gray-500 rounded px-3 py-0.5">Advance Filter</a>
  </div>
  <?php
    $items = $_SESSION["client"]->getAllItem("Ticket");
  ?>
  <div class="mt-3">
    <table class="table-auto w-full">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>User Id Recipient</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($items as $item) { ?>
        <tr>
          <td><?php echo $item["id"] ?></td>
          <td><?php echo $item["name"] ?></td>
          <td><?php echo $item["users_id_recipient"] ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<?php include('../layout/footer.php') ?>
