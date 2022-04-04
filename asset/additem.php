<?php include('../layout/header.php') ?>

<div class="px-28 flex flex-col">
  <div class="mt-3">
    <form method="post" action="additem_action.php">
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
      <div class="w-full flex mt-3">
        <div class='w-1/6'>
          Name
        </div>
        <div class='w-5/6'>
          <input name="itemname" type="text" class="border border-gray-500 rounded px-1 focus:outline-blue-500" placeholder="Name"/>
        </div>
      </div>
      <input type="submit" class="bg-gray-400 hover:bg-gray-500 rounded px-3 py-0.5 mt-3" value="Add Item"/>
    </form>
  </div>
</div>

<?php include('../layout/footer.php') ?>
