<?php
function get_attribute_terms($object)
{
    $result = (array) $object;
    $result['attribute_terms'] = get_terms(array(
        'taxonomy' => 'pa_' . $object->attribute_name,
        'hide_empty' => false,
    ));

    return $result;
}


function get_attributes($args = array())
{
    $result = array();
    $all_attributes = wc_get_attribute_taxonomies();
    $options = array_merge(array(
        'attributes_include' => false,       // int, string, array
        'attributes_exclude' => false,       // int, string, array
        'attributes_orderby' => 'none',      // 'id', 'name', 'label', 'none', 'rand', 'include'
        'attributes_order' => 'asc',       // 'asc', 'desc'
        'attributes_fields' => 'object',    // 'object', 'ids', 'id=>parent'
        'attributes_s' => false,       // string
        'attributes_limit' => 10           // int, -1
    ), $args);

    if ($options['attributes_include']) {
        switch (gettype($options['attributes_include'])) {
            case 'string':
                $id = (int) $options['attributes_include'];
                if ($options['attributes_include'] == $id) {
                    $iids = array($id);
                } else {
                    $iids = array($options['attributes_include']);
                }
                break;
            case 'integer':
                $iids = array($options['attributes_include']);
                break;
            case 'array':
                $pre_result = array();
                foreach ($options['attributes_include'] as $attibute_id) {
                    $pre_id = (int) $attibute_id;
                    if ($attibute_id == $pre_id) {
                        $pre_result[] = $pre_id;
                    } else {
                        $pre_result[] = $attibute_id;
                    }
                }
                $iids = $pre_result;
                break;
            default:
                $result = 'Unknown argument type';
                break;
        }
    } elseif ($options['attributes_exclude']) {
        switch (gettype($options['attributes_exclude'])) {
            case 'string':
                $id = (int) $options['attributes_exclude'];
                if ($options['attributes_exclude'] == $id) {
                    $eids = array($id);
                } else {
                    $eids = array($options['attributes_exclude']);
                }
                break;
            case 'integer':
                $eids = array($options['attributes_exclude']);
                break;
            case 'array':
                $pre_result = array();
                foreach ($options['attributes_exclude'] as $attibute_id) {
                    $pre_id = (int) $attibute_id;
                    if ($attibute_id == $pre_id) {
                        $pre_result[] = $pre_id;
                    } else {
                        $pre_result[] = $attibute_id;
                    }
                }
                $eids = $pre_result;
                break;
            default:
                $result = 'Unknown argument type';
                break;
        }
    }

    if ($options['attributes_orderby'] !== 'none') {
        if ($options['attributes_orderby'] === 'rand') {
            shuffle($all_attributes);
        } elseif ($options['attributes_include'] && $options['attributes_orderby'] === 'include') {
            $pre_order = array();
            $pre_end = $all_attributes;
            foreach ($iids as $order) {
                foreach ($all_attributes as $attribute_key => $attribute) {
                    if (is_string($order) && $attribute->attribute_name == $order) {
                        // echo '<pre>'; var_dump($attribute->attribute_name, $order); echo '</pre>';
                        $pre_order[] = $attribute;
                        unset($pre_end[$attribute_key]);
                    } elseif (is_numeric($order) && $attribute->attribute_id == $order) {
                        // echo '<pre>'; var_dump($attribute->attribute_id, $order); echo '</pre>';
                        $pre_order[] = $attribute;
                        unset($pre_end[$attribute_key]);
                    }
                }
            }
            $all_attributes = array_merge($pre_order, $pre_end);
        } elseif (in_array($options['attributes_orderby'], array('id', 'name', 'label'))) {
            usort($all_attributes, function ($a, $b) use ($options) {
                $field = 'attribute_' . $options['attributes_orderby'];
                // echo '<pre>'; var_dump($a->$field); echo '</pre>';
                return $options['attributes_order'] == 'asc' ? $a->$field <=> $b->$field : $b->$field <=> $a->$field;
            });
        }
    }

    foreach ($all_attributes as $attribute) {
        if (isset($iids)) {
            if (
                in_array($attribute->attribute_id, $iids) ||
                in_array($attribute->attribute_name, $iids)
            ) {
                $result[] = get_attribute_terms($attribute);
            }
        } elseif (isset($eids)) {
            if (
                !in_array($attribute->attribute_id, $eids) &&
                !in_array($attribute->attribute_name, $eids)
            ) {
                $result[] = get_attribute_terms($attribute);
            }
        } else {
            $result[] = get_attribute_terms($attribute);
        }
    }

    return $result;
}