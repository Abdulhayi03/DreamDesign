<?php

    function pr($arr){
        echo '<pre>';
        print_r($arr);
    }

    function prx($arr){
        echo '<pre>';
        print_r($arr);
        die();
    }

    function get_safe_value($con, $str){
        if(($str != '')){
            return mysqli_real_escape_string($con, $str); 
        }
    }

    function get_project($con, $cat_id=''){
        $sql="select * from projects";

        if($cat_id!=''){
            $sql.=" where category_id=$cat_id";
        }
        
        $res = mysqli_query($con, $sql);
        $data = array();
        while($row=mysqli_fetch_assoc($res)){
            $data[] = $row;
        }
        return $data;
    }

?>