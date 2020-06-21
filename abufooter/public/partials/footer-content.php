
<div class="container text-center my-4">

    <?php
    global $wpdb;
    require_once plugin_dir_path(__FILE__) . '../../includes/class-abufooter-activator.php';
        $rows = $wpdb->get_results("SELECT * FROM ". Abufooter_Activator::abuFooter_table() ,ARRAY_A);
    ?>

    <p><?php echo $rows[0]["footer_text"]?></p>
    <div style="display: flex; justify-content: center;">
    <a href="<?php echo $rows[0]["f_facebook"]?>"><img style="width: 32px;" src="https://cdn2.iconfinder.com/data/icons/free-social-icons-1/200/Facebook-256.png" alt="facebook"></a>
    <a href="<?php echo $rows[0]["f_twitter"]?>"><img style="width: 32px;" src="https://cdn2.iconfinder.com/data/icons/free-social-icons-1/200/Twitter-256.png" alt="twitter"></a>
    <a href="mailto:<?php echo $rows[0]["f_email"]?>"><img style="width: 32px;" src="https://cdn2.iconfinder.com/data/icons/marketing-lineal-style/512/messagemailemailcommunication-512.png" alt="email"></a>
    </div>
    
</div>