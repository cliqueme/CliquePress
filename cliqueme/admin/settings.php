<?php
    $saved = FALSE;
    
    function update_cliqueme_config($site_id, $selector, $custom_css){
        update_option('cliqueme_site_id', $site_id);
        update_option('cliqueme_selector', $selector);
        update_option('cliqueme_custom_css', $custom_css);
    }
    
    if(isset($_POST["site_id"])){
        update_cliqueme_config($_POST['site_id'], $_POST['selector'], $_POST['custom_css']);
        $saved = TRUE;
    }
    
    $site_id = get_option('cliqueme_site_id');
    $selector = get_option('cliqueme_selector');
    $custom_css = get_option('cliqueme_custom_css');
?>

<div class="wrap">
    <div id="icon-options-general" class="icon32"><br></div>
        <h2>Edit cliqueme settings</h2>
    
    <?php if ($saved){ ?>
    <div class="updated">
        <p><strong>Settings saved.</strong></p>
    </div>
    <?php } ?>

    <form method="post" name="cliqueme_settings_form">
        <table class="form-table">

            <tr valign="top">
                <th scope="row"><label for="site_id">Site ID</label></th>
                <td>
                    <input name="site_id" type="text" value="<?php echo $site_id ?>" class="regular-text">
                    <p class="description">Put your site_id here. If you don't have site_id, ask it by email at <a href="mailto:support@cliqueme.com">support@cliqueme.com</a>.</p>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><label for="selector">Selector</label></th>
                <td>
                    <input name="selector" type="text" value="<?php echo $selector ?>" class="regular-text">
                    <p class="description">If you want to modify which images CliqueMe should process, put here your own CSS selector.</p>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row"><label for="selector">Custom CSS</label></th>
                <td>
                    <textarea class="large-text code" name="custom_css"><?php echo $custom_css ?></textarea>
                    <p class="description">If need to modify cliqueme css, put your styles here.</p>
                </td>
            </tr>

        </table>

        <p class="submit"><input type="submit" class="button button-primary" value="Save Changes"></p>
    </form>
</div>