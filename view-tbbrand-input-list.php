<select class="form-select" id="tbbrand" name="tbbrand">
  <?php
while ($tbbrandItem = $tbbrandList->fetch_assoc()) {
  $selText = "";
  if ($selectedtbbrand == $tbbrandItem['tb_brand'] {
$selText = "selected";
      }
?>
  <option value="<?php echo $tbbrandItem['tb_brand'];?>"<?-selText?>><?php echo $tbbrandItem['tb_brand'];?></option>
  <?php
}
?>
</select>
