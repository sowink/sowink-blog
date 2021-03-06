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

/**
 * This class is an API for accessing a form and looping through its contents.
 * Common shortcode options can be used to show/hide columns, search/filter fields, limit, orderby etc.
 * Set them in the input $options array.
 * Example code:
 * <code>
 *    // Email all the "Mike"'s
 *    require_once(ABSPATH . 'wp-content/plugins/contact-form-7-to-database-extension/CFDBFormIterator.php');
 *    $exp = new CFDBFormIterator();
 *    $exp->export('my-form', new array('show' => 'name,email', 'search' => 'mike'));
 *    while ($row = $exp->nextRow()) {
 *       wp_mail($row['email'], 'Hello ' . $row['name], 'How are you doing?');
 *    }
 *
 * </code>
 */
require_once('ExportBase.php');
require_once('CFDBExport.php');

class CFDBFormIterator extends ExportBase implements CFDBExport {

    /**
     * Intended to be used by people who what to programmatically loop over the rows
     * of a form.
     * @param $formName string
     * @param $options array of option_name => option_value
     * @return void
     */
    public function export($formName, $options = null) {
        $this->setOptions($options);
        $this->setCommonOptions();
        $this->setDataIterator($formName);
    }

    /**
     * @return array|bool associative array of the row values or false if no more row exists
     */
    public function nextRow() {
        if ($this->dataIterator->nextRow()) {
            $row = array();
            foreach ($this->dataIterator->displayColumns as $aCol) {
                $row[$aCol] = $this->dataIterator->row[$aCol];
            }
            return $row;
        }
        else {
            return false;
        }
    }
}
