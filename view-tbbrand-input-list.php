<select class="form-select" id="tid" name="tid">
  <?php
while ($tbbrandItem = $tbbrandList->fetch_assoc()) {
?>
  <option value="<?php echo $tbbrandItem['tennisball_id'];?>"><?php echo $tbbrandItem['tb_brand'];?></option>
  <?php
}
?>
</select>
