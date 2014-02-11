<?php
global $v4ContactForm;

if (isset($_GET['tab'])) {
    $active_tab = $_GET['tab'];
} else {
    $active_tab = 'simple';
}
?>
<div class="wrap">

    <div id="icon-themes" class="icon32"></div>
    <h2>1CRM Contact Form 7 Integration</h2>

    <h2 class="nav-tab-wrapper">
        <a href="<?php echo add_query_arg(array('tab' => 'simple'), $_SERVER['REQUEST_URI']); ?>"
           class="nav-tab <?php echo $active_tab == 'simple' ? 'nav-tab-active' : ''; ?>">Simple</a>
        <a href="<?php echo add_query_arg(array('tab' => 'help'), $_SERVER['REQUEST_URI']); ?>"
           class="nav-tab <?php echo $active_tab == 'help' ? 'nav-tab-active' : ''; ?>">Help</a>
    </h2>

    <form method="post" action="<?php echo str_replace('%7E', '~', $_SERVER['REQUEST_URI']); ?>">
        <?php wp_nonce_field('save_v4lc_settings', 'save_the_v4lc'); ?>

        <?php if ($active_tab == "simple"): ?>
            <h3>Required</h3>
            <p>These are the most basic settings you must configure. Without these, you won't be able to use 1CRM
                Lead Capture.</p>
            <table class="form-table">
                <tbody>
                <tr>
                    <th scope="row" valign="top">Lead Capture URI</th>
                    <td>
                        <input type="text" name="<?php echo $this->get_field_name('lc_uri'); ?>"
                               value="<?php echo $v4ContactForm->get_setting('lc_uri'); ?>"/><br/>
                        The address of your 1CRM server. Example: http://demo.infoathand.net/WebToLeadCapture.php
                    </td>
                </tr>
                <tr>
                    <th scope="row" valign="top">Related Campaign</th>
                    <td>
                        <input type="text" name="<?php echo $this->get_field_name('campaign_id'); ?>"
                               value="<?php echo $v4ContactForm->get_setting('campaign_id'); ?>"/><br/>
                        The ID of the Campaign you want to relate to captured Leads

                    </td>
                </tr>
                <tr>
                    <th scope="row" valign="top">Assigned User</th>
                    <td>
                        <input type="text" name="<?php echo $this->get_field_name('assigned_user_id'); ?>"
                               value="<?php echo join(';', (array)$v4ContactForm->get_setting('assigned_user_id')); ?>"/><br/>
                        The ID of the user , the captured leads should be assigned to.

                    </td>
                </tr>

                </tbody>
            </table>
            <p><input class="button-primary" type="submit" value="Save Settings"/></p>
            <?php
        else: ?>
            <h3>Help</h3>
            <p>Here's a brief primer on how to use 1CRM Lead Capture.</p>
            <h4>The Form</h4>
            <p>
                You can create forms from within 1CRM->Campaigns->Creat Lead Form that contain all possible fields.<br/>
                These forms need to be reworked for use with contact form 7 of course, as this plugin uses special tags.<br/>
                A simple form could look like this:<br/>
                <pre style="border: 1px solid #000000; padding: 5px"><?php
                echo htmlspecialchars('<p>Ihr Vorname (Pflichtfeld)<br />
    [text* first_name] </p>
<p>Ihr Nachname (Pflichtfeld)<br />
    [text* last_name] </p>
<p>Ihre Firma (Pflichtfeld)<br />
    [text* account_name] </p>

<p>Ihre Telefonnummer (Pflichtfeld)<br />
    [tel* phone_work] </p>

<p>Ihre E-Mail-Adresse (Pflichtfeld)<br />
    [email* email1] </p>

<p>Ihre Nachricht<br />
    [textarea description] </p>

[acceptance acceptance-1crm] Ich akzeptiere die AGBs
<p>[submit "Senden"]</p>');
                ?>
                </pre>
            </p>
        <?php endif; ?>
    </form>
</div>