WPto1CRM
========

Wordpress Plugin to extend "contact form 7" to capture forms as 1CRM leads

this plugin needs Contact Form 7 and uses the wpcf7_before_send_mail hook to send Leads to 1CRM

Affiliate IDs are handled by the plugin and transferred to 1CRM. Partners need to link your Website with additional query string

    ?[PARTNER_NUMBER]_[SOURCE_NUMBER]
    or
    ?[PARTNER_NUMBER]

to install copy both php files to the plugins folder of your Wordpress installation and activate the plugin within Wordpress Administration.
After activation you will get a new setting link 'CRM Lead Capture'

Changes:
2017-02: compatibility with current CF7 (4.7)