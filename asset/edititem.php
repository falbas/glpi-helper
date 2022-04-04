<?php include('../layout/header.php') ?>

<div class="px-28 flex flex-col">
  <div class="mt-3">
    <?php $item = $_SESSION["client"]->getItem($_GET["itemtype"], $_GET["id"]) ?>
    <form method="post" action="edititem_action.php">
      <div class="w-full flex mt-3">
        <div class='w-1/6'>
          ID
        </div>
        <div class='w-5/6'>
          <?php echo $item["id"] ?>
          <input type="hidden" name="itemtype" value="<?php echo $_GET["itemtype"] ?>"/>
          <input type="hidden" name="id" value="<?php echo $item["id"] ?>"/>
        </div>
      </div>
      <div class="w-full flex mt-3">
        <div class='w-1/6'>
          Name
        </div>
        <div class='w-5/6'>
          <input name="itemname" type="text" class="border border-gray-500 rounded px-1 focus:outline-blue-500" placeholder="Name" value="<?php echo $item["name"] ?>"/>
        </div>
      </div>
      <input type="submit" class="bg-gray-400 hover:bg-gray-500 rounded px-3 py-0.5 mt-3" value="Edit Item"/>
    </form>
  </div>
</div>

<?php include('../layout/footer.php') ?>
