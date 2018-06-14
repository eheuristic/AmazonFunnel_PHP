<?php

class ShippinginfoModel{
    public function insert_data($purchasedate, $shipped_date, $order_id, $email, $asin, $name, $product_id, $promo_id1, $phone) {
            global $dbh;
            $data1['order_id'] = $dbh->sqlsafe($order_id);
            $data1['date'] = $dbh->sqlsafe(date('Y-m-d', $purchasedate));
            $data1['user_id'] = $dbh->sqlsafe($order_id);
            $data1['promo_code'] = $dbh->sqlsafe($promo_id1); // set here promo code not get in response

            $dbh->insert('orders', $data1);

            $promo_data = array();
            $promo_data['order_id'] = $dbh->sqlsafe($order_id);
            $promo_data['user_id'] = $dbh->sqlsafe($order_id);
            $promo_data['name'] = $dbh->sqlsafe($name);
            $promo_data['order_date'] = $dbh->sqlsafe(date('Y-m-d', $purchasedate));
            $promo_data['delivery_date'] = $dbh->sqlsafe(date('Y-m-d', $shipped_date));
            $promo_data['phone'] = $dbh->sqlsafe($phone);
            $promo_data['ASIN'] = $dbh->sqlsafe($asin);
            $promo_data['mail'] = $dbh->sqlsafe($email);
            $promo_data['product_id'] = $dbh->sqlsafe($product_id);
            $promo_data['get_bootle'] = $dbh->sqlsafe('0');

            $dbh->insert('promo1', $promo_data);
            return true;
        }
}