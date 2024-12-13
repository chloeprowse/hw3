<select class="form-select" id="tbbrand" name="tbbrand">
  <?php
  while ($tbbrandItem = $tbbrandList->fetch_assoc()) {
      echo '<option value="' . $tbbrandItem['tb_brand'] . '">' . $tbbrandItem['tb_brand'] . '</option>';
  }
  ?>
</select>


