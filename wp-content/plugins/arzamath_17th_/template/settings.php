
<div class="wrap">
    <h2>Arzamath setting</h2>
    <form method="post" action="options.php">
        <?php @settings_fields('arzamath_settings_group'); ?>
        <?php @do_settings_fields('arzamath_settings_group'); ?>

        <table class="form-table">
            <tr valign="top">
                <th scope="row"><label for="setting_a">Перше поле налаштування</label></th>
                <td><input type="text" name="setting_a" id="setting_a" value="<?php echo get_option('setting_a'); ?>" /></td>
            </tr>
            <tr valign="top">
                <th scope="row"><label for="setting_b">Друге поле налаштувань</label></th>
                <td>
                    <select name="setting_b">
                        <option <?php if(get_option('setting_b')=="Dynamo Kyiv"): ?>selected <?php endif;?>value='Dynamo Kyiv'>Dynamo Kyiv</option>
                        <option <?php if(get_option('setting_b')=="Dnipro"): ?>selected <?php endif;?>value='Dnipro'>Dnipro</option>
                        <option <?php if(get_option('setting_b')=="Karpaty"): ?>selected <?php endif;?>value='Karpaty'>Karpaty</option>
                        <option <?php if(get_option('setting_b')=="Metalist"): ?>selected <?php endif;?>value='Metalist'>Metalist</option>
                    </select>
                </td>
            </tr>
        </table>

        <?php @submit_button(); ?>
    </form>
</div>