<table>
    <tr valign="top">
        <th class="metabox_label_column">
            <label for="setting_a">Текстове поле</label>
        </th>
        <td>
            <input type="text" id="setting_a" name="setting_a" value="<?php
            echo @get_post_meta($post->ID, 'setting_a', true); ?>">
        </td>
    </tr>

    <tr valign="top">
        <th class="metabox_label_column">
            <label for="setting_b">Додати зображення</label>
        </th>alert
        <td>
            <input type="file" id="setting_b" name="setting_b" value="<?php
/*            echo @get_post_meta($post->ID, 'setting_b', true); */?>">
        </td>
    </tr>

    <tr valign="top">
        <th class="metabox_label_column">
            <label for="setting_c">Список</label>
        </th>

        <td>
            <?php /*$array2 = @get_post_meta($post->ID,  true); */?>
            <select name='setting_c' id="setting_c">
                <option <?php /*if(in_array("Значение 1", $array2)): */?>selected <?php /*endif; */?>value='Значение 1'>Значение 1</option>
                <option <?php /*if(in_array("Значение 2", $array2)): */?>selected <?php /*endif; */?>value='Значение 2'>Значение 2</option>
                <option <?php /*if(in_array("Значение 3", $array2)): */?>selected <?php /*endif; */?>value='Значение 3'>Значение 3</option>
                <option <?php /*if(in_array("Значение 4", $array2)): */?>selected <?php /*endif; */?>value='Значение 4'>Значение 4</option>
            </select>
        </td>
    </tr>

    <tr valign="top">
        <td>

            <input type="hidden" id="hidden" name="hidden"
                   value="<?php $var=$post->ID;
                   echo $var; ?>">
            <input type='button' value="button" onclick="hello()">
        </td>
    </tr>
    </table>






