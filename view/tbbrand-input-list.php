<select class="form-select" id="tbbrand" name="tbbrand">
  <?php
  while ($tbbrandItem = $tbbrandList->fetch_assoc()) {
      // Determine if the current option should be selected
      $selText = ($selectedtbbrand == $tbbrandItem['tennisball_id']) ? " selected" : "";

      // Output the option element
      echo '<option value="' . $tbbrandItem['tb_brand'] . '"' . $selText . '>' . $tbbrandItem['tb_brand'] . '</option>';
  }
  ?>
</select>



