<select class="form-select" id="tbbrand" name="tbbrand">
  <?php
while ($tbbrandItem = $tbbrandList->fetch_assoc()) {
  
  <option value="<?php echo $tbbrandItem['tb_brand'];?>"selected<?php echo $tbbrandItem['tb_brand'];?></option>
  <?php
}
?>
</select>
