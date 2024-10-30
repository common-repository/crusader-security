<?php

if (!defined('ABSPATH')) die('Access Denied.');

if ( ! class_exists( 'MWPC_Model' ) ) {

	class MWPC_Model {

        public static function insertData( $data ) {
            global $wpdb;

            $query  = "INSERT INTO " . static::$TABLE_NAME;
            $names  = '(';
            $values = '(';
            foreach ( $data as $k => $v ) {
                $v = str_replace( '\'', '\\\'', $v );
                $v = str_replace( '"', '\\"', $v );
                $names .= $k . ',';
                $values .= "'$v',";
            }
            $names  = rtrim( $names, ',' ) . ')';
            $values = rtrim( $values, ',' ) . ')';
            $query .= $names . ' VALUES ' . $values;
            try {
                $wpdb->query( $query );
                $index = $wpdb->get_var( 'SELECT LAST_INSERT_ID();' );
            } catch ( Exception $ex ) {
                return $ex->getMessage();
            }

            return $index;
        }

        public static function querySingle( $query ) {
            global $wpdb;
            $query = str_replace('TABLE_NAME', static::$TABLE_NAME, $query);
            $results = $wpdb->get_results($query, ARRAY_A);

            if(is_array($results))
                return $results[0];
            else
                return false;
        }

        public static function query( $query ) {
            global $wpdb;
            $query = str_replace('TABLE_NAME', static::$TABLE_NAME, $query);
            $results = $wpdb->get_results($query, ARRAY_A);

            if(is_array($results))
                return $results;
            else
                return false;
        }

        public static function updateData($what, $where) {
            global $wpdb;

            $query = "UPDATE ".static::$TABLE_NAME." SET ";
            foreach ($what as $k => $v) {
                $v = str_replace('\'', '\\\'', $v);
                $v = str_replace('"', '\\"', $v);
                $query .= "$k = '$v',";
            }
            $query = rtrim($query, ',');
            $query .= " WHERE ";
            $c = 0;
            foreach ($where as $k => $v) {
                $c++;
                $AND = ' AND ';
                if ($c == sizeof($where)) $AND = '';
                $query .= "$k = '$v'$AND";
            }

            $wpdb->query($query);
            return true;
        }

        public static function getCount() {
            global $wpdb;
            $query = 'select count(*) from ' . static::TABLE_NAME . ';';
            $count = $wpdb->get_var($query);
            return $count;
        }

	}

}