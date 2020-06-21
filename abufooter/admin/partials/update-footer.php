<?php
    global $wpdb;
    require_once plugin_dir_path(__FILE__) . '../../includes/class-abufooter-activator.php';
        $rows = $wpdb->get_results("SELECT * FROM ". Abufooter_Activator::abuFooter_table() ,ARRAY_A);
    ?>
<div class="container">
  <h1>Footer setting</h1>
  <form action="javascript:void(0)" id="formFooter">
  <div class="form-group">
        <label for="ftext">Footer text:</label>
        <textarea name="footer_text" class="form-control" rows="5" id="ftext" placeholder="Enter footer text" required><?php echo $rows[0]["footer_text"]?></textarea>
    </div>
    <div class="form-group">
        <label for="fface">facebook</label>
        <input name="facebook" value="<?php echo $rows[0]["f_facebook"]?>" type="text" class="form-control" id="fface" placeholder="Enter facebook url" required>
    </div>
    <div class="form-group">
        <label for="ftwitter">Twitter</label>
        <input name="twitter" value="<?php echo $rows[0]["f_twitter"]?>" type="text" class="form-control" id="ftwitter" placeholder="Enter twitter url" required>
    </div>
    <div class="form-group">
        <label for="fcoord">coordinate</label>
        <input name="coordinate" value="<?php echo $rows[0]["f_email"]?>" type="text" class="form-control" id="fcoord" placeholder="Enter coordinate" required>
    </div>

    <button class="btn btn-primary" type="submit">Update Footer</button>
  </form>
</div>

