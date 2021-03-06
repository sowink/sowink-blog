<?php
/*
    "Contact Form to Database Extension" Copyright (C) 2011 Michael Simpson  (email : michael.d.simpson@gmail.com)

    This file is part of Contact Form to Database Extension.

    Contact Form to Database Extension is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    Contact Form to Database Extension is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Contact Form to Database Extension.
    If not, see <http://www.gnu.org/licenses/>.
*/

abstract class CFDBView {

    /**
     * @abstract
     * @param  $plugin CF7DBPlugin
     * @return void
     */
    abstract function display(&$plugin);

    protected function pageHeader(&$plugin) {
        $this->sponsorLink($plugin);
        $this->headerLinks();
    }


    protected function sponsorLink(&$plugin) {
        if ('true' != $plugin->getOption('Donated')) {
            ?>
        <script type="text/javascript">
            var psHost = (("https:" == document.location.protocol) ? "https://" : "http://");
            document.write(unescape("%3Cscript src='" + psHost + "pluginsponsors.com/direct/spsn/display.php?client=contact-form-7-to-database-extension&spot='type='text/javascript'%3E%3C/script%3E"));
        </script>
        <?php

        }
    }

    protected function headerLinks() {
        ?>
    <table style="width:100%;">
        <tbody>
        <tr>
            <td width="20%" style="font-size:x-small;">
                <a target="_donate"
                   href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=NEVDJ792HKGFN&lc=US&item_name=Wordpress%20Plugin&item_number=cf7%2dto%2ddb%2dextension&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted">
                    <img src="https://www.paypal.com/en_US/i/btn/btn_donate_SM.gif" alt="Donate">
                </a>
            </td>
            <td width="20%" style="font-size:x-small;">
                <a target="_cf7todb"
                   href="http://wordpress.org/extend/plugins/contact-form-7-to-database-extension">
                    <?php _e('Rate this Plugin', 'contact-form-7-to-database-extension') ?>
                </a>
            </td>
            <td width="20%" style="font-size:x-small;">
                <a target="_cf7todb"
                   href="http://cfdbplugin.com/">
                    <?php _e('Documentation', 'contact-form-7-to-database-extension') ?>
                </a>
            </td>
            <td width="20%" style="font-size:x-small;">
                <a target="_cf7todb"
                   href="http://wordpress.org/tags/contact-form-7-to-database-extension">
                    <?php _e('Support', 'contact-form-7-to-database-extension') ?>
                </a>
            </td>
            <td width="20%" style="font-size:x-small;">
                <a target="_cf7todb"
                   href="http://pluginsponsors.com/privacy.html">
                    <?php _e('Privacy Policy', 'contact-form-7-to-database-extension') ?>
                </a>
            </td>
        </tr>
        </tbody>
    </table>
    <?php

    }
}
