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
      <a href="additem.php" class="bg-gray-400 hover:bg-gray-500 rounded px-3 py-0.5">Add Item</a>
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
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($items as $item) { ?>
        <tr class="border-b hover:bg-gray-300">
          <td class="py-2"><?php echo $item["id"] ?></td>
          <td><?php echo $item["name"] ?></td>
          <?php
            if (!in_array($_GET["itemtype"], $exclude)) {
              echo "<td>".$item["users_id"]."</th>";
            }
          ?>
          <td>
            <div class="flex">
              <a href="<?php echo "deleteitem.php?itemtype=".$_GET["itemtype"]."&id=".$item["id"] ?>">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-red-500 hover:opacity-50" fill="none" viewBox="0 0 24 24" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
              </a>
              <!-- <a href="" class="ml-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-blue-500 hover:opacity-50" fill="none" viewBox="0 0 24 24" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
              </a> -->
            </div>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <?php } ?>
</div>

<?php include('../layout/footer.php') ?>
