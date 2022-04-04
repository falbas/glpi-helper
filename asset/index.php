<?php include('../layout/header.php') ?>

<div class="px-28 flex flex-col">
  <div class="mt-3">
    <form method="get">
      <select name="itemtype" class="border border-blue-500 focus:outline-none">
        <?php
        $itemtypes = ["Computer", "Software", "NetworkEquipment", "Rack", "Enclosure", "Monitor", "SoftwareLicense", "Printer", "PDU", "Phone"];
        foreach ($itemtypes as $itemtype) {?>
        <option
          value="<?php echo $itemtype ?>"
          <?php echo (isset($_GET["itemtype"])?($_GET["itemtype"]==$itemtype?"selected":""):"")?>
          >
          <?php echo $itemtype ?>
        </option>
        <?php } ?>
      </select>
      <input type="submit" class="bg-gray-400 hover:bg-gray-500 rounded px-3" value="Filter">
      <a href="advancefilter.php" class="bg-gray-400 hover:bg-gray-500 rounded px-3 py-0.5">Advance Filter</a>
    </form>
  </div>
  <?php
    if (isset($_GET["itemtype"])) {
      $items = $_SESSION["client"]->getAllItem($_GET["itemtype"]);
  ?>
  <div class="mt-3">
    <table class="table-auto w-full">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <?php
            $exclude = ["rack", "enclosure", "pdu"];
            if (!in_array($_GET["itemtype"], $exclude)) {
              echo "<th>User ID</th>";
            }
          ?>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($items as $item) { ?>
        <tr>
          <td><?php echo $item["id"] ?></td>
          <td><?php echo $item["name"] ?></td>
          <?php
            if (!in_array($_GET["itemtype"], $exclude)) {
              echo "<td>".$item["users_id"]."</th>";
            }
          ?>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <?php } ?>
</div>

<?php include('../layout/footer.php') ?>
