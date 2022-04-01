<?php include('../layout/header.php') ?>

<div class="px-28 flex flex-col">
  <div class="mt-3">
    <form method="get">
      <select name="itemtype" class="border border-blue-500 focus:outline-none">
        <option value="Computer" <?php echo (isset($_GET["itemtype"])?($_GET["itemtype"]=="Computer"?"selected":""):"") ?>>Computer</option>
        <option value="Monitor" <?php echo (isset($_GET["itemtype"])?($_GET["itemtype"]=="Monitor"?"selected":""):"") ?>>Monitor</option>
      </select>
      <input type="text" name="filter" class="border border-gray-500 rounded px-1 focus:outline-blue-500" placeholder="Filter">
      <input type="submit" class="bg-gray-400 hover:bg-gray-500 rounded px-3" value="Filter">
    </form>
  </div>
  <?php
    if (isset($_GET["itemtype"])) {
      $getfilter = explode(",", $_GET["filter"]);
      $filter = [];
      foreach ($getfilter as $itemfilter) {
        array_push(
          $filter,
          [
            ["field", "1"],
            ["searchtype", "contains"],
            ["value", $itemfilter],
            ["link", "OR"]
          ]
        );
      }
      $items = $_SESSION["client"]->searchItems($_GET["itemtype"], $filter, 2);
  ?>
  <div class="mt-3">
    <?php if ($items["totalcount"] > 0) { ?>
    <table class="table-auto w-full">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($items["data"] as $item) { ?>
        <tr>
          <td><?php echo $item[2] ?></td>
          <td><?php echo $item[1] ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    <?php } else {?>
    <div>Tidak ada item yang sesuai dengan filter</div>
    <?php } ?>
  </div>
  <?php } ?>
</div>

<?php include('../layout/footer.php') ?>
