<?php
/**
 * CodeIgniter.
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2015, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2015, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 *
 * @link	http://codeigniter.com
 * @since	Version 1.3.0
 * @filesource
 */
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Postgre Forge Class.
 *
 * @category	Database
 *
 * @author		EllisLab Dev Team
 *
 * @link		http://codeigniter.com/user_guide/database/
 */
class CI_DB_postgre_forge extends CI_DB_forge
{
    /**
     * UNSIGNED support.
     *
     * @var array
     */
    protected $_unsigned = [
        'INT2'     => 'INTEGER',
        'SMALLINT' => 'INTEGER',
        'INT'      => 'BIGINT',
        'INT4'     => 'BIGINT',
        'INTEGER'  => 'BIGINT',
        'INT8'     => 'NUMERIC',
        'BIGINT'   => 'NUMERIC',
        'REAL'     => 'DOUBLE PRECISION',
        'FLOAT'    => 'DOUBLE PRECISION',
    ];

    /**
     * NULL value representation in CREATE/ALTER TABLE statements.
     *
     * @var string
     */
    protected $_null = 'NULL';

    // --------------------------------------------------------------------

    /**
     * Class constructor.
     *
     * @param object &$db Database object
     */
    public function __construct(&$db)
    {
        parent::__construct($db);

        if (version_compare($this->db->version(), '9.0', '>')) {
            $this->create_table_if = 'CREATE TABLE IF NOT EXISTS';
        }
    }

    // --------------------------------------------------------------------

    /**
     * ALTER TABLE.
     *
     * @param string $alter_type ALTER type
     * @param string $table      Table name
     * @param mixed  $field      Column definition
     *
     * @return string|string[]
     */
    protected function _alter_table($alter_type, $table, $field)
    {
        if (in_array($alter_type, ['DROP', 'ADD'], true)) {
            return parent::_alter_table($alter_type, $table, $field);
        }

        $sql = 'ALTER TABLE '.$this->db->escape_identifiers($table);
        $sqls = [];
        for ($i = 0, $c = count($field); $i < $c; $i++) {
            if ($field[$i]['_literal'] !== false) {
                return false;
            }

            if (version_compare($this->db->version(), '8', '>=') && isset($field[$i]['type'])) {
                $sqls[] = $sql.' ALTER COLUMN '.$this->db->escape_identifiers($field[$i]['name'])
                    .' TYPE '.$field[$i]['type'].$field[$i]['length'];
            }

            if (!empty($field[$i]['default'])) {
                $sqls[] = $sql.' ALTER COLUMN '.$this->db->escape_identifiers($field[$i]['name'])
                    .' SET DEFAULT '.$field[$i]['default'];
            }

            if (isset($field[$i]['null'])) {
                $sqls[] = $sql.' ALTER COLUMN '.$this->db->escape_identifiers($field[$i]['name'])
                    .($field[$i]['null'] === true ? ' DROP NOT NULL' : ' SET NOT NULL');
            }

            if (!empty($field[$i]['new_name'])) {
                $sqls[] = $sql.' RENAME COLUMN '.$this->db->escape_identifiers($field[$i]['name'])
                    .' TO '.$this->db->escape_identifiers($field[$i]['new_name']);
            }

            if (!empty($field[$i]['comment'])) {
                $sqls[] = 'COMMENT ON COLUMN '
                    .$this->db->escape_identifiers($table).'.'.$this->db->escape_identifiers($field[$i]['name'])
                    .' IS '.$field[$i]['comment'];
            }
        }

        return $sqls;
    }

    // --------------------------------------------------------------------

    /**
     * Field attribute TYPE.
     *
     * Performs a data type mapping between different databases.
     *
     * @param array &$attributes
     */
    protected function _attr_type(&$attributes)
    {
        // Reset field lenghts for data types that don't support it
        if (isset($attributes['CONSTRAINT']) && stripos($attributes['TYPE'], 'int') !== false) {
            $attributes['CONSTRAINT'] = null;
        }

        switch (strtoupper($attributes['TYPE'])) {
            case 'TINYINT':
                $attributes['TYPE'] = 'SMALLINT';
                $attributes['UNSIGNED'] = false;

                return;
            case 'MEDIUMINT':
                $attributes['TYPE'] = 'INTEGER';
                $attributes['UNSIGNED'] = false;

                return;
            default: return;
        }
    }

    // --------------------------------------------------------------------

    /**
     * Field attribute AUTO_INCREMENT.
     *
     * @param array &$attributes
     * @param array &$field
     */
    protected function _attr_auto_increment(&$attributes, &$field)
    {
        if (!empty($attributes['AUTO_INCREMENT']) && $attributes['AUTO_INCREMENT'] === true) {
            $field['type'] = ($field['type'] === 'NUMERIC')
                ? 'BIGSERIAL'
                : 'SERIAL';
        }
    }
}
