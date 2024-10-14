#
# ZCA Bootstrap Colors, uninstall MySQL database changes
#
# Bootstrap Colors: v3.7.0
#
# Note: If you are using phpMyAdmin and use a DB_PREFIX, you will need to add that prefix
# to each of the MySQL tables referenced below!  If you are copying and pasting into the
# Zen Cart admin Tools :: Install SQL Patches, that change is not needed.
#
# Remove the admin_pages entry
#
DELETE FROM admin_pages WHERE page_key = 'toolsZCABootstrapColors' LIMIT 1;
#
# Remove various configuration settings for the colors
#
DELETE FROM configuration
 WHERE configuration_key = 'ZCA_BOOTSTRAP_COLORS_VERSION'
    OR configuration_key LIKE 'ZCA\_BODY\_%'
    OR configuration_key LIKE 'ZCA\_BUTTON\_%'
    OR configuration_key LIKE 'ZCA\_HEADER\_%'
    OR configuration_key LIKE 'ZCA\_FOOTER\_%'
    OR configuration_key LIKE 'ZCA\_SIDEBOX\_%'
    OR configuration_key LIKE 'ZCA\_CENTERBOX\_%'
    OR configuration_key LIKE 'ZCA\_ADD\_TO\_CART\_%'
    OR configuration_key LIKE 'ZCA\_CHECKOUT\_%'
    OR configuration_key LIKE 'ZCA\_CAROUSEL\_%'
    OR configuration_key LIKE 'ZCA\_PRIMARY\_ADDRESS\_%'
    OR configuration_key LIKE 'ZCA\_SOLD\_OUT\_%'
    OR configuration_key LIKE 'ZCA\_ALERT\_INFO\_%';
#
# Remove the overall configuration-group for the color-related settings.
#
DELETE FROM configuration_group WHERE configuration_group_title = 'ZCA Bootstrap Colors' LIMIT 1;